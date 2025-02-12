import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/D:\Servers\dna\app\Core/**/*.php',
        './resources/views/filament/d:\-servers\dna\app\-core/**/*.blade.php',
        "./vendor/outerweb/filament-image-library/resources/views/**/*.blade.php",
        './vendor/filament/**/*.blade.php',
    ],
    theme: {
        fontSize: {
            xs: '0.68rem',
            sm: '0.75rem',
            base: '1rem',
            lg: '1.25rem',
            'xl': '1.5rem',
            '2xl': '1.75rem',
            '3xl': '2rem',
            '4xl': '2.25rem',
            '5xl': '2.5rem',
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
            }
        }
    }
}
