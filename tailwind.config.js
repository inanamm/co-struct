const defaultTheme = require('tailwindcss/defaultTheme')
module.exports = {
  darkMode: "class",
  theme: {
    extend: {
    fontSize: {
      ...defaultTheme.fontSize,
      'xs': ['0.625rem', {
        lineHeight:'0.875rem',
        letterSpacing: '0.025rem',
      }],
      'sm': ['0.875rem', {
        lineHeight:'1.125rem',
        letterSpacing: '0.035rem',
      }],
      'base': ['1rem', {
        lineHeight:'1.375rem',
        letterSpacing: '0.03rem',
      }],
      'lg': ['1.25rem', {
        lineHeight:'1.5rem',
        letterSpacing: '0.0375rem',
      }],
      'xl': ['1.25rem', {
        lineHeight:'1.625rem',
        letterSpacing: '0.0375rem',
      }],
    },
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
  variants: {},
  plugins: [require("daisyui")],

  daisyui: {
    themes: false, // true: all themes | false: only light + dark | array: specific themes like this ["light", "dark", "cupcake"]
    darkTheme: "dark", // name of one of the included themes for dark mode
    base: true, // applies background color and foreground color for root element by default
    styled: false , // include daisyUI colors and design decisions for all components
    utils: true, // adds responsive and modifier utility classes
    rtl: false, // rotate style direction from left-to-right to right-to-left. You also need to add dir="rtl" to your html tag and install `tailwindcss-flip` plugin for Tailwind CSS.
    prefix: "", // prefix for daisyUI classnames (components, modifiers and responsive class names. Not colors)
    logs: true, // Shows info about daisyUI version and used config in the console when building your CSS
  },
}; 