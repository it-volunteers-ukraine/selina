document.addEventListener("DOMContentLoaded", function() {

    function updateAboutClub() {
        const textElements = document.querySelectorAll(".text");
        const contentElements = document.querySelectorAll(".club-section__box");
        const imgElements = document.querySelectorAll(".club-img");

        textElements.forEach((textElement, index) => {
            const contentElement = contentElements[index];
            const imgElement = imgElements[index];

            if (window.innerWidth >= 1439) {
                const textHeight = textElement.offsetHeight;
                contentElement.style.height = textHeight + "px";
                imgElement.style.height = textHeight + "px";
            } else if (window.innerWidth >= 1024) {
                contentElement.style.height = "auto";
                imgElement.style.height = "630px";
            } else {
                contentElement.style.height = "auto";
                imgElement.style.height = "462px"; 
            }
           
        });
    }

    updateAboutClub(); 
    window.addEventListener("resize", updateAboutClub); 
});
