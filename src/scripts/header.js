// Burger menu

const toggleMenu = document.getElementById('header-toggle-menu');
const closeButton = document.getElementById('header-close-btn');
const navMenu = document.getElementById('header-nav-menu');

toggleMenu.addEventListener('click', () => {
    navMenu.classList.add('mobile-menu')
    navMenu.classList.add('show-menu');
})

closeButton.addEventListener('click', () => {
    navMenu.classList.remove('show-menu');
})