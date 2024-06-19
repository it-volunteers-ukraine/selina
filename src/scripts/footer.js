console.log("footer part");

// Scroll to TOP

let scrollTopBtn = document.getElementById("myBtn");

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

    if (bottomDistance <= 373) {
        scrollTopBtn.style.bottom = '373px';
    } else {
        scrollTopBtn.style.bottom = '50px';
    }
}

scrollTopBtn.addEventListener('click', function() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});