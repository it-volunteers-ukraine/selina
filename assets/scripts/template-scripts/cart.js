let timeout;jQuery(document).ready((function(e){e("main.main").on("click",".quantity button",(function(){let t=e(this),n=t.parent().find(".qty"),o=+n.val(),l=o;t.hasClass("btn-plus")?l=o+1:t.hasClass("btn-minus")&&o>1&&(l=o-1),n.val(l).change(),e(".update-cart").prop("disabled",!1)}))})),jQuery((function(e){e(".woocommerce").on("change",".qty",(function(){void 0!==timeout&&clearTimeout(timeout),timeout=setTimeout((function(){e("[name='update_cart']").trigger("click")}),500)}))}));const swiper=new Swiper(".crossSellSwiper",{slidesPerView:1,spaceBetween:10,navigation:{nextEl:".cross-sell__arrow-right-btn",prevEl:".cross-sell__arrow-left-btn"},pagination:{el:".cross-sell__pagination",type:"fraction"}});document.addEventListener("DOMContentLoaded",(function(){const e=document.querySelectorAll(".crossSellGrid .grid-item"),t=document.querySelector(".crossSellGrid .show-more");!function(){let n=0,o=window.innerWidth;n=o<1439&&o>375?crossSellVisibleItems.tablet:crossSellVisibleItems.desktop;for(let t=0;t<n&&t<e.length;t++)e[t].style.display="block";n>=e.length&&(t.style.display="none")}(),t.addEventListener("click",(function(){!function(){let n=window.innerWidth,o=n<1439&&n>375?showMoreItems.tablet:showMoreItems.desktop,l=0;for(let t=0;t<e.length&&!("none"===e[t].style.display&&(e[t].style.display="block",l++,l>=o));t++);0===Array.from(e).filter((e=>"none"===e.style.display)).length&&(t.style.display="none")}()}))}));let crossSellCounter=0,crossSellVisibleItems={tablet:4,desktop:3},showMoreItems={tablet:2,desktop:3};