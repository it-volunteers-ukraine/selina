jQuery(document).ready((function(e){const t=e("#container-masonry").masonry({columnWidth:220,itemSelector:".gallery-item",gutter:24,percentPosition:!0}),a=e("#load-more"),n=galleryData.images;let l=6;function o(a,l){let o="";for(let e=a;e<l&&e<n.length;e++)o+='<li class="gallery-item">',o+='<a href="'+n[e].url+'" data-fancybox="gallery">',o+='<img src="'+n[e].sizes.thumbnail+'" alt="'+n[e].alt+'" />',o+="</a>",n[e].caption&&(o+="<p>"+n[e].caption+"</p>"),o+="</li>";let i=e(o);t.append(i).masonry("appended",i),i.imagesLoaded().progress((function(){t.masonry("layout")}))}o(0,6),a.on("click",(function(){const e=l+6;o(l,e),l=e,l>=n.length&&a.hide()}))}));