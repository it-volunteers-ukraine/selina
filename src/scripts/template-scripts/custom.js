jQuery(document).ready(function ($) {
    let page = 2;
    const container = $('#ajax-posts');
    const loadBtnFriends = $('#load-more-friends');
    // const loadBtnPhotographs = $('.load-more-photographs');
    var viewportWidth = window.innerWidth || document.documentElement.clientWidth;

    function getFeedbacksNonce() {
        return my_ajax.nonce;
    }

    function loadPosts() {
        $.ajax({
            url: my_ajax.ajaxurl, /* Use the localised ajaxurl variable */
            nonce: getFeedbacksNonce(),
            type: 'POST',
            data: {
                action: 'load_more_posts',
                page: page,
                width: viewportWidth,
            },
            success: function (response) {
                container.append(response.html)
                page++;
            },
            error: function (xhr, status, error) {
                console.error("Request failed: " + error);
            }
        });
    }


    loadBtnFriends.on('click', function () {
        loadPosts();
    });
    // loadBtnPhotographs.on('click', function () {
    //     loadPosts();
    // });
});