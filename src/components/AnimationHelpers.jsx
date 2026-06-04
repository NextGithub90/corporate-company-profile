import { motion, useInView } from 'framer-motion';
import { useRef } from 'react';

export function FadeIn({ children, delay = 0, direction = 'up', className = '' }) {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: '-60px' });

  const variants = {
    hidden: {
      opacity: 0,
      y: direction === 'up' ? 30 : direction === 'down' ? -30 : 0,
      x: direction === 'left' ? 30 : direction === 'right' ? -30 : 0,
    },
    visible: {
      opacity: 1,
      y: 0,
      x: 0,
      transition: { duration: 0.6, delay, ease: [0.25, 1, 0.5, 1] }
    }
  };

  return (
    <motion.div
      ref={ref}
      variants={variants}
      initial="hidden"
      animate={inView ? 'visible' : 'hidden'}
      className={className}
    >
      {children}
    </motion.div>
  );
}

export function StaggerChildren({ children, className = '', staggerDelay = 0.08 }) {
  const ref = useRef(null);
  const inView = useInView(ref, { once: true, margin: '-60px' });

  return (
    <motion.div
      ref={ref}
      initial="hidden"
      animate={inView ? 'visible' : 'hidden'}
      variants={{
        hidden: {},
        visible: { transition: { staggerChildren: staggerDelay } }
      }}
      className={className}
    >
      {children}
    </motion.div>
  );
}

export const staggerItem = {
  hidden: { opacity: 0, y: 20 },
  visible: { opacity: 1, y: 0, transition: { duration: 0.5, ease: [0.25, 1, 0.5, 1] } }
};

export function SectionBadge({ children }) {
  return (
    <span className="inline-block bg-corporate-accent/15 border border-corporate-accent/30 text-corporate-accent px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest font-sans mb-4">
      {children}
    </span>
  );
}

export function SectionHeader({ badge, title, subtitle, centered = true }) {
  return (
    <div className={`mb-16 ${centered ? 'text-center' : 'text-left'}`}>
      {badge && <FadeIn><SectionBadge>{badge}</SectionBadge></FadeIn>}
      <FadeIn delay={0.1}>
        <h2 className="text-3xl md:text-4xl font-display font-extrabold text-corporate-navy tracking-tight leading-tight">
          {title}
        </h2>
      </FadeIn>
      {subtitle && (
        <FadeIn delay={0.2}>
          <p className={`mt-4 text-corporate-textMuted text-lg max-w-3xl leading-relaxed ${centered ? 'mx-auto' : ''}`}>
            {subtitle}
          </p>
        </FadeIn>
      )}
    </div>
  );
}
