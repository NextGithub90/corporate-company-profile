import { motion } from 'framer-motion';
import { SectionHeader, StaggerChildren, staggerItem } from '../components/AnimationHelpers';

const galleryItems = [
  {
    src: '/corporate_meeting.png',
    title: 'Executive Advisory Board',
    category: 'Consulting'
  },
  {
    src: '/consulting_discussion.png',
    title: 'Financial Strategy Session',
    category: 'Planning'
  },
  {
    src: '/corporate_presentation.png',
    title: 'Enterprise Training Workshop',
    category: 'HR Solutions'
  },
  {
    src: '/corporate_skyscrapers.png',
    title: 'Global HQ Architecture',
    category: 'Corporate'
  }
];

export default function Gallery() {
  return (
    <section className="py-28 bg-corporate-lightBg relative overflow-hidden">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <SectionHeader
          badge="Gallery"
          title={<>Inside Our <span className="gradient-text-blue font-black">Corporate Environment</span></>}
          subtitle="Explore the workshops, brainstorming sessions, and analytical operations that define our daily excellence."
        />

        <StaggerChildren className="grid sm:grid-cols-2 gap-8" staggerDelay={0.1}>
          {galleryItems.map((item, idx) => (
            <motion.div
              key={idx}
              variants={staggerItem}
              className="group relative rounded-3xl overflow-hidden aspect-[4/3] shadow-lg border border-corporate-primary/5 bg-white cursor-pointer"
            >
              {/* Image */}
              <img
                src={item.src}
                alt={item.title}
                className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700"
              />

              {/* Gradient Overlay */}
              <div className="absolute inset-0 bg-gradient-to-t from-corporate-navy/90 via-corporate-navy/35 to-transparent opacity-85 group-hover:opacity-95 transition-opacity duration-300" />

              {/* Text details on overlay */}
              <div className="absolute bottom-0 left-0 w-full p-8 z-10 text-white flex flex-col justify-end h-full translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                <span className="text-corporate-highlight text-xs font-bold font-sans uppercase tracking-widest mb-2">
                  {item.category}
                </span>
                <h3 className="font-display font-extrabold text-xl md:text-2xl text-white tracking-tight leading-none">
                  {item.title}
                </h3>
              </div>

              {/* Border Ring Decoration */}
              <div className="absolute inset-4 border border-white/10 rounded-2xl pointer-events-none group-hover:border-corporate-accent/40 transition-colors duration-300" />
            </motion.div>
          ))}
        </StaggerChildren>

      </div>
    </section>
  );
}
