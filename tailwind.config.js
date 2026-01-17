import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    safelist: [
        'lg:ml-64',
        '-translate-x-full',
        'translate-x-0',
        'z-40',
        'z-50',
        'bg-opacity-50',
        'transition-all',
        'duration-300',
        'fixed',
        'inset-0',
        'w-64',
        'lg:hidden',
        'transform'
    ],

    plugins: [forms],
};
