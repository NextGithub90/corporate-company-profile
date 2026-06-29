<?php
require_once 'db_connect.php';
require_once 'includes/header.php';

// Mock analytics for the "Pro Max" chart requirement
$testi_count = 0;
$pricing_count = 0;
if($db_connected) {
    $tc = $conn->query("SELECT COUNT(*) FROM testimonials");
    if($tc) $testi_count = $tc->fetch_row()[0];
    
    $pc = $conn->query("SELECT COUNT(*) FROM pricing_plans");
    if($pc) $pricing_count = $pc->fetch_row()[0];
}
?>

<div class="mb-10 flex items-center justify-between">
  <div>
    <h2 class="text-3xl font-display font-black text-corporate-navy tracking-tight">System Analytics</h2>
    <p class="text-corporate-textMuted mt-1 text-sm">Real-time overview of your enterprise assets.</p>
  </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
  <div class="bg-white p-6 rounded-3xl border border-corporate-primary/5 shadow-sm">
    <div class="flex items-center gap-4 mb-4">
      <div class="w-12 h-12 rounded-xl bg-corporate-emerald/10 text-corporate-emerald flex items-center justify-center">
        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
      </div>
      <h3 class="font-display font-bold text-corporate-navy text-lg">Testimonials</h3>
    </div>
    <div class="text-4xl font-display font-black text-corporate-navy"><?= $testi_count ?></div>
    <div class="text-xs text-corporate-textMuted mt-2">+2 this month</div>
  </div>

  <div class="bg-white p-6 rounded-3xl border border-corporate-primary/5 shadow-sm">
    <div class="flex items-center gap-4 mb-4">
      <div class="w-12 h-12 rounded-xl bg-corporate-accent/10 text-corporate-accent flex items-center justify-center">
        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2" ry="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
      </div>
      <h3 class="font-display font-bold text-corporate-navy text-lg">Pricing Plans</h3>
    </div>
    <div class="text-4xl font-display font-black text-corporate-navy"><?= $pricing_count ?></div>
    <div class="text-xs text-corporate-textMuted mt-2">Active packages</div>
  </div>

  <div class="bg-gradient-to-tr from-corporate-navy to-corporate-primary p-6 rounded-3xl shadow-lg relative overflow-hidden flex flex-col justify-end">
    <div class="absolute -top-10 -right-10 w-32 h-32 bg-corporate-accent/20 rounded-full blur-xl"></div>
    <h3 class="font-display font-bold text-white/90 text-lg mb-2">Total Impressions</h3>
    <div class="text-4xl font-display font-black text-white">12,408</div>
    <div class="text-xs text-corporate-emerald font-bold mt-2 flex items-center gap-1">
      <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M5 12l5 5L20 7"/></svg>
      +14.5% upwards
    </div>
  </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
  <!-- Pie Chart Section -->
  <div class="bg-white p-8 rounded-3xl border border-corporate-primary/5 shadow-sm">
    <h3 class="font-display font-bold text-corporate-navy text-xl mb-6">User Plan Distribution</h3>
    <div class="relative w-full max-w-[300px] h-[300px] mx-auto">
      <canvas id="planPieChart"></canvas>
    </div>
  </div>
  
  <div class="bg-white p-8 rounded-3xl border border-corporate-primary/5 shadow-sm">
    <h3 class="font-display font-bold text-corporate-navy text-xl mb-6">Recent Activity</h3>
    <div class="space-y-6">
      <div class="flex gap-4">
        <div class="w-2 h-2 rounded-full bg-corporate-emerald mt-2"></div>
        <div>
          <h4 class="text-sm font-bold text-corporate-navy">Sarah Jenkins left a 5-star review</h4>
          <p class="text-xs text-corporate-textMuted mt-1">2 hours ago</p>
        </div>
      </div>
      <div class="flex gap-4">
        <div class="w-2 h-2 rounded-full bg-corporate-accent mt-2"></div>
        <div>
          <h4 class="text-sm font-bold text-corporate-navy">Admin modified "Corporate Elite" pricing</h4>
          <p class="text-xs text-corporate-textMuted mt-1">5 hours ago</p>
        </div>
      </div>
      <div class="flex gap-4">
        <div class="w-2 h-2 rounded-full bg-corporate-primary mt-2"></div>
        <div>
          <h4 class="text-sm font-bold text-corporate-navy">Database initialized</h4>
          <p class="text-xs text-corporate-textMuted mt-1">1 day ago</p>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const ctx = document.getElementById('planPieChart').getContext('2d');
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Enterprise Base', 'Corporate Elite', 'Custom Solutions'],
      datasets: [{
        data: [45, 30, 25],
        backgroundColor: [
          '#134074', // Primary
          '#00b4d8', // Accent
          '#10b981'  // Emerald
        ],
        borderWidth: 0,
        hoverOffset: 12
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      cutout: '75%',
      plugins: {
        legend: {
          position: 'bottom',
          labels: { padding: 20, usePointStyle: true, font: { family: 'Inter', size: 12 } }
        }
      }
    }
  });
</script>

<?php require_once 'includes/footer.php'; ?>
