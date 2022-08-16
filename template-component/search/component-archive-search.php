<?php 
$search_term = get_search_query();

$args = array (
    'post_type'         => 'post',
    'post_status'       =>  array( 'publish', 'archive' ),
    'order'             => 'DESC',
    'orderby'           => 'date',
    'posts_per_page'    => 10,
    'nopaging'          => false,
    's'                 => $search_term
);

$wp_archive_query = new WP_Query($args);

if ( $wp_archive_query->have_posts() ) { ?>
    <ul class="wsu-search-results">
        <?php while ( $wp_archive_query->have_posts() ) : $wp_archive_query->the_post(); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
            <?php the_excerpt(); ?>
            <div class="wsu-meta-date"><time><?php the_date(); ?></time></div>
        </li>
        <?php endwhile; ?>
    </ul>
    <?php get_template_part( 'template-component/component-pagination', 'archive' ); 
} else { ?>
    <div class="alert alert-info">
        <h2>Nothing Found</h2>
        <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
    </div>
<?php }

