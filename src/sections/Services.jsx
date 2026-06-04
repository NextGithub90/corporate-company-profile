import { motion } from 'framer-motion';
import { SectionHeader, StaggerChildren, staggerItem } from '../components/AnimationHelpers';

const services = [
  {
    id: 'financial-plan',
    icon: (
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" className="text-corporate-primary">
        <line x1="12" y1="1" x2="12" y2="23"/>
        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
      </svg>
    ),
    title: 'Financial Planning',
    desc: 'Structured forecasting, capital allocation planning, and cash flow optimizations for sustainable profit scaling.',
    tags: ['Forecasting', 'Capital Alloc.', 'Tax Opt.'],
  },
  {
    id: 'risk-management',
    icon: (
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" className="text-corporate-accent">
        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
      </svg>
    ),
    title: 'Risk Management',
    desc: 'Comprehensive enterprise threat assessments, mitigation workflows, regulatory audits, and crisis playbook design.',
    tags: ['Audits', 'Threat Assess.', 'Compliance'],
  },
  {
    id: 'tax-advisory',
    icon: (
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" className="text-corporate-emerald">
        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
        <polyline points="14 2 14 8 20 8"/>
        <line x1="16" y1="13" x2="8" y2="13"/>
        <line x1="16" y1="17" x2="8" y2="17"/>
        <polyline points="10 9 9 9 8 9"/>
      </svg>
    ),
    title: 'Tax & Audit Advisory',
    desc: 'Corporate tax compliance, global tax structuring, transaction tax advisory, and preparation for rigorous external audits.',
    tags: ['Tax Structure', 'External Audits', 'GRC'],
  },
  {
    id: 'hr-solution',
    icon: (
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" className="text-pink-500">
        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
        <circle cx="9" cy="7" r="4"/>
        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
      </svg>
    ),
    title: 'HR & Talent Solutions',
    desc: 'Organizational design, compensation modeling, leadership coaching, and high-performance talent acquisition strategies.',
    tags: ['Org Design', 'Recruitment', 'Coaching'],
  },
  {
    id: 'market-research',
    icon: (
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" className="text-orange-500">
        <circle cx="11" cy="11" r="8"/>
        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
      </svg>
    ),
    title: 'Market Research',
    desc: 'Deep consumer intelligence, market sizing, competitive threat mapping, and macroeconomic feasibility studies.',
    tags: ['Consumer Intel', 'Competitor Map', 'Economics'],
  },
  {
    id: 'corp-strategy',
    icon: (
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" className="text-purple-500">
        <polygon points="12 2 2 7 12 12 22 7 12 2"/>
        <polyline points="2 17 12 22 22 17"/>
        <polyline points="2 12 12 17 22 12"/>
      </svg>
    ),
    title: 'Corporate Strategy',
    desc: 'Mergers & acquisitions advisory, digital transformation strategies, scaling roadmaps, and international expansion planning.',
    tags: ['M&A', 'Scaling Roadmaps', 'Expansion'],
  },
];

export default function Services() {
  return (
    <section id="services" className="py-28 bg-corporate-lightBg relative overflow-hidden">
      {/* Background decoration */}
      <div className="absolute inset-0 grid-lines-bg opacity-30 pointer-events-none" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <SectionHeader
          badge="Our Solutions"
          title={<>Tailored Solutions for Your <span className="gradient-text-blue font-black">Business Growth</span></>}
          subtitle="We deliver end-to-end consulting services backed by deep industry intelligence — protecting and growing your corporate assets."
        />

        <StaggerChildren className="grid sm:grid-cols-2 lg:grid-cols-3 gap-8" staggerDelay={0.06}>
          {services.map((svc) => (
            <motion.div
              key={svc.id}
              variants={staggerItem}
              className="corp-card p-8 bg-white flex flex-col justify-between group cursor-pointer relative overflow-hidden"
            >
              {/* Highlight border decoration */}
              <div className="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-corporate-primary to-corporate-accent scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-300" />

              <div>
                {/* Icon Box */}
                <div className="w-12 h-12 rounded-xl bg-corporate-lightBg flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                  {svc.icon}
                </div>

                {/* Title */}
                <h3 className="font-display font-extrabold text-xl text-corporate-navy mb-3 group-hover:text-corporate-accent transition-colors duration-200">
                  {svc.title}
                </h3>

                {/* Description */}
                <p className="text-corporate-textMuted text-sm leading-relaxed mb-6">
                  {svc.desc}
                </p>
              </div>

              <div>
                {/* Tags */}
                <div className="flex flex-wrap gap-2 mb-6">
                  {svc.tags.map((tag) => (
                    <span key={tag} className="bg-corporate-lightBg text-[10px] text-corporate-navy/80 px-2.5 py-1 rounded-md font-sans font-semibold tracking-wider uppercase">
                      {tag}
                    </span>
                  ))}
                </div>

                {/* Learn More link */}
                <div className="flex items-center gap-2 text-corporate-primary group-hover:text-corporate-accent transition-colors duration-200 text-sm font-bold">
                  <span>Learn more</span>
                  <svg width="14" height="14" viewBox="0 0 14 14" fill="none" stroke="currentColor" strokeWidth="2" className="transform group-hover:translate-x-1 transition-transform">
                    <path d="M3 7H11M7 3L11 7L7 11"/>
                  </svg>
                </div>
              </div>

            </motion.div>
          ))}
        </StaggerChildren>
      </div>
    </section>
  );
}
