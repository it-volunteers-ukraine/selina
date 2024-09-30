jQuery(document).ready(function($){
    // If there are no posts to load, hide the button immediately
    if( !myAjax.hasMorePosts ) {
        $( '#load-more' ).hide();
    }

    $( '#load-more' ).click( function() {
        let button = $( this );
        let page = button.data( 'page' );
        let newPage = page + 1;
        let maxPage = button.data( 'max-page' );
        let activeTags = myAjax.activeTags; // Retrieve active tags from PHP

        button.addClass( 'loading' );

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
            success: function( response ){

                if ( $.trim( response ) === 'no_more_posts') {
                        button.hide();
                } else {
                    $( '.posts-section__wrapper' ).append( response );
                    button.data( 'page', newPage );
            
                    if( newPage >= maxPage ) {
                        button.hide();
                        $( '#hide' ).show(); // Show the "Hide" button when all posts are loaded
                    }
                } 
            },
            error: function( xhr, status, error ) {
                console.log( 'AJAX Error:', error );
            },
            complete: function() {
                button.removeClass( 'loading' );
                button.blur();
                console.log( 'AJAX request complete' );
            }
        });
    });

    // Handle the "Hide" button
    $( '#hide' ).click( function() {
        let button = $( this );
        let allPosts = $( '.posts-section__wrapper .one-card-news' );

        // Hide all posts except the first 6
        allPosts.slice(6).remove();

        // Reset the page counter to load the next set of posts again
        $( '#load-more' ).data(  'page', 1);

        $( '#load-more' ).show(); // Show the "Load More" button
        button.hide(); // Hide the "Hide" button
    });
});
