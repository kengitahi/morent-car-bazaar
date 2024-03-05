import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',

        // From Wire UI
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/View/**/*.php",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/resources/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': {
                    100: '#D6E4FD',
                    200: '#AEC8FC',
                    300: '#85A8F8',
                    400: '#658DF1',
                    500: '#3563E9',
                    600: '#264BC8',
                    700: '#1A37A7',
                    800: '#102587',
                    900: '#0A196F',
                },
                'secondary': {
                    100: '#E0E9F4',
                    200: '#C3D4E9',
                    300: '#90A3BF',
                    400: '#596780',
                    500: '#1A202C',
                    600: '#131825',
                    700: '#0D121F',
                    800: '#080C19',
                    900: '#040815',
                },
            },
        },
    },

    presets: [
        require("./vendor/wireui/wireui/tailwind.config.js")
    ],

    plugins: [forms],
};
