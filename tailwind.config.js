import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './node_modules/preline/dist/*.js',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    safelist: [
        { pattern: /^bg-/, },
        { pattern: /^text-/, }
    ],
    theme: {
        fontFamily: {
            sans: ['Graphik', 'sans-serif'],
            serif: ['Merriweather', 'serif'],
        },
        extend: {
            colors: {
                primary: '#1e293b',
                secondary: '#262626',
                info: '#1e40af',
                success: '#047857',
                warning: '#ea580c',
                danger: '#b91c1c',
            },
            borderRadius: {
                'sm': '0.125rem',
                'md': '0.375rem',
                'lg': '0.5rem',
                'xl': '1rem',
                '2xl': '1.5rem',
                '3xl': '1.75rem',
                '4xl': '2rem',
            }
        }
    },
    plugins: [
        require('tailwindcss-animated'),
        require('preline/plugin'),
    ],
};
