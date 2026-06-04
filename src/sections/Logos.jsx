import { motion } from 'framer-motion';
import { FadeIn } from '../components/AnimationHelpers';

const partnerLogos = [
  { name: 'Google', icon: '🌐' },
  { name: 'Microsoft', icon: '💻' },
  { name: 'Amazon', icon: '📦' },
  { name: 'Stripe', icon: '💳' },
  { name: 'Slack', icon: '💬' },
  { name: 'Airbnb', icon: '🏠' }
];

export default function Logos() {
  return (
    <section className="py-16 bg-corporate-lightBg border-y border-corporate-primary/5 relative overflow-hidden">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <FadeIn direction="up">
          <div className="text-center mb-10">
            <span className="text-corporate-textMuted text-xs font-bold font-sans uppercase tracking-widest">
              Trusted by Leading Organizations Worldwide
            </span>
          </div>

          <div className="flex flex-wrap items-center justify-center gap-10 md:gap-20">
            {partnerLogos.map((logo, idx) => (
              <div
                key={idx}
                className="flex items-center gap-2 opacity-50 hover:opacity-90 grayscale hover:grayscale-0 transition-all duration-300 cursor-pointer"
              >
                <span className="text-2xl">{logo.icon}</span>
                <span className="font-display font-extrabold text-corporate-navy text-lg tracking-tight">
                  {logo.name}
                </span>
              </div>
            ))}
          </div>
        </FadeIn>
      </div>
    </section>
  );
}
