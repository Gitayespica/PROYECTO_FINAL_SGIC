/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      colors: {
        'azul-profesional': '#1e3a8a',
        'gris-fondo': '#f3f4f6',
      }
    },
  },
  plugins: [],
}