import { motion } from 'framer-motion';
import { SectionHeader, StaggerChildren, staggerItem } from '../components/AnimationHelpers';

const steps = [
  {
    num: '01',
    title: 'Initial Discovery',
    desc: 'We perform a comprehensive audit of your operations, financial allocation, and corporate workflows.'
  },
  {
    num: '02',
    title: 'Strategy Formulation',
    desc: 'We design custom business playbooks and financial projections tailored to your objectives.'
  },
  {
    num: '03',
    title: 'Execution & Deployment',
    desc: 'We deploy our specialists to align your leadership, train your teams, and configure our tools.'
  },
  {
    num: '04',
    title: 'Review & Optimise',
    desc: 'We continuously analyze performance KPIs, tweaking playbooks to ensure maximum efficiency.'
  }
];

export default function Process() {
  return (
    <section id="process" className="py-28 bg-corporate-navy text-white relative overflow-hidden">
      {/* Background patterns */}
      <div className="absolute inset-0 dot-grid-bg opacity-10 pointer-events-none" />
      <div className="absolute bottom-0 right-0 w-96 h-96 bg-corporate-emerald/5 rounded-full filter blur-3xl pointer-events-none" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        {/* Header (re-styled with white text) */}
        <div className="mb-16 text-center">
          <span className="inline-block bg-white/10 border border-white/20 text-corporate-highlight px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest font-sans mb-4">
            // Operational Workflow
          </span>
          <h2 className="text-3xl md:text-4xl font-display font-extrabold text-white tracking-tight leading-tight">
            Our Step-by-Step <span className="text-corporate-highlight">Consulting Process</span>
          </h2>
          <p className="mt-4 text-white/70 text-lg max-w-3xl leading-relaxed mx-auto">
            We follow a structured 4-step framework to ensure absolute consistency and performance in every advisory engagement.
          </p>
        </div>

        {/* Steps Grid */}
        <StaggerChildren className="grid sm:grid-cols-2 lg:grid-cols-4 gap-8" staggerDelay={0.08}>
          {steps.map((step, idx) => (
            <motion.div
              key={idx}
              variants={staggerItem}
              className="relative p-8 rounded-3xl bg-white/5 border border-white/10 flex flex-col justify-between group transition-all duration-300 hover:bg-white/10 hover:border-corporate-accent/40"
            >
              <div>
                {/* Number Badge */}
                <div className="w-12 h-12 rounded-xl bg-corporate-accent/20 flex items-center justify-center font-display font-black text-corporate-highlight text-xl mb-6 group-hover:bg-corporate-accent group-hover:text-white transition-all duration-300">
                  {step.num}
                </div>

                {/* Title */}
                <h3 className="font-display font-bold text-xl text-white mb-3 group-hover:text-corporate-accent transition-colors duration-200">
                  {step.title}
                </h3>

                {/* Description */}
                <p className="text-white/70 text-sm leading-relaxed">
                  {step.desc}
                </p>
              </div>

              {/* Connecting line decoration for desktop */}
              {idx < steps.length - 1 && (
                <div className="hidden lg:block absolute top-14 left-[calc(100%+16px)] w-[calc(100%-80px)] h-px border-t border-dashed border-white/20 z-0 pointer-events-none group-hover:border-corporate-accent/50 transition-colors" />
              )}
            </motion.div>
          ))}
        </StaggerChildren>

      </div>
    </section>
  );
}
