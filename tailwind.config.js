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
            primary_1: "#9775AA",
            primary_2: "#764B8E",
            primary: "#582A72",
            primary_3: "#3D1255",
            primary_4: "#260339",
            secondary_1_1: "#8080B3",
            secondary_1_2: "#565695",
            transparent: 'transparent',
            gray: colors.gray,
        },
        screens: {
            sm: "480px",
            md: "768px",
            lg: "976px",
            xl: "1440px",
        }
    },

    plugins: [require('@tailwindcss/forms')],
};
