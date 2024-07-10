// Scroll to TOP
let scrollTopBtn = document.getElementById("to-top-btn");

window.onscroll = function() {
    scrollFunction();
};

function scrollFunction() {
    let windowHeight = window.innerHeight;
    let documentHeight = document.documentElement.scrollHeight;
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    let bottomDistance = documentHeight - (scrollTop + windowHeight);

    if (scrollTop > 20) {
        scrollTopBtn.style.display = "block";
    } else {
        scrollTopBtn.style.display = "none";
    }

    if (window.innerWidth <= 767) {
        if (bottomDistance <= 291) {
            scrollTopBtn.style.bottom = `${291-bottomDistance + 16}px`;
        } else {
            scrollTopBtn.style.bottom = '16px';
        }
    } else if (window.innerWidth <= 1439) {
        if (bottomDistance <= 401) {
            scrollTopBtn.style.bottom = `${401-bottomDistance + 16}px`;
        } else {
            scrollTopBtn.style.bottom = '16px';
        }
    } else {
        if (bottomDistance <= 430) {
            scrollTopBtn.style.bottom = `${430-bottomDistance + 16}px`;
        } else {
            scrollTopBtn.style.bottom = '16px';
        }
    }
}

scrollTopBtn.addEventListener('click', function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});
