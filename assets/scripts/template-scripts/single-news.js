jQuery(document).ready((function(e){e("#load-more").on("click",(function(){let l={action:"load_more_images",nonce:galleryAjax.nonce,page:Math.ceil(e(".gallery a").length/6)+1};e.post(galleryAjax.ajaxUrl,l,(function(l){l.success?e(".gallery").append(l.data):console.log("AJAX response failed:",l.data)})).fail((function(e,l,o){console.log("AJAX request failed:",l,o)}))})),console.log("Script loaded completely")}));