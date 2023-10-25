const defaultTheme = require('tailwindcss/defaultTheme')
module.exports = {
  content: [
    'site/templates/**/*.php',
    'site/snippets/**/*.php',
  ],
  darkMode: "class",
  theme: {
    extend: {
      fontSize: {
        ...defaultTheme.fontSize,
        'xs': ['0.625rem', {
          lineHeight: '0.875rem',
          letterSpacing: '0.025rem',
        }],
        'sm': ['0.875rem', {
          lineHeight: '1.125rem',
          letterSpacing: '0.035rem',
        }],
        'base': ['1rem', {
          lineHeight: '1.375rem',
          letterSpacing: '0.03rem',
        }],
        'lg': ['1.25rem', {
          lineHeight: '1.5rem',
          letterSpacing: '0.0375rem',
        }],
        'xl': ['1.25rem', {
          lineHeight: '1.625rem',
          letterSpacing: '0.0375rem',
        }],
      },

      colors: {
        'csblue': '#0000FF',
        'cslightblue': '#91BAD2',
        'csgreen': '#007605',
        'csorange': '#FF7314',
        'csyellow': '#FFF119',
        'csblack': '#191919',
        'cswhite': '#FAFAFA',
      },

      spacing: {
        '1': '5px',
        '2': '10px',
        '3': '15px',
        '4': '20px',
        '5': '25px',
        '6': '50px',
        '7': '75px',
      },

      fontFamily: {
        sans: ['MacanBook', 'sans-serif'],
        sansbold: ['MacanSemibold', 'sans-serif'],
        mono: ['Monospace821BT', 'monospace'],
      },
    },
  },
  variants: {},
  plugins: [

    function ({ addUtilities }) {
      const newUtilities = {
        ".no-scrollbar::-webkit-scrollbar": {
          display: "none",
        },
        ".no-scollbar": {
          "-ms-overflow-style": "none",
          "scrollbar-width": "none",
        },
      };

      addUtilities(newUtilities);
    },
  ],

}; 