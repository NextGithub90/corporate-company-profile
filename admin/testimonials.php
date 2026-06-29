<?php
require_once 'db_connect.php';

// Handle CRUD Operations
$msg = '';
if($_SERVER['REQUEST_METHOD'] === 'POST' && $db_connected) {
    if(isset($_POST['action'])) {
        if($_POST['action'] === 'add' || $_POST['action'] === 'edit') {
            $name = $conn->real_escape_string($_POST['client_name']);
            $role = $conn->real_escape_string($_POST['client_role']);
            $quote = $conn->real_escape_string($_POST['quote']);
            $rating = (int)$_POST['rating'];
            // Generate initials
            $words = explode(" ", $name);
            $initials = strtoupper(substr($words[0],0,1) . (isset($words[1]) ? substr($words[1],0,1) : ''));
            
            // Image Upload Handling
            $avatar_sql = "";
            if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $new_filename = time() . '_' . rand(1000,9999) . '.' . $ext;
                $target_path = __DIR__ . '/../uploads/' . $new_filename;
                if(move_uploaded_file($_FILES['avatar']['tmp_name'], $target_path)) {
                    $avatar_sql = ", avatar_image='" . $conn->real_escape_string($new_filename) . "'";
                }
            }
            
            if($_POST['action'] === 'add') {
                if($avatar_sql) {
                    $av_val = explode("'", $avatar_sql)[1];
                    $conn->query("INSERT INTO testimonials (client_name, client_role, quote, avatar_initials, rating, avatar_image) VALUES ('$name', '$role', '$quote', '$initials', $rating, '$av_val')");
                } else {
                    $conn->query("INSERT INTO testimonials (client_name, client_role, quote, avatar_initials, rating) VALUES ('$name', '$role', '$quote', '$initials', $rating)");
                }
                $msg = "Testimonial added successfully.";
            } else {
                $id = (int)$_POST['id'];
                $conn->query("UPDATE testimonials SET client_name='$name', client_role='$role', quote='$quote', avatar_initials='$initials', rating=$rating $avatar_sql WHERE id=$id");
                $msg = "Testimonial updated successfully.";
            }
        } elseif($_POST['action'] === 'delete') {
            $id = (int)$_POST['id'];
            $conn->query("DELETE FROM testimonials WHERE id=$id");
            $msg = "Testimonial removed.";
        }
    }
}

// Fetch all testimonials
$testimonials = [];
if($db_connected) {
    $res = $conn->query("SELECT * FROM testimonials ORDER BY id DESC");
    if($res) while($r = $res->fetch_assoc()) $testimonials[] = $r;
}

require_once 'includes/header.php';
?>

<div class="mb-10 flex items-center justify-between">
  <div>
    <h2 class="text-3xl font-display font-black text-corporate-navy tracking-tight">Testimonials</h2>
    <p class="text-corporate-textMuted mt-1 text-sm">Manage client feedback shown on the landing page.</p>
  </div>
  <button onclick="document.getElementById('modal-form').classList.remove('hidden')" class="bg-corporate-emerald text-white px-6 py-3 rounded-xl font-bold font-sans shadow-lg shadow-corporate-emerald/20 hover:scale-105 transition-transform flex items-center gap-2">
    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    Add New Review
  </button>
</div>

<?php if($msg): ?>
<div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm font-semibold flex items-center gap-2">
    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
    <?= $msg ?>
</div>
<?php endif; ?>
<?php if(!$db_connected): ?>
<div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm font-semibold flex items-center gap-2">
    Database is offline. Please run XAMPP MySQL.
</div>
<?php endif; ?>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
  <?php foreach($testimonials as $t): ?>
  <div class="bg-white p-6 rounded-3xl border border-corporate-primary/10 shadow-sm relative group overflow-hidden">
    <div class="absolute top-4 right-4 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
      <button onclick='editItem(<?= htmlspecialchars(json_encode($t), ENT_QUOTES, "UTF-8") ?>)' class="w-8 h-8 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center hover:bg-blue-600 hover:text-white transition-colors">
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 20h9M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
      </button>
      <form method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" value="<?= $t['id'] ?>">
        <button type="submit" class="w-8 h-8 bg-red-50 text-red-600 rounded-lg flex items-center justify-center hover:bg-red-600 hover:text-white transition-colors">
          <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 6h18M19 6V20a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
        </button>
      </form>
    </div>
    
    <div class="flex gap-1 text-corporate-accent mb-4">
      <?php for($i=0; $i<$t['rating']; $i++): ?><svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><?php endfor; ?>
    </div>
    <p class="text-corporate-textDark font-medium italic mb-6 line-clamp-3">"<?= htmlspecialchars($t['quote']) ?>"</p>
    <div class="flex items-center gap-3">
      <?php if(!empty($t['avatar_image'])): ?>
        <img src="../uploads/<?= htmlspecialchars($t['avatar_image']) ?>" alt="Avatar" class="w-10 h-10 rounded-full object-cover shadow-sm border border-corporate-emerald/20">
      <?php else: ?>
        <div class="w-10 h-10 rounded-full bg-corporate-emerald/20 text-corporate-emerald flex items-center justify-center font-display font-bold shadow-sm">
          <?= $t['avatar_initials'] ?>
        </div>
      <?php endif; ?>
      <div>
        <h4 class="font-display font-bold text-corporate-navy leading-none"><?= htmlspecialchars($t['client_name']) ?></h4>
        <p class="text-corporate-textMuted text-xs font-semibold mt-1 uppercase"><?= htmlspecialchars($t['client_role']) ?></p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<!-- Modal Form -->
<div id="modal-form" class="hidden fixed inset-0 z-50 bg-corporate-navy/50 backdrop-blur-sm flex items-center justify-center p-4">
  <div class="bg-white w-full max-w-xl rounded-3xl shadow-2xl overflow-hidden animate-[enter_0.2s_ease-out]">
    <div class="p-6 border-b border-corporate-primary/5 flex justify-between items-center bg-corporate-lightBg">
      <h3 id="modal-title" class="font-display font-bold text-xl text-corporate-navy">Add Testimonial</h3>
      <button onclick="closeModal()" class="text-corporate-textMuted hover:text-corporate-navy"><svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
    </div>
    <form method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
      <input type="hidden" name="action" id="form-action" value="add">
      <input type="hidden" name="id" id="form-id" value="">
      
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold uppercase tracking-widest text-corporate-textMuted mb-2">Client Name</label>
          <input name="client_name" id="f-name" required class="w-full px-4 py-3 bg-corporate-lightBg border border-corporate-primary/10 rounded-xl focus:border-corporate-accent focus:bg-white transition-all text-sm outline-none" />
        </div>
        <div>
          <label class="block text-xs font-bold uppercase tracking-widest text-corporate-textMuted mb-2">Job Role / Company</label>
          <input name="client_role" id="f-role" required class="w-full px-4 py-3 bg-corporate-lightBg border border-corporate-primary/10 rounded-xl focus:border-corporate-accent focus:bg-white transition-all text-sm outline-none" />
        </div>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-xs font-bold uppercase tracking-widest text-corporate-textMuted mb-2">Rating (1-5)</label>
          <input name="rating" id="f-rating" type="number" min="1" max="5" value="5" required class="w-full px-4 py-3 bg-corporate-lightBg border border-corporate-primary/10 rounded-xl focus:border-corporate-accent focus:bg-white transition-all text-sm outline-none" />
        </div>
        <div>
          <label class="block text-xs font-bold uppercase tracking-widest text-corporate-textMuted mb-2">Client Photo (Optional)</label>
          <input type="file" name="avatar" accept="image/*" class="w-full px-4 py-2.5 bg-corporate-lightBg border border-corporate-primary/10 rounded-xl focus:border-corporate-accent focus:bg-white transition-all text-sm outline-none file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-corporate-emerald/10 file:text-corporate-emerald hover:file:bg-corporate-emerald/20" />
        </div>
      </div>
      <div>
        <label class="block text-xs font-bold uppercase tracking-widest text-corporate-textMuted mb-2">Review Quote</label>
        <textarea name="quote" id="f-quote" rows="4" required class="w-full px-4 py-3 bg-corporate-lightBg border border-corporate-primary/10 rounded-xl focus:border-corporate-accent focus:bg-white transition-all text-sm outline-none resize-none"></textarea>
      </div>
      <div class="pt-4 flex justify-end gap-3">
        <button type="button" onclick="closeModal()" class="px-6 py-3 rounded-xl font-bold bg-corporate-lightBg text-corporate-navy hover:bg-corporate-primary hover:text-white transition-colors text-sm">Cancel</button>
        <button type="submit" class="px-6 py-3 rounded-xl font-bold bg-corporate-emerald text-white hover:bg-corporate-emerald/90 shadow-md shadow-corporate-emerald/20 transition-all text-sm">Save Testimonial</button>
      </div>
    </form>
  </div>
</div>

<script>
function editItem(data) {
    document.getElementById('modal-title').innerText = 'Edit Testimonial';
    document.getElementById('form-action').value = 'edit';
    document.getElementById('form-id').value = data.id;
    document.getElementById('f-name').value = data.client_name;
    document.getElementById('f-role').value = data.client_role;
    document.getElementById('f-rating').value = data.rating;
    document.getElementById('f-quote').value = data.quote;
    document.getElementById('modal-form').classList.remove('hidden');
}
function closeModal() {
    document.getElementById('modal-form').classList.add('hidden');
    document.getElementById('modal-title').innerText = 'Add Testimonial';
    document.getElementById('form-action').value = 'add';
    document.getElementById('f-id').value = '';
    document.getElementById('f-name').value = '';
    document.getElementById('f-role').value = '';
    document.getElementById('f-rating').value = 5;
    document.getElementById('f-quote').value = '';
}
</script>

<?php require_once 'includes/footer.php'; ?>
