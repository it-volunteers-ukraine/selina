jQuery(document).ready((function(e){const t=window.document.getElementById("breeders-order");let i="date",s="DESC";const c=e=>{const c=e.target;switch(Array.from(t.children).forEach((e=>{e.value!==c.value?e.removeAttribute("selected"):e.setAttribute("selected","")})),c.value){case"title-desc":i="title",s="DESC";break;case"title-asc":i="title",s="ASC";break;case"date-desc":i="date",s="DESC";break;case"date-asc":i="date",s="ASC"}o(d)};if(t){new Choices(t,{searchEnabled:!1,allowHTML:!1,shouldSort:!1,position:"bottom",itemSelectText:"",classNames:{containerOuter:"choices",containerInner:"choices__inner",input:"choices__input",inputCloned:"choices__input--cloned",list:"choices__list",listItems:"choices__list--multiple",listSingle:"choices__list--single",listDropdown:"choices__list--dropdown",item:"choices__item",itemSelectable:"choices__item--selectable",itemDisabled:"choices__item--disabled",itemChoice:"choices__item--choice",placeholder:"choices__placeholder",group:"choices__group",groupHeading:"choices__heading",button:"choices__button",activeState:"is-active",focusState:"is-focused",openState:"is-open",disabledState:"is-disabled",highlightedState:"is-highlighted",selectedState:"is-selected",flippedState:"is-flipped",loadingState:"is-loading",noResults:"has-no-results",noChoices:"has-no-choices"}});t.addEventListener("change",c)}function o(t){var c={action:"load_breeders",nonce:myAjax.nonce,width:n,page:t,order:s,orderby:i};e.ajax({url:myAjax.ajaxUrl,type:"post",data:c,success:function(i){r=i.totalPages,u=i.postsPerPage,d=t,r>1&&a.classList.remove("visually-hidden"),l.html(""),e(".breeders-catalogue-section__list").html(i.html),function(){const t=e(".breeders-prev"),i=e(".breeders-next");t.prop("disabled",1===d),i.prop("disabled",d===r)}(),function(){const e=r>=(r>=3?3:r)&&d>2?d-2:d>1?d-1:d,t=[];for(let i=e;i<=e+2;i++){const e=document.createElement("button");e.classList.add("breeders-catalogue-section__pagination-button","btn_icon"),e.innerText=i,i===d&&e.classList.add("is-active"),t.push(e),e.addEventListener("click",(()=>{o(i)}))}l.append(...t)}()},error:function(e,t,i){console.error("Request failed: "+i)}})}const n=window.innerWidth||document.documentElement.clientWidth,a=document.querySelector(".breeders-catalogue-section__pagination"),l=e(".breeders-catalogue-section__pagination-numbers");let d=1,r=1,u=1;e(".breeders-next").click((function(){d++,d>r&&(d=r),o(d)})),e(".breeders-prev").click((function(){d--,d<1&&(d=1),o(d)})),e(".breeders-catalogue-section__list").swipe({swipeLeft:function(e){d<r&&(d++,o(d))},swipeRight:function(e){d>1&&(d--,o(d))},threshold:75}),o(d)}));