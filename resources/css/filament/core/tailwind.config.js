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
            xs: '0.5rem',
            sm: '0.75rem',
            base: '1rem',
            lg: '1.25rem',
            'xl': '1.5rem',
            '2xl': '1.75rem',
            '3xl': '2rem',
            '4xl': '2.25rem',
            '5xl': '2.5rem',
        }
    }
}
