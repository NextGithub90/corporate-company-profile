import Navbar from './components/Navbar';
import Footer from './components/Footer';
import Hero from './sections/Hero';
import About from './sections/About';
import Stats from './sections/Stats';
import VisionMission from './sections/VisionMission';
import Services from './sections/Services';
import Benefits from './sections/Benefits';
import PromoBanner from './sections/PromoBanner';
import Products from './sections/Products';
import Gallery from './sections/Gallery';
import Testimonials from './sections/Testimonials';
import Logos from './sections/Logos';
import Process from './sections/Process';
import Pricing from './sections/Pricing';
import Contact from './sections/Contact';

export default function App() {
  return (
    <div className="bg-corporate-lightBg min-h-screen selection:bg-corporate-accent selection:text-white">
      <Navbar />
      <main>
        <Hero />
        <Logos />
        <About />
        <Stats />
        <VisionMission />
        <Services />
        <Benefits />
        <PromoBanner />
        <Products />
        <Process />
        <Gallery />
        <Testimonials />
        <Pricing />
        <Contact />
      </main>
      <Footer />
    </div>
  );
}
