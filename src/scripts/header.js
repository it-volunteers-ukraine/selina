// Burger menu

const navMenu = document.getElementById('header-nav-menu');
const burgerBtn = document.getElementById('header-menu-btn')
const headerTopMobile = document.getElementById('header-mobile');

// dropdowns
const headerList = document.querySelector('.header__list');
const itemsList = headerList.querySelectorAll('.menu-item');

// submenu - mobile
const headerListMobile = document.querySelector('.header__list-mobile');
const itemsListMobile = headerListMobile.querySelectorAll('.menu-item');


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


itemsList.forEach(item => {
    item.addEventListener('click', (event) => {
        const subMenu = item.querySelector('.sub-menu');
        if (subMenu) {
            subMenu.classList.toggle('active-sub_menu');
        }
    })
})


itemsListMobile.forEach(item => {
    item.addEventListener('click', (event) => {
        const subMenu = item.querySelector('.sub-menu');
        if (subMenu) {
            subMenu.classList.toggle('active-sub_menu-mobile');
        }
    })
})