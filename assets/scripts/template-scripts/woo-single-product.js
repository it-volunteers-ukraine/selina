jQuery(document).ready((function(t){t(".quantity button").on("click",(function(){let e=t(this),o=e.parent().find(".qty"),n=+o.val(),r=1;e.hasClass("btn-plus")?r=n+1:n>1&&(r=n-1),o.val(r)}))}));let swiper=new Swiper(".single-product-slider",{loop:!0,navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},pagination:{el:".swiper-pagination",clickable:!0}});document.addEventListener("DOMContentLoaded",(function(){Fancybox.bind(".swiper-slide a.zoom",{Toolbar:{display:["zoom","close"]}})}));let relativeProductSwiper=new Swiper(".related-product-swiper",{loop:!0,navigation:{nextEl:".related-product-swiper__button-next",prevEl:".related-product-swiper__button-prev"},pagination:{el:".related-product-swiper__pagination",type:"fraction"}}),relatedProductsContainer=document.querySelector(".columns-4"),relatedProductItems=Array.from(relatedProductsContainer.children),numberOfRelatedProducts=relatedProductsContainer.childElementCount,showMoreProductsButton=document.getElementById("showMoreProductsButton"),showLessProductsButton=document.getElementById("showLessProductsButton");function setupProductDisplay(t,e){showMoreProductsButton.style.display="flex";let o=t;relatedProductItems.forEach(((e,o)=>{e.style.display=o<t?"block":"none"})),showMoreProductsButton.addEventListener("click",(()=>{let t=window.innerWidth>1438?9:10,n=Math.min(o+e,numberOfRelatedProducts);relatedProductItems.forEach(((t,e)=>{e<n&&(t.style.display="block")})),o=n,(o>=t||o>=numberOfRelatedProducts)&&(showMoreProductsButton.style.display="none",showLessProductsButton.style.display="flex"),showMoreProductsButton.blur()})),showLessProductsButton.addEventListener("click",(()=>{o=t,relatedProductItems.forEach(((e,o)=>{e.style.display=o<t?"block":"none"})),showMoreProductsButton.style.display="flex",showLessProductsButton.style.display="none"}))}window.innerWidth<1439&&numberOfRelatedProducts>4?setupProductDisplay(4,2):window.innerWidth>=1439&&numberOfRelatedProducts>3&&setupProductDisplay(3,3);