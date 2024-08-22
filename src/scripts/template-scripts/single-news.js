document.addEventListener('DOMContentLoaded', function() {
    const loadMoreButton = document.getElementById('load-more');
    let visibleImagesCount = 6;

    loadMoreButton.addEventListener('click', function() {
        const hiddenImages = document.querySelectorAll('.gallery-item.visually-hidden');
        
        for (let i = 0; i < 6 && i < hiddenImages.length; i++) {
            hiddenImages[i].classList.remove('visually-hidden');
        }

        visibleImagesCount += 6;
        
    });
});