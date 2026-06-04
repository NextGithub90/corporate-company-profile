import { motion } from 'framer-motion';
import { SectionHeader, StaggerChildren, staggerItem } from '../components/AnimationHelpers';

const plans = [
  {
    name: 'Basic Advisory',
    price: '49',
    period: '/month',
    desc: 'Perfect for startups looking for foundational strategic feedback.',
    features: [
      '1 Dedicated Lead Advisor',
      'Monthly Strategy Audit',
      'Basic Capital Projections',
      'Email Support (24h response)',
      'Access to Strategy Vault'
    ],
    popular: false,
    buttonText: 'Start Basic Plan'
  },
  {
    name: 'Growth Corporate',
    price: '99',
    period: '/month',
    desc: 'Ideal for scaling corporations wanting active advisory support.',
    features: [
      '2 Dedicated Senior Advisors',
      'Bi-Weekly Consulting Syncs',
      'Advanced Capital Allocations',
      'Priority GRC Regulations Check',
      'Priority Phone & Email Support',
      'Custom ERP Dashboard Integr.'
    ],
    popular: true,
    buttonText: 'Get Started'
  },
  {
    name: 'Enterprise Executive',
    price: '150',
    period: '/month',
    desc: 'Elite advisory package for global multi-divisional enterprises.',
    features: [
      'Full Partner-Level Advisory Team',
      'Weekly Operational Audits',
      'Custom GRC Compliance Automations',
      '24/7 Dedicated Client Hotline',
      'Unlimited Dashboard Integrations',
      'On-Site Board Meeting Presence'
    ],
    popular: false,
    buttonText: 'Contact for Enterprise'
  }
];

export default function Pricing() {
  return (
    <section id="pricing" className="py-28 bg-corporate-lightBg relative overflow-hidden">
      {/* Background decoration */}
      <div className="absolute inset-0 grid-lines-bg opacity-30 pointer-events-none" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <SectionHeader
          badge="Pricing Plans"
          title={<>Transparent Plans for Every <span className="gradient-text-blue font-black">Corporate Scale</span></>}
          subtitle="Choose the advisory and consulting plan that matches your operational complexity and growth budget."
        />

        <StaggerChildren className="grid lg:grid-cols-3 gap-8 items-stretch" staggerDelay={0.08}>
          {plans.map((plan, idx) => (
            <motion.div
              key={idx}
              variants={staggerItem}
              className={`corp-card p-8 bg-white flex flex-col justify-between relative group ${
                plan.popular 
                  ? 'border-2 border-corporate-accent scale-105 shadow-xl shadow-corporate-primary/5 z-20' 
                  : 'z-10'
              }`}
            >
              {plan.popular && (
                <div className="absolute top-4 right-4 bg-corporate-emerald text-white px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider font-sans">
                  Most Popular
                </div>
              )}

              <div>
                {/* Plan Details */}
                <h3 className="font-display font-extrabold text-xl text-corporate-navy mb-2">
                  {plan.name}
                </h3>
                <p className="text-corporate-textMuted text-sm mb-6 leading-relaxed">
                  {plan.desc}
                </p>

                {/* Price */}
                <div className="flex items-baseline mb-8">
                  <span className="text-4xl md:text-5xl font-display font-black text-corporate-navy">$</span>
                  <span className="text-5xl md:text-6xl font-display font-black text-corporate-navy tracking-tight">{plan.price}</span>
                  <span className="text-corporate-textMuted text-sm font-semibold ml-2">{plan.period}</span>
                </div>

                {/* Features */}
                <ul className="space-y-4 mb-8">
                  {plan.features.map((feat, fIdx) => (
                    <li key={fIdx} className="flex gap-3 text-sm text-corporate-textDark">
                      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5" className="text-corporate-accent flex-shrink-0 mt-0.5">
                        <polyline points="20 6 9 17 4 12" />
                      </svg>
                      <span>{feat}</span>
                    </li>
                  ))}
                </ul>
              </div>

              {/* Action Button */}
              <button
                className={`w-full py-4 rounded-xl font-sans font-bold text-sm transition-all duration-300 ${
                  plan.popular
                    ? 'bg-corporate-emerald text-white hover:bg-corporate-emerald/90 shadow-md shadow-corporate-emerald/10 hover:shadow-lg'
                    : 'bg-corporate-lightBg text-corporate-navy hover:bg-corporate-navy hover:text-white'
                }`}
              >
                {plan.buttonText}
              </button>

            </motion.div>
          ))}
        </StaggerChildren>

      </div>
    </section>
  );
}
