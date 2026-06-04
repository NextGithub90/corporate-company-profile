import { motion } from 'framer-motion';
import { FadeIn } from '../components/AnimationHelpers';

export default function Hero() {
  return (
    <section id="home" className="relative min-h-screen flex items-center justify-center overflow-hidden pt-20">
      {/* Background Image with Dark Blue Overlay */}
      <div className="absolute inset-0 z-0">
        <img
          src="/corporate_skyscrapers.png"
          alt="Corporate skyscrapers background"
          className="w-full h-full object-cover object-center"
        />
        {/* Deep blue gradient overlay */}
        <div className="absolute inset-0 bg-gradient-to-r from-corporate-navy via-corporate-navy/90 to-corporate-primary/80 mix-blend-multiply" />
        <div className="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-corporate-lightBg/15" />
      </div>

      {/* Decorative Grid Overlay */}
      <div className="absolute inset-0 z-1 dot-grid-bg opacity-30 pointer-events-none" />

      {/* Hero Content */}
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-32 text-left w-full">
        <div className="max-w-3xl">
          <FadeIn direction="up">
            <span className="inline-block bg-corporate-accent/20 border border-corporate-accent/30 text-corporate-highlight px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest font-sans mb-6">
              // Nexis Consulting Group
            </span>
          </FadeIn>

          <FadeIn direction="up" delay={0.15}>
            <h1 className="text-4xl sm:text-5xl md:text-6xl font-display font-black text-white leading-tight tracking-tight mb-6">
              Empowering Businesses to <span className="text-corporate-highlight">Innovate</span> & <span className="text-corporate-accent">Scale</span>
            </h1>
          </FadeIn>

          <FadeIn direction="up" delay={0.3}>
            <p className="text-lg md:text-xl text-white/80 leading-relaxed font-sans mb-10 max-w-2xl">
              We provide high-impact strategies, financial planning, market research, and HR solutions to help your enterprise reach its maximum potential.
            </p>
          </FadeIn>

          <FadeIn direction="up" delay={0.45}>
            <div className="flex flex-col sm:flex-row items-stretch sm:items-center gap-5">
              <a
                href="#services"
                className="btn-neon font-sans text-center text-sm font-bold bg-corporate-emerald hover:bg-corporate-emerald/90 text-white px-8 py-4 rounded-xl shadow-lg shadow-corporate-emerald/20 transition-all duration-300 hover:-translate-y-0.5"
              >
                Our Solutions
              </a>
              <a
                href="tel:+1234567890"
                className="flex items-center justify-center gap-3 border border-white/20 hover:border-corporate-accent/40 bg-white/5 hover:bg-white/10 text-white font-sans text-sm font-bold px-8 py-4 rounded-xl transition-all duration-300 group hover:-translate-y-0.5"
              >
                <div className="w-8 h-8 rounded-lg bg-corporate-accent/20 flex items-center justify-center text-corporate-accent group-hover:bg-corporate-accent group-hover:text-white transition-colors duration-300">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                  </svg>
                </div>
                <span>+1 (234) 567-890</span>
              </a>
            </div>
          </FadeIn>
        </div>
      </div>

      {/* Bottom curved background decoration */}
      <div className="absolute bottom-0 left-0 w-full overflow-hidden leading-none z-1">
        <svg viewBox="0 0 1200 120" preserveAspectRatio="none" className="relative block w-full h-[60px] fill-current text-corporate-lightBg">
          <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V0C26.9,8.75,57.05,18.3,84.77,24.77,159.27,42.15,241.67,69.75,321.39,56.44Z"></path>
        </svg>
      </div>
    </section>
  );
}
