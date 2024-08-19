document.addEventListener("DOMContentLoaded", function() {
    // Calendars section
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

    // Tips for beginners section
    const showMoreTipsCardsButton = document.getElementById('showMoreTipsCardsButton');
    const hiddenTipsCards = document.querySelectorAll('.beginners-tips__tips-card--hidden');
    let cardsTipsToShow = 2;
    let currentCardsTipsIndex = 0;

    function showMoreCardsTips() {
        for (let i = currentCardsTipsIndex; i < currentCardsTipsIndex + cardsTipsToShow && i < hiddenTipsCards.length; i++) {
            hiddenTipsCards[i].style.display = 'block';
        }
        currentCardsTipsIndex += cardsTipsToShow;
    }

    showMoreTipsCardsButton.addEventListener('click', function() {
        showMoreCardsTips();
        document.querySelectorAll('.beginners-tips__card:nth-child(n+9)').forEach(card => {
            card.style.display = 'flex';
          });
        this.blur(); 
    });
});

//  Slider
let swiper = new Swiper(".mySwiper", {
    loop: true,
    pagination: {
      el: ".slider-pagination",
      type: "fraction",
    },
    navigation: {
      nextEl: ".slider-button-next",
      prevEl: ".slider-button-prev",
    },
  });

//  Awards - gallery
document.getElementById('showMoreAwardsButton').addEventListener('click', function() {
  let hiddenItems = document.querySelectorAll('.awards__gallery-photo.awards__hidden');
  hiddenItems.forEach(function(item) {
      item.classList.remove('awards__hidden');
  });
  this.blur();
});