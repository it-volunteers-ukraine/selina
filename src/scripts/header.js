console.log("header part");


// Burger menu

const toggleMenu = document.getElementById('header-toggle-menu');

const closeButton = document.getElementById('header-close-btn');

const navMenu = document.getElementById('header-nav-menu');


toggleMenu.addEventListener('click', () => {


    navMenu.classList.add('mobile-menu')
    navMenu.classList.add('show-menu');

})


function removeMobileMenuClass() {
    if (window.innerWidth >= 768) {
        navMenu.classList.remove('mobile-menu');
    }
}

window.addEventListener('DOMContentLoaded', removeMobileMenuClass);
window.addEventListener('resize', removeMobileMenuClass);


closeButton.addEventListener('click', () => {
    navMenu.classList.remove('show-menu');
})