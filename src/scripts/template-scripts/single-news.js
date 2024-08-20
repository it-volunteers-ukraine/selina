jQuery(document).ready(function ($) {
  const gallery = $('#container-masonry').masonry({
        columnWidth: 220, // Ширина колонки
        itemSelector: '.gallery-item', // Елемент, який Masonry буде обробляти
        gutter: 24, // Відстань між елементами
        percentPosition: true // Використання процентного позиціювання
  });
  
  const loadMoreBtn = $('#load-more'); // Кнопка для завантаження
  const images = galleryData.images; // Отримуємо масив зображень з PHP
  const initialItems = 6; // Кількість елементів, що показуються спочатку
  let currentIndex = initialItems; // Відстежуємо, скільки елементів показано

  // Функція для додавання нових зображень у галерею
  function displayImages(startIndex, endIndex) {
    let html = '';

    for (let i = startIndex; i < endIndex && i < images.length; i++) {
        html += '<li class="gallery-item">';
        html += '<a href="' + images[i].url + '" data-fancybox="gallery">';
        html += '<img src="' + images[i].sizes.thumbnail + '" alt="' + images[i].alt + '" />';
        html += '</a>';
        if (images[i].caption) {
          html += '<p>' + images[i].caption + '</p>';
        }
        html += '</li>';
    }

    // Додаємо нові елементи в DOM
    let $items = $(html);

    // Додаємо нові елементи до галереї і оновлюємо Masonry
    gallery.append($items).masonry('appended', $items);

    // Переконуємося, що зображення завантажилися перед оновленням layout
    $items.imagesLoaded().progress(function () {
      gallery.masonry('layout');
      });
  }

  // Ініціалізація - показуємо початкові зображення
  displayImages(0, initialItems);

  // Обробка кліку на кнопку "Показати більше"
  loadMoreBtn.on('click', function () {
    const nextIndex = currentIndex + initialItems;
    displayImages(currentIndex, nextIndex);
    currentIndex = nextIndex;

    // Якщо більше немає зображень, ховаємо кнопку
    if (currentIndex >= images.length) {
      loadMoreBtn.hide();
      }
  });
});
