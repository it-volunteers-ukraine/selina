// Scroll to TOP
document.addEventListener('DOMContentLoaded', function() {
    let scrollTopBtn = document.getElementById("to-top-btn");
    const btnContainer = document.querySelector('.up_btn-container');

    function scrollFunction() {
        let windowHeight = window.innerHeight;
        let documentHeight = document.documentElement.scrollHeight;
        let scrollTop = window.scrollY || document.documentElement.scrollTop;
        let bottomDistance = documentHeight - (scrollTop + windowHeight);
        // console.log(bottomDistance);

        if (scrollTop < 20) {
            scrollTopBtn.style.display = "none";
        } else {
            scrollTopBtn.style.display = "block";
        }

        if (window.innerWidth <= 767) {
            if (bottomDistance <= 292) {
                btnContainer.classList.add('static-container');
                btnContainer.classList.remove('moving-container');
                scrollTopBtn.classList.add('static-button');
                scrollTopBtn.classList.remove('moving-button');
                const buttonPosition = 48;
                scrollTopBtn.style.bottom = `${buttonPosition}px`;
            } else {
                btnContainer.classList.remove('static-container');
                btnContainer.classList.add('moving-container');
                scrollTopBtn.classList.remove('static-button');
                scrollTopBtn.classList.add('moving-button');
                
                scrollTopBtn.style.bottom = '16px';
            }
        } else if (window.innerWidth >= 768 && window.innerWidth <= 1438) {
            if (bottomDistance <= 401) {
                btnContainer.classList.add('static-container');
                btnContainer.classList.remove('moving-container');
                scrollTopBtn.classList.add('static-button');
                scrollTopBtn.classList.remove('moving-button');
                const buttonPosition = 36;
                scrollTopBtn.style.bottom = `${buttonPosition}px`;
            } else {
                btnContainer.classList.remove('static-container');
                btnContainer.classList.add('moving-container');
                scrollTopBtn.classList.remove('static-button');
                scrollTopBtn.classList.add('moving-button');

                scrollTopBtn.style.bottom = '16px';
            }
        } else {
            if (bottomDistance <= 433 && window.innerWidth >= 1439) {
                btnContainer.classList.add('static-container');
                btnContainer.classList.remove('moving-container');
                scrollTopBtn.classList.add('static-button');
                scrollTopBtn.classList.remove('moving-button');
                const buttonPosition = 38;
                scrollTopBtn.style.bottom = `${buttonPosition}px`;
            } else {
                btnContainer.classList.remove('static-container');
                btnContainer.classList.add('moving-container');
                scrollTopBtn.classList.remove('static-button');
                scrollTopBtn.classList.add('moving-button');

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
