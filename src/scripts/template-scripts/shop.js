jQuery(function ($) {
  $(".filter-button").on("click", function () {
    var category = $(this).data("category");

    $.ajax({
      url: myAjax.ajaxUrl, // WordPress global AJAX URL
      type: "POST",
      data: {
        action: "my_filter", // This will trigger your PHP function
        category: category, // Pass selected category
      },
      success: function (response) {
        $(".shop-grid__products ul").html(response); // Update product grid/
      },
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const buttons = document.querySelectorAll(".filter-button");

  buttons.forEach((button) => {
    const category = button.dataset.category;
    button.classList.remove("active");
    const pathMatch = window.location.pathname.includes(category);

    if (pathMatch) {
      button.classList.add("active");
    }

    button.addEventListener("click", function (e) {
      // Remove 'active' class and hide the icon from all buttons
      buttons.forEach((btn) => {
        btn.classList.remove("active");
        btn.querySelector(".button-icon").style.display = "none"; // Hide the SVG icon
      });

      // Add 'active' class and show the icon for the clicked button
      this.classList.add("active");
      this.querySelector(".button-icon").style.display = "inline-block"; // Show the SVG icon
    });
  });
});

const selector = document.querySelector(".orderby");

if (selector) {
  const filterChoice = new Choices(selector, {
    searchEnabled: false,
    allowHTML: false,
    shouldSort: false,
    position: "bottom",
    itemSelectText: "",
    classNames: {
      containerOuter: "choices",
      containerInner: "choices__inner",
      input: "choices__input",
      inputCloned: "choices__input--cloned",
      list: "choices__list",
      listItems: "choices__list--multiple",
      listSingle: "choices__list--single",
      listDropdown: "choices__list--dropdown",
      item: "choices__item",
      itemSelectable: "choices__item--selectable",
      itemDisabled: "choices__item--disabled",
      itemChoice: "choices__item--choice",
      placeholder: "choices__placeholder",
      group: "choices__group",
      groupHeading: "choices__heading",
      button: "choices__button",
      activeState: "is-active",
      focusState: "is-focused",
      openState: "is-open",
      disabledState: "is-disabled",
      highlightedState: "is-highlighted",
      selectedState: "is-selected",
      flippedState: "is-flipped",
      loadingState: "is-loading",
      noResults: "has-no-results",
      noChoices: "has-no-choices",
    },
  });
}
document.addEventListener("DOMContentLoaded", function () {
  if (window.location.href.indexOf("?add-to-cart=") > -1) {
    const newURL = window.location.href.split("?add-to-cart=")[0];
    window.history.replaceState({}, document.title, newURL);
  }
});
