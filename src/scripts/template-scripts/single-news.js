document.addEventListener("DOMContentLoaded", function () {
  // Ініціалізація Masonry
  let grid = document.querySelector('.gallery');
  let msnry = new Masonry(grid, {
    itemSelector: '.gallery-item',
    columnWidth: '.gallery-item', // Встановлення ширини колонки на основі елемента галереї
    gutter: 10, // Відстань між елементами
    percentPosition: true // Використання процентів замість пікселів для позиціювання
  });

  let images = galleryData.images; // Дані передані з PHP
  let visibleImagesCount = 6; // Кількість зображень, що показуються на початку

  // Функція для відображення зображень
  function displayImages() {
    let startIndex = document.querySelectorAll('.gallery-item').length;
    let endIndex = startIndex + visibleImagesCount;
    let html = '';

    for (let i = startIndex; i < endIndex && i < images.length; i++) {
      html += '<div class="gallery-item">';
      html += '<a href="' + images[i].url + '" data-fancybox="gallery">';
      html += '<img src="' + images[i].sizes.medium + '" alt="' + images[i].alt + '" />';
      html += '</a>';
      html += '</div>';
    }

    // Додаємо нові елементи в DOM
    let tempDiv = document.createElement('div');
    tempDiv.innerHTML = html;
    let items = Array.from(tempDiv.childNodes);

    grid.append(...items); // Додаємо нові елементи до контейнери галереї

    msnry.appended(items); // Оновлення Masonry з новими елементами
    msnry.layout(); // Повторна розкладка елементів

    // Збільшити кількість видимих зображень
    visibleImagesCount += endIndex - startIndex;
  }

  // Обробка кліку по кнопці для завантаження нових зображень
  document.getElementById('load-more').addEventListener('click', function () {
    displayImages();
  });

  // Ініціалізація - показати початкові зображення
  displayImages(); 
  
});

