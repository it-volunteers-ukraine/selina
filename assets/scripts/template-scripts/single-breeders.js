const newsSwiper=new Swiper(".single-breeder-our-cats-section__swiper-inner",{effect:"slide",loop:!0,slidesPerView:1,spaceBetween:24,centeredSlides:!0,watchOverflow:!0,autoHeight:!0,breakpoints:{768:{autoHeight:!1,centeredSlides:!1,slidesPerView:1.5,spaceBetween:23},1439:{slidesPerView:2}},direction:"horizontal",preloadImages:!1,lazy:{loadOnTransitionStart:!0,loadPrevNext:!0},lazyPreloadPrevNext:1,navigation:{nextEl:".single-breeder-our-cats-section__arrow-right-btn",prevEl:".single-breeder-our-cats-section__arrow-left-btn"}}),freeCatList=document?.querySelector(".single-breeder-free-cats-section__wrapper"),freeCatListBtn=document?.querySelector(".single-breeder-free-cats-section__button"),freeCatListChildren=Array.from(freeCatList?.children??[]),count=window.innerWidth>=768&&window.innerWidth<1440?2:3;let ca=0;freeCatListChildren.length>count&&(freeCatList.innerHTML="",freeCatList.append(...freeCatListChildren.slice(0,count)),freeCatListBtn.classList.remove("visually-hidden"),ca=count,freeCatListBtn?.addEventListener("click",(()=>{freeCatList.append(...freeCatListChildren.slice(ca,ca+count)),ca+=count,ca>=freeCatListChildren.length&&freeCatListBtn.classList.add("visually-hidden")})));