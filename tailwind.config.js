import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
                Roboto: ['Roboto', ...defaultTheme.fontFamily.sans],
                Rubik: ['Rubik', ...defaultTheme.fontFamily.sans],
                Montserrat: ['Montserrat', ...defaultTheme.fontFamily.sans],
                Nunito: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            container: {
                center: true,
                screens: {
                    lg: '1200px',
                  },
            },
            colors: {
                primary : 'var(--primary)',
                primaryHover : 'var(--primary-hover)',
                primaryLight : 'var(--primary-light)',
                primaryText : 'var(--primary-text)',
                success : 'var(--success)',
                danger : 'var(--danger)',
                warning : 'var(--warning)',
            }
        },
    },

    plugins: [forms,  require('flowbite/plugin')],
};
