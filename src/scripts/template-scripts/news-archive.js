jQuery(document).ready(function($) {
    // Initial check to hide Load More button if there are no more posts
    if ($('#load-more').data('max-page') <= 1) {
        $('#load-more').hide();
    }

    $('#load-more').click(function() {
        let button = $(this);
        let page = button.data('page');
        let newPage = page + 1;
        let maxPage = button.data('max-page');
        let activeTags = myAjax.activeTags; // Retrieve active tags from PHP

        button.addClass('loading');

        $.ajax({
            url: myAjax.ajaxUrl,
            type: 'POST',
            data: {
                action: 'load_news_archive',
                page: newPage,
                filter_tags: activeTags, // Pass active tags in the request
                nonce: myAjax.nonce
            },
            cache: false,
            success: function(response) {
                if ($.trim(response) === 'no_more_posts') {
                    button.hide();
                    if ($('.posts-section__wrapper .one-card-news').length > 6) {
                        $('#hide').show(); // Show Hide button if we have more than 6 posts
                    }
                } else {
                    $('.posts-section__wrapper').append(response);
                    button.data('page', newPage);

                    if (newPage >= maxPage) {
                        button.hide(); // Hide button if we've reached the last page
                        if ($('.posts-section__wrapper .one-card-news').length > 6) {
                            $('#hide').show(); // Show Hide button if there are more than 6 posts
                        }
                    }
                }
            },
            error: function(xhr, status, error) {
                console.log('AJAX Error:', error);
            },
            complete: function() {
                button.removeClass('loading');
                button.blur();
            }
        });
    });

    // Handle the "Hide" button functionality
    $('#hide').click(function() {
        let button = $(this);
        let allPosts = $('.posts-section__wrapper .one-card-news');

        // Hide all posts except the first 6
        allPosts.slice(6).remove();

        // Reset the page counter to load the next set of posts again
        $('#load-more').data('page', 1);

        $('#load-more').show(); // Show the "Load More" button again
        button.hide(); // Hide the "Hide" button
    });
});
