<?php
require_once 'db_connect.php';

// Handle CRUD Operations
$msg = '';
if($_SERVER['REQUEST_METHOD'] === 'POST' && $db_connected) {
    if(isset($_POST['action'])) {
        if($_POST['action'] === 'add' || $_POST['action'] === 'edit') {
            $name = $conn->real_escape_string($_POST['plan_name']);
            $price = (float)$_POST['price'];
            $period = $conn->real_escape_string($_POST['billing_period']);
            $desc = $conn->real_escape_string($_POST['description']);
            $is_popular = isset($_POST['is_popular']) ? 1 : 0;
            
            // Handle Features (Newline seperated to JSON array)
            $features_raw = explode("\n", str_replace("\r", "", $_POST['features']));
            $features_arr = array_filter(array_map('trim', $features_raw));
            $features_json = $conn->real_escape_string(json_encode(array_values($features_arr)));
            
            if($_POST['action'] === 'add') {
                $conn->query("INSERT INTO pricing_plans (plan_name, price, billing_period, description, features, is_popular) VALUES ('$name', $price, '$period', '$desc', '$features_json', $is_popular)");
                $msg = "Pricing plan added successfully.";
            } else {
                $id = (int)$_POST['id'];
                $conn->query("UPDATE pricing_plans SET plan_name='$name', price=$price, billing_period='$period', description='$desc', features='$features_json', is_popular=$is_popular WHERE id=$id");
                $msg = "Pricing plan updated successfully.";
            }
        } elseif($_POST['action'] === 'delete') {
            $id = (int)$_POST['id'];
            $conn->query("DELETE FROM pricing_plans WHERE id=$id");
            $msg = "Pricing plan removed.";
        }
    }
}

// Fetch all pricing plans
$pricing_plans = [];
if($db_connected) {
    $res = $conn->query("SELECT * FROM pricing_plans ORDER BY price ASC");
    if($res) while($r = $res->fetch_assoc()) $pricing_plans[] = $r;
}

require_once 'includes/header.php';
?>

<div class="mb-10 flex items-center justify-between">
  <div>
    <h2 class="text-3xl font-display font-black text-corporate-navy tracking-tight">Pricing Plans</h2>
    <p class="text-corporate-textMuted mt-1 text-sm">Manage enterprise service packages and tiers.</p>
  </div>
  <button onclick="document.getElementById('modal-form').classList.remove('hidden')" class="bg-corporate-emerald text-white px-6 py-3 rounded-xl font-bold font-sans shadow-lg shadow-corporate-emerald/20 hover:scale-105 transition-transform flex items-center gap-2">
    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    Add Package
  </button>
</div>

<?php if($msg): ?>
<div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm font-semibold flex items-center gap-2">
    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
    <?= $msg ?>
</div>
<?php endif; ?>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
  <?php foreach($pricing_plans as $p): 
    $features = json_decode($p['features'], true);
  ?>
  <div class="bg-white p-6 rounded-3xl border border-corporate-primary/10 shadow-sm relative group overflow-hidden flex flex-col">
    <?php if($p['is_popular']): ?>
      <div class="absolute -top-6 -left-6 w-16 h-16 bg-corporate-accent/10 rounded-full blur-xl pointer-events-none"></div>
      <span class="absolute top-4 left-4 bg-corporate-accent text-white text-[10px] font-bold uppercase tracking-widest px-2 py-1 rounded shadow-sm">Popular</span>
    <?php endif; ?>
    <div class="absolute top-4 right-4 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
      <button onclick='editItem(<?= htmlspecialchars(json_encode($p), ENT_QUOTES, "UTF-8") ?>)' class="w-8 h-8 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-600 hover:text-white transition-colors">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
      </button>
      <form method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?= $p['id'] ?>">
        <button type="submit" class="w-8 h-8 bg-red-50 text-red-600 rounded-lg flex items-center justify-center hover:bg-red-600 hover:text-white transition-colors">
          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 6h18M19 6V20a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
        </button>
      </form>
    </div>
    
    <h3 class="font-display font-bold text-corporate-navy text-xl mt-6 mb-2"><?= htmlspecialchars($p['plan_name']) ?></h3>
    <div class="flex items-baseline gap-1 mb-4">
      <span class="text-3xl font-black text-corporate-navy">$<?= number_format($p['price']) ?></span>
      <span class="text-corporate-textMuted text-sm font-medium"><?= htmlspecialchars($p['billing_period']) ?></span>
    </div>
    <p class="text-corporate-textMuted text-sm leading-relaxed mb-6 line-clamp-2"><?= htmlspecialchars($p['description']) ?></p>
    
    <div class="bg-corporate-lightBg p-4 border border-corporate-primary/5 rounded-2xl flex-grow">
        <h4 class="text-xs font-bold uppercase tracking-widest text-corporate-navy mb-3">Included Features</h4>
        <ul class="space-y-2 text-sm text-corporate-textMuted">
            <?php if($features) foreach(array_slice($features, 0, 4) as $f): ?>
            <li class="flex items-center gap-2"><svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" class="text-corporate-emerald"><path d="M20 6L9 17l-5-5"/></svg> <?= htmlspecialchars($f) ?></li>
            <?php endforeach; ?>
            <?php if(count($features) > 4): ?><li class="text-xs italic">+ <?= count($features)-4 ?> more</li><?php endif; ?>
        </ul>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<!-- Modal Form -->
<div id="modal-form" class="hidden fixed inset-0 z-50 bg-corporate-navy/50 backdrop-blur-sm flex items-center justify-center p-4">
  <div class="bg-white w-full max-w-2xl rounded-3xl shadow-2xl overflow-hidden animate-[enter_0.2s_ease-out]">
    <div class="p-6 border-b border-corporate-primary/5 flex justify-between items-center bg-corporate-lightBg">
      <h3 id="modal-title" class="font-display font-bold text-xl text-corporate-navy">Add Pricing Plan</h3>
      <button type="button" onclick="closeModal()" class="text-corporate-textMuted hover:text-corporate-navy"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
    </div>
    <form method="POST" class="p-6 space-y-4 max-h-[80vh] overflow-y-auto">
      <input type="hidden" name="action" id="form-action" value="add">
      <input type="hidden" name="id" id="f-id" value="">
      
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold uppercase tracking-widest text-corporate-textMuted mb-2">Package Name</label>
          <input name="plan_name" id="f-name" required class="w-full px-4 py-3 bg-corporate-lightBg border border-corporate-primary/10 rounded-xl focus:border-corporate-accent focus:bg-white transition-all text-sm outline-none" />
        </div>
        <div class="grid grid-cols-2 gap-2">
            <div>
              <label class="block text-xs font-bold uppercase tracking-widest text-corporate-textMuted mb-2">Price ($)</label>
              <input name="price" id="f-price" type="number" step="0.01" required class="w-full px-4 py-3 bg-corporate-lightBg border border-corporate-primary/10 rounded-xl focus:border-corporate-accent focus:bg-white transition-all text-sm outline-none" />
            </div>
            <div>
              <label class="block text-xs font-bold uppercase tracking-widest text-corporate-textMuted mb-2">Period</label>
              <input name="billing_period" id="f-period" value="/mo" required class="w-full px-4 py-3 bg-corporate-lightBg border border-corporate-primary/10 rounded-xl focus:border-corporate-accent focus:bg-white transition-all text-sm outline-none" />
            </div>
        </div>
      </div>
      <div>
        <label class="block text-xs font-bold uppercase tracking-widest text-corporate-textMuted mb-2">Description</label>
        <input name="description" id="f-desc" required class="w-full px-4 py-3 bg-corporate-lightBg border border-corporate-primary/10 rounded-xl focus:border-corporate-accent focus:bg-white transition-all text-sm outline-none" />
      </div>
      <div>
        <label class="block text-xs font-bold uppercase tracking-widest text-corporate-textMuted mb-2">Features (One per line)</label>
        <textarea name="features" id="f-features" rows="5" placeholder="Financial strategy&#10;Risk management&#10;24/7 Support" class="w-full px-4 py-3 bg-corporate-lightBg border border-corporate-primary/10 rounded-xl focus:border-corporate-accent focus:bg-white transition-all text-sm outline-none resize-none"></textarea>
      </div>
      <div class="flex items-center gap-3 bg-corporate-lightBg p-4 rounded-xl border border-corporate-primary/5">
        <input type="checkbox" name="is_popular" id="f-popular" class="w-5 h-5 text-corporate-accent rounded-md border-corporate-primary/20 bg-white" />
        <label for="f-popular" class="text-sm font-semibold text-corporate-navy">Mark as "Most Popular" Plan</label>
      </div>
      <div class="pt-4 flex justify-end gap-3 border-t border-corporate-primary/5">
        <button type="button" onclick="closeModal()" class="px-6 py-3 rounded-xl font-bold bg-corporate-lightBg text-corporate-navy hover:bg-corporate-primary hover:text-white transition-colors text-sm">Cancel</button>
        <button type="submit" class="px-6 py-3 rounded-xl font-bold bg-corporate-emerald text-white hover:bg-corporate-emerald/90 shadow-md shadow-corporate-emerald/20 transition-all text-sm">Save Pricing Plan</button>
      </div>
    </form>
  </div>
</div>

<script>
function editItem(data) {
    document.getElementById('modal-title').innerText = 'Edit Package';
    document.getElementById('form-action').value = 'edit';
    document.getElementById('f-id').value = data.id;
    document.getElementById('f-name').value = data.plan_name;
    document.getElementById('f-price').value = data.price;
    document.getElementById('f-period').value = data.billing_period;
    document.getElementById('f-desc').value = data.description;
    
    let featuresStr = '';
    try {
        let fArr = JSON.parse(data.features);
        featuresStr = fArr.join('\n');
    } catch(e) {}
    document.getElementById('f-features').value = featuresStr;
    document.getElementById('f-popular').checked = parseInt(data.is_popular) === 1;
    
    document.getElementById('modal-form').classList.remove('hidden');
}
function closeModal() {
    document.getElementById('modal-form').classList.add('hidden');
    document.getElementById('form-action').value = 'add';
    document.getElementById('f-id').value = '';
    document.getElementById('f-name').value = '';
    document.getElementById('f-price').value = '';
    document.getElementById('f-period').value = '/mo';
    document.getElementById('f-desc').value = '';
    document.getElementById('f-features').value = '';
    document.getElementById('f-popular').checked = false;
}
</script>

<?php require_once 'includes/footer.php'; ?>
