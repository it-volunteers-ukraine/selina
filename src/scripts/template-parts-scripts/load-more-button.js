jQuery(document).ready(function ($) {
    let pageMapping = {};
    const containerFriends = $('#more-friends');
    const containerPhotographs = $('#more-photographs');
    const loadBtnFriends = $('#load-more-friends');
    const loadBtnPhotographs = $('#load-more-photographs');
    var viewportWidth = window.innerWidth;

    loadBtnFriends.on('click', function () {
        var postType = $(this).data('post-type');
        const ninthElem = $('#more-friends .nine-elem');
        ninthElem.css('display', 'block');
        loadPosts(postType, containerFriends);
    });

    loadBtnPhotographs.on('click', function () {
        var postType = $(this).data('post-type');
        loadPosts(postType, containerPhotographs);
    });

    
});
