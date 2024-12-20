document.addEventListener("DOMContentLoaded", function () {
  const deliveryOptions = document.querySelectorAll(
    ".delivery-pickup, .delivery-nova-poshta"
  );

  deliveryOptions.forEach((option) => {
    option.addEventListener("click", function () {
      deliveryOptions.forEach((opt) => opt.classList.remove("selected"));
      this.classList.add("selected");
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const deliveryOptions = document.querySelectorAll(
    ".payment-1, .payment-2, .payment-3, .payment-4"
  );

  deliveryOptions.forEach((option) => {
    option.addEventListener("click", function () {
      deliveryOptions.forEach((opt) => opt.classList.remove("selected"));
      this.classList.add("selected");
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  if (window.location.href.indexOf("?add-to-cart=") > -1) {
    const newURL = window.location.href.split("?add-to-cart=")[0];
    window.history.replaceState({}, document.title, newURL);
  }
});