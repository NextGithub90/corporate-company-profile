import { motion } from 'framer-motion';
import { FadeIn, SectionBadge } from '../components/AnimationHelpers';

export default function Products() {
  return (
    <section className="py-28 bg-white relative overflow-hidden">
      {/* Decorative background grids */}
      <div className="absolute top-0 left-0 w-96 h-96 bg-corporate-primary/5 rounded-full filter blur-3xl pointer-events-none" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="grid lg:grid-cols-2 gap-16 items-center">
          
          {/* Left Column — Circular Overlapping Images (Reversed Layout) */}
          <div className="relative flex justify-center lg:justify-start py-10 lg:py-0 order-2 lg:order-1">
            <FadeIn direction="right" delay={0.2} className="relative w-full max-w-[480px] aspect-[4/3]">
              
              {/* Dot patterns */}
              <div className="absolute top-4 right-4 w-32 h-32 dot-pattern-cyan opacity-40 z-0 animate-pulse" />
              <div className="absolute bottom-4 left-4 w-32 h-32 dot-pattern-green opacity-40 z-0" />

              {/* Main Circular Image A */}
              <div className="absolute top-0 right-0 w-[240px] md:w-[280px] aspect-square rounded-full overflow-hidden border-8 border-white shadow-xl z-10 transition-transform duration-500 hover:scale-105">
                <img
                  src="/corporate_presentation.png"
                  alt="Corporate presentation"
                  className="w-full h-full object-cover"
                />
              </div>

              {/* Overlapping Circular Image B */}
              <div className="absolute bottom-0 left-0 w-[220px] md:w-[260px] aspect-square rounded-full overflow-hidden border-8 border-white shadow-2xl z-20 transition-transform duration-500 hover:scale-105">
                <img
                  src="/corporate_meeting.png"
                  alt="Business discussion"
                  className="w-full h-full object-cover"
                />
              </div>

              {/* Floating Award Label */}
              <div className="absolute bottom-12 right-0 bg-white p-4 rounded-2xl shadow-xl z-30 border border-corporate-primary/5 max-w-[200px] flex items-center gap-3">
                <div className="w-10 h-10 rounded-xl bg-yellow-500/10 flex items-center justify-center text-yellow-600 flex-shrink-0">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" strokeLinecap="round" strokeLinejoin="round">
                    <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6M18 9h1.5a2.5 2.5 0 0 0 0-5H18M4 22h16M10 14.66V17c0 .55-.45 1-1 1H4v2h16v-2h-5c-.55 0-1-.45-1-1v-2.34M12 2a4 4 0 0 0-4 4v7a4 4 0 0 0 8 0V6a4 4 0 0 0-4-4z" />
                  </svg>
                </div>
                <div>
                  <div className="font-display font-extrabold text-corporate-navy text-xs leading-none">Best Advisory</div>
                  <div className="text-[10px] text-corporate-textMuted mt-1 font-sans">Voted Top Consultant</div>
                </div>
              </div>

            </FadeIn>
          </div>

          {/* Right Column — Product/Services Description */}
          <div className="order-1 lg:order-2">
            <FadeIn direction="left">
              <SectionBadge>Specialized Services & Tools</SectionBadge>
              <h2 className="text-3xl md:text-4xl font-display font-extrabold text-corporate-navy tracking-tight leading-tight mb-6">
                All Products & Tools Crafted for <span className="gradient-text-blue font-black">Modern Enterprises</span>
              </h2>
              <p className="text-corporate-textMuted text-lg leading-relaxed mb-6">
                Beyond consulting, we build digital and organizational frameworks that stay with your company. We install internal tools that keep your operations optimized in perpetuity.
              </p>
              
              <div className="space-y-6">
                {[
                  {
                    title: 'Nexis Analytics Dashboard',
                    desc: 'A real-time financial tracking and forecasting dashboard integrated directly with your ERP.'
                  },
                  {
                    title: 'GRC Compliance Sentinel',
                    desc: 'Automated policy checker that tracks changes in global trading and compliance regulations.'
                  },
                  {
                    title: 'Strategic Playbook Vault',
                    desc: 'Custom-designed standard operating procedures and emergency crisis playbooks for your team.'
                  }
                ].map((prod, idx) => (
                  <div key={idx} className="flex gap-4 items-start">
                    <div className="w-2 h-2 rounded-full bg-corporate-accent flex-shrink-0 mt-2" />
                    <div>
                      <h4 className="font-display font-bold text-corporate-navy text-base mb-1">{prod.title}</h4>
                      <p className="text-corporate-textMuted text-sm leading-relaxed">{prod.desc}</p>
                    </div>
                  </div>
                ))}
              </div>
            </FadeIn>
          </div>

        </div>
      </div>
    </section>
  );
}
