jQuery(document).ready((function(e){const t=window.document.getElementById("breeders-order");let i="date",s="DESC";const c=e=>{const c=e.target;switch(Array.from(t.children).forEach((e=>{e.value!==c.value?e.removeAttribute("selected"):e.setAttribute("selected","")})),c.value){case"title-desc":i="title",s="DESC";break;case"title-asc":i="title",s="ASC";break;case"date-desc":i="date",s="DESC";break;case"date-asc":i="date",s="ASC"}o(d)};if(t){new Choices(t,{searchEnabled:!1,allowHTML:!1,shouldSort:!1,position:"bottom",itemSelectText:"",classNames:{containerOuter:"choices",containerInner:"choices__inner",input:"choices__input",inputCloned:"choices__input--cloned",list:"choices__list",listItems:"choices__list--multiple",listSingle:"choices__list--single",listDropdown:"choices__list--dropdown",item:"choices__item",itemSelectable:"choices__item--selectable",itemDisabled:"choices__item--disabled",itemChoice:"choices__item--choice",placeholder:"choices__placeholder",group:"choices__group",groupHeading:"choices__heading",button:"choices__button",activeState:"is-active",focusState:"is-focused",openState:"is-open",disabledState:"is-disabled",highlightedState:"is-highlighted",selectedState:"is-selected",flippedState:"is-flipped",loadingState:"is-loading",noResults:"has-no-results",noChoices:"has-no-choices"}});t.addEventListener("change",c)}function o(t){var c={action:"load_breeders",nonce:myAjax.nonce,width:n,page:t,order:s,orderby:i};e.ajax({url:myAjax.ajaxUrl,type:"post",data:c,success:function(i){l=i.totalPages,u=i.postsPerPage,d=t,l>1&&a.classList.remove("visually-hidden"),r.html(""),e(".breeders-catalogue-section__list").html(i.html),function(){const t=e(".breeders-prev"),i=e(".breeders-next");t.prop("disabled",1===d),i.prop("disabled",d===l)}(),function(){const e=document.querySelector(".breeders-prev"),t=document.querySelector(".breeders-next");e.removeAttribute("disabled"),t.removeAttribute("disabled");const i=l>=3?3:l,s=l>=i&&d>2?d-2:d>1?d-1:d,c=[];for(let e=s;e<=s+i-1;e++){const t=document.createElement("button");t.classList.add("breeders-catalogue-section__pagination-button","btn_icon"),t.innerText=e,e===d&&t.classList.add("is-active"),c.push(t),t.addEventListener("click",(()=>{o(e)}))}1===d&&e.setAttribute("disabled",!0);d===l&&t.setAttribute("disabled",!0);r.append(...c)}()},error:function(e,t,i){console.error("Request failed: "+i)}})}const n=window.innerWidth||document.documentElement.clientWidth,a=document.querySelector(".breeders-catalogue-section__pagination"),r=e(".breeders-catalogue-section__pagination-numbers");let d=1,l=1,u=1;e(".breeders-next").click((function(){d++,d>l&&(d=l),o(d)})),e(".breeders-prev").click((function(){d--,d<1&&(d=1),o(d)})),e(".breeders-catalogue-section__list").swipe({swipeLeft:function(e){d<l&&(d++,o(d))},swipeRight:function(e){d>1&&(d--,o(d))},threshold:75}),o(d)}));