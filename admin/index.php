<?php
session_start();
require_once 'db_connect.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';
    
    if($db_connected) {
        $stmt = $conn->prepare("SELECT id, password_hash FROM admin_users WHERE username = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['password_hash'])) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $row['id'];
                header("Location: dashboard.php");
                exit;
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "User not found.";
        }
    } else {
        // Fallback for XAMPP being offline (Demo login)
        if($user === 'admin' && $pass === 'admin123') {
            $_SESSION['admin_logged_in'] = true;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "MySQL is OFF. Use admin / admin123 to demo.";
        }
    }
}

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: dashboard.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel - Nexis Consulting</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;700;900&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Inter', 'sans-serif'], display: ['Outfit', 'sans-serif'] },
          colors: { corporate: { navy: '#0a192f', primary: '#134074', accent: '#00b4d8', emerald: '#10b981', lightBg: '#f8fafc' } }
        }
      }
    }
  </script>
</head>
<body class="bg-corporate-navy min-h-screen flex items-center justify-center relative overflow-hidden">
  <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNmZmZmZmYiIGZpbGwtb3BhY2l0eT0iMC4wNSIvPjwvc3ZnPg==')] opacity-20"></div>
  <div class="absolute -top-32 -right-32 w-96 h-96 bg-corporate-accent/20 rounded-full filter blur-3xl pointer-events-none"></div>
  <div class="absolute -bottom-32 -left-32 w-96 h-96 bg-corporate-emerald/10 rounded-full filter blur-3xl pointer-events-none"></div>

  <div class="relative z-10 w-full max-w-md p-8 md:p-10 bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl">
    <div class="text-center mb-10">
      <div class="w-16 h-16 rounded-2xl bg-gradient-to-tr from-corporate-primary to-corporate-accent flex items-center justify-center text-white font-display font-extrabold text-3xl shadow-lg mx-auto mb-4">
        N
      </div>
      <h2 class="text-2xl font-display font-bold text-white tracking-tight">Admin Portal</h2>
      <p class="text-white/60 text-sm mt-2 font-sans">Login to manage enterprise contents</p>
    </div>

    <?php if ($error): ?>
      <div class="bg-red-500/10 border border-red-500/50 text-red-100 px-4 py-3 rounded-xl mb-6 text-sm flex items-center gap-3">
        <svg width="20" height="20" fill="none" class="text-red-400 flex-shrink-0" viewBox="0 0 24 24"><path stroke="currentColor" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="" class="space-y-6">
      <div>
        <label class="block text-xs font-bold uppercase tracking-widest text-white/70 mb-2">Username</label>
        <input name="username" type="text" required class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-corporate-accent focus:bg-white/10 text-white placeholder-white/30 transition-all font-sans" placeholder="Enter your username" />
      </div>
      <div>
        <label class="block text-xs font-bold uppercase tracking-widest text-white/70 mb-2">Password</label>
        <input name="password" type="password" required class="w-full px-5 py-4 bg-white/5 border border-white/10 rounded-xl focus:outline-none focus:border-corporate-accent focus:bg-white/10 text-white placeholder-white/30 transition-all font-sans" placeholder="Enter your password" />
      </div>
      <button type="submit" class="w-full py-4 bg-gradient-to-r from-corporate-accent to-corporate-primary hover:from-corporate-primary hover:to-corporate-navy text-white rounded-xl font-display font-bold text-lg tracking-wide shadow-lg hover:shadow-xl transition-all duration-300 border border-white/10">
        Secure Login
      </button>
    </form>
  </div>
</body>
</html>
