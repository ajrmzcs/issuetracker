const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],

    safelist: [
        'text-amber-800',
        'text-red-800',
        'text-purple-800',
        'text-blue-800',
        'text-green-800',
        'bg-amber-800',
        'bg-red-800',
        'bg-purple-800',
        'bg-blue-800',
        'bg-green-800',
    ]
};
