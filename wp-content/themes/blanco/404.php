<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 */

get_header(); ?>

        <section id="main" class="columns2-left">
            <aside id="sidebar">
                <?php get_sidebar(); ?>
            </aside>
            <div class="content">
                    <h1 class="notFound"><?php _e('<strong></strong>', ETHEME_DOMAIN); ?></h1>
    				
    				<h3>Trang bạn vừa tìm không tồn tại.</h3>
    				
    				<p><?php _e('', ETHEME_DOMAIN); ?> <br />
    				<?php get_search_form(); ?>
			</div><!-- #content -->
            <div class="clear"></div>
		</section><!-- #container -->

<?php get_footer(); ?>