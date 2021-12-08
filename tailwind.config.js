module.exports = {
  purge: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        't-normal': '#A8A77A',
        't-fire': '#EE8130',
        't-water': '#6390F0',
        't-electric': '#F7D02C',
        't-grass': '#7AC74C',
        't-ice': '#96D9D6',
        't-fighting': '#C22E28',
        't-poison': '#A33EA1',
        't-ground': '#E2BF65',
        't-flying': '#A98FF3',
        't-psychic': '#F95587',
        't-bug': '#A6B91A',
        't-rock': '#B6A136',
        't-ghost': '#735797',
        't-dragon': '#6F35FC',
        't-dark': '#705746',
        't-steel': '#B7B7CE',
        't-fairy': '#D685AD',
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
