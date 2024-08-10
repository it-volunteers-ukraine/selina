document.addEventListener("DOMContentLoaded", function() {
    const showMoreButton = document.getElementById('showMoreCalendarsButton');
    const hiddenCards = document.querySelectorAll('.calendar__calendar-card--hidden');
    let itemsToShow = 2;
    let currentIndex = 0;

    function showMoreItems() {
        for (let i = currentIndex; i < currentIndex + itemsToShow && i < hiddenCards.length; i++) {
            hiddenCards[i].style.display = 'block';
        }
        currentIndex += itemsToShow;
    }

    showMoreButton.addEventListener('click', function() {
        showMoreItems();
        this.blur(); 
    });
});

