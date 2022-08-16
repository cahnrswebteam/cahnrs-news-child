<?php 
if ( have_posts() ) { ?>
    <ul class="wsu-search-results">
        <?php while ( have_posts() ) : the_post(); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> 
            <?php the_excerpt(); ?>
            <div class="wsu-meta-date"><time><?php the_date(); ?></time></div>
        </li>
        <?php endwhile; ?>
    </ul>
    <?php get_template_part( 'template-component/component-pagination', 'archive' ); ?>
<?php }else { ?>
    <div class="alert alert-info">
        <h2>Nothing Found</h2>
        <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
    </div>
<?php }