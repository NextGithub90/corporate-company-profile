/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        corporate: {
          navy: '#0b2545',       // Deep navy
          primary: '#134074',    // Strong steel blue
          accent: '#00b4d8',     // Sky blue/cyan
          highlight: '#00f5d4',  // Teal/green accent
          emerald: '#10b981',    // Emerald green for buttons/badges
          lightBg: '#f4f9f9',    // Light grey-blue bg
          cardBg: '#ffffff',     // Card white bg
          textDark: '#1d2d44',   // Dark text
          textMuted: '#5c677d',  // Muted text
        }
      },
      fontFamily: {
        sans: ['Inter', 'sans-serif'],
        display: ['Outfit', 'sans-serif'],
      }
    },
  },
  plugins: [],
}
