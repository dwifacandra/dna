import './bootstrap';
import 'preline';
import Typed from 'typed.js';

document.addEventListener('livewire:navigated', () => {
    window.HSStaticMethods.autoInit();
});

document.addEventListener('locale-changed', function (event) {
    const locale = event.detail.locale;
    location.reload();
});

function typingEffect() {
    return {
        startTyping() {
            new Typed('.typing', {
                strings: messages,
                typeSpeed: 100,
                backSpeed: 60,
                loop: true
            });
        }
    }
}
window.typingEffect = typingEffect;

document.addEventListener('DOMContentLoaded', function () {
    const darkModeButton = document.querySelector('[data-hs-theme-click-value="dark"]');
    const lightModeButton = document.querySelector('[data-hs-theme-click-value="light"]');
    const currentTheme = localStorage.getItem('theme') || 'light';
    document.body.classList.toggle('dark', currentTheme === 'dark');
    function setTheme(theme) {
        document.body.classList.toggle('dark', theme === 'dark');
        localStorage.setItem('theme', theme);
    }
    darkModeButton.addEventListener('click', function () {
        setTheme('dark');
    });
    lightModeButton.addEventListener('click', function () {
        setTheme('light');
    });
});

// Google Tag Manager
(function (w, d, s, l, i) {
    w[l] = w[l] || []; w[l].push({
        'gtm.start':
            new Date().getTime(), event: 'gtm.js'
    }); var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
})(window, document, 'script', 'dataLayer', 'GTM-MB3VJX5L');
