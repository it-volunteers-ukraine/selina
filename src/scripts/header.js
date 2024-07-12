// Burger menu

const navMenu = document.getElementById('header-nav-menu');
const burgerBtn = document.getElementById('header-menu-btn')
const headerTopMobile = document.getElementById('header-mobile');


// submenu - mobile
const headerListMobile = document.querySelector('.header__list-mobile');
const itemsListMobile = headerListMobile.querySelectorAll('.menu-item');


// dropdowns
const headerSubmenus = document.querySelectorAll('header .sub-menu');
const headerMenuList = document.querySelectorAll('header .header__list .menu-item');


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


// remove global class ul.sub-menu
headerSubmenus.forEach(innerMenu => {
    innerMenu.classList.remove('sub-menu');
    innerMenu.classList.add('header-sub-menu');
})

// remove global class li.menu-item
headerMenuList.forEach(menuItem => {
    menuItem.classList.remove('menu-item');
    menuItem.classList.add('header-menu-item');
})


headerMenuList.forEach(item => {
    item.addEventListener('click', () => {
        const subMenu = item.querySelector('.header-sub-menu');

        if (subMenu) {
            subMenu.classList.toggle('active-sub_menu');
        }
    })
})


itemsListMobile.forEach(item => {
    item.addEventListener('click', () => {
        const subMenu = item.querySelector('.sub-menu');
        if (subMenu) {
            subMenu.classList.toggle('active-sub_menu-mobile');
        }
    })
})