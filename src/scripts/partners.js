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
const viewportWidth = window.innerWidth;
const isMobile = viewportWidth < 768;

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

    const isTablet = viewportWidth >= 767.8;
    hasData = !!html;
    console.log('html', html.length > 0)
    if (isMobile && hasData) {
        let partnersMobile = document.getElementById('partners-posts-mobile');
        partnersMobile.innerHTML = html;
    } else if (isTablet && hasData) {
        let partnersTablet = document.getElementById('partners-posts-tablet');
        partnersTablet.innerHTML = html;
    }
}

function getNonce() {
    return my_ajax.nonce;
}

function loadPartners(postType) {
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
        success: function (response) {
            replacePosts(response.html)
        },
        error: function (xhr, status, error) {
            console.error("Request failed: " + error);
        }
    });
}


// show posts
const cardsContainer = document.querySelector('#more-friends');
const items = cardsContainer.querySelectorAll('.friends-clubs-item')

function showPosts() {
    const viewportWidth = window.innerWidth;
    const isLargeScreen = viewportWidth >= 992;

    items.forEach(function (item, index) {
            const everyNineElem = (index + 1) % 9 === 0;
            if ((isMobile && everyNineElem) || (isLargeScreen && everyNineElem)) {
                item.classList.add('nine-elem');
            } else {
                item.classList.remove('nine-elem');
            }
        }
    )
}

showPosts();

window.addEventListener('resize', showPosts);
