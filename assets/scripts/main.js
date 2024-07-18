jQuery(document).ready(function (e) {
  const t = window.document.getElementById("breeders-order");
  let n = "date",
    o = "DESC";
  const i = (e) => {
    const i = e.target;
    switch (
      (Array.from(t.children).forEach((e) => {
        e.value !== i.value
          ? e.removeAttribute("selected")
          : e.setAttribute("selected", "");
      }),
      i.value)
    ) {
      case "title-desc":
        (n = "title"), (o = "DESC");
        break;
      case "title-asc":
        (n = "title"), (o = "ASC");
        break;
      case "date-desc":
        (n = "date"), (o = "DESC");
        break;
      case "date-asc":
        (n = "date"), (o = "ASC");
    }
    s(r);
  };
  if (t) {
    new Choices(t, {
      searchEnabled: !1,
      allowHTML: !1,
      shouldSort: !1,
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
    t.addEventListener("change", i);
  }
  function s(t) {
    var i = {
      action: "load_breeders",
      nonce: myAjax.nonce,
      width: c,
      page: t,
      order: o,
      orderby: n,
    };
    e.ajax({
      url: myAjax.ajaxUrl,
      type: "post",
      data: i,
      success: function (n) {
        (d = n.totalPages),
          (u = n.postsPerPage),
          (r = t),
          d > 1 && l.classList.remove("visually-hidden"),
          a.html(""),
          e(".breeders-catalogue-section__list").html(n.html),
          (function () {
            const t = e(".breeders-prev"),
              n = e(".breeders-next");
            t.prop("disabled", 1 === r), n.prop("disabled", r === d);
          })(),
          (function () {
            const e =
                d >= (d >= 3 ? 3 : d) && r > 2 ? r - 2 : r > 1 ? r - 1 : r,
              t = [];
            for (let n = e; n <= e + 2; n++) {
              const e = document.createElement("button");
              e.classList.add(
                "breeders-catalogue-section__pagination-button",
                "btn_icon"
              ),
                (e.innerText = n),
                n === r && e.classList.add("is-active"),
                t.push(e),
                e.addEventListener("click", () => {
                  s(n);
                });
            }
            a.append(...t);
          })();
      },
      error: function (e, t, n) {
        console.error("Request failed: " + n);
      },
    });
  }
  const c = window.innerWidth || document.documentElement.clientWidth,
    l = document.querySelector(".breeders-catalogue-section__pagination"),
    a = e(".breeders-catalogue-section__pagination-numbers");
  let r = 1,
    d = 1,
    u = 1;
  e(".breeders-next").click(function () {
    r++, r > d && (r = d), s(r);
  }),
    e(".breeders-prev").click(function () {
      r--, r < 1 && (r = 1), s(r);
    }),
    e(".breeders-catalogue-section__list").swipe({
      swipeLeft: function (e) {
        r < d && (r++, s(r));
      },
      swipeRight: function (e) {
        r > 1 && (r--, s(r));
      },
      threshold: 75,
    }),
    s(r);
});
let scrollTopBtn = document.getElementById("to-top-btn");
function scrollFunction() {
  let e = window.innerHeight,
    t = document.documentElement.scrollHeight,
    n = window.pageYOffset || document.documentElement.scrollTop,
    o = t - (n + e);
  (scrollTopBtn.style.display = n > 20 ? "block" : "none"),
    window.innerWidth <= 767
      ? (scrollTopBtn.style.bottom = o <= 291 ? 291 - o + 16 + "px" : "16px")
      : window.innerWidth <= 1439
      ? (scrollTopBtn.style.bottom = o <= 401 ? 401 - o + 16 + "px" : "16px")
      : (scrollTopBtn.style.bottom = o <= 430 ? 430 - o + 16 + "px" : "16px");
}
(window.onscroll = function () {
  scrollFunction();
}),
  scrollTopBtn.addEventListener("click", function () {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });
const navMenu = document.getElementById("header-nav-menu"),
  burgerBtn = document.getElementById("header-menu-btn"),
  headerTopMobile = document.getElementById("header-mobile"),
  headerListMobile = document.querySelector(".header__list-mobile"),
  itemsListMobile = headerListMobile.querySelectorAll(".menu-item"),
  headerList = document.querySelector(".header__list"),
  itemsList = headerList.querySelectorAll(".menu-item");
function redirectToPage(e) {
  window.location.href = e;
}
function flipCardMobile(e) {
  const t = window.innerWidth < 991.98,
    n = e.querySelector(".flip-card-inner"),
    o = document.querySelectorAll(".flip-card-inner");
  for (const e of o) e !== n && e.classList.remove("flipped");
  t && n.classList.toggle("flipped");
}
burgerBtn.addEventListener("click", () => {
  burgerBtn.classList.toggle("open"),
    navMenu.classList.toggle("mobile-menu"),
    navMenu.classList.toggle("show-menu"),
    headerTopMobile.classList.toggle("header-mobile");
}),
  itemsList.forEach((e) => {
    e.addEventListener("click", () => {
      const t = e.querySelector(".sub-menu");
      document.querySelectorAll(".sub-menu.active-sub_menu").forEach((e) => {
        e !== t && e.classList.remove("active-sub_menu");
      }),
        t && t.classList.toggle("active-sub_menu");
    });
  }),
  itemsListMobile.forEach((e) => {
    e.addEventListener("click", () => {
      const t = e.querySelector(".sub-menu");
      t && t.classList.toggle("active-sub_menu-mobile");
    });
  }),
  console.log("main");
let currentPage = 1,
  hasData = !0;
function loadPartners(e) {
  const t = window.innerWidth;
  $.ajax({
    url: my_ajax.ajaxurl,
    nonce: getNonce(),
    type: "POST",
    data: {
      action: "load_partners_pagination",
      page: currentPage,
      width: t,
      postType: e,
    },
  })
    .then(function (e) {
      replacePosts(e.html);
    })
    .fail(function (e, t, n) {
      console.error("Request failed: " + n);
    });
}
function getNonce() {
  return my_ajax.nonce;
}
function paginatePrev() {
  currentPage > 1 && currentPage--, loadPartners("all_partners");
}
function paginateNext() {
  hasData && currentPage++, loadPartners("all_partners");
}
function replacePosts(e) {
  const t = window.innerWidth,
    n = t < 768,
    o = t >= 767.8;
  hasData = !!e;
  let i = document.querySelector(".message");
  if (n && hasData) {
    (i.style.display = "none"),
      (document.getElementById("partners-posts-mobile").innerHTML = e);
  } else if (o && hasData) {
    (i.style.display = "none"),
      (document.getElementById("partners-posts-tablet").innerHTML = e);
  }
  hasData || ((i.style.display = "block"), currentPage--);
}
const cardsContainer = document.querySelector("#more-friends"),
  items = cardsContainer.querySelectorAll(".friends-clubs-item");
function showPosts() {
  const e = window.innerWidth,
    t = e < 768,
    n = e >= 992;
  items.forEach(function (e, o) {
    const i = (o + 1) % 9 == 0;
    (t && i) || (n && i)
      ? e.classList.add("nine-elem")
      : e.classList.remove("nine-elem");
  });
}
showPosts(), window.addEventListener("resize", showPosts);
