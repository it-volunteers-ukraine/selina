function flipCardMobile(t){const o=window.innerWidth<991.98,e=t.querySelector(".flip-card-inner"),a=document.querySelectorAll(".flip-card-inner");for(const t of a)t!==e&&t.classList.remove("flipped");o&&e.classList.toggle("flipped")}let currentPage=1,hasData=!0;function loadPartners(t){const o=window.innerWidth;$.ajax({url:my_ajax.ajaxurl,nonce:getNonce(),type:"POST",data:{action:"load_partners_pagination",page:currentPage,width:o,postType:t,taxonomy:"partners_categories",terms:"our-partners"}}).then((function(t){replacePosts(t.html)})).fail((function(t,o,e){console.error("Request failed: "+e)}))}function getNonce(){return my_ajax.nonce}function paginatePrev(){currentPage>1&&currentPage--,loadPartners("all_partners")}function paginateNext(){hasData&&currentPage++,loadPartners("all_partners")}function replacePosts(t){const o=window.innerWidth,e=o>=767.8;if(hasData=!!t,o<768&&hasData){document.getElementById("partners-posts-mobile").innerHTML=t}else if(e&&hasData){document.getElementById("partners-posts-tablet").innerHTML=t}if(hasData){document.getElementById("partners-pagination-next").style.display="block"}else{document.getElementById("partners-pagination-next").style.display="none",currentPage--}}jQuery(document).ready((function(t){let o={};const e=t("#more-friends"),a=t("#more-photographs"),n=t("#more-courses"),s=t("#more-vebinars"),r=t("#more-zoopsychology"),i=t("#more-books"),c=t("#load-more-friends"),d=t("#load-more-photographs"),p=t("#load-more-courses"),l=t("#load-more-vebinars"),m=t("#load-more-zoopsychology"),u=t("#load-more-books"),h=e.find(".friends-clubs-item:last-child");var y=window.innerWidth;function f(e,a,n,s){const r=e+"_"+n;o[r]||(o[r]=2),t.ajax({url:my_ajax.ajaxurl,type:"POST",data:{action:"load_more_posts",page:o[r],width:y,postType:e,taxonomy:a,terms:n,nonce:my_ajax.nonce},success:function(t){s.append(t.html),o[r]++},error:function(t,o,e){console.error("Request failed: "+e)}})}y>1349.98||y<767.98?h.hide():h.show(),c.on("click",(function(){f(t(this).data("post-type"),t(this).data("post-taxonomy"),t(this).data("post-terms"),e)})),d.on("click",(function(){f(t(this).data("post-type"),t(this).data("post-taxonomy"),t(this).data("post-terms"),a)})),l.on("click",(function(){f(t(this).data("post-type"),t(this).data("post-taxonomy"),t(this).data("post-terms"),s)})),m.on("click",(function(){f(t(this).data("post-type"),t(this).data("post-taxonomy"),t(this).data("post-terms"),r)})),u.on("click",(function(){f(t(this).data("post-type"),t(this).data("post-taxonomy"),t(this).data("post-terms"),i)})),p.on("click",(function(){f(t(this).data("post-type"),t(this).data("post-taxonomy"),t(this).data("post-terms"),n)}))}));