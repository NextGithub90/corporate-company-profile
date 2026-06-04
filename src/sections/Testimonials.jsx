import { motion } from 'framer-motion';
import { SectionHeader, StaggerChildren, staggerItem } from '../components/AnimationHelpers';

const testimonials = [
  {
    rating: 5,
    quote: "Nexis Consulting restructured our entire logistics operation. Their team of advisors was highly responsive, data-driven, and helped us reduce overhead by 24% within just 6 months.",
    name: "Sarah Jenkins",
    role: "Chief Operating Officer, TradeCorp",
    avatar: "SJ"
  },
  {
    rating: 5,
    quote: "The financial advisory we received was top-notch. Nexis Group modeled our capital scaling roadmap and prepared us for our Series B expansion audit with absolute perfection.",
    name: "Marcus Vance",
    role: "VP of Finance, ScaleDigital",
    avatar: "MV"
  },
  {
    rating: 5,
    quote: "Their market research reports are incredibly granular. They uncovered segment opportunities in Southeast Asia that our internal analytics teams completely missed.",
    name: "Elena Rostova",
    role: "Director of Expansion, GlobalVenture",
    avatar: "ER"
  }
];

export default function Testimonials() {
  return (
    <section className="py-28 bg-white relative overflow-hidden">
      {/* Decorative gradients */}
      <div className="absolute top-1/2 left-0 w-96 h-96 bg-corporate-accent/5 rounded-full filter blur-3xl pointer-events-none" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <SectionHeader
          badge="Testimonials"
          title={<>What Our Partners <span className="gradient-text-blue font-black">Say About Us</span></>}
          subtitle="We measure our success by the financial growth and operational efficiency achieved by our corporate partners."
        />

        <StaggerChildren className="grid md:grid-cols-3 gap-8" staggerDelay={0.08}>
          {testimonials.map((t, idx) => (
            <motion.div
              key={idx}
              variants={staggerItem}
              className="corp-card p-8 bg-white flex flex-col justify-between relative group hover:border-corporate-accent/30"
            >
              <div>
                {/* Stars */}
                <div className="flex gap-1 mb-6">
                  {[...Array(t.rating)].map((_, i) => (
                    <span key={i} className="text-yellow-400 text-lg">★</span>
                  ))}
                </div>

                {/* Quote Icon */}
                <div className="absolute top-6 right-8 text-corporate-accent/10 text-6xl font-serif pointer-events-none font-bold select-none leading-none">
                  “
                </div>

                {/* Quote Text */}
                <p className="text-corporate-textMuted text-sm leading-relaxed italic mb-8 relative z-10">
                  "{t.quote}"
                </p>
              </div>

              {/* Author details */}
              <div className="flex items-center gap-4 border-t border-corporate-primary/5 pt-6">
                <div className="w-12 h-12 rounded-full bg-corporate-lightBg border border-corporate-primary/5 flex items-center justify-center font-display font-extrabold text-corporate-primary">
                  {t.avatar}
                </div>
                <div>
                  <h4 className="font-display font-bold text-corporate-navy text-sm">{t.name}</h4>
                  <p className="text-corporate-textMuted text-xs mt-0.5">{t.role}</p>
                </div>
              </div>
            </motion.div>
          ))}
        </StaggerChildren>

      </div>
    </section>
  );
}
