let showWholeTipTextButton = document.getElementById('showWholeTipTextButton');
let textContent = document.querySelector('.single-tip__text-content');

showWholeTipTextButton.addEventListener('click', function() {
    textContent.style.webkitLineClamp = 'unset';
    this.blur(); 
})
