jQuery(document).ready((function(e){const t=window.document.getElementById("breeders-order");let i="date",s="DESC";const o=e=>{const o=e.target;switch(Array.from(t.children).forEach((e=>{e.value!==o.value?e.removeAttribute("selected"):e.setAttribute("selected","")})),o.value){case"title-desc":i="title",s="DESC";break;case"title-asc":i="title",s="ASC";break;case"date-desc":i="date",s="DESC";break;case"date-asc":i="date",s="ASC"}n(l)};if(t){new Choices(t,{searchEnabled:!1,allowHTML:!1,shouldSort:!1,position:"bottom",itemSelectText:"",classNames:{containerOuter:"choices",containerInner:"choices__inner",input:"choices__input",inputCloned:"choices__input--cloned",list:"choices__list",listItems:"choices__list--multiple",listSingle:"choices__list--single",listDropdown:"choices__list--dropdown",item:"choices__item",itemSelectable:"choices__item--selectable",itemDisabled:"choices__item--disabled",itemChoice:"choices__item--choice",placeholder:"choices__placeholder",group:"choices__group",groupHeading:"choices__heading",button:"choices__button",activeState:"is-active",focusState:"is-focused",openState:"is-open",disabledState:"is-disabled",highlightedState:"is-highlighted",selectedState:"is-selected",flippedState:"is-flipped",loadingState:"is-loading",noResults:"has-no-results",noChoices:"has-no-choices"}});t.addEventListener("change",o)}let c=!1;function n(t){var o={action:"load_breeders",nonce:myAjax.nonce,width:a,page:t,order:s,orderby:i};e.ajax({url:myAjax.ajaxUrl,type:"post",data:o,success:function(i){u=i.totalPages,h=i.postsPerPage,l=t,u>1&&r.classList.remove("visually-hidden"),d.html(""),e(".breeders-catalogue-section__list").html(i.html),function(){const t=e(".breeders-prev"),i=e(".breeders-next");t.prop("disabled",1===l),i.prop("disabled",l===u)}(),function(){const e=document.querySelector(".breeders-prev"),t=document.querySelector(".breeders-next");e.removeAttribute("disabled"),t.removeAttribute("disabled");const i=u>=3?3:u,s=u>=i&&l>2?l-2:l>1?l-1:l,o=[];for(let e=s;e<=s+i-1;e++){const t=document.createElement("button");t.classList.add("breeders-catalogue-section__pagination-button","btn_icon"),t.innerText=e,e===l&&(t.classList.add("is-active"),t.setAttribute("disabled",!0)),o.push(t),t.addEventListener("click",(()=>{n(e)}))}1===l&&e.setAttribute("disabled",!0);l===u&&t.setAttribute("disabled",!0);d.append(...o)}(),c?document.getElementById("breeders-catalogue")?.scrollIntoView({behavior:"smooth",block:"start"}):c=!0},error:function(e,t,i){console.error("Request failed: "+i)}})}const a=window.innerWidth||document.documentElement.clientWidth,r=document.querySelector(".breeders-catalogue-section__pagination"),d=e(".breeders-catalogue-section__pagination-numbers");let l=1,u=1,h=1;e(".breeders-next").click((function(){l++,l>u&&(l=u),n(l)})),e(".breeders-prev").click((function(){l--,l<1&&(l=1),n(l)})),e(".breeders-catalogue-section__list").swipe({swipeLeft:function(e){l<u&&(l++,n(l))},swipeRight:function(e){l>1&&(l--,n(l))},threshold:75}),n(l)}));