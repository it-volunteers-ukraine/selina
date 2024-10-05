jQuery(function ($) {
  $(".filter-button").on("click", function () {
    var category = $(this).data("category");

    $.ajax({
      url: myAjax.ajaxUrl, // WordPress global AJAX URL
      type: "POST",
      data: {
        action: "my_filter", // This will trigger your PHP function
        category: category, // Pass selected category
      },
      success: function (response) {
        $(".shop-grid__products ul").html(response); // Update product grid
      },
    });
  });
});
