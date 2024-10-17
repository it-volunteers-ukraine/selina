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
            taxonomy: 'partners_categories',
            terms: 'our-partners'
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
    if (isMobile && hasData) {
        let partnersMobile = document.getElementById('partners-posts-mobile');
        partnersMobile.innerHTML = html;
    } else if (isTablet && hasData) {
        let partnersTablet = document.getElementById('partners-posts-tablet');
        partnersTablet.innerHTML = html;
    }

    if (!hasData) {
        const nextBtn = document.getElementById('partners-pagination-next');
        nextBtn.style.display = 'none';
        currentPage--;
    } else {
        const nextBtn = document.getElementById('partners-pagination-next');
        nextBtn.style.display = 'block';
    }
}


// show-more button
jQuery(document).ready(function ($) {
    let pageMapping = {};
    const containerFriends = $('#more-friends');
    const containerPhotographs = $('#more-photographs');
    const containerCourses = $('#more-courses');
    const containerVebinars = $('#more-vebinars');
    const containerZoopsychology = $('#more-zoopsychology');
    const containerBooks = $('#more-books');
    const loadBtnFriends = $('#load-more-friends');
    const loadBtnPhotographs = $('#load-more-photographs');
    const loadBtnVebinars = $('#load-more-vebinars');
    const loadBtnZoopsychology = $('#load-more-zoopsychology');
    const loadBtnBooks = $('#load-more-books');
    const loadBtnCourses = $('#load-more-courses');
    const showHideCoursesBtn = $('#showHideCourses');
    const showHideWebinarsBtn = $('#showHideWebinars');
    const showHideZoop = $('#showHideZoop');
    const showHideBooks = $('#showHideBooks');
    // const showHidePhotographs = $('#showHidePhotographs');
    // const showHideFriends = $('#showHideFriends');

    const lastItem = containerFriends.find('.friends-clubs-item:last-child');
    var viewportWidth = window.innerWidth;

    // get nonce
    function getNonce() {
        return my_ajax.nonce;
    }

    function handleResize() {

        if (viewportWidth >= 768 || viewportWidth > 1349.98 || viewportWidth < 767.98) {
            lastItem.hide();
        } else {
            lastItem.show();
        }
    }

    handleResize();


    function loadPosts(postType, taxonomy, terms, targetContainer, loadBtn, closeBtn) {
        const pageMappingKey = postType + '_' + terms;

        if (!pageMapping[pageMappingKey]) {
            pageMapping[pageMappingKey] = 2;
        }

        return $.ajax({
            url: my_ajax.ajaxurl, /* Use the localised ajaxurl variable */
            type: 'POST',
            data: {
                action: 'load_more_posts',
                page: pageMapping[pageMappingKey],
                width: viewportWidth,
                postType: postType,
                taxonomy: taxonomy,
                terms: terms,
                nonce: getNonce(),
            },
            success: function (response) {
                if (response.html) {
                    targetContainer.append($(response.html).addClass('loaded-post'));
                    pageMapping[pageMappingKey]++;
                    HasNextPosts(pageMappingKey, postType, taxonomy, terms, loadBtn, closeBtn);
                }
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
        loadPosts(postType, taxonomy, terms, containerFriends, loadBtnFriends);
    });

    loadBtnPhotographs.on('click', function () {
        var postType = $(this).data('post-type');
        var taxonomy = $(this).data('post-taxonomy');
        var terms = $(this).data('post-terms');
        loadPosts(postType, taxonomy, terms, containerPhotographs, loadBtnPhotographs);
    });


    loadBtnVebinars.on('click', function () {
        var postType = $(this).data('post-type');
        var taxonomy = $(this).data('post-taxonomy');
        var terms = $(this).data('post-terms');
        loadPosts(postType, taxonomy, terms, containerVebinars, loadBtnVebinars, showHideWebinarsBtn);
    });

    loadBtnZoopsychology.on('click', function () {
        var postType = $(this).data('post-type');
        var taxonomy = $(this).data('post-taxonomy');
        var terms = $(this).data('post-terms');
        loadPosts(postType, taxonomy, terms, containerZoopsychology, loadBtnZoopsychology, showHideZoop);
    });

    loadBtnBooks.on('click', function () {
        var postType = $(this).data('post-type');
        var taxonomy = $(this).data('post-taxonomy');
        var terms = $(this).data('post-terms');
        loadPosts(postType, taxonomy, terms, containerBooks, loadBtnBooks, showHideBooks);
    });

    loadBtnCourses.on('click', function () {
        var postType = $(this).data('post-type');
        var taxonomy = $(this).data('post-taxonomy');
        var terms = $(this).data('post-terms');
        loadPosts(postType, taxonomy, terms, containerCourses, loadBtnCourses, showHideCoursesBtn);
    });


    function HasNextPosts(pageMappingKey, postType, taxonomy, terms, loadBtn, closeBtn) {
        $.ajax({
            url: my_ajax.ajaxurl,
            type: 'POST',
            data: {
                action: 'load_more_posts',
                page: pageMapping[pageMappingKey],
                width: viewportWidth,
                postType: postType,
                taxonomy: taxonomy,
                terms: terms,
                nonce: getNonce(),
            },
            success: function (response) {
                if (response.html) {
                    loadBtn.show();
                    closeBtn.hide();
                } else {
                    loadBtn.hide();
                    closeBtn.show();
                }
            }
        });
    }


    function handleHideButton(containerTarget, hideButton, showBtn, sectionId) {
        containerTarget.find('.loaded-post').remove();
        hideButton.hide();
        showBtn.show();
        const postType = showBtn.data('post-type');
        const terms = showBtn.data('post-terms');
        const pageMappingKey = postType + '_' + terms;
        pageMapping[pageMappingKey] = 2;

        const section = document.getElementById(sectionId);
        const offset = 100;
        const position = section.getBoundingClientRect().top + window.scrollY - offset;

        window.scrollTo({
            top: position,
            behavior: 'smooth'
        });
    }


    showHideCoursesBtn.on('click', function () {
        handleHideButton(containerCourses, showHideCoursesBtn, loadBtnCourses, 'anatomy');
    });

    showHideWebinarsBtn.on('click', function () {
        handleHideButton(containerVebinars, showHideWebinarsBtn, loadBtnVebinars, 'veterinary');
    })

    showHideZoop.on('click', function () {
        handleHideButton(containerZoopsychology, showHideZoop, loadBtnZoopsychology, 'zopsychology');
    })

    showHideBooks.on('click', function () {
        handleHideButton(containerBooks, showHideBooks, loadBtnBooks, 'literature');
    })

});
