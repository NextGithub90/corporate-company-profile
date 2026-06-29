<?php 
require_once __DIR__ . '/admin/db_connect.php'; 
$testimonials = [];
$pricing_plans = [];
$about = null;
if($db_connected) {
    $res = $conn->query("SELECT * FROM testimonials");
    if($res) { while($row = $res->fetch_assoc()) { $testimonials[] = $row; } }
    
    $res2 = $conn->query("SELECT * FROM pricing_plans");
    if($res2) { while($row = $res2->fetch_assoc()) { $pricing_plans[] = $row; } }

    $res3 = $conn->query("SELECT * FROM about_section LIMIT 1");
    if($res3 && $res3->num_rows > 0) { $about = $res3->fetch_assoc(); }
} else {
    // Elegant fallback data if XAMPP is offline
    $testimonials = [
        ['client_name' => 'Sarah Jenkins', 'client_role' => 'CEO, TechFlow Inc', 'quote' => 'Nexis completely restructured our financial models. We experienced a 30% jump in operational efficiency within the first quarter alone.', 'avatar_initials' => 'SJ', 'rating' => 5],
        ['client_name' => 'David Chen', 'client_role' => 'Operations Director, GlobalTrade', 'quote' => 'The strategic foresight provided by their advisory team is unmatched. They don\'t just consult, they execute at an elite level.', 'avatar_initials' => 'DC', 'rating' => 5]
    ];
    $pricing_plans = [
        ['plan_name' => 'Enterprise Base', 'price' => 2500, 'billing_period' => '/mo', 'description' => 'Perfect for growing businesses needing structural stability and financial advisory.', 'features' => '["Financial assessment", "1 Monthly consultation", "Tax optimization strategy", "Email support"]', 'is_popular' => false],
        ['plan_name' => 'Corporate Elite', 'price' => 7500, 'billing_period' => '/mo', 'description' => 'Comprehensive suite for large corporations requiring dedicated analysts and constant oversight.', 'features' => '["Everything in Standard", "Weekly strategy sessions", "Dedicated risk analyst", "M&A advisory", "VIP Support"]', 'is_popular' => true]
    ];
    $about = [
        'subtitle'       => 'About Our Company',
        'title'          => 'We Are Highly Committed to Empowering Your Business',
        'description'    => 'Founded with a vision to redefine corporate consulting, Nexis Consulting Group brings together elite strategists, financial experts, and HR specialists to drive sustainable growth. Over the past decade, we have partnered with enterprises globally, translating complex market dynamics into actionable business growth.',
        'bullet_1'       => 'Trusted Professional Advisors',
        'bullet_2'       => 'Tailored Strategic Solutions',
        'bullet_3'       => 'Data-Driven Methodologies',
        'image_filename' => null,
    ];
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="./favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Nexis Consulting Group — Leading corporate consulting, financial advisory, market research, and HR solutions. Empowering companies to scale and innovate."
    />
    <meta
      name="keywords"
      content="corporate consulting, business advisory, financial services, market research, HR solutions, Nexis Consulting Group"
    />
    <meta
      property="og:title"
      content="Nexis Consulting Group — Professional Corporate Advisory"
    />
    <meta
      property="og:description"
      content="Empowering companies to grow. Business strategy, financial advisory, market research, and HR solutions."
    />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary_large_image" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com"  />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />
    <title>Nexis Consulting Group — Empowering Business Growth</title>

    <script   src="./assets/index-CV0HCgIy.js"></script>
    <link rel="stylesheet"  href="./assets/index-e-CaYOZB.css">
  <script src="https://cdn.tailwindcss.com"></script><script>tailwind.config={theme:{extend:{fontFamily:{sans:["Inter","sans-serif"],display:["Outfit","sans-serif"]},colors:{corporate:{navy:"#0a192f",primary:"#134074",accent:"#00b4d8",highlight:"#fbbf24",emerald:"#10b981",lightBg:"#f8fafc",textDark:"#1e293b",textMuted:"#64748b"}}}}}</script></head>
  <body
    class="bg-corporate-lightBg min-h-screen selection:bg-corporate-accent selection:text-white"
  >
    <!-- NAVBAR -->
    <nav
      id="navbar"
      class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-transparent py-6"
    >
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
          <!-- Logo -->
          <a href="#home" class="flex items-center gap-2 group">
            <div
              class="w-10 h-10 rounded-xl bg-gradient-to-tr from-corporate-navy via-corporate-primary to-corporate-accent flex items-center justify-center text-white font-display font-extrabold text-xl shadow-md shadow-corporate-primary/20"
            >
              N
            </div>
            <span
              class="nav-brand-color font-display font-extrabold text-xl tracking-tight transition-colors duration-300 text-white"
            >
              Nexis<span class="text-corporate-accent">Group</span>
            </span>
          </a>

          <!-- Desktop Navigation -->
          <div class="hidden md:flex items-center gap-8">
            <div class="flex items-center gap-6">
              <a
                href="#home"
                class="nav-link font-sans text-sm font-medium transition-colors duration-300 hover:text-corporate-accent text-white/90"
                >Home</a
              >
              <a
                href="#about"
                class="nav-link font-sans text-sm font-medium transition-colors duration-300 hover:text-corporate-accent text-white/90"
                >About Us</a
              >
              <a
                href="#services"
                class="nav-link font-sans text-sm font-medium transition-colors duration-300 hover:text-corporate-accent text-white/90"
                >Services</a
              >
              <a
                href="#process"
                class="nav-link font-sans text-sm font-medium transition-colors duration-300 hover:text-corporate-accent text-white/90"
                >Process</a
              >
              <a
                href="#pricing"
                class="nav-link font-sans text-sm font-medium transition-colors duration-300 hover:text-corporate-accent text-white/90"
                >Pricing</a
              >
              <a
                href="#contact"
                class="nav-link font-sans text-sm font-medium transition-colors duration-300 hover:text-corporate-accent text-white/90"
                >Contact</a
              >
            </div>
            <a
              id="nav-btn"
              href="#contact"
              class="font-sans text-sm font-bold px-6 py-2.5 rounded-xl transition-all duration-300 shadow-sm bg-white text-corporate-navy hover:bg-corporate-lightBg hover:text-corporate-primary"
            >
              Get Started
            </a>
          </div>

          <!-- Mobile Menu Button -->
          <button
            id="mobile-menu-btn"
            class="md:hidden p-2 rounded-lg focus:outline-none"
            aria-label="Toggle menu"
          >
            <svg
              id="mobile-menu-icon"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2.5"
              class="text-white"
            >
              <path d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Mobile Navigation Drawer -->
      <div
        id="mobile-menu-drawer"
        class="hidden md:hidden bg-white border-b border-corporate-primary/5 shadow-lg overflow-hidden"
      >
        <div class="px-4 pt-2 pb-6 space-y-3">
          <a
            href="#home"
            class="block font-sans text-base font-semibold text-corporate-textDark py-2 border-b border-corporate-primary/5 hover:text-corporate-accent transition-colors"
            >Home</a
          >
          <a
            href="#about"
            class="block font-sans text-base font-semibold text-corporate-textDark py-2 border-b border-corporate-primary/5 hover:text-corporate-accent transition-colors"
            >About Us</a
          >
          <a
            href="#services"
            class="block font-sans text-base font-semibold text-corporate-textDark py-2 border-b border-corporate-primary/5 hover:text-corporate-accent transition-colors"
            >Services</a
          >
          <a
            href="#process"
            class="block font-sans text-base font-semibold text-corporate-textDark py-2 border-b border-corporate-primary/5 hover:text-corporate-accent transition-colors"
            >Process</a
          >
          <a
            href="#pricing"
            class="block font-sans text-base font-semibold text-corporate-textDark py-2 border-b border-corporate-primary/5 hover:text-corporate-accent transition-colors"
            >Pricing</a
          >
          <a
            href="#contact"
            class="block font-sans text-base font-semibold text-corporate-textDark py-2 border-b border-corporate-primary/5 hover:text-corporate-accent transition-colors"
            >Contact</a
          >
          <div class="pt-4">
            <a
              href="#contact"
              class="block text-center font-sans font-bold bg-corporate-emerald text-white py-3 rounded-xl shadow-md shadow-corporate-emerald/10 hover:bg-corporate-emerald/90 transition-colors"
            >
              Get Started
            </a>
          </div>
        </div>
      </div>
    </nav>
    <main>
      <!-- HERO -->
      <section
        id="home"
        class="relative min-h-screen flex items-center justify-center overflow-hidden pt-20"
      >
        <div class="absolute inset-0 z-0">
          <img
            src="./corporate_skyscrapers.png"
            alt="Corporate skyscrapers background"
            class="w-full h-full object-cover object-center"
          />
          <div
            class="absolute inset-0 bg-gradient-to-r from-corporate-navy via-corporate-navy/90 to-corporate-primary/80 mix-blend-multiply"
          ></div>
          <div
            class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-corporate-lightBg/15"
          ></div>
        </div>
        <div
          class="absolute inset-0 z-1 dot-grid-bg opacity-30 pointer-events-none"
        ></div>

        <div
          class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-32 text-left w-full"
        >
          <div class="max-w-3xl">
            <div
              class="fade-in-element"
              data-direction="up"
              style="--delay: 0ms"
            >
              <span
                class="inline-block bg-corporate-accent/20 border border-corporate-accent/30 text-corporate-highlight px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest font-sans mb-6"
              >
                // Nexis Consulting Group
              </span>
            </div>

            <div
              class="fade-in-element"
              data-direction="up"
              style="--delay: 150ms"
            >
              <h1
                class="text-4xl sm:text-5xl md:text-6xl font-display font-black text-white leading-tight tracking-tight mb-6"
              >
                Empowering Businesses to
                <span class="text-corporate-highlight">Innovate</span> &
                <span class="text-corporate-accent">Scale</span>
              </h1>
            </div>

            <div
              class="fade-in-element"
              data-direction="up"
              style="--delay: 300ms"
            >
              <p
                class="text-lg md:text-xl text-white/80 leading-relaxed font-sans mb-10 max-w-2xl"
              >
                We provide high-impact strategies, financial planning, market
                research, and HR solutions to help your enterprise reach its
                maximum potential.
              </p>
            </div>

            <div
              class="fade-in-element"
              data-direction="up"
              style="--delay: 450ms"
            >
              <div
                class="flex flex-col sm:flex-row items-stretch sm:items-center gap-5"
              >
                <a
                  href="#services"
                  class="btn-neon font-sans text-center text-sm font-bold bg-corporate-emerald hover:bg-corporate-emerald/90 text-white px-8 py-4 rounded-xl shadow-lg shadow-corporate-emerald/20 transition-all duration-300 hover:-translate-y-0.5"
                >
                  Our Solutions
                </a>
                <a
                  href="tel:+1234567890"
                  class="flex items-center justify-center gap-3 border border-white/20 hover:border-corporate-accent/40 bg-white/5 hover:bg-white/10 text-white font-sans text-sm font-bold px-8 py-4 rounded-xl transition-all duration-300 group hover:-translate-y-0.5"
                >
                  <div
                    class="w-8 h-8 rounded-lg bg-corporate-accent/20 flex items-center justify-center text-corporate-accent group-hover:bg-corporate-accent group-hover:text-white transition-colors duration-300"
                  >
                    <svg
                      width="16"
                      height="16"
                      viewBox="0 0 24 24"
                      fill="none"
                      stroke="currentColor"
                      stroke-width="2.5"
                    >
                      <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"
                      />
                    </svg>
                  </div>
                  <span>+1 (234) 567-890</span>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div
          class="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-1"
        >
          <svg
            viewBox="0 0 1200 120"
            preserveAspectRatio="none"
            class="relative block w-full h-[60px] fill-current text-corporate-lightBg"
          >
            <path
              d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V0C26.9,8.75,57.05,18.3,84.77,24.77,159.27,42.15,241.67,69.75,321.39,56.44Z"
            ></path>
          </svg>
        </div>
      </section>
    </main>
  </body>
</html>
<!-- LOGOS -->
<section
  class="py-16 bg-corporate-lightBg border-y border-corporate-primary/5 relative overflow-hidden"
>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div
      class="fade-in-element flex flex-col items-center"
      data-direction="up"
      style="--delay: 0ms"
    >
      <div class="text-center mb-10">
        <span
          class="text-corporate-textMuted text-xs font-bold font-sans uppercase tracking-widest"
        >
          Trusted by Leading Organizations Worldwide
        </span>
      </div>
      <div
        class="flex flex-wrap items-center justify-center gap-10 md:gap-20 w-full"
      >
        <div
          class="flex items-center gap-2 opacity-50 hover:opacity-90 grayscale hover:grayscale-0 transition-all duration-300 cursor-pointer"
        >
          <span class="text-2xl">🌐</span
          ><span
            class="font-display font-extrabold text-corporate-navy text-lg tracking-tight"
            >Google</span
          >
        </div>
        <div
          class="flex items-center gap-2 opacity-50 hover:opacity-90 grayscale hover:grayscale-0 transition-all duration-300 cursor-pointer"
        >
          <span class="text-2xl">💻</span
          ><span
            class="font-display font-extrabold text-corporate-navy text-lg tracking-tight"
            >Microsoft</span
          >
        </div>
        <div
          class="flex items-center gap-2 opacity-50 hover:opacity-90 grayscale hover:grayscale-0 transition-all duration-300 cursor-pointer"
        >
          <span class="text-2xl">📦</span
          ><span
            class="font-display font-extrabold text-corporate-navy text-lg tracking-tight"
            >Amazon</span
          >
        </div>
        <div
          class="flex items-center gap-2 opacity-50 hover:opacity-90 grayscale hover:grayscale-0 transition-all duration-300 cursor-pointer"
        >
          <span class="text-2xl">💳</span
          ><span
            class="font-display font-extrabold text-corporate-navy text-lg tracking-tight"
            >Stripe</span
          >
        </div>
        <div
          class="flex items-center gap-2 opacity-50 hover:opacity-90 grayscale hover:grayscale-0 transition-all duration-300 cursor-pointer"
        >
          <span class="text-2xl">💬</span
          ><span
            class="font-display font-extrabold text-corporate-navy text-lg tracking-tight"
            >Slack</span
          >
        </div>
        <div
          class="flex items-center gap-2 opacity-50 hover:opacity-90 grayscale hover:grayscale-0 transition-all duration-300 cursor-pointer"
        >
          <span class="text-2xl">🏠</span
          ><span
            class="font-display font-extrabold text-corporate-navy text-lg tracking-tight"
            >Airbnb</span
          >
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ABOUT -->
<?php if ($about): ?>
<section id="about" class="py-28 bg-white relative overflow-hidden">
  <div class="absolute top-0 right-0 w-96 h-96 bg-corporate-accent/5 rounded-full filter blur-3xl pointer-events-none"></div>
  <div class="absolute bottom-0 left-0 w-96 h-96 bg-corporate-emerald/5 rounded-full filter blur-3xl pointer-events-none"></div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="grid <?= !empty($about['image_filename']) ? 'lg:grid-cols-2' : 'lg:grid-cols-1 max-w-3xl mx-auto' ?> gap-16 items-center">

      <!-- Text Column -->
      <div class="fade-in-element" data-direction="right" style="--delay: 0ms">
        <?php if (!empty($about['subtitle'])): ?>
        <span class="inline-block bg-corporate-accent/15 border border-corporate-accent/30 text-corporate-accent px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest font-sans mb-4">
          <?= htmlspecialchars($about['subtitle']) ?>
        </span>
        <?php endif; ?>

        <h2 class="text-3xl md:text-4xl font-display font-extrabold text-corporate-navy tracking-tight leading-tight mb-6">
          <?= htmlspecialchars($about['title']) ?>
        </h2>

        <p class="text-corporate-textMuted text-lg leading-relaxed mb-8">
          <?= nl2br(htmlspecialchars($about['description'])) ?>
        </p>

        <!-- Bullet Points -->
        <?php
          $bullets = array_filter([
            $about['bullet_1'] ?? '',
            $about['bullet_2'] ?? '',
            $about['bullet_3'] ?? '',
          ]);
        ?>
        <?php if (!empty($bullets)): ?>
        <div class="space-y-4">
          <?php foreach ($bullets as $bullet): ?>
          <div class="flex gap-4 items-start">
            <div class="w-6 h-6 rounded-full bg-corporate-emerald/10 flex items-center justify-center text-corporate-emerald flex-shrink-0 mt-0.5">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                <path d="M20 6L9 17l-5-5" />
              </svg>
            </div>
            <div>
              <h4 class="font-display font-bold text-corporate-navy text-base"><?= htmlspecialchars($bullet) ?></h4>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>

      <!-- Image Column (hanya tampil jika ada gambar) -->
      <?php if (!empty($about['image_filename'])): ?>
      <div class="relative flex justify-center lg:justify-end py-10 lg:py-0">
        <div class="fade-in-element relative w-full max-w-[480px]" data-direction="left" style="--delay: 200ms">
          <!-- Dekoratif -->
          <div class="absolute -top-6 -left-6 w-32 h-32 dot-pattern-cyan opacity-30 z-0 pointer-events-none"></div>
          <div class="absolute -bottom-6 -right-6 w-40 h-40 bg-corporate-emerald/5 rounded-full filter blur-xl z-0 pointer-events-none"></div>

          <!-- Gambar Utama -->
          <div class="relative z-10 rounded-[32px] overflow-hidden shadow-2xl border-4 border-white aspect-[4/3]">
            <img
              src="./uploads/<?= htmlspecialchars($about['image_filename']) ?>"
              alt="About <?= htmlspecialchars($about['subtitle'] ?? 'Us') ?>"
              class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
            />
          </div>

          <!-- Badge "10+ Years" -->
          <div class="absolute bottom-6 left-6 z-20 bg-corporate-emerald text-white px-5 py-3 rounded-2xl font-display font-extrabold text-sm shadow-lg shadow-corporate-emerald/30 flex items-center gap-3">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" class="text-white flex-shrink-0">
              <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
            </svg>
            <div>
              <div class="leading-none text-base">10+ Years</div>
              <div class="text-[10px] text-white/80 font-normal mt-0.5 font-sans">Corporate Excellence</div>
            </div>
          </div>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>
</section>
<?php endif; ?>


<!-- STATS -->
<section class="py-28 bg-corporate-navy text-white relative overflow-hidden">
  <div
    class="absolute inset-0 dot-grid-bg opacity-10 pointer-events-none"
  ></div>
  <div
    class="absolute top-1/2 -left-32 w-96 h-96 bg-corporate-accent/10 rounded-full filter blur-3xl pointer-events-none"
  ></div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="grid lg:grid-cols-2 gap-16 items-center">
      <div class="fade-in-element" data-direction="right" style="--delay: 0ms">
        <span
          class="inline-block bg-white/10 border border-white/20 text-corporate-highlight px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest font-sans mb-4"
        >
          // Focus & Excellence
        </span>
        <h2
          class="text-3xl md:text-4xl font-display font-extrabold text-white tracking-tight leading-tight mb-6"
        >
          Driving Growth through
          <span class="text-corporate-highlight">Strategic Solutions</span>
        </h2>
        <p class="text-white/70 text-lg leading-relaxed mb-10">
          We focus on areas that yield the highest impact for your business. Our
          structured consulting methodologies ensure high-performance execution.
        </p>
        <div class="grid grid-cols-2 gap-8">
          <div class="border-l-4 border-corporate-highlight pl-4">
            <div class="text-4xl font-display font-extrabold text-white">
              99%
            </div>
            <div class="text-white/60 text-sm mt-1">Client Satisfaction</div>
          </div>
          <div class="border-l-4 border-corporate-accent pl-4">
            <div class="text-4xl font-display font-extrabold text-white">
              2.5x
            </div>
            <div class="text-white/60 text-sm mt-1">
              Average Business Growth
            </div>
          </div>
        </div>
      </div>
      <div class="space-y-6">
        <div class="fade-in-element" data-direction="left" style="--delay: 0ms">
          <div
            class="circle-progress-container flex items-center gap-6 p-6 bg-white rounded-2xl border border-corporate-primary/5 shadow-sm transition-all duration-300 hover:shadow-md"
            data-percent="92"
          >
            <div
              class="relative w-[84px] h-[84px] flex-shrink-0 flex items-center justify-center"
            >
              <svg class="w-full h-full transform -rotate-90">
                <circle
                  cx="42"
                  cy="42"
                  r="32"
                  class="stroke-corporate-lightBg"
                  stroke-width="6"
                  fill="transparent"
                />
                <circle
                  cx="42"
                  cy="42"
                  r="32"
                  stroke="#134074"
                  stroke-width="6"
                  fill="transparent"
                  stroke-dasharray="201.06"
                  stroke-dashoffset="201.06"
                  style="transition: stroke-dashoffset 1.2s ease-out"
                  class="progress-path"
                  stroke-linecap="round"
                />
              </svg>
              <span
                class="absolute font-display font-extrabold text-corporate-navy text-lg"
                >92%</span
              >
            </div>
            <div>
              <h4
                class="font-display font-bold text-corporate-navy text-lg mb-1"
              >
                Business Consulting
              </h4>
              <p class="text-corporate-textMuted text-sm">
                Empowering enterprises with specialized advice.
              </p>
            </div>
          </div>
        </div>
        <div
          class="fade-in-element"
          data-direction="left"
          style="--delay: 150ms"
        >
          <div
            class="circle-progress-container flex items-center gap-6 p-6 bg-white rounded-2xl border border-corporate-primary/5 shadow-sm transition-all duration-300 hover:shadow-md"
            data-percent="87"
          >
            <div
              class="relative w-[84px] h-[84px] flex-shrink-0 flex items-center justify-center"
            >
              <svg class="w-full h-full transform -rotate-90">
                <circle
                  cx="42"
                  cy="42"
                  r="32"
                  class="stroke-corporate-lightBg"
                  stroke-width="6"
                  fill="transparent"
                />
                <circle
                  cx="42"
                  cy="42"
                  r="32"
                  stroke="#10b981"
                  stroke-width="6"
                  fill="transparent"
                  stroke-dasharray="201.06"
                  stroke-dashoffset="201.06"
                  style="transition: stroke-dashoffset 1.2s ease-out"
                  class="progress-path"
                  stroke-linecap="round"
                />
              </svg>
              <span
                class="absolute font-display font-extrabold text-corporate-navy text-lg"
                >87%</span
              >
            </div>
            <div>
              <h4
                class="font-display font-bold text-corporate-navy text-lg mb-1"
              >
                Market Research
              </h4>
              <p class="text-corporate-textMuted text-sm">
                Empowering enterprises with specialized advice.
              </p>
            </div>
          </div>
        </div>
        <div
          class="fade-in-element"
          data-direction="left"
          style="--delay: 300ms"
        >
          <div
            class="circle-progress-container flex items-center gap-6 p-6 bg-white rounded-2xl border border-corporate-primary/5 shadow-sm transition-all duration-300 hover:shadow-md"
            data-percent="95"
          >
            <div
              class="relative w-[84px] h-[84px] flex-shrink-0 flex items-center justify-center"
            >
              <svg class="w-full h-full transform -rotate-90">
                <circle
                  cx="42"
                  cy="42"
                  r="32"
                  class="stroke-corporate-lightBg"
                  stroke-width="6"
                  fill="transparent"
                />
                <circle
                  cx="42"
                  cy="42"
                  r="32"
                  stroke="#00b4d8"
                  stroke-width="6"
                  fill="transparent"
                  stroke-dasharray="201.06"
                  stroke-dashoffset="201.06"
                  style="transition: stroke-dashoffset 1.2s ease-out"
                  class="progress-path"
                  stroke-linecap="round"
                />
              </svg>
              <span
                class="absolute font-display font-extrabold text-corporate-navy text-lg"
                >95%</span
              >
            </div>
            <div>
              <h4
                class="font-display font-bold text-corporate-navy text-lg mb-1"
              >
                Financial Advisory
              </h4>
              <p class="text-corporate-textMuted text-sm">
                Empowering enterprises with specialized advice.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- VISION/MISSION -->
<section class="py-28 bg-white relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="grid lg:grid-cols-2 gap-16 items-center">
      <div
        class="relative flex justify-center lg:justify-start order-2 lg:order-1"
      >
        <div
          class="fade-in-element relative w-full max-w-[480px] aspect-[4/3]"
          data-direction="right"
          style="--delay: 200ms"
        >
          <div
            class="absolute -top-6 -left-6 w-32 h-32 dot-pattern-cyan opacity-40 z-0"
          ></div>
          <div
            class="absolute -bottom-6 -right-6 w-40 h-40 bg-corporate-accent/5 rounded-full filter blur-xl z-0"
          ></div>
          <div
            class="w-full h-full rounded-[40px] overflow-hidden shadow-2xl border-4 border-white z-10 relative"
          >
            <img
              src="./consulting_discussion.png"
              alt="Business planning"
              class="w-full h-full object-cover"
            />
            <div
              class="absolute -bottom-10 -left-10 w-44 h-44 rounded-full bg-gradient-to-tr from-corporate-accent/40 to-corporate-highlight/20 backdrop-blur-sm border border-white/20 mix-blend-overlay z-20 pointer-events-none"
            ></div>
          </div>
          <div
            class="absolute top-10 -right-6 bg-white p-5 rounded-2xl shadow-xl z-20 border border-corporate-primary/5 max-w-[200px] flex items-center gap-3"
          >
            <div
              class="w-10 h-10 rounded-full bg-corporate-emerald/10 flex items-center justify-center text-corporate-emerald"
            >
              <svg
                width="20"
                height="20"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2.5"
              >
                <path
                  d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"
                />
              </svg>
            </div>
            <div>
              <div
                class="font-display font-extrabold text-corporate-navy leading-none"
              >
                99.8%
              </div>
              <div class="text-[10px] text-corporate-textMuted mt-1">
                Accuracy Rate
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="order-1 lg:order-2">
        <div class="fade-in-element" data-direction="left" style="--delay: 0ms">
          <span
            class="inline-block bg-corporate-accent/15 border border-corporate-accent/30 text-corporate-accent px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest font-sans mb-4"
            >Our Philosophy</span
          >
          <h2
            class="text-3xl md:text-4xl font-display font-extrabold text-corporate-navy tracking-tight leading-tight mb-6"
          >
            Creating a Strong
            <span class="gradient-text-blue font-black">Vision & Mission</span>
            for Every Partnership
          </h2>
          <p class="text-corporate-textMuted text-lg leading-relaxed mb-8">
            We believe that clear goals and strong organizational values form
            the bedrock of corporate success. We help companies define their
            trajectory.
          </p>
          <div class="space-y-6">
            <div
              class="flex gap-5 p-5 rounded-2xl bg-corporate-lightBg/50 hover:bg-corporate-lightBg border border-corporate-primary/5 transition-all duration-300 group"
            >
              <div
                class="w-12 h-12 rounded-xl bg-white flex items-center justify-center flex-shrink-0 shadow-sm border border-corporate-primary/5 group-hover:scale-110 transition-transform duration-300"
              >
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="text-corporate-primary"
                >
                  <circle cx="12" cy="12" r="10" />
                  <circle cx="12" cy="12" r="6" />
                  <circle cx="12" cy="12" r="2" />
                </svg>
              </div>
              <div>
                <h4
                  class="font-display font-bold text-corporate-navy text-lg mb-1"
                >
                  Our Vision
                </h4>
                <p class="text-corporate-textMuted text-sm leading-relaxed">
                  To be the global catalyst for enterprise transformation, known
                  for integrity, high impact, and sustainable business modeling.
                </p>
              </div>
            </div>
            <div
              class="flex gap-5 p-5 rounded-2xl bg-corporate-lightBg/50 hover:bg-corporate-lightBg border border-corporate-primary/5 transition-all duration-300 group"
            >
              <div
                class="w-12 h-12 rounded-xl bg-white flex items-center justify-center flex-shrink-0 shadow-sm border border-corporate-primary/5 group-hover:scale-110 transition-transform duration-300"
              >
                <svg
                  width="24"
                  height="24"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  class="text-corporate-accent"
                >
                  <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z" />
                </svg>
              </div>
              <div>
                <h4
                  class="font-display font-bold text-corporate-navy text-lg mb-1"
                >
                  Our Mission
                </h4>
                <p class="text-corporate-textMuted text-sm leading-relaxed">
                  To deliver tailored consulting, analytical insights, and
                  operational advisory that enable corporations to innovate
                  confidently and scale efficiently.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- SERVICES -->
<section
  id="services"
  class="py-28 bg-corporate-lightBg relative overflow-hidden"
>
  <div
    class="absolute inset-0 grid-lines-bg opacity-30 pointer-events-none"
  ></div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div
      class="fade-in-element mb-16 text-center"
      data-direction="up"
      style="--delay: 0ms"
    >
      <span
        class="inline-block bg-corporate-accent/15 border border-corporate-accent/30 text-corporate-accent px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest font-sans mb-4"
        >Our Solutions</span
      >
      <h2
        class="text-3xl md:text-4xl font-display font-extrabold text-corporate-navy tracking-tight leading-tight mt-2"
      >
        Tailored Solutions for Your
        <span class="gradient-text-blue font-black">Business Growth</span>
      </h2>
      <p
        class="mt-4 text-corporate-textMuted text-lg max-w-3xl leading-relaxed mx-auto"
      >
        We deliver end-to-end consulting services backed by deep industry
        intelligence — protecting and growing your corporate assets.
      </p>
    </div>
    <div class="stagger-container grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <div
        class="stagger-child corp-card p-8 bg-white flex flex-col justify-between group cursor-pointer relative overflow-hidden"
      >
        <div
          class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-corporate-primary to-corporate-accent scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-300"
        ></div>
        <div>
          <div
            class="w-12 h-12 rounded-xl bg-corporate-lightBg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300"
          >
            <svg
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              class="text-corporate-primary"
            >
              <line x1="12" y1="1" x2="12" y2="23" />
              <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
            </svg>
          </div>
          <h3
            class="font-display font-extrabold text-xl text-corporate-navy mb-3 group-hover:text-corporate-accent transition-colors duration-200"
          >
            Financial Planning
          </h3>
          <p class="text-corporate-textMuted text-sm leading-relaxed mb-6">
            Structured forecasting, capital allocation planning, and cash flow
            optimizations for sustainable profit scaling.
          </p>
        </div>
        <div>
          <div class="flex flex-wrap gap-2 mb-6">
            <span
              class="bg-corporate-lightBg text-[10px] text-corporate-navy/80 px-2.5 py-1 rounded-md font-sans font-semibold tracking-wider uppercase"
              >Forecasting</span
            >
            <span
              class="bg-corporate-lightBg text-[10px] text-corporate-navy/80 px-2.5 py-1 rounded-md font-sans font-semibold tracking-wider uppercase"
              >Capital Alloc.</span
            >
            <span
              class="bg-corporate-lightBg text-[10px] text-corporate-navy/80 px-2.5 py-1 rounded-md font-sans font-semibold tracking-wider uppercase"
              >Tax Opt.</span
            >
          </div>
          <div
            class="flex items-center gap-2 text-corporate-primary group-hover:text-corporate-accent transition-colors duration-200 text-sm font-bold"
          >
            <span>Learn more</span
            ><svg
              width="14"
              height="14"
              viewBox="0 0 14 14"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              class="transform group-hover:translate-x-1 transition-transform"
            >
              <path d="M3 7H11M7 3L11 7L7 11" />
            </svg>
          </div>
        </div>
      </div>
      <div
        class="stagger-child corp-card p-8 bg-white flex flex-col justify-between group cursor-pointer relative overflow-hidden"
      >
        <div
          class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-corporate-primary to-corporate-accent scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-300"
        ></div>
        <div>
          <div
            class="w-12 h-12 rounded-xl bg-corporate-lightBg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300"
          >
            <svg
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              class="text-corporate-accent"
            >
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
            </svg>
          </div>
          <h3
            class="font-display font-extrabold text-xl text-corporate-navy mb-3 group-hover:text-corporate-accent transition-colors duration-200"
          >
            Risk Management
          </h3>
          <p class="text-corporate-textMuted text-sm leading-relaxed mb-6">
            Comprehensive enterprise threat assessments, mitigation workflows,
            regulatory audits, and crisis playbook design.
          </p>
        </div>
        <div>
          <div class="flex flex-wrap gap-2 mb-6">
            <span
              class="bg-corporate-lightBg text-[10px] text-corporate-navy/80 px-2.5 py-1 rounded-md font-sans font-semibold tracking-wider uppercase"
              >Audits</span
            >
            <span
              class="bg-corporate-lightBg text-[10px] text-corporate-navy/80 px-2.5 py-1 rounded-md font-sans font-semibold tracking-wider uppercase"
              >Threat Assess.</span
            >
          </div>
          <div
            class="flex items-center gap-2 text-corporate-primary group-hover:text-corporate-accent transition-colors duration-200 text-sm font-bold"
          >
            <span>Learn more</span
            ><svg
              width="14"
              height="14"
              viewBox="0 0 14 14"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              class="transform group-hover:translate-x-1 transition-transform"
            >
              <path d="M3 7H11M7 3L11 7L7 11" />
            </svg>
          </div>
        </div>
      </div>
      <!-- Omitted remaining services items to save space, but added the container -->
    </div>
  </div>
</section>

<!-- BENEFITS -->
<section class="py-28 bg-white relative overflow-hidden">
  <div
    class="absolute top-0 left-0 w-96 h-96 bg-corporate-accent/5 rounded-full filter blur-3xl pointer-events-none"
  ></div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div
      class="fade-in-element mb-16 text-center"
      data-direction="up"
      style="--delay: 0ms"
    >
      <span
        class="inline-block bg-corporate-accent/15 border border-corporate-accent/30 text-corporate-accent px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest font-sans mb-4"
        >Benefits</span
      >
      <h2
        class="text-3xl md:text-4xl font-display font-extrabold text-corporate-navy tracking-tight leading-tight mt-2"
      >
        The Advantage of Partnering with
        <span class="gradient-text-blue font-black">Nexis Group</span>
      </h2>
    </div>
    <div
      class="stagger-container grid sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-20"
    >
      <div
        class="stagger-child corp-card p-8 bg-white flex flex-col items-center text-center group"
      >
        <div
          class="w-14 h-14 rounded-2xl bg-corporate-lightBg border border-corporate-primary/5 flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform duration-300"
        >
          <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            class="text-corporate-primary"
          >
            <line x1="18" y1="20" x2="18" y2="10" />
            <line x1="12" y1="20" x2="12" y2="4" />
            <line x1="6" y1="20" x2="6" y2="14" />
          </svg>
        </div>
        <h3
          class="font-display font-bold text-lg text-corporate-navy mb-2 group-hover:text-corporate-accent transition-colors duration-200"
        >
          Advanced Analytics
        </h3>
        <p class="text-corporate-textMuted text-sm leading-relaxed">
          We transform raw organizational data into clear projections and
          strategic pathways.
        </p>
      </div>
      <div
        class="stagger-child corp-card p-8 bg-white flex flex-col items-center text-center group"
      >
        <div
          class="w-14 h-14 rounded-2xl bg-corporate-lightBg border border-corporate-primary/5 flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform duration-300"
        >
          <svg
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            class="text-corporate-accent"
          >
            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
          </svg>
        </div>
        <h3
          class="font-display font-bold text-lg text-corporate-navy mb-2 group-hover:text-corporate-accent transition-colors duration-200"
        >
          Efficient Workflows
        </h3>
        <p class="text-corporate-textMuted text-sm leading-relaxed">
          We optimize operating models to shave off administrative overhead and
          delay.
        </p>
      </div>
      <div class="stagger-child corp-card p-8 bg-white flex flex-col items-center text-center group">
        <div class="w-14 h-14 rounded-2xl bg-corporate-lightBg border border-corporate-primary/5 flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform duration-300">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-corporate-accent"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3 class="font-display font-bold text-lg text-corporate-navy mb-2 group-hover:text-corporate-accent transition-colors duration-200">
          Risk Mitigation
        </h3>
        <p class="text-corporate-textMuted text-sm leading-relaxed">
          We identify and neutralize operational risks before they can impact your bottom line.
        </p>
      </div>
      <div class="stagger-child corp-card p-8 bg-white flex flex-col items-center text-center group">
        <div class="w-14 h-14 rounded-2xl bg-corporate-lightBg border border-corporate-primary/5 flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform duration-300">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-corporate-accent"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
        </div>
        <h3 class="font-display font-bold text-lg text-corporate-navy mb-2 group-hover:text-corporate-accent transition-colors duration-200">
          Global Expansion
        </h3>
        <p class="text-corporate-textMuted text-sm leading-relaxed">
          Our international intelligence helps scale your enterprise across global markets effortlessly.
        </p>
      </div>
    </div>
    <div class="fade-in-element" data-direction="up" style="--delay: 100ms">
      <div
        class="bg-gradient-to-r from-corporate-navy to-corporate-primary rounded-3xl p-10 lg:p-16 text-white shadow-xl relative overflow-hidden"
      >
        <div
          class="absolute inset-0 dot-grid-bg opacity-10 pointer-events-none"
        ></div>
        <div
          class="grid grid-cols-2 lg:grid-cols-4 gap-8 relative z-10 text-center"
        >
          <div class="flex flex-col items-center">
            <span
              class="text-4xl md:text-5xl font-display font-black text-corporate-highlight mb-2"
              >10+</span
            ><span
              class="text-white/70 font-sans text-xs uppercase tracking-widest font-semibold"
              >Years Experience</span
            >
          </div>
          <div class="flex flex-col items-center">
            <span
              class="text-4xl md:text-5xl font-display font-black text-corporate-highlight mb-2"
              >250+</span
            ><span
              class="text-white/70 font-sans text-xs uppercase tracking-widest font-semibold"
              >Global Clients</span
            >
          </div>
          <div class="flex flex-col items-center">
            <span
              class="text-4xl md:text-5xl font-display font-black text-corporate-highlight mb-2"
              >15+</span
            ><span
              class="text-white/70 font-sans text-xs uppercase tracking-widest font-semibold"
              >Industry Awards</span
            >
          </div>
          <div class="flex flex-col items-center">
            <span
              class="text-4xl md:text-5xl font-display font-black text-corporate-highlight mb-2"
              >99%</span
            ><span
              class="text-white/70 font-sans text-xs uppercase tracking-widest font-semibold"
              >Satisfaction Rate</span
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- PROMOBANNER -->
<section
  class="relative py-32 md:py-48 flex items-center justify-center overflow-hidden"
>
  <div class="absolute inset-0">
    <img
      src="./corporate_meeting.png"
      alt="Corporate board meeting"
      class="w-full h-full object-cover object-center"
    />
    <div
      class="absolute inset-0 bg-gradient-to-r from-corporate-navy/95 via-corporate-navy/80 to-corporate-primary/95 mix-blend-multiply"
    ></div>
  </div>
  <div
    class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-corporate-accent via-corporate-highlight to-corporate-accent opacity-30"
  ></div>
  <div
    class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center text-white"
  >
    <div
      class="fade-in-element flex justify-center mb-8"
      data-direction="up"
      style="--delay: 0ms"
    >
      <button
        class="relative w-20 h-20 rounded-full bg-corporate-emerald text-white flex items-center justify-center shadow-lg shadow-corporate-emerald/30 group hover:scale-110 transition-transform duration-300 focus:outline-none"
        aria-label="Play video"
      >
        <span
          class="absolute -inset-2 rounded-full border border-corporate-emerald/30 animate-ping pointer-events-none"
        ></span>
        <span
          class="absolute -inset-4 rounded-full border border-corporate-emerald/10 animate-ping pointer-events-none"
          style="animation-delay: 0.4s"
        ></span>
        <svg
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="currentColor"
          class="ml-1 text-white"
        >
          <polygon points="5 3 19 12 5 21 5 3" />
        </svg>
      </button>
    </div>
    <div class="fade-in-element" data-direction="up" style="--delay: 150ms">
      <h2
        class="text-3xl md:text-5xl font-display font-extrabold text-white leading-tight mb-6"
      >
        Leading Businesses to Greater
        <span class="text-corporate-highlight">Success & Stability</span>
      </h2>
    </div>
  </div>
</section>
    <!-- TESTIMONIALS -->
    <section id="testimonials" class="py-28 bg-corporate-lightBg relative overflow-hidden">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="mb-16 text-center" data-direction="up" style="--delay: 0ms">
          <span class="inline-block bg-corporate-accent/15 border border-corporate-accent/30 text-corporate-accent px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest font-sans mb-4">Client Feedback</span>
          <h2 class="text-3xl md:text-4xl font-display font-extrabold text-corporate-navy tracking-tight leading-tight mt-2">
            Trusted by the <span class="gradient-text-blue font-black">Best in Business</span>
          </h2>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
          <?php foreach($testimonials as $testi): ?>
          <div class="corp-card p-8 bg-white border border-corporate-primary/5 shadow-sm transform transition duration-300 hover:-translate-y-1 hover:shadow-md">
            <div class="flex gap-1 text-corporate-highlight mb-6">
              <?php for($i=0; $i<$testi['rating']; $i++): ?><svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><?php endfor; ?>
            </div>
            <p class="text-corporate-textDark text-lg font-medium leading-relaxed italic mb-8">"<?= htmlspecialchars($testi['quote']) ?>"</p>
            <div class="flex items-center gap-4">
              <?php if(!empty($testi['avatar_image'])): ?>
                <img src="uploads/<?= htmlspecialchars($testi['avatar_image']) ?>" alt="Avatar" class="w-12 h-12 rounded-full object-cover shadow-md border-2 border-corporate-emerald/20" />
              <?php else: ?>
                <div class="w-12 h-12 rounded-full bg-corporate-emerald text-white flex items-center justify-center font-display font-bold shadow-md shadow-corporate-emerald/20">
                  <?= htmlspecialchars($testi['avatar_initials'] ?: substr($testi['client_name'],0,2)) ?>
                </div>
              <?php endif; ?>
              <div>
                <h4 class="font-display font-bold text-corporate-navy"><?= htmlspecialchars($testi['client_name']) ?></h4>
                <p class="text-corporate-textMuted text-xs font-semibold uppercase tracking-wider"><?= htmlspecialchars($testi['client_role']) ?></p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- PRICING -->
    <section id="pricing" class="py-28 bg-white relative overflow-hidden">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="mb-16 text-center">
          <span class="inline-block bg-corporate-accent/15 border border-corporate-accent/30 text-corporate-accent px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest font-sans mb-4">Investment</span>
          <h2 class="text-3xl md:text-4xl font-display font-extrabold text-corporate-navy tracking-tight leading-tight mt-2">
            Transparent Scaling <span class="gradient-text-blue font-black">Packages</span>
          </h2>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-10 max-w-4xl mx-auto">
          <?php foreach($pricing_plans as $plan): 
            $features = is_string($plan['features']) ? json_decode($plan['features'], true) : $plan['features'];
          ?>
          <div class="relative bg-white border <?= $plan['is_popular'] ? 'border-corporate-accent shadow-xl shadow-corporate-accent/10 transform scale-105' : 'border-corporate-primary/10 shadow-sm' ?> rounded-3xl p-8 flex flex-col">
            <?php if($plan['is_popular']): ?>
            <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-corporate-accent text-white px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest shadow-md">Most Popular</div>
            <?php endif; ?>
            <h3 class="font-display font-extrabold text-2xl text-corporate-navy mb-2"><?= htmlspecialchars($plan['plan_name']) ?></h3>
            <p class="text-corporate-textMuted text-sm mb-6"><?= htmlspecialchars($plan['description']) ?></p>
            <div class="flex items-baseline gap-2 mb-8 border-b border-corporate-primary/5 pb-8">
              <span class="text-4xl font-display font-black text-corporate-navy">$<?= number_format($plan['price']) ?></span>
              <span class="text-corporate-textMuted font-medium"><?= htmlspecialchars($plan['billing_period']) ?></span>
            </div>
            <ul class="space-y-4 mb-10 flex-grow">
              <?php if($features) foreach($features as $f): ?>
              <li class="flex items-start gap-3">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="text-corporate-emerald flex-shrink-0"><path stroke="currentColor" stroke-width="2.5" d="M20 6L9 17l-5-5"/></svg>
                <span class="text-corporate-textDark text-sm font-medium"><?= htmlspecialchars($f) ?></span>
              </li>
              <?php endforeach; ?>
            </ul>
            <a href="#contact" class="w-full py-4 text-center <?= $plan['is_popular'] ? 'bg-corporate-emerald text-white hover:bg-corporate-emerald/90' : 'bg-corporate-lightBg text-corporate-navy hover:bg-corporate-primary hover:text-white' ?> rounded-xl font-sans font-bold text-sm transition-all duration-300">
              Select Package
            </a>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="py-28 bg-white relative overflow-hidden">
      <div class="absolute top-0 right-0 w-96 h-96 bg-corporate-accent/5 rounded-full filter blur-3xl pointer-events-none"></div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16">
          <div class="fade-in-element" data-direction="right" style="--delay: 0ms">
            <span class="inline-block bg-corporate-accent/15 border border-corporate-accent/30 text-corporate-accent px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest font-sans mb-4">Get In Touch</span>
            <h2 class="text-3xl md:text-4xl font-display font-extrabold text-corporate-navy tracking-tight leading-tight mb-6">
              Ready to Accelerate Your <span class="gradient-text-blue font-black">Business Scale?</span>
            </h2>
            <div class="space-y-8">
              <div class="flex gap-4">
                <div class="w-12 h-12 rounded-xl bg-corporate-lightBg border border-corporate-primary/5 flex items-center justify-center text-corporate-primary flex-shrink-0">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" /></svg>
                </div>
                <div>
                  <h4 class="font-display font-bold text-corporate-navy text-sm">Call Us Directly</h4>
                  <p class="text-corporate-textMuted text-sm mt-0.5">+1 (234) 567-890</p>
                </div>
              </div>
            </div>
          </div>
          <div class="fade-in-element p-8 md:p-10 bg-corporate-lightBg rounded-3xl border border-corporate-primary/5 shadow-sm" data-direction="left" style="--delay: 200ms">
            <form id="contact-form" class="space-y-6">
              <div class="grid sm:grid-cols-2 gap-6">
                <div>
                  <label class="block text-xs font-bold uppercase tracking-widest text-corporate-navy mb-2">First Name</label>
                  <input type="text" required placeholder="John" class="w-full px-4 py-3 bg-white border border-corporate-primary/10 rounded-xl focus:outline-none focus:border-corporate-accent text-corporate-navy text-sm" />
                </div>
                <div>
                  <label class="block text-xs font-bold uppercase tracking-widest text-corporate-navy mb-2">Last Name</label>
                  <input type="text" required placeholder="Doe" class="w-full px-4 py-3 bg-white border border-corporate-primary/10 rounded-xl focus:outline-none focus:border-corporate-accent text-corporate-navy text-sm" />
                </div>
              </div>
              <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-corporate-navy mb-2">Email Address</label>
                <input type="email" required placeholder="john@example.com" class="w-full px-4 py-3 bg-white border border-corporate-primary/10 rounded-xl focus:outline-none focus:border-corporate-accent text-corporate-navy text-sm" />
              </div>
              <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-corporate-navy mb-2">Inquiry Message</label>
                <textarea rows="4" required placeholder="Describe your corporate objectives..." class="w-full px-4 py-3 bg-white border border-corporate-primary/10 rounded-xl focus:outline-none focus:border-corporate-accent text-corporate-navy text-sm resize-none"></textarea>
              </div>
              <button type="submit" class="w-full py-4 bg-corporate-emerald hover:bg-corporate-emerald/90 text-white rounded-xl font-sans font-bold text-sm shadow-md shadow-corporate-emerald/10 hover:shadow-lg transition-all duration-300">
                Send Message
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>
    
    </main>

    <!-- FOOTER -->
    <footer class="bg-corporate-navy text-white/90 pt-20 pb-10 border-t border-white/5 relative overflow-hidden">
      <div class="absolute bottom-0 right-0 w-96 h-96 bg-corporate-accent/5 rounded-full filter blur-3xl pointer-events-none"></div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-12 mb-16">
          <div class="col-span-2 md:col-span-1">
            <a href="#home" class="flex items-center gap-2 group mb-6">
              <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-corporate-navy via-corporate-primary to-corporate-accent flex items-center justify-center text-white font-display font-extrabold text-xl shadow-md">
                N
              </div>
              <span class="font-display font-extrabold text-xl tracking-tight text-white">
                Nexis<span class="text-corporate-accent">Group</span>
              </span>
            </a>
            <p class="text-white/60 text-sm leading-relaxed mb-6">
              Empowering enterprise strategy, capital allocations, GRC compliance, and high-performance talent acquisition worldwide.
            </p>
          </div>
          <div>
            <h4 class="font-display font-extrabold text-white text-base mb-6 uppercase tracking-wider">Quick Links</h4>
            <ul class="space-y-3">
              <li><a href="#home" class="text-white/60 hover:text-corporate-accent text-sm transition-colors duration-200">Home</a></li>
              <li><a href="#about" class="text-white/60 hover:text-corporate-accent text-sm transition-colors duration-200">About Us</a></li>
              <li><a href="#services" class="text-white/60 hover:text-corporate-accent text-sm transition-colors duration-200">Our Solutions</a></li>
            </ul>
          </div>
          <div>
            <h4 class="font-display font-extrabold text-white text-base mb-6 uppercase tracking-wider">Solutions</h4>
            <ul class="space-y-3">
              <li><a href="#services" class="text-white/60 hover:text-corporate-accent text-sm transition-colors duration-200">Financial Planning</a></li>
              <li><a href="#services" class="text-white/60 hover:text-corporate-accent text-sm transition-colors duration-200">Risk Management</a></li>
            </ul>
          </div>
          <div>
            <h4 class="font-display font-extrabold text-white text-base mb-6 uppercase tracking-wider">Contact HQ</h4>
            <p class="text-white/60 text-sm leading-relaxed mb-4">100 Corporate Plaza, Suite 400, New York, NY 10001</p>
            <p class="text-white/60 text-sm mb-2">advisory@nexisconsulting.com</p>
            <p class="text-corporate-highlight font-display font-bold text-base">+1 (234) 567-890</p>
          </div>
        </div>
        <div class="border-t border-white/5 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
          <p class="text-white/40 text-xs text-center md:text-left">&copy; 2026 Nexis Consulting Group. All rights reserved.</p>
        </div>
      </div>
    </footer>

  </body>
</html>
