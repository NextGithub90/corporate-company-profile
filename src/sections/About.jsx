import { motion } from 'framer-motion';
import { FadeIn, SectionBadge } from '../components/AnimationHelpers';

export default function About() {
  return (
    <section id="about" className="py-28 bg-white relative overflow-hidden">
      {/* Decorative gradients */}
      <div className="absolute top-0 right-0 w-96 h-96 bg-corporate-accent/5 rounded-full filter blur-3xl pointer-events-none" />
      <div className="absolute bottom-0 left-0 w-96 h-96 bg-corporate-emerald/5 rounded-full filter blur-3xl pointer-events-none" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="grid lg:grid-cols-2 gap-16 items-center">
          
          {/* Left Column — Text */}
          <div>
            <FadeIn direction="right">
              <SectionBadge>About Our Company</SectionBadge>
              <h2 className="text-3xl md:text-4xl font-display font-extrabold text-corporate-navy tracking-tight leading-tight mb-6">
                We Are Highly committed to <span className="gradient-text-blue font-black">Empowering Your Business</span>
              </h2>
              <p className="text-corporate-textMuted text-lg leading-relaxed mb-6">
                Founded with a vision to redefine corporate consulting, Nexis Consulting Group brings together elite strategists, financial experts, and HR specialists to drive sustainable growth.
              </p>
              <p className="text-corporate-textMuted leading-relaxed mb-8">
                Over the past decade, we have partnered with enterprises globally, translating complex market dynamics into actionable business growth, robust risk frameworks, and high-performing team cultures.
              </p>

              {/* Bullets with icons */}
              <div className="space-y-4">
                {[
                  { title: 'Trusted Professional Advisors', desc: 'Our team comprises experts with deep industrial experience.' },
                  { title: 'Tailored Strategic Solutions', desc: 'No generic playbooks. We design growth strategies unique to you.' },
                  { title: 'Data-Driven Methodologies', desc: 'We back every advisory decision with rigorous market analytics.' }
                ].map((item, idx) => (
                  <div key={idx} className="flex gap-4 items-start">
                    <div className="w-6 h-6 rounded-full bg-corporate-emerald/10 flex items-center justify-center text-corporate-emerald flex-shrink-0 mt-0.5">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="3">
                        <path d="M20 6L9 17l-5-5" />
                      </svg>
                    </div>
                    <div>
                      <h4 className="font-display font-bold text-corporate-navy text-base">{item.title}</h4>
                      <p className="text-corporate-textMuted text-sm mt-0.5">{item.desc}</p>
                    </div>
                  </div>
                ))}
              </div>
            </FadeIn>
          </div>

          {/* Right Column — Circular Overlapping Images & Dot Patterns */}
          <div className="relative flex justify-center lg:justify-end py-10 lg:py-0">
            <FadeIn direction="left" delay={0.2} className="relative w-full max-w-[480px] aspect-[4/3]">
              
              {/* Dot Pattern Background Decoration */}
              <div className="absolute top-4 left-4 w-32 h-32 dot-pattern-green opacity-40 z-0 animate-pulse" />
              <div className="absolute bottom-4 right-4 w-32 h-32 dot-pattern-cyan opacity-40 z-0" />

              {/* Main Circular Image A */}
              <div className="absolute top-0 left-0 w-[240px] md:w-[280px] aspect-square rounded-full overflow-hidden border-8 border-white shadow-xl z-10 transition-transform duration-500 hover:scale-105">
                <img
                  src="/corporate_meeting.png"
                  alt="Business meeting"
                  className="w-full h-full object-cover"
                />
              </div>

              {/* Overlapping Circular Image B */}
              <div className="absolute bottom-0 right-0 w-[220px] md:w-[260px] aspect-square rounded-full overflow-hidden border-8 border-white shadow-2xl z-20 transition-transform duration-500 hover:scale-105">
                <img
                  src="/consulting_discussion.png"
                  alt="Consulting discussion"
                  className="w-full h-full object-cover"
                />
              </div>

              {/* Floating Badge */}
              <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-corporate-emerald text-white px-6 py-3 rounded-2xl font-display font-extrabold text-sm shadow-lg shadow-corporate-emerald/30 z-30 flex items-center gap-3">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" className="text-white flex-shrink-0">
                  <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                </svg>
                <div>
                  <div className="leading-none text-base">10+ Years</div>
                  <div className="text-[10px] text-white/80 font-normal mt-0.5 font-sans">Corporate Excellence</div>
                </div>
              </div>

            </FadeIn>
          </div>

        </div>
      </div>
    </section>
  );
}
