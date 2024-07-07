jQuery(document).ready(function ($) {
  const filter = window.document.getElementById("breeders-order");
  let orderby = "date";
  let order = "DESC";
  const filterChangeHandler = (e) => {
    const option = e.target;
    Array.from(filter.children).forEach((child) => {
      if (child.value !== option.value) {
        child.removeAttribute("selected");
      } else {
        child.setAttribute("selected", "");
      }
    });
    switch (option.value) {
      case "title-desc":
        orderby = "title";
        order = "DESC";
        break;
      case "title-asc":
        orderby = "title";
        order = "ASC";
        break;
      case "date-desc":
        orderby = "date";
        order = "DESC";
        break;
      case "date-asc":
        orderby = "date";
        order = "ASC";
        break;
      default:
        break;
    }
    loadBreeders(currentPage);
  };
  if (filter) {
    const filterChoice = new Choices(filter, {
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

    filter.addEventListener("change", filterChangeHandler);
  }
  // Завантаження постів
  function loadBreeders(page) {
    var data = {
      action: "load_breeders",
      nonce: getBreedersNonce(),
      width: viewportWidth,
      page,
      order,
      orderby,
    };

    $.ajax({
      url: myAjax.ajaxUrl,
      type: "post",
      data: data,
      //   beforeSend: showLoader,
      success: function (response) {
        // hideLoader();
        totalPages = response.totalPages;
        //   totalPageEl.html(totalPages);
        $(".breeders-catalogue-section__list").html(response.html);
        updatePaginationButtons();
      },
      error: function (xhr, status, error) {
        // hideLoader();
        console.error("Request failed: " + error);
      },
    });
  }

  // Отримання nonce
  function getBreedersNonce() {
    return myAjax.nonce;
  }

  // Оновлення кнопок пагінації
  function updatePaginationButtons() {
    //   var prevButton = $(".breeders-prev");
    //   var nextButton = $(".breeders-next");
    //   // Встановлення стану кнопки "Prev"
    //   prevButton.prop("disabled", currentPage === 1);
    //   // Встановлення стану кнопки "Next"
    //   nextButton.prop("disabled", currentPage === totalPages);
  }
  // Початок скрипту
  var viewportWidth = window.innerWidth || document.documentElement.clientWidth;
  // var currentPageEl = $(".current-page");
  // var totalPageEl = $(".total-pages");
  var currentPage = 1;
  var totalPages = 1;

  // Оновлення поточної сторінки
  function updateCurrentPage() {
    //   currentPageEl.html(currentPage);
  }

  // Обробник кліку на кнопку "Next"
  // $(".breeders-next").click(function () {
  //   currentPage++;
  //   if (currentPage > totalPages) {
  //     currentPage = totalPages;
  //   }
  //   loadBreeders(currentPage);
  //   updateCurrentPage();
  //   updatePaginationButtons();
  // });

  // Обробник кліку на кнопку "Prev"
  // $(".breeders-prev").click(function () {
  //   currentPage--;
  //   if (currentPage < 1) {
  //     currentPage = 1;
  //   }
  //   loadBreeders(currentPage);
  //   updateCurrentPage();
  //   updatePaginationButtons();
  // });

  $(".breeders-catalogue-section__list").swipe({
    swipeLeft: function (e) {
      // Обробка свайпу вліво
      if (currentPage < totalPages) {
        currentPage++;
        loadBreeders(currentPage);
        updateCurrentPage();
      }
    },
    swipeRight: function (e) {
      // Обробка свайпу вправо
      if (currentPage > 1) {
        currentPage--;
        loadBreeders(currentPage);
        updateCurrentPage();
      }
    },
    threshold: 75, // Мінімальна відстань, яка вважається свайпом
  });

  // Початкове завантаження постів
  loadBreeders(currentPage);
  updateCurrentPage();
});
