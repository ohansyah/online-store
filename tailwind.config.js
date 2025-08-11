import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        typography,
        function ({ addUtilities }) {
            addUtilities({
                '.no-scrollbar': {
                    /* For WebKit-based browsers (Chrome, Safari) */
                    '&::-webkit-scrollbar': {
                        display: 'none',
                    },
                    /* For IE and Edge */
                    '-ms-overflow-style': 'none',
                    /* For Firefox */
                    'scrollbar-width': 'none',
                },
            });
        },],

    darkMode: 'class', // This specifies that Tailwind should look at Class elements to determine dark mode
};
