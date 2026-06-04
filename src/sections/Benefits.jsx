import { motion } from 'framer-motion';
import { SectionHeader, StaggerChildren, staggerItem, FadeIn } from '../components/AnimationHelpers';

const benefits = [
  {
    icon: (
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className="text-corporate-primary">
        <line x1="18" y1="20" x2="18" y2="10" />
        <line x1="12" y1="20" x2="12" y2="4" />
        <line x1="6" y1="20" x2="6" y2="14" />
      </svg>
    ),
    title: 'Advanced Analytics',
    desc: 'We transform raw organizational data into clear projections and strategic pathways.'
  },
  {
    icon: (
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className="text-corporate-accent">
        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2" />
      </svg>
    ),
    title: 'Efficient Workflows',
    desc: 'We optimize operating models to shave off administrative overhead and delay.'
  },
  {
    icon: (
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className="text-corporate-emerald">
        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
        <circle cx="9" cy="7" r="4" />
        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
      </svg>
    ),
    title: 'Dedicated Advisory',
    desc: 'A dedicated team lead manages your deliverables and aligns directly with your stakeholders.'
  },
  {
    icon: (
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className="text-pink-500">
        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
      </svg>
    ),
    title: 'Compliance-First',
    desc: 'All advisory playbooks ensure compliance with relevant local and international corporate laws.'
  }
];

const stats = [
  { value: '10+', label: 'Years Experience' },
  { value: '250+', label: 'Global Clients' },
  { value: '15+', label: 'Industry Awards' },
  { value: '99%', label: 'Satisfaction Rate' }
];

export default function Benefits() {
  return (
    <section className="py-28 bg-white relative overflow-hidden">
      {/* Background orbs */}
      <div className="absolute top-0 left-0 w-96 h-96 bg-corporate-accent/5 rounded-full filter blur-3xl pointer-events-none" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        {/* Header */}
        <SectionHeader
          badge="Benefits"
          title={<>The Advantage of Partnering with <span className="gradient-text-blue font-black">Nexis Group</span></>}
          subtitle="We combine analytical excellence with dedicated team alignments to drive immediate operational dividends."
        />

        {/* Benefits Grid */}
        <StaggerChildren className="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-20" staggerDelay={0.06}>
          {benefits.map((ben, idx) => (
            <motion.div
              key={idx}
              variants={staggerItem}
              className="corp-card p-8 bg-white flex flex-col items-center text-center group"
            >
              <div className="w-14 h-14 rounded-2xl bg-corporate-lightBg border border-corporate-primary/5 flex items-center justify-center mb-6 shadow-sm group-hover:scale-110 transition-transform duration-300">
                {ben.icon}
              </div>
              <h3 className="font-display font-bold text-lg text-corporate-navy mb-2 group-hover:text-corporate-accent transition-colors duration-200">
                {ben.title}
              </h3>
              <p className="text-corporate-textMuted text-sm leading-relaxed">
                {ben.desc}
              </p>
            </motion.div>
          ))}
        </StaggerChildren>

        {/* Stats Row */}
        <FadeIn direction="up">
          <div className="bg-gradient-to-r from-corporate-navy to-corporate-primary rounded-3xl p-10 lg:p-16 text-white shadow-xl relative overflow-hidden">
            
            {/* Background grid overlay */}
            <div className="absolute inset-0 dot-grid-bg opacity-10 pointer-events-none" />
            
            <div className="grid grid-cols-2 lg:grid-cols-4 gap-8 relative z-10 text-center">
              {stats.map((stat, idx) => (
                <div key={idx} className="flex flex-col items-center">
                  <span className="text-4xl md:text-5xl font-display font-black text-corporate-highlight mb-2">
                    {stat.value}
                  </span>
                  <span className="text-white/70 font-sans text-xs uppercase tracking-widest font-semibold">
                    {stat.label}
                  </span>
                </div>
              ))}
            </div>

          </div>
        </FadeIn>

      </div>
    </section>
  );
}
