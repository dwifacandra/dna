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
            base: '0.875rem',
            xl: '1rem',
            '2xl': '1.25rem',
            '3xl': '1.5rem',
            '4xl': '1.875rem',
            '5xl': '2.25rem',
        }
    }
}
