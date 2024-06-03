// Burger menu

const navMenu = document.getElementById('header-nav-menu');
const burgerBtn = document.getElementById('header-menu-btn')
const headerTopMobile = document.getElementById('header-mobile');


burgerBtn.addEventListener('click', () => {
    burgerBtn.classList.toggle('open');
    navMenu.classList.toggle('mobile-menu');
    navMenu.classList.toggle('show-menu');
    headerTopMobile.classList.toggle('header-mobile');
})


// for polylang
function redirectToPage(url) {
    window.location.href = url;
}


