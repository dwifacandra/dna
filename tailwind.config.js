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
            sans: ['Roboto', 'sans-serif'],
            mono: ['Roboto Mono', 'monospace'],
        },
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#E6130C',
                    50: '#FFF1F1',
                    100: '#FFE0DF',
                    200: '#FFC6C4',
                    300: '#FF9D9A',
                    400: '#FF6560',
                    500: '#FF362F',
                    600: '#E6130C',
                    700: '#CC0F09',
                    800: '#A9100B',
                    900: '#8B1511',
                    950: '#4C0503'
                },
                secondary: {
                    DEFAULT: '#292929',
                    50: '#F8F8F8',
                    100: '#F2F2F2',
                    200: '#DCDCDC',
                    300: '#BDBDBD',
                    400: '#989898',
                    500: '#7C7C7C',
                    600: '#656565',
                    700: '#525252',
                    800: '#464646',
                    900: '#3D3D3D',
                    950: '#292929'
                },
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
        require('tailwind-scrollbar-hide')
    ],
};
