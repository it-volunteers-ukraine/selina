let scrollTopBtn = document.getElementById("to-top-btn");

scrollTopBtn.addEventListener('click', function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

function buttonDisplay() {
let scrollTop = window.scrollY || document.documentElement.scrollTop;
    if (scrollTop < 20) {
        scrollTopBtn.style.display = "none";
    } else {
        scrollTopBtn.style.display = "block";
    }
};
buttonDisplay();
window.addEventListener('scroll', buttonDisplay);

function buttonContainerClassToggle() {
    let footerHeight = document.querySelector('.footer').offsetHeight;
    let btnContainer = document.querySelector('.button-top-container');
    let windowHeight = window.innerHeight;
    let documentHeight = document.documentElement.scrollHeight;
    let scrollTop = window.scrollY || document.documentElement.scrollTop;
    let bottomDistance = documentHeight - (scrollTop + windowHeight);

    if (bottomDistance > footerHeight) {
        btnContainer.classList.add('button-container-fixed');
        btnContainer.classList.remove('button-container-absolute');
        btnContainer.style.bottom = '16px';
        
    } else {
        btnContainer.classList.add('button-container-absolute');
        btnContainer.classList.remove('button-container-fixed');
        btnContainer.style.bottom = (footerHeight + 16) + 'px';
    }
}
buttonContainerClassToggle();
window.addEventListener('scroll', buttonContainerClassToggle);
window.addEventListener('resize', buttonContainerClassToggle);
