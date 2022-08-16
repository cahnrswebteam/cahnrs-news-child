<?php namespace WSUWP\Theme\WDS; 

?>
<?php get_header(); ?>
<?php get_template_part( 'template-component/component-global-header', 'search' ); ?>
<?php get_template_part( 'template-component/component-site-navigation-vertical', 'search' ); ?>


<!-- SITE WRAPPER:START -->
<div class="wsu-wrapper-site">
	<!-- SITE CONTAINER:START -->
	<?php get_template_part( 'template-component/component-site-header', 'search'); ?>
    
	<div class="wsu-wrapper-content <?php echo esc_attr( WDS_Options::get_option_class( 'template', 'width', 'wsu-wrapper-content--' ) ); ?>">
		<?php do_action( 'wsu_wds_theme_before_main', 'search'); ?>
		<main role="main" id="wsu-content" class="wsu-wrapper-main" tabindex="-1">
			<?php do_action( 'wsu_wds_theme_main', 'search'); ?>
			<?php if ( get_theme_mod( 'wsu_wds_template_search_show_breadcrumbs', true ) ) : ?><?php get_template_part( 'template-component/component-breadcrumb', 'search' ); ?><?php endif; ?>
			<?php do_action( 'wsu_wds_theme_after_breadcrumbs', 'search'); ?>
			<header class="wsu-page-header">
				<h1  class="wsu-page-header__title">Search</h1>
			</header>
			<?php if ( ! empty( $_REQUEST['s'] ) ){
                get_search_form( array('echo' => true ) ); 

                //Retrieves archive option from search form
                $archiveSearch = $_GET['archivedSearch'];

                //If user selects include archive, the archive query will load. Else the normal search wiill run (excludes archived posts)
                if($archiveSearch == 'include'){
                    get_template_part('template-component/search/component-archive-search');
                }else{
                    get_template_part('template-component/search/component-search');
                }
             } else{
                //If user does not type anything into search form
                get_search_form( array('echo' => true ) );
             }
                ?>

			<?php do_action('wsu_wds_theme_after_header', 'search'); ?>
			<?php get_template_part( 'template-component/component-search-block', 'search' ); ?>
			<?php do_action('wsu_wds_theme_after_content', 'search'); ?>
		</main>
		<?php do_action('wsu_wds_theme_after_main', 'search'); ?>
	</div>
	<?php do_action('wsu_wds_theme_before_footer', 'search'); ?>
	<?php get_template_part( 'template-component/component-site-footer', 'search' ); ?>
	<!-- SITE CONTAINER:END -->
</div>
<!-- SITE WRAPPER:END -->
<?php get_template_part( 'template-component/component-global-footer', 'search' ); ?>
<?php get_footer(); ?>