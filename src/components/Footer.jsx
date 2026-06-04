import { motion } from 'framer-motion';

export default function Footer() {
  const currentYear = new Date().getFullYear();

  return (
    <footer className="bg-corporate-navy text-white/90 pt-20 pb-10 border-t border-white/5 relative overflow-hidden">
      {/* Background orbs */}
      <div className="absolute bottom-0 right-0 w-96 h-96 bg-corporate-accent/5 rounded-full filter blur-3xl pointer-events-none" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="grid grid-cols-2 md:grid-cols-4 gap-12 mb-16">
          
          {/* Column 1 — Brand Details */}
          <div className="col-span-2 md:col-span-1">
            <a href="#home" className="flex items-center gap-2 group mb-6">
              <div className="w-10 h-10 rounded-xl bg-gradient-to-tr from-corporate-navy via-corporate-primary to-corporate-accent flex items-center justify-center text-white font-display font-extrabold text-xl shadow-md">
                N
              </div>
              <span className="font-display font-extrabold text-xl tracking-tight text-white">
                Nexis<span className="text-corporate-accent">Group</span>
              </span>
            </a>
            <p className="text-white/60 text-sm leading-relaxed mb-6">
              Empowering enterprise strategy, capital allocations, GRC compliance, and high-performance talent acquisition worldwide.
            </p>
            {/* Social Icons */}
            <div className="flex gap-4">
              {['facebook', 'twitter', 'linkedin', 'instagram'].map((soc, idx) => (
                <a
                  key={idx}
                  href={`https://${soc}.com`}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-white/60 hover:text-corporate-accent hover:bg-white/10 transition-all duration-200"
                  aria-label={soc}
                >
                  <span className="text-xs capitalize font-bold font-sans">
                    {soc[0]}
                  </span>
                </a>
              ))}
            </div>
          </div>

          {/* Column 2 — Quick Links */}
          <div>
            <h4 className="font-display font-extrabold text-white text-base mb-6 uppercase tracking-wider">Quick Links</h4>
            <ul className="space-y-3">
              {[
                { name: 'Home', href: '#home' },
                { name: 'About Us', href: '#about' },
                { name: 'Our Solutions', href: '#services' },
                { name: 'Consulting Process', href: '#process' }
              ].map((link) => (
                <li key={link.name}>
                  <a href={link.href} className="text-white/60 hover:text-corporate-accent text-sm transition-colors duration-200">
                    {link.name}
                  </a>
                </li>
              ))}
            </ul>
          </div>

          {/* Column 3 — Solutions */}
          <div>
            <h4 className="font-display font-extrabold text-white text-base mb-6 uppercase tracking-wider">Solutions</h4>
            <ul className="space-y-3">
              {[
                'Financial Planning',
                'Risk Management',
                'Tax & Audit GRC',
                'HR & Talent Solutions'
              ].map((svc) => (
                <li key={svc}>
                  <a href="#services" className="text-white/60 hover:text-corporate-accent text-sm transition-colors duration-200">
                    {svc}
                  </a>
                </li>
              ))}
            </ul>
          </div>

          {/* Column 4 — Contact */}
          <div>
            <h4 className="font-display font-extrabold text-white text-base mb-6 uppercase tracking-wider">Contact HQ</h4>
            <p className="text-white/60 text-sm leading-relaxed mb-4">
              100 Corporate Plaza, Suite 400, New York, NY 10001
            </p>
            <p className="text-white/60 text-sm mb-2">
              advisory@nexisconsulting.com
            </p>
            <p className="text-corporate-highlight font-display font-bold text-base">
              +1 (234) 567-890
            </p>
          </div>

        </div>

        {/* Bottom copyright block */}
        <div className="border-t border-white/5 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
          <p className="text-white/40 text-xs text-center md:text-left">
            &copy; {currentYear} Nexis Consulting Group. All rights reserved.
          </p>
          <div className="flex gap-6 text-xs text-white/40">
            <a href="#" className="hover:text-corporate-accent transition-colors">Privacy Policy</a>
            <a href="#" className="hover:text-corporate-accent transition-colors">Terms of Service</a>
          </div>
        </div>

      </div>
    </footer>
  );
}
