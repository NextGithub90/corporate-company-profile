<?php
require_once 'db_connect.php';

$msg = '';
$about = null;

// Handle POST — Save / Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $db_connected) {
    $subtitle = $conn->real_escape_string($_POST['subtitle'] ?? '');
    $title    = $conn->real_escape_string($_POST['title'] ?? '');
    $desc     = $conn->real_escape_string($_POST['description'] ?? '');
    $b1       = $conn->real_escape_string($_POST['bullet_1'] ?? '');
    $b2       = $conn->real_escape_string($_POST['bullet_2'] ?? '');
    $b3       = $conn->real_escape_string($_POST['bullet_3'] ?? '');

    // Handle image upload
    $img_sql_part = '';
    if (isset($_FILES['about_image']) && $_FILES['about_image']['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
        $ext = strtolower(pathinfo($_FILES['about_image']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, $allowed)) {
            $new_filename = 'about_' . time() . '_' . rand(1000, 9999) . '.' . $ext;
            $target_path  = __DIR__ . '/../uploads/' . $new_filename;
            if (move_uploaded_file($_FILES['about_image']['tmp_name'], $target_path)) {
                $safe_filename = $conn->real_escape_string($new_filename);
                $img_sql_part  = ", image_filename='$safe_filename'";
            }
        }
    }

    // Check if row already exists
    $check = $conn->query("SELECT id FROM about_section LIMIT 1");
    if ($check && $check->num_rows > 0) {
        $row = $check->fetch_assoc();
        $id  = (int)$row['id'];
        $conn->query("UPDATE about_section SET subtitle='$subtitle', title='$title', description='$desc', bullet_1='$b1', bullet_2='$b2', bullet_3='$b3' $img_sql_part WHERE id=$id");
    } else {
        $conn->query("INSERT INTO about_section (subtitle, title, description, bullet_1, bullet_2, bullet_3) VALUES ('$subtitle', '$title', '$desc', '$b1', '$b2', '$b3')");
    }
    $msg = "About Us section updated successfully.";
}

// Fetch current data
if ($db_connected) {
    $res = $conn->query("SELECT * FROM about_section LIMIT 1");
    if ($res && $res->num_rows > 0) {
        $about = $res->fetch_assoc();
    }
}

require_once 'includes/header.php';
?>

<div class="mb-10 flex items-center justify-between">
  <div>
    <h2 class="text-3xl font-display font-black text-corporate-navy tracking-tight">About Us Section</h2>
    <p class="text-corporate-textMuted mt-1 text-sm">Manage the About Us content displayed on the landing page.</p>
  </div>
  <a href="../index.php#about" target="_blank" class="hidden sm:flex items-center gap-2 text-sm font-semibold text-corporate-accent hover:text-corporate-primary transition-colors bg-corporate-accent/5 px-4 py-2 rounded-lg border border-corporate-accent/10">
    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
    Preview Live
  </a>
</div>

<?php if ($msg): ?>
<div class="bg-green-100 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6 text-sm font-semibold flex items-center gap-2">
  <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
  <?= $msg ?>
</div>
<?php endif; ?>

<?php if (!$db_connected): ?>
<div class="bg-red-100 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 text-sm font-semibold flex items-center gap-2">
  Database is offline. Please run XAMPP MySQL to edit this section.
</div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data" class="space-y-6">

  <!-- Row 1: Subtitle & Title -->
  <div class="bg-white rounded-3xl border border-corporate-primary/10 shadow-sm p-8">
    <h3 class="font-display font-bold text-corporate-navy text-lg mb-6 flex items-center gap-2">
      <div class="w-8 h-8 rounded-lg bg-corporate-primary/10 flex items-center justify-center text-corporate-primary">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
      </div>
      Section Headlines
    </h3>
    <div class="grid md:grid-cols-2 gap-6">
      <div>
        <label class="block text-xs font-bold uppercase tracking-widest text-corporate-textMuted mb-2">Badge / Subtitle</label>
        <input name="subtitle" type="text" value="<?= htmlspecialchars($about['subtitle'] ?? 'About Our Company') ?>"
          class="w-full px-4 py-3 bg-corporate-lightBg border border-corporate-primary/10 rounded-xl focus:border-corporate-accent focus:bg-white transition-all text-sm outline-none"
          placeholder="About Our Company" <?= !$db_connected ? 'disabled' : '' ?> />
        <p class="text-xs text-corporate-textMuted mt-1.5">Teks badge kecil di atas judul</p>
      </div>
      <div>
        <label class="block text-xs font-bold uppercase tracking-widest text-corporate-textMuted mb-2">Main Title</label>
        <input name="title" type="text" value="<?= htmlspecialchars($about['title'] ?? '') ?>"
          class="w-full px-4 py-3 bg-corporate-lightBg border border-corporate-primary/10 rounded-xl focus:border-corporate-accent focus:bg-white transition-all text-sm outline-none"
          placeholder="We Are Highly Committed to..." <?= !$db_connected ? 'disabled' : '' ?> />
        <p class="text-xs text-corporate-textMuted mt-1.5">Judul utama section About</p>
      </div>
    </div>
  </div>

  <!-- Row 2: Description -->
  <div class="bg-white rounded-3xl border border-corporate-primary/10 shadow-sm p-8">
    <h3 class="font-display font-bold text-corporate-navy text-lg mb-6 flex items-center gap-2">
      <div class="w-8 h-8 rounded-lg bg-corporate-accent/10 flex items-center justify-center text-corporate-accent">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
      </div>
      Description
    </h3>
    <textarea name="description" rows="5" required
      class="w-full px-4 py-3 bg-corporate-lightBg border border-corporate-primary/10 rounded-xl focus:border-corporate-accent focus:bg-white transition-all text-sm outline-none resize-none"
      placeholder="Describe your company's background, mission, and strengths..."
      <?= !$db_connected ? 'disabled' : '' ?>><?= htmlspecialchars($about['description'] ?? '') ?></textarea>
  </div>

  <!-- Row 3: Bullet Points -->
  <div class="bg-white rounded-3xl border border-corporate-primary/10 shadow-sm p-8">
    <h3 class="font-display font-bold text-corporate-navy text-lg mb-6 flex items-center gap-2">
      <div class="w-8 h-8 rounded-lg bg-corporate-emerald/10 flex items-center justify-center text-corporate-emerald">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
      </div>
      Key Bullet Points <span class="text-xs text-corporate-textMuted font-normal ml-2">(3 keunggulan di landing page)</span>
    </h3>
    <div class="space-y-4">
      <?php for ($i = 1; $i <= 3; $i++): ?>
      <div class="flex items-center gap-3">
        <div class="w-6 h-6 rounded-full bg-corporate-emerald/15 flex items-center justify-center text-corporate-emerald flex-shrink-0">
          <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
        </div>
        <input name="bullet_<?= $i ?>" type="text"
          value="<?= htmlspecialchars($about["bullet_$i"] ?? '') ?>"
          class="flex-1 px-4 py-3 bg-corporate-lightBg border border-corporate-primary/10 rounded-xl focus:border-corporate-accent focus:bg-white transition-all text-sm outline-none"
          placeholder="Key point <?= $i ?>..." <?= !$db_connected ? 'disabled' : '' ?> />
      </div>
      <?php endfor; ?>
    </div>
  </div>

  <!-- Row 4: Image Upload -->
  <div class="bg-white rounded-3xl border border-corporate-primary/10 shadow-sm p-8">
    <h3 class="font-display font-bold text-corporate-navy text-lg mb-6 flex items-center gap-2">
      <div class="w-8 h-8 rounded-lg bg-corporate-highlight/10 flex items-center justify-center" style="color:#d97706;">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
      </div>
      Section Image <span class="text-xs text-corporate-textMuted font-normal ml-2">(Optional — tampil di sisi kanan desktop)</span>
    </h3>
    <div class="grid md:grid-cols-2 gap-8 items-start">
      <div>
        <label class="block text-xs font-bold uppercase tracking-widest text-corporate-textMuted mb-2">Upload Gambar Baru</label>
        <input type="file" name="about_image" id="about_image_input" accept="image/jpeg,image/png,image/webp,image/gif"
          class="w-full px-4 py-3 bg-corporate-lightBg border border-dashed border-corporate-primary/20 rounded-xl text-sm outline-none cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-corporate-emerald/10 file:text-corporate-emerald hover:file:bg-corporate-emerald/20 transition-all"
          onchange="previewImage(event)" <?= !$db_connected ? 'disabled' : '' ?> />
        <p class="text-xs text-corporate-textMuted mt-2">Format: JPG, PNG, WebP, GIF. Rekomendasi rasio 4:3.</p>
        <?php if (!empty($about['image_filename'])): ?>
          <p class="text-xs text-corporate-emerald mt-2 font-semibold flex items-center gap-1">
            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg>
            Gambar aktif: <?= htmlspecialchars($about['image_filename']) ?>
          </p>
        <?php endif; ?>
      </div>
      <div>
        <label class="block text-xs font-bold uppercase tracking-widest text-corporate-textMuted mb-2">Preview</label>
        <div class="w-full h-48 bg-corporate-lightBg border border-corporate-primary/10 rounded-2xl overflow-hidden flex items-center justify-center">
          <?php if (!empty($about['image_filename'])): ?>
            <img id="img-preview"
              src="../uploads/<?= htmlspecialchars($about['image_filename']) ?>"
              alt="About section preview"
              class="w-full h-full object-cover" />
          <?php else: ?>
            <div id="img-preview-placeholder" class="flex flex-col items-center gap-2 text-corporate-textMuted">
              <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              <span class="text-xs">No image selected</span>
            </div>
            <img id="img-preview" src="" alt="" class="w-full h-full object-cover hidden" />
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Submit -->
  <div class="flex justify-end">
    <button type="submit" <?= !$db_connected ? 'disabled' : '' ?>
      class="px-10 py-4 bg-corporate-emerald text-white rounded-2xl font-display font-bold text-base shadow-lg shadow-corporate-emerald/20 hover:bg-corporate-emerald/90 hover:scale-105 transition-all duration-300 flex items-center gap-3 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:scale-100">
      <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
      Save About Us Section
    </button>
  </div>
</form>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(e) {
        const preview = document.getElementById('img-preview');
        const placeholder = document.getElementById('img-preview-placeholder');
        preview.src = e.target.result;
        preview.classList.remove('hidden');
        if (placeholder) placeholder.classList.add('hidden');
    };
    reader.readAsDataURL(file);
}
</script>

<?php require_once 'includes/footer.php'; ?>
