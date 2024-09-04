jQuery(document).ready(function($){
    $('#load-more').click(function(){
        var button = $(this);
        var page = button.data('page');
        var newPage = page + 1;
        var maxPage = button.data('max-page');

        button.addClass('loading');

        $.ajax({
            url: myAjax.ajaxUrl, 
            type: 'POST',
            data: {
                action: 'load_news_archive',
                page: newPage,
                nonce: myAjax.nonce
            },
            cache: false,
            success: function(response){

                if ($.trim(response) === 'no_more_posts') {
                        button.hide();
                } else {
                    $('.posts-section__wrapper').append(response);
                    button.data('page', newPage);
            
                    if(newPage >= maxPage) {
                        button.hide();
                    }
                } 
            },
            error: function(xhr, status, error) {
                console.log('AJAX Error:', error);
            },
            complete: function() {
                button.removeClass('loading');
                button.blur();
                console.log('AJAX request complete');
            }
        });
    });
});
