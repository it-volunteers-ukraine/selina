// Scroll to TOP
document.addEventListener('DOMContentLoaded', function() {
    let scrollTopBtn = document.getElementById("to-top-btn");

    function scrollFunction() {
        let windowHeight = window.innerHeight;
        let documentHeight = document.documentElement.scrollHeight;
        let scrollTop = window.scrollY || document.documentElement.scrollTop;
        let bottomDistance = documentHeight - (scrollTop + windowHeight);
        console.log(bottomDistance);

        if (scrollTop < 20) {
            scrollTopBtn.style.display = "none";
        } else {
            scrollTopBtn.style.display = "block";
        }

        if (window.innerWidth <= 767) {
            if (bottomDistance <= 292) {
                scrollTopBtn.style.bottom = `${292-bottomDistance + 16}px`;
            } else {
                scrollTopBtn.style.bottom = '16px';
            }
        } else if (window.innerWidth >= 768 && window.innerWidth < 850) {
            if (bottomDistance <= 401) {
                scrollTopBtn.style.bottom = `${401-bottomDistance + 16}px`;
            } else {
                scrollTopBtn.style.bottom = '16px';
            }
        } else if ( window.innerWidth >= 850 && window.innerWidth <= 1438) {
            if (bottomDistance <= 359) {
                scrollTopBtn.style.bottom = `${359-bottomDistance + 16}px`;
            } else {
                scrollTopBtn.style.bottom = '16px';
            }
        }
        else {
            if (bottomDistance <= 433 && window.innerWidth >= 1439) {
                scrollTopBtn.style.bottom = `${433-bottomDistance + 16}px`;
            } else {
                scrollTopBtn.style.bottom = '16px';
            }
        }
    }

    scrollFunction();

    window.onscroll = function() {
        scrollFunction();
    };

    scrollTopBtn.addEventListener('click', function() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});
