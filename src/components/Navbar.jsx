import { useState, useEffect } from 'react';
import { motion, AnimatePresence } from 'framer-motion';

export default function Navbar() {
  const [isScrolled, setIsScrolled] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      if (window.scrollY > 20) {
        setIsScrolled(true);
      } else {
        setIsScrolled(false);
      }
    };
    window.addEventListener('scroll', handleScroll);
    return () => window.removeEventListener('scroll', handleScroll);
  }, []);

  const navLinks = [
    { name: 'Home', href: '#home' },
    { name: 'About Us', href: '#about' },
    { name: 'Services', href: '#services' },
    { name: 'Process', href: '#process' },
    { name: 'Pricing', href: '#pricing' },
    { name: 'Contact', href: '#contact' },
  ];

  return (
    <>
      <nav
        className={`fixed top-0 left-0 w-full z-50 transition-all duration-300 ${
          isScrolled
            ? 'bg-white/90 backdrop-blur-md border-b border-corporate-primary/5 py-4 shadow-sm'
            : 'bg-transparent py-6'
        }`}
      >
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex items-center justify-between">
            {/* Logo */}
            <a href="#home" className="flex items-center gap-2 group">
              <div className="w-10 h-10 rounded-xl bg-gradient-to-tr from-corporate-navy via-corporate-primary to-corporate-accent flex items-center justify-center text-white font-display font-extrabold text-xl shadow-md shadow-corporate-primary/20">
                N
              </div>
              <span className={`font-display font-extrabold text-xl tracking-tight transition-colors duration-300 ${
                isScrolled ? 'text-corporate-navy' : 'text-white'
              }`}>
                Nexis<span className="text-corporate-accent">Group</span>
              </span>
            </a>

            {/* Desktop Navigation */}
            <div className="hidden md:flex items-center gap-8">
              <div className="flex items-center gap-6">
                {navLinks.map((link) => (
                  <a
                    key={link.name}
                    href={link.href}
                    className={`font-sans text-sm font-medium transition-colors duration-300 hover:text-corporate-accent ${
                      isScrolled ? 'text-corporate-textDark' : 'text-white/90'
                    }`}
                  >
                    {link.name}
                  </a>
                ))}
              </div>
              <a
                href="#contact"
                className={`btn-navbar font-sans text-sm font-bold px-6 py-2.5 rounded-xl transition-all duration-300 shadow-sm ${
                  isScrolled
                    ? 'bg-corporate-emerald text-white hover:bg-corporate-emerald/90 hover:shadow-md'
                    : 'bg-white text-corporate-navy hover:bg-corporate-lightBg hover:text-corporate-primary'
                }`}
              >
                Get Started
              </a>
            </div>

            {/* Mobile Menu Button */}
            <button
              onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
              className="md:hidden p-2 rounded-lg focus:outline-none"
              aria-label="Toggle menu"
            >
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                strokeWidth="2.5"
                className={isScrolled ? 'text-corporate-navy' : 'text-white'}
              >
                {isMobileMenuOpen ? (
                  <path d="M18 6L6 18M6 6l12 12" />
                ) : (
                  <path d="M4 6h16M4 12h16M4 18h16" />
                )}
              </svg>
            </button>
          </div>
        </div>

        {/* Mobile Navigation Drawer */}
        <AnimatePresence>
          {isMobileMenuOpen && (
            <motion.div
              initial={{ opacity: 0, height: 0 }}
              animate={{ opacity: 1, height: 'auto' }}
              exit={{ opacity: 0, height: 0 }}
              className="md:hidden bg-white border-b border-corporate-primary/5 shadow-lg overflow-hidden"
            >
              <div className="px-4 pt-2 pb-6 space-y-3">
                {navLinks.map((link) => (
                  <a
                    key={link.name}
                    href={link.href}
                    onClick={() => setIsMobileMenuOpen(false)}
                    className="block font-sans text-base font-semibold text-corporate-textDark py-2 border-b border-corporate-primary/5 hover:text-corporate-accent transition-colors"
                  >
                    {link.name}
                  </a>
                ))}
                <div className="pt-4">
                  <a
                    href="#contact"
                    onClick={() => setIsMobileMenuOpen(false)}
                    className="block text-center font-sans font-bold bg-corporate-emerald text-white py-3 rounded-xl shadow-md shadow-corporate-emerald/10 hover:bg-corporate-emerald/90 transition-colors"
                  >
                    Get Started
                  </a>
                </div>
              </div>
            </motion.div>
          )}
        </AnimatePresence>
      </nav>
    </>
  );
}
