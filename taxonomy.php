<?php

/**
 * The template for displaying taxonomy pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gourmet_Artistry
 */

get_header(); ?>

<div class="row">
    <div id="primary" class="content-area medium-8 columns">
        <main id="main" class="site-main" role="main">

            <?php
            $term = get_queried_object();
            $taxonomy = get_taxonomy($term->taxonomy);
            echo '<h1>' .  $taxonomy->label . ": " . $term->name .  '</h1>';
            ?>

            <?php
            if (have_posts()) : ?>

                <header class="page-header">
                    <?php
                    the_archive_description('<h1 class="page-title text-center separator">', '</h1>');
                    //the_archive_description( '<div class="taxonomy-description">', '</div>' );
                    ?>
                </header><!-- .page-header -->

            <?php
                /* Start the Loop */
                while (have_posts()) : the_post();

                    /*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
                    get_template_part('template-parts/content', get_post_format());

                endwhile;

                the_posts_navigation();

            else :

                get_template_part('template-parts/content', 'none');

            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

    <?php
    get_sidebar();
    echo "</div>";
    get_footer();
