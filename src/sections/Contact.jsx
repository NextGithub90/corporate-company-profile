import { motion } from 'framer-motion';
import { useRef, useState } from 'react';
import { FadeIn, SectionBadge } from '../components/AnimationHelpers';

export default function Contact() {
  const [formState, setFormState] = useState({
    firstName: '',
    lastName: '',
    email: '',
    phone: '',
    message: ''
  });

  const handleSubmit = (e) => {
    e.preventDefault();
    alert('Thank you! Your inquiry has been submitted successfully.');
    setFormState({ firstName: '', lastName: '', email: '', phone: '', message: '' });
  };

  return (
    <section id="contact" className="py-28 bg-white relative overflow-hidden">
      {/* Decorative gradients */}
      <div className="absolute top-0 right-0 w-96 h-96 bg-corporate-accent/5 rounded-full filter blur-3xl pointer-events-none" />

      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div className="grid lg:grid-cols-2 gap-16">
          
          {/* Left Column — Contact Info */}
          <FadeIn direction="right">
            <SectionBadge>Get In Touch</SectionBadge>
            <h2 className="text-3xl md:text-4xl font-display font-extrabold text-corporate-navy tracking-tight leading-tight mb-6">
              Ready to Accelerate Your <span className="gradient-text-blue font-black">Business Scale?</span>
            </h2>
            <p className="text-corporate-textMuted text-lg leading-relaxed mb-10">
              Submit your project scope, capital size, and target requirements. Our senior partner advisory team will follow up within 12 business hours.
            </p>

            <div className="space-y-8">
              {/* Phone */}
              <div className="flex gap-4">
                <div className="w-12 h-12 rounded-xl bg-corporate-lightBg border border-corporate-primary/5 flex items-center justify-center text-corporate-primary flex-shrink-0">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                  </svg>
                </div>
                <div>
                  <h4 className="font-display font-bold text-corporate-navy text-sm">Call Us Directly</h4>
                  <p className="text-corporate-textMuted text-sm mt-0.5">+1 (234) 567-890</p>
                </div>
              </div>

              {/* Email */}
              <div className="flex gap-4">
                <div className="w-12 h-12 rounded-xl bg-corporate-lightBg border border-corporate-primary/5 flex items-center justify-center text-corporate-accent flex-shrink-0">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                    <polyline points="22,6 12,13 2,6" />
                  </svg>
                </div>
                <div>
                  <h4 className="font-display font-bold text-corporate-navy text-sm">Email Inquiry</h4>
                  <p className="text-corporate-textMuted text-sm mt-0.5">advisory@nexisconsulting.com</p>
                </div>
              </div>

              {/* Address */}
              <div className="flex gap-4">
                <div className="w-12 h-12 rounded-xl bg-corporate-lightBg border border-corporate-primary/5 flex items-center justify-center text-corporate-emerald flex-shrink-0">
                  <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2.5">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                    <circle cx="12" cy="10" r="3" />
                  </svg>
                </div>
                <div>
                  <h4 className="font-display font-bold text-corporate-navy text-sm">Global Headquarters</h4>
                  <p className="text-corporate-textMuted text-sm mt-0.5">100 Corporate Plaza, Suite 400, New York, NY 10001</p>
                </div>
              </div>
            </div>
          </FadeIn>

          {/* Right Column — Form */}
          <FadeIn direction="left" delay={0.2}>
            <div className="p-8 md:p-10 bg-corporate-lightBg rounded-3xl border border-corporate-primary/5 shadow-sm">
              <form onSubmit={handleSubmit} className="space-y-6">
                
                <div className="grid sm:grid-cols-2 gap-6">
                  {/* First Name */}
                  <div>
                    <label className="block text-xs font-bold uppercase tracking-widest text-corporate-navy mb-2">First Name</label>
                    <input
                      type="text"
                      required
                      placeholder="John"
                      value={formState.firstName}
                      onChange={(e) => setFormState({ ...formState, firstName: e.target.value })}
                      className="w-full px-4 py-3 bg-white border border-corporate-primary/10 rounded-xl focus:outline-none focus:border-corporate-accent text-corporate-navy text-sm"
                    />
                  </div>

                  {/* Last Name */}
                  <div>
                    <label className="block text-xs font-bold uppercase tracking-widest text-corporate-navy mb-2">Last Name</label>
                    <input
                      type="text"
                      required
                      placeholder="Doe"
                      value={formState.lastName}
                      onChange={(e) => setFormState({ ...formState, lastName: e.target.value })}
                      className="w-full px-4 py-3 bg-white border border-corporate-primary/10 rounded-xl focus:outline-none focus:border-corporate-accent text-corporate-navy text-sm"
                    />
                  </div>
                </div>

                {/* Email */}
                <div>
                  <label className="block text-xs font-bold uppercase tracking-widest text-corporate-navy mb-2">Email Address</label>
                  <input
                    type="email"
                    required
                    placeholder="john@example.com"
                    value={formState.email}
                    onChange={(e) => setFormState({ ...formState, email: e.target.value })}
                    className="w-full px-4 py-3 bg-white border border-corporate-primary/10 rounded-xl focus:outline-none focus:border-corporate-accent text-corporate-navy text-sm"
                  />
                </div>

                {/* Phone */}
                <div>
                  <label className="block text-xs font-bold uppercase tracking-widest text-corporate-navy mb-2">Phone Number</label>
                  <input
                    type="tel"
                    placeholder="+1 (234) 567-890"
                    value={formState.phone}
                    onChange={(e) => setFormState({ ...formState, phone: e.target.value })}
                    className="w-full px-4 py-3 bg-white border border-corporate-primary/10 rounded-xl focus:outline-none focus:border-corporate-accent text-corporate-navy text-sm"
                  />
                </div>

                {/* Message */}
                <div>
                  <label className="block text-xs font-bold uppercase tracking-widest text-corporate-navy mb-2">Inquiry Message</label>
                  <textarea
                    rows="4"
                    required
                    placeholder="Describe your corporate objectives..."
                    value={formState.message}
                    onChange={(e) => setFormState({ ...formState, message: e.target.value })}
                    className="w-full px-4 py-3 bg-white border border-corporate-primary/10 rounded-xl focus:outline-none focus:border-corporate-accent text-corporate-navy text-sm resize-none"
                  />
                </div>

                {/* Submit */}
                <button
                  type="submit"
                  className="w-full py-4 bg-corporate-emerald hover:bg-corporate-emerald/90 text-white rounded-xl font-sans font-bold text-sm shadow-md shadow-corporate-emerald/10 hover:shadow-lg transition-all duration-300"
                >
                  Send Message
                </button>

              </form>
            </div>
          </FadeIn>

        </div>
      </div>
    </section>
  );
}
