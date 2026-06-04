import { motion } from 'framer-motion';
import { FadeIn } from '../components/AnimationHelpers';

export default function PromoBanner() {
  return (
    <section className="relative py-32 md:py-48 flex items-center justify-center overflow-hidden">
      {/* Background Image */}
      <div className="absolute inset-0">
        <img
          src="/corporate_meeting.png"
          alt="Corporate board meeting"
          className="w-full h-full object-cover object-center"
        />
        {/* Dark Overlay */}
        <div className="absolute inset-0 bg-gradient-to-r from-corporate-navy/95 via-corporate-navy/80 to-corporate-primary/95 mix-blend-multiply" />
      </div>

      {/* Decorative lines */}
      <div className="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-corporate-accent via-corporate-highlight to-corporate-accent opacity-30" />

      {/* Content */}
      <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center text-white">
        
        {/* Play Button */}
        <FadeIn direction="up">
          <div className="flex justify-center mb-8">
            <button 
              className="relative w-20 h-20 rounded-full bg-corporate-emerald text-white flex items-center justify-center shadow-lg shadow-corporate-emerald/30 group hover:scale-110 transition-transform duration-300 focus:outline-none"
              aria-label="Play video"
            >
              {/* Pulsing rings */}
              <span className="absolute -inset-2 rounded-full border border-corporate-emerald/30 animate-ping pointer-events-none" />
              <span className="absolute -inset-4 rounded-full border border-corporate-emerald/10 animate-ping pointer-events-none" style={{ animationDelay: '0.4s' }} />
              
              {/* Play triangle */}
              <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" className="ml-1 text-white">
                <polygon points="5 3 19 12 5 21 5 3" />
              </svg>
            </button>
          </div>
        </FadeIn>

        {/* Text Details */}
        <FadeIn direction="up" delay={0.15}>
          <span className="inline-block bg-corporate-accent/20 border border-corporate-accent/30 text-corporate-highlight px-4 py-1 text-xs font-bold uppercase tracking-widest font-sans rounded-full mb-4">
            // Corporate Overview
          </span>
          <h2 className="text-3xl md:text-5xl font-display font-extrabold text-white leading-tight mb-6">
            Leading Businesses to Greater <span className="text-corporate-highlight">Success & Stability</span>
          </h2>
          <p className="text-white/80 text-base md:text-lg leading-relaxed max-w-2xl mx-auto mb-8">
            Take a 3-minute video tour to learn how our consulting, restructuring, and analytical practices have saved enterprises millions in operational cost.
          </p>
        </FadeIn>

        <FadeIn direction="up" delay={0.3}>
          <a
            href="#contact"
            className="btn-neon font-sans text-sm font-bold bg-corporate-emerald hover:bg-corporate-emerald/90 text-white px-8 py-4 rounded-xl shadow-lg transition-all duration-300 hover:-translate-y-0.5 inline-block"
          >
            Get Free Consultation
          </a>
        </FadeIn>

      </div>
    </section>
  );
}
