<form id="search-mobile" role="search" method="get" action="<?php echo home_url('/') ?>" class="search">
    <div class="search-wrapper">
        <button type="submit">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M9.25 9.25L7.05173 7.05173M0.75 4.41379C0.75 2.39034 2.39034 0.75 4.41379 0.75C6.43726 0.75 8.07759 2.39034 8.07759 4.41379C8.07759 6.43726 6.43726 8.07759 4.41379 8.07759C2.39034 8.07759 0.75 6.43726 0.75 4.41379Z"
                      stroke="#045C6F" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <label class="screen-reader-text" for="s">Search for:</label>
        <input type="text"
               value="<?php echo get_search_query(); ?>"
               placeholder="Пошук"
               name="s"
               id="s"
        >
    </div>
</form>