document.addEventListener('DOMContentLoaded', function() {
  const container = document.querySelector('.button-paw-container');
  const button = container.querySelector('.form-contacts__form-button');

  container.addEventListener('click', function() {
      button.click();
  });
});

if (window.NodeList && !NodeList.prototype.forEach) {
  NodeList.prototype.forEach = function(callback, thisArg) {
      thisArg = thisArg || window;
      for (var i = 0; i < this.length; i++) {
          callback.call(thisArg, this[i], i, this);
      }
  };
}

// Click on button "Choose theme" => open/close Dropdown
document.querySelector('.dropdown__button').addEventListener('click', function(e) {
  e.preventDefault();
  document.querySelector('.dropdown__list').classList.toggle('dropdown__list--visible');
  this.classList.toggle('dropdown__button--active');
});

// Choose list-item. Memory list-item. Close dropdown
document.querySelectorAll('.dropdown__list-item').forEach(function(listItem) {
  listItem.addEventListener('click', function(e) {
      e.stopPropagation();
      const selectedText = this.innerText;
      const selectedValue = this.dataset.value;

      document.querySelector('.dropdown__button').innerText = selectedText;

      // Update the select input created by the shortcode
      document.getElementById('hidden-select').value = selectedValue;

      document.querySelector('.dropdown__list').classList.remove('dropdown__list--visible');
      document.querySelector('.dropdown__button').classList.remove('dropdown__button--active');
  });
});

// Click outside dropdown => to close dropdown
document.addEventListener('click', function(e) {
  if (!document.querySelector('.dropdown').contains(e.target)) {
      document.querySelector('.dropdown__list').classList.remove('dropdown__list--visible');
      document.querySelector('.dropdown__button').classList.remove('dropdown__button--active');
  }
});

// Press keys Tab or Esc => close Dropdown
document.addEventListener('keydown', function(e) {
  if (e.key === 'Tab' || e.key === 'Escape') {
      document.querySelector('.dropdown__list').classList.remove('dropdown__list--visible');
      document.querySelector('.dropdown__button').classList.remove('dropdown__button--active');
  }
});


// Disactive "Send" button, when checkbox is not checked
document.addEventListener('DOMContentLoaded', function() {
  const checkboxContainer = document.querySelector('.form-contacts__checkbox');
  const checkbox = checkboxContainer.querySelector('input[type="checkbox"]');
  const submitButton = document.querySelector('.form-contacts__form-button');
  const submitButtonContainer = document.querySelector('.button-paw-container');

  function toggleSubmitButton() {
      submitButton.disabled = !checkbox.checked;
      if (checkbox.checked) {
        submitButtonContainer.classList.remove('send-button-non-active');
        document.querySelector('.wpcf7-submit').classList.add('send-button-active');
    } else {
        submitButtonContainer.classList.add('send-button-non-active');
    }
    // console.log('Checkbox checked:', checkbox.checked);
  }

  toggleSubmitButton();

  checkbox.addEventListener('change', toggleSubmitButton);

// Pop-up information from WP for contact-form
  submitButton.addEventListener('click', function() {
    setTimeout(function() {
        var responseOutput = document.querySelector('.wpcf7-response-output');
        var popup = document.querySelector('.sent-form-pop-up-with-close');
        var popupText = popup.querySelector('.popup-text');
        if (responseOutput && responseOutput.textContent.trim() !== '') {
          popupText.textContent = responseOutput.textContent;
          popup.style.display = `flex`;
          // console.log('Блок містить текст:', responseOutput.textContent);
        } else {
            // console.log('Блок порожній');
        }
    }, 1500);

    var popup = document.querySelector('.sent-form-pop-up-with-close');
    const closeButton = document.querySelector('.popup-close');
    closeButton.addEventListener('click', function() {
    popup.style.display = 'none';
    });

  });
});

// Pop-up success for contact-form
document.addEventListener('DOMContentLoaded', function() {
  var form = document.querySelector('.wpcf7-form');
  var popUp = document.querySelector('.sent-form-pop-up-with-close');
  var closeBtn = document.querySelector('.popup-close');
  var popupText = document.querySelector('.popup-text');
  var popupThanks = document.querySelector('.popup-thanks');
  var observer = new MutationObserver(function(mutations) {
      mutations.forEach(function(mutation) {
          if (mutation.attributeName === 'class') {
              if (form.classList.contains('sent')) {
                  var language = document.documentElement.lang;
                  if (language === 'en-GB') {
                      popupThanks.textContent = 'Thank you!';
                      popupText.textContent = 'We have received your message';
                  } else {
                      popupThanks.textContent = 'Дякуємо!';
                      popupText.textContent = 'Ми отримали Ваше повідомлення';
                  }
                popUp.style.display = 'block';

                closeBtn.addEventListener('click', function() {
                    popUp.style.display = 'none';
                    location.reload();
                });
              }
          }
      });
  });
  
  var config = {
      attributes: true
  };
  
  observer.observe(form, config);
});