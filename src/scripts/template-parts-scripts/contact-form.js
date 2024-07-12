
document.addEventListener('DOMContentLoaded', function() {
    const container = document.querySelector('.button-paw-container');
    const button = container.querySelector('.form-contacts__form-button');
  
    container.addEventListener('click', function() {
      button.click();
    });
  });