jQuery(document).ready((function(t){t(".quantity button").on("click",(function(){let n=t(this),a=n.parent().find(".qty"),u=+a.val(),e=1;n.hasClass("btn-plus")?e=u+1:u>1&&(e=u-1),a.val(e),t(".update-cart").prop("disabled",!1)}))}));