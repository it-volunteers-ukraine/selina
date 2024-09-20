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

    filter?.addEventListener("change", filterChangeHandler);
  }
  // Завантаження постів
  let initialLoadDone = false;
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
        perPage = response.postsPerPage;
        currentPage = page;
        if (totalPages > 1) {
          paginationBlock.classList.remove("visually-hidden");
        }
        pagNumbersEl.html("");
        //   totalPageEl.html(totalPages);
        $(".breeders-catalogue-section__list").html(response.html);
        updatePaginationButtons();
        updateCurrentPage();

        if (initialLoadDone) {
          document
            .getElementById("breeders-catalogue")
            ?.scrollIntoView({ behavior: "smooth", block: "start" });
        } else {
          initialLoadDone = true;
        }
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
    const prevButton = $(".breeders-prev");
    const nextButton = $(".breeders-next");
    // Встановлення стану кнопки "Prev"
    prevButton.prop("disabled", currentPage === 1);
    // Встановлення стану кнопки "Next"
    nextButton.prop("disabled", currentPage === totalPages);
  }
  // Початок скрипту
  const viewportWidth =
    window.innerWidth || document.documentElement.clientWidth;
  const paginationBlock = document?.querySelector(
    ".breeders-catalogue-section__pagination"
  );
  // const currentPageEl = $(".current-page");
  const pagNumbersEl = $(".breeders-catalogue-section__pagination-numbers");
  // const totalPageEl = $(".total-pages");
  let currentPage = 1;
  let totalPages = 1;
  let perPage = 1;

  // Оновлення поточної сторінки
  function updateCurrentPage() {
    const prevBtn = document?.querySelector(".breeders-prev");
    const nextBtn = document?.querySelector(".breeders-next");
    prevBtn.removeAttribute("disabled");
    nextBtn.removeAttribute("disabled");
    const maxButtons = totalPages >= 3 ? 3 : totalPages;
    const startNum =
      totalPages >= maxButtons && currentPage > 2
        ? currentPage - 2
        : currentPage > 1
        ? currentPage - 1
        : currentPage;
    const buttons = [];
    for (let i = startNum; i <= startNum + maxButtons - 1; i++) {
      const buttonEl = document.createElement("button");
      buttonEl.classList.add(
        "breeders-catalogue-section__pagination-button",
        "btn_icon"
      );
      buttonEl.innerText = i;
      if (i === currentPage) {
        buttonEl.classList.add("is-active");
        buttonEl.setAttribute("disabled", true);
      }
      buttons.push(buttonEl);
      buttonEl?.addEventListener("click", () => {
        loadBreeders(i);
      });
    }
    if (currentPage === 1) {
      prevBtn.setAttribute("disabled", true);
    }
    if (currentPage === totalPages) {
      nextBtn.setAttribute("disabled", true);
    }
    pagNumbersEl.append(...buttons);
  }

  // Обробник кліку на кнопку "Next"
  $(".breeders-next").click(function () {
    currentPage++;
    if (currentPage > totalPages) {
      currentPage = totalPages;
    }
    loadBreeders(currentPage);
  });

  // Обробник кліку на кнопку "Prev"
  $(".breeders-prev").click(function () {
    currentPage--;
    if (currentPage < 1) {
      currentPage = 1;
    }
    loadBreeders(currentPage);
  });

  $(".breeders-catalogue-section__list").swipe({
    swipeLeft: function (e) {
      // Обробка свайпу вліво
      if (currentPage < totalPages) {
        currentPage++;
        loadBreeders(currentPage);
      }
    },
    swipeRight: function (e) {
      // Обробка свайпу вправо
      if (currentPage > 1) {
        currentPage--;
        loadBreeders(currentPage);
      }
    },
    threshold: 75, // Мінімальна відстань, яка вважається свайпом
  });

  // Початкове завантаження постів
  loadBreeders(currentPage);
});
