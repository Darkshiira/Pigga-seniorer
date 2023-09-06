<?php 
get_header(); ?>

<main id="main">
    <div id=homepage>
        <div id="main-feed">
            <?php
                 while ( have_posts() ) :
                    the_post();
                endwhile;        
            ?>

<div id="latest-posts">
    <?php
    if (is_active_sidebar('homepage-sidebar')) {
        dynamic_sidebar('homepage-sidebar');
    }
    ?>
</div>
        </div>
    </div>
</main>


<?php get_footer(); ?>
