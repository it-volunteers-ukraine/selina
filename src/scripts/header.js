// Burger menu

const navMenu = document.getElementById('header-nav-menu');
const burgerBtn = document.getElementById('header-menu-btn')
const headerTopMobile = document.getElementById('header-mobile');
const searchMobile = document.getElementById('search-mobile');


// submenu - mobile
const headerListMobile = document.querySelector('.header__list-mobile');
const itemsListMobile = headerListMobile.querySelectorAll('.menu-item');


// dropdowns
const headerList = document.querySelector('.header__list');
const itemsList = headerList.querySelectorAll('.menu-item');


burgerBtn.addEventListener('click', () => {
    burgerBtn.classList.toggle('open');
    navMenu.classList.toggle('mobile-menu');
    navMenu.classList.toggle('show-menu');
    searchMobile.classList.toggle('show-search');
    headerTopMobile.classList.toggle('header-mobile');
})


// for polylang
function redirectToPage(url) {
    window.location.href = url;
}


//close dropdown by click background
document.addEventListener('DOMContentLoaded', function () {
    window.addEventListener('click', function () {

        const otherDropdowns = document.querySelectorAll('.sub-menu.active-sub_menu');

        otherDropdowns.forEach(function (dropdown) {
            dropdown.classList.remove('active-sub_menu');
        });
    });
});


const bottomNavContainer = document.getElementById('bottom-nav-container');

bottomNavContainer.addEventListener('click', function (event) {
    event.stopPropagation();
});


itemsList.forEach(item => {
    item.addEventListener('click', () => {
        const activeDropdown = item.querySelector('.sub-menu');
        // Close other opened dropdowns
        const otherDropdowns = document.querySelectorAll('.sub-menu.active-sub_menu');
        otherDropdowns.forEach(dropdown => {
            if (dropdown !== activeDropdown) {
                dropdown.classList.remove('active-sub_menu');
            }
        });

        // Toggle the clicked dropdown
        if (activeDropdown) {
            activeDropdown.classList.toggle('active-sub_menu');
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