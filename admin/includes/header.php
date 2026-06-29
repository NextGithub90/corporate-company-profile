<?php
// admin/includes/header.php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: index.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard - Nexis</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;700;900&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Inter', 'sans-serif'], display: ['Outfit', 'sans-serif'] },
          colors: { corporate: { navy: '#0a192f', primary: '#134074', accent: '#00b4d8', emerald: '#10b981', lightBg: '#f8fafc', textDark: '#1e293b', textMuted: '#64748b' } }
        }
      }
    }
  </script>
</head>
<body class="bg-corporate-lightBg text-corporate-textDark min-h-screen font-sans flex">
  
  <div id="sidebar-overlay" onclick="toggleSidebar()" class="fixed inset-0 bg-corporate-navy/50 backdrop-blur-sm z-40 transition-opacity duration-300 opacity-0 pointer-events-none md:hidden"></div>

  <!-- Sidebar -->
  <aside id="sidebar" class="w-72 bg-corporate-navy flex flex-col justify-between fixed h-full z-50 shadow-2xl transform -translate-x-full md:translate-x-0 transition-transform duration-300">
    <div class="p-6">
      <div class="flex items-center gap-3 mb-10">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-corporate-primary to-corporate-accent flex items-center justify-center text-white font-display font-extrabold text-xl shadow-md">
          N
        </div>
        <span class="font-display font-extrabold text-xl tracking-tight text-white">
          Nexis<span class="text-corporate-accent">Admin</span>
        </span>
      </div>
      
      <nav class="space-y-2">
        <a href="dashboard.php" class="flex items-center gap-4 px-4 py-3 rounded-xl transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' ?>">
          <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          <span class="font-semibold text-sm">Dashboard</span>
        </a>
        <a href="about.php" class="flex items-center gap-4 px-4 py-3 rounded-xl transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' ?>">
          <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
          <span class="font-semibold text-sm">About Us</span>
        </a>

        <a href="testimonials.php" class="flex items-center gap-4 px-4 py-3 rounded-xl transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'testimonials.php' ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' ?>">
          <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          <span class="font-semibold text-sm">Testimonials</span>
        </a>
        <a href="pricing.php" class="flex items-center gap-4 px-4 py-3 rounded-xl transition-colors <?php echo basename($_SERVER['PHP_SELF']) == 'pricing.php' ? 'bg-white/10 text-white' : 'text-white/60 hover:bg-white/5 hover:text-white' ?>">
          <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2" ry="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
          <span class="font-semibold text-sm">Pricing Plans</span>
        </a>
      </nav>
    </div>
    
    <div class="p-6 border-t border-white/10">
      <a href="logout.php" class="flex items-center gap-4 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 transition-colors">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        <span class="font-semibold text-sm">Sign Out</span>
      </a>
    </div>
  </aside>

  <!-- Main Content Wrapper -->
  <main class="md:ml-72 flex-1 w-full flex flex-col min-h-screen">
    <header class="h-20 bg-white/80 backdrop-blur-lg border-b border-corporate-primary/5 flex items-center justify-between px-4 md:px-10 sticky top-0 z-30 w-full shadow-sm">
      <div class="flex items-center gap-3">
        <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-lg bg-corporate-lightBg text-corporate-navy border border-corporate-primary/10 hover:bg-white transition-colors">
          <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <h1 class="text-xl font-display font-bold text-corporate-navy hidden sm:block">Management Workspace</h1>
        <h1 class="text-lg font-display font-bold text-corporate-navy sm:hidden">Admin</h1>
      </div>
      <div class="flex items-center gap-4">
        <a href="../index.php" target="_blank" class="hidden sm:flex items-center gap-2 text-sm font-semibold text-corporate-accent hover:text-corporate-primary transition-colors bg-corporate-accent/5 px-4 py-2 rounded-lg border border-corporate-accent/10">
          <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          View Live Site
        </a>
        <div class="w-10 h-10 bg-corporate-navy rounded-full border-2 border-corporate-accent text-white flex items-center justify-center text-sm font-bold shadow-md">
          A
        </div>
      </div>
    </header>
    <div class="p-10 flex-1">
