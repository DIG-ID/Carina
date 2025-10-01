/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './front-page.php',
    './header.php',
    './index.php',
    './home.php',
    './footer.php',
    './404.php',
    './inc/*.php',
    './page-templates/**/*.php',
    './template-parts/**/*.php',
  ],
  theme: {
    fontFamily: {
      funnelsans: ['Funnel Sans', 'system-ui', 'sans-serif'],
    },
    extend: {
      fontFamily: {
        magnatText: ['NeueMagnatText', 'system-ui', 'sans-serif'],
      },
      letterSpacing: {
        //wide: '.038em',
        //wider: '.06em',
      },
      colors: {
        darkBlue: '#0F1A1E',
        lightBlue: '#356274',
        coral: '#EC685B',
        lightGrey: '#F0F2F5',
        veryDarkBlue: '#1A202C'
      },
      transitionTimingFunction: {
        //'out-expo': 'cubic-bezier(0.16, 1, 0.3, 1)',
      },
      gridTemplateRows: {
        // Allow grid rows to auto size based on content
        'masonry': 'masonry',
      },
    },
  },
  plugins: [
  ],
}
