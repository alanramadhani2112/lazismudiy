/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './wp-content/themes/lazismu-diy/**/*.php',
    './wp-content/themes/lazismu-diy/assets/src/**/*.js'
  ],
  theme: {
    extend: {
      colors: {
        brand: {
          orange: '#F7941D',
          yellow: '#FDB913',
          dark: '#1F2937'
        }
      },
      fontFamily: {
        sans: ['Inter', 'ui-sans-serif', 'system-ui', 'sans-serif']
      }
    }
  },
  plugins: []
}
