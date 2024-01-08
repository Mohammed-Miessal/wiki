/** @type {import('tailwindcss').Config} */
module.exports = {
  // content: ["./src/**/*.{html,js}" , "./node_modules/flowbite/**/*.js"],
  content: [
    "./public/*.php",
    "./app/View/*.php",
    "./app/View/dashboard/*.php",
    "./app/View/includes/*.php",
    "./lang/*.php",
    "./lang/*.html",
    "./js/custom.min.js",
    "./node_modules/flowbite/**/*.js"
  ],

  darkMode: 'class',
  theme: {
    extend: {
      fontFamily: {
        lora: ['Lora', 'sans-serif'],
      },
    },
  },
  plugins: [   require('flowbite-typography'), require('flowbite/plugin') ],
}