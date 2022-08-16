<form role="search" method="get" class="search-form archive-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="s">
        <span class="screen-reader-text">Search for:</span>
        <input type="search" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'unica-wp' ); ?>" name="s" id="search" />
    </label>
    

    <label for="archiveSearch">
        <select name="archivedSearch" id="archivedSearch">
            <option value="exclude">Exclude Archived Stories</option>
            <option value="include">Include Archived Stories</option>
        </select>
    </label>
    <input type="submit" class="search-submit" value="Search" />
</form>
