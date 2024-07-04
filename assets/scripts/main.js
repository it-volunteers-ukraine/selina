jQuery(document).ready((function(e){const t=window.document.getElementById("breeders-order");let n="date",o="DESC";function r(t){var r={action:"load_breeders",nonce:myAjax.nonce,width:s,page:t,order:o,orderby:n};e.ajax({url:myAjax.ajaxUrl,type:"post",data:r,success:function(t){l=t.totalPages,e(".breeders-catalogue-section__list").html(t.html)},error:function(e,t,n){console.error("Request failed: "+n)}})}t.addEventListener("change",(e=>{const s=e.target;switch(Array.from(t.children).forEach((e=>{e.value!==s.value?e.removeAttribute("selected"):e.setAttribute("selected","")})),s.value){case"title":n="title",o="ASC";break;case"newest":n="date",o="DESC";break;case"oldest":n="date",o="ASC"}r(a)}));var s=window.innerWidth||document.documentElement.clientWidth,a=1,l=1;e(".breeders-catalogue-section__list").swipe({swipeLeft:function(e){a<l&&r(++a)},swipeRight:function(e){a>1&&r(--a)},threshold:75}),r(a)})),console.log("footer part");let scrollTopBtn=document.getElementById("myBtn");function scrollFunction(){let e=window.innerHeight,t=document.documentElement.scrollHeight,n=window.pageYOffset||document.documentElement.scrollTop,o=t-(n+e);scrollTopBtn.style.display=n>20?"block":"none",scrollTopBtn.style.bottom=o<=417?"417px":"50px"}window.onscroll=function(){scrollFunction()},scrollTopBtn.addEventListener("click",(function(){window.scrollTo({top:0,behavior:"smooth"})}));const navMenu=document.getElementById("header-nav-menu"),burgerBtn=document.getElementById("header-menu-btn"),headerTopMobile=document.getElementById("header-mobile"),headerListMobile=document.querySelector(".header__list-mobile"),itemsListMobile=headerListMobile.querySelectorAll(".menu-item"),headerSubmenus=document.querySelectorAll("header .sub-menu"),headerMenuList=document.querySelectorAll("header .header__list .menu-item");function redirectToPage(e){window.location.href=e}function flipCardMobile(e){const t=window.innerWidth<991.98,n=e.querySelector(".flip-card-inner"),o=document.querySelectorAll(".flip-card-inner");for(const e of o)e!==n&&e.classList.remove("flipped");t&&n.classList.toggle("flipped")}burgerBtn.addEventListener("click",(()=>{burgerBtn.classList.toggle("open"),navMenu.classList.toggle("mobile-menu"),navMenu.classList.toggle("show-menu"),headerTopMobile.classList.toggle("header-mobile")})),headerSubmenus.forEach((e=>{e.classList.remove("sub-menu"),e.classList.add("header-sub-menu")})),headerMenuList.forEach((e=>{e.classList.remove("menu-item"),e.classList.add("header-menu-item")})),headerMenuList.forEach((e=>{e.addEventListener("click",(()=>{const t=e.querySelector(".header-sub-menu");t&&t.classList.toggle("active-sub_menu")}))})),itemsListMobile.forEach((e=>{e.addEventListener("click",(()=>{const t=e.querySelector(".sub-menu");t&&t.classList.toggle("active-sub_menu-mobile")}))})),console.log("main");let currentPage=1,hasData=!0;function loadPartners(e){const t=window.innerWidth;$.ajax({url:my_ajax.ajaxurl,nonce:getNonce(),type:"POST",data:{action:"load_partners_pagination",page:currentPage,width:t,postType:e}}).then((function(e){replacePosts(e.html)})).fail((function(e,t,n){console.error("Request failed: "+n)}))}function getNonce(){return my_ajax.nonce}function paginatePrev(){currentPage>1&&currentPage--,loadPartners("all_partners")}function paginateNext(){hasData&&currentPage++,loadPartners("all_partners")}function replacePosts(e){const t=window.innerWidth,n=t<768,o=t>=767.8;hasData=!!e;let r=document.querySelector(".message");if(n&&hasData){r.style.display="none",document.getElementById("partners-posts-mobile").innerHTML=e}else if(o&&hasData){r.style.display="none",document.getElementById("partners-posts-tablet").innerHTML=e}hasData||(r.style.display="block",currentPage--)}const cardsContainer=document.querySelector("#more-friends"),items=cardsContainer.querySelectorAll(".friends-clubs-item");function showPosts(){const e=window.innerWidth,t=e<768,n=e>=992;items.forEach((function(e,o){const r=(o+1)%9==0;t&&r||n&&r?e.classList.add("nine-elem"):e.classList.remove("nine-elem")}))}showPosts(),window.addEventListener("resize",showPosts);