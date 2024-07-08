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
        if (bottomDistance <= 200) {
            scrollTopBtn.style.bottom = '307px';
        } else {
            scrollTopBtn.style.bottom = '16px';
        }
    } else if (window.innerWidth <= 1439) {
        if (bottomDistance <= 300) {
            scrollTopBtn.style.bottom = '401px';
        } else {
            scrollTopBtn.style.bottom = '16px';
        }
    } else {
        if (bottomDistance <= 350) {
            scrollTopBtn.style.bottom = '430px';
        } else {
            scrollTopBtn.style.bottom = '16px';
        }
    }
}

scrollTopBtn.addEventListener('click', function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});
