// Hamburger Menu Toggle
const menuToggle = document.getElementById('mobile-menu');
const navLinks = document.getElementById('nav-links');

if (menuToggle && navLinks) {
    menuToggle.addEventListener('click', function () {
        navLinks.classList.toggle('active');
    });
}

// Language Dropdown (click-to-toggle)
const langToggle = document.getElementById('lang-toggle');
const langDropdown = document.getElementById('lang-dropdown');

if (langToggle && langDropdown) {
    langToggle.addEventListener('click', function () {
        langDropdown.classList.toggle('open');
    });

    document.addEventListener('click', function (e) {
        if (!langDropdown.contains(e.target)) {
            langDropdown.classList.remove('open');
        }
    });
}
