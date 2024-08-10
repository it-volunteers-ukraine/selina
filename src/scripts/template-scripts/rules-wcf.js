document.addEventListener("DOMContentLoaded", function() {
    
    function updateLayout() {
        const textElement = document.querySelector(".about_wcf-section__lower-card");
        const img = document.querySelector(".about_wcf-section__upper-card-img");
        const contentElement = document.querySelector(".about_wcf-section__content");

        if (textElement && img && contentElement) {
            if (window.innerWidth >= 1439) {
                const textHeight = textElement.offsetHeight;
                contentElement.style.height = textHeight + "px";
                img.style.height = textHeight + "px";
            } else {
                contentElement.style.height = "auto"; 
                img.style.height = "462px"; 
            }
        } else {
            console.warn("No elements are found.");
        }
    }

    updateLayout(); 
    window.addEventListener("resize", updateLayout); 
});
