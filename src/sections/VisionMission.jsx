import { motion } from 'framer-motion';
import { FadeIn, SectionBadge } from '../components/AnimationHelpers';

export default function VisionMission() {
  return (
    <section className="py-28 bg-white relative overflow-hidden">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="grid lg:grid-cols-2 gap-16 items-center">
          
          {/* Left Column — Image with Circular Overlay */}
          <div className="relative flex justify-center lg:justify-start order-2 lg:order-1">
            <FadeIn direction="right" delay={0.2} className="relative w-full max-w-[480px] aspect-[4/3]">
              {/* Decorative backgrounds */}
              <div className="absolute -top-6 -left-6 w-32 h-32 dot-pattern-cyan opacity-40 z-0" />
              <div className="absolute -bottom-6 -right-6 w-40 h-40 bg-corporate-accent/5 rounded-full filter blur-xl z-0" />

              {/* Large Image container with circular clipping path / rounded corners */}
              <div className="w-full h-full rounded-[40px] overflow-hidden shadow-2xl border-4 border-white z-10 relative">
                <img
                  src="/consulting_discussion.png"
                  alt="Business planning and discussion"
                  className="w-full h-full object-cover"
                />
                
                {/* Circular Accent Overlay */}
                <div className="absolute -bottom-10 -left-10 w-44 h-44 rounded-full bg-gradient-to-tr from-corporate-accent/40 to-corporate-highlight/20 backdrop-blur-sm border border-white/20 mix-blend-overlay z-20 pointer-events-none" />
              </div>

              {/* Floating Stat card */}
              <div className="absolute top-10 -right-6 bg-white p-5 rounded-2xl shadow-xl z-20 border border-corporate-primary/5 max-w-[200px] flex items-center gap-3">
                <div className="w-10 h-10 rounded-full bg-corporate-emerald/10 flex items-center justify-center text-corporate-emerald">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                  </svg>
                </div>
                <div>
                  <div className="font-display font-extrabold text-corporate-navy leading-none">99.8%</div>
                  <div className="text-[10px] text-corporate-textMuted mt-1">Accuracy Rate</div>
                </div>
              </div>

            </FadeIn>
          </div>

          {/* Right Column — Vision & Mission Statements */}
          <div className="order-1 lg:order-2">
            <FadeIn direction="left">
              <SectionBadge>Our Philosophy</SectionBadge>
              <h2 className="text-3xl md:text-4xl font-display font-extrabold text-corporate-navy tracking-tight leading-tight mb-6">
                Creating a Strong <span className="gradient-text-blue font-black">Vision & Mission</span> for Every Partnership
              </h2>
              <p className="text-corporate-textMuted text-lg leading-relaxed mb-8">
                We believe that clear goals and strong organizational values form the bedrock of corporate success. We help companies define their trajectory.
              </p>

              <div className="space-y-6">
                {[
                  {
                    icon: (
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className="text-corporate-primary">
                        <circle cx="12" cy="12" r="10" />
                        <circle cx="12" cy="12" r="6" />
                        <circle cx="12" cy="12" r="2" />
                      </svg>
                    ),
                    title: 'Our Vision',
                    desc: 'To be the global catalyst for enterprise transformation, known for integrity, high impact, and sustainable business modeling.'
                  },
                  {
                    icon: (
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className="text-corporate-accent">
                        <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z" />
                      </svg>
                    ),
                    title: 'Our Mission',
                    desc: 'To deliver tailored consulting, analytical insights, and operational advisory that enable corporations to innovate confidently and scale efficiently.'
                  },
                  {
                    icon: (
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className="text-corporate-emerald">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                      </svg>
                    ),
                    title: 'Core Values',
                    desc: 'Absolute transparency, client success ownership, continuous innovation, and collaborative leadership.'
                  }
                ].map((item, idx) => (
                  <div key={idx} className="flex gap-5 p-5 rounded-2xl bg-corporate-lightBg/50 hover:bg-corporate-lightBg border border-corporate-primary/5 transition-all duration-300 group">
                    <div className="w-12 h-12 rounded-xl bg-white flex items-center justify-center flex-shrink-0 shadow-sm border border-corporate-primary/5 group-hover:scale-110 transition-transform duration-300">
                      {item.icon}
                    </div>
                    <div>
                      <h4 className="font-display font-bold text-corporate-navy text-lg mb-1">{item.title}</h4>
                      <p className="text-corporate-textMuted text-sm leading-relaxed">{item.desc}</p>
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
