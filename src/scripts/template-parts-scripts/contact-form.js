if (window.NodeList && !NodeList.prototype.forEach) {
  NodeList.prototype.forEach = function (callback, thisArg) {
    thisArg = thisArg || window;
    for (var i = 0; i < this.length; i++) {
      callback.call(thisArg, this[i], i, this);
    }
  };
}


// Click on button "Choose theme" => open/close Dropdown
document.querySelector('.dropdown__button').addEventListener('click', function () {
  document.querySelector('.dropdown__list').classList.toggle('dropdown__list--visible');
})

// Choose list-item. Memory list-item. Close dropdown
document.querySelectorAll('.dropdown__list-item').forEach(function (listItem) {
  listItem.addEventListener('click', function (e) {
    e.stopPropagation();
    document.querySelector('.dropdown__button').innerText = this.innerText;
    document.querySelector('.dropdown__input-hidden').value = this.dataset.value;
    document.querySelector('.dropdown__list').classList.remove('dropdown__list--visible');
  })
})

// Click outside dropdown => to close dropdown
document.addEventListener('click', function (e) {
  if (e.target !== document.querySelector('.dropdown__button')) {
    document.querySelector('.dropdown__list').classList.remove('dropdown__list--visible');
  }
})

// Press keys Tab or Esc => close Dropdown
document.addEventListener('keydown', function (e) {
  if (e.key === 'Tab' || e.key === 'Escape') {
    document.querySelector('.dropdown__list').classList.remove('dropdown__list--visible');
  }
})