import { motion, useInView } from 'framer-motion';
import { useRef } from 'react';
import { FadeIn, SectionBadge } from '../components/AnimationHelpers';

function CircleProgress({ percentage, label, color }) {
  const ref = useRef(null);
  const isInView = useInView(ref, { once: true, margin: '-50px' });
  const radius = 32;
  const circumference = 2 * Math.PI * radius;
  const strokeDashoffset = circumference - (percentage / 100) * circumference;

  return (
    <div ref={ref} className="flex items-center gap-6 p-6 bg-white rounded-2xl border border-corporate-primary/5 shadow-sm transition-all duration-300 hover:shadow-md">
      <div className="relative w-[84px] h-[84px] flex-shrink-0 flex items-center justify-center">
        <svg className="w-full h-full transform -rotate-90">
          {/* Background circle */}
          <circle
            cx="42"
            cy="42"
            r={radius}
            className="stroke-corporate-lightBg"
            strokeWidth="6"
            fill="transparent"
          />
          {/* Animated progress circle */}
          <motion.circle
            cx="42"
            cy="42"
            r={radius}
            stroke={color}
            strokeWidth="6"
            fill="transparent"
            strokeDasharray={circumference}
            initial={{ strokeDashoffset: circumference }}
            animate={isInView ? { strokeDashoffset } : { strokeDashoffset: circumference }}
            transition={{ duration: 1.2, ease: 'easeOut' }}
            strokeLinecap="round"
          />
        </svg>
        <span className="absolute font-display font-extrabold text-corporate-navy text-lg">
          {percentage}%
        </span>
      </div>
      <div>
        <h4 className="font-display font-bold text-corporate-navy text-lg mb-1">{label}</h4>
        <p className="text-corporate-textMuted text-sm">Empowering enterprises with specialized advice.</p>
      </div>
    </div>
  );
}

export default function Stats() {
  const focusAreas = [
    { percentage: 92, label: 'Business Consulting', color: '#134074' },
    { percentage: 87, label: 'Market Research', color: '#10b981' },
    { percentage: 95, label: 'Financial Advisory', color: '#00b4d8' },
  ];

  return (
    <section className="py-28 bg-corporate-navy text-white relative overflow-hidden">
      {/* Background patterns */}
      <div className="absolute inset-0 dot-grid-bg opacity-10 pointer-events-none" />
      <div className="absolute top-1/2 -left-32 w-96 h-96 bg-corporate-accent/10 rounded-full filter blur-3xl pointer-events-none" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="grid lg:grid-cols-2 gap-16 items-center">
          
          {/* Left Column — Text & General Stats */}
          <FadeIn direction="right">
            <span className="inline-block bg-white/10 border border-white/20 text-corporate-highlight px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest font-sans mb-4">
              // Focus & Excellence
            </span>
            <h2 className="text-3xl md:text-4xl font-display font-extrabold text-white tracking-tight leading-tight mb-6">
              Driving Growth through <span className="text-corporate-highlight">Strategic Solutions</span>
            </h2>
            <p className="text-white/70 text-lg leading-relaxed mb-10">
              We focus on areas that yield the highest impact for your business. Our structured consulting methodologies ensure high-performance execution.
            </p>

            <div className="grid grid-cols-2 gap-8">
              <div className="border-l-4 border-corporate-highlight pl-4">
                <div className="text-4xl font-display font-extrabold text-white">99%</div>
                <div className="text-white/60 text-sm mt-1">Client Satisfaction</div>
              </div>
              <div className="border-l-4 border-corporate-accent pl-4">
                <div className="text-4xl font-display font-extrabold text-white">2.5x</div>
                <div className="text-white/60 text-sm mt-1">Average Business Growth</div>
              </div>
            </div>
          </FadeIn>

          {/* Right Column — Circular Progress Indicators */}
          <div className="space-y-6">
            {focusAreas.map((area, index) => (
              <FadeIn key={area.label} direction="left" delay={index * 0.15}>
                <CircleProgress
                  percentage={area.percentage}
                  label={area.label}
                  color={area.color}
                />
              </FadeIn>
            ))}
          </div>

        </div>
      </div>
    </section>
  );
}
