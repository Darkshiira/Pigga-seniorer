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

            <aside class="sidebar">
                <?php dynamic_sidebar('homepage-sidebar'); ?>
            </aside>
        </div>
    </div>
</main>


<?php get_footer(); ?>
