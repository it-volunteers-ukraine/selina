function flipCardMobile(event) {
    const isMobile = window.innerWidth < 991.98;
    const activeCard = event.querySelector('.flip-card-inner');

    // close other
    const otherFlipped = document.querySelectorAll('.flip-card-inner');
    for (const flipped of otherFlipped) {
        if (flipped !== activeCard) {
            flipped.classList.remove('flipped');
        }
    }

    // open my
    if (isMobile) {
        activeCard.classList.toggle('flipped');
    }
}

// pagination
let currentPage = 1;
let hasData = true;

function loadPartners(postType) {
    const viewportWidth = window.innerWidth;
    $.ajax({
        url: my_ajax.ajaxurl, /* Use the localised ajaxurl variable */
        nonce: getNonce(),
        type: 'POST',
        data: {
            action: 'load_partners_pagination',
            page: currentPage,
            width: viewportWidth,
            postType: postType,
        },
    }).then(function (response) {
        replacePosts(response.html);
    }).fail(function (xhr, status, error) {
        console.error("Request failed: " + error);
    });
}

function getNonce() {
    return my_ajax.nonce;
}


function paginatePrev() {
    if (currentPage > 1) {
        currentPage--;
    }
    loadPartners('all_partners');
}

function paginateNext() {
    if (hasData) {
        currentPage++;
    }
    loadPartners('all_partners');
}

function replacePosts(html) {
    const viewportWidth = window.innerWidth;
    const isMobile = viewportWidth < 768;
    const isTablet = viewportWidth >= 767.8;
    hasData = !!html;
    let noPost = document.querySelector('.message');
    if (isMobile && hasData) {
        noPost.style.display = 'none';
        let partnersMobile = document.getElementById('partners-posts-mobile');
        partnersMobile.innerHTML = html;
    } else if (isTablet && hasData) {
        noPost.style.display = 'none';
        let partnersTablet = document.getElementById('partners-posts-tablet');
        partnersTablet.innerHTML = html;
    }

    if (!hasData) {
        noPost.style.display = 'block';
        currentPage--;
    }
}


// show-more button
jQuery(document).ready(function ($) {
    let pageMapping = {};
    const containerFriends = $('#more-friends');
    const containerPhotographs = $('#more-photographs');
    const loadBtnFriends = $('#load-more-friends');
    const loadBtnPhotographs = $('#load-more-photographs');
    const lastItem = containerFriends.find('.friends-clubs-item:last-child');
    var viewportWidth = window.innerWidth;

    // get nonce
    function getNonce() {
        return my_ajax.nonce;
    }

    function handleResize() {

        if (viewportWidth > 1349.98 || viewportWidth < 767.98) {
            lastItem.hide();
        } else {
            lastItem.show();
        }
    }

    handleResize();


    function loadPosts(postType, taxonomy, terms, targetContainer) {
        if (!pageMapping[postType]) {
            pageMapping[postType] = 2;
        }

        $.ajax({
            url: my_ajax.ajaxurl, /* Use the localised ajaxurl variable */
            nonce: getNonce(),
            type: 'POST',
            data: {
                action: 'load_more_posts',
                page: pageMapping[postType],
                width: viewportWidth,
                postType: postType,
                taxonomy: taxonomy,
                terms: terms,
            },
            success: function (response) {
                targetContainer.append(response.html)
                pageMapping[postType]++;
            },
            error: function (xhr, status, error) {
                console.error("Request failed: " + error);
            }
        });
    }

    loadBtnFriends.on('click', function () {
        var postType = $(this).data('post-type');
        var taxonomy = $(this).data('post-taxonomy');
        var terms = $(this).data('post-terms');

        loadPosts(postType, taxonomy, terms, containerFriends);

    });

    loadBtnPhotographs.on('click', function () {
        var postType = $(this).data('post-type');
        var taxonomy = $(this).data('post-taxonomy');
        var terms = $(this).data('term');
        loadPosts(postType, taxonomy, terms, containerPhotographs);
    });

});

