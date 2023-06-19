// const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            // fontFamily: {
            //     sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            // },
        },
        colors: {
            primary: "#9775AA",
            primary_1: "#764B8E",
            primary_2: "#582A72",
            primary_3: "#3D1255",
            primary_4: "#260339",
            secondary: "#8080B3",
            secondary_1: "#565695",
            secondary_2: '#343477',
            secondary_3: '#1A1A59',
            secondary_4: '#09093B',
            complement: '#E498AF',
            complement_1: '#BE5F7C',
            complement_2: '#983351',
            complement_3: '#721330',
            complement_4: '#4C0017',
        },
        screens: {
            sm: "480px",
            md: "768px",
            lg: "976px",
            xl: "1440px",
        },
        fontFamily: {
            'sans': ['Helvetica Neue'],
            'serif': ['Georgia'],
            'mono': ['SFMono-Regular'],
        }
    },

    plugins: [require('@tailwindcss/forms')],
};
