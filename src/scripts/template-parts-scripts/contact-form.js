
document.addEventListener('DOMContentLoaded', function() {
    const container = document.querySelector('.button-paw-container');
    const button = container.querySelector('.form-contacts__form-button');
  
    container.addEventListener('click', function() {
      button.click();
    });
  });



  if (window.NodeList && !NodeList.prototype.forEach) {
    NodeList.prototype.forEach = function (callback, thisArg) {
      thisArg = thisArg || window;
      for (var i = 0; i < this.length; i++) {
        callback.call(thisArg, this[i], i, this);
      }
    };
  }
  

 // Click on button "Choose theme" => open/close Dropdown
document.querySelector('.dropdown__button').addEventListener('click', function (e) {
  e.preventDefault(); // Запобігає спрацюванню події за замовчуванням
  document.querySelector('.dropdown__list').classList.toggle('dropdown__list--visible');
  this.classList.toggle('dropdown__button--active'); // Додає/видаляє клас для зміни стилів
});

// Choose list-item. Memory list-item. Close dropdown
document.querySelectorAll('.dropdown__list-item').forEach(function (listItem) {
  listItem.addEventListener('click', function (e) {
    e.stopPropagation();
    document.querySelector('.dropdown__button').innerText = this.innerText;
    document.querySelector('.dropdown__input-hidden').value = this.dataset.value;
    document.querySelector('.dropdown__list').classList.remove('dropdown__list--visible');
    document.querySelector('.dropdown__button').classList.remove('dropdown__button--active');
  });
});

// Click outside dropdown => to close dropdown
document.addEventListener('click', function (e) {
  if (!document.querySelector('.dropdown').contains(e.target)) {
    document.querySelector('.dropdown__list').classList.remove('dropdown__list--visible');
    document.querySelector('.dropdown__button').classList.remove('dropdown__button--active'); 
  }
});

// Press keys Tab or Esc => close Dropdown
document.addEventListener('keydown', function (e) {
  if (e.key === 'Tab' || e.key === 'Escape') {
    document.querySelector('.dropdown__list').classList.remove('dropdown__list--visible');
    document.querySelector('.dropdown__button').classList.remove('dropdown__button--active');
  }
});
