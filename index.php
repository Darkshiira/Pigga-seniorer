<?php 
get_header(); ?>

<main id="main">
    <div id=homepage>
        <div id="main-feed">
        <aside class="sidebar">
                <?php dynamic_sidebar('homepage-sidebar'); ?>
</aside>

        <?php
$show_latest_posts = get_theme_mod('show_latest_posts', true);

if ($show_latest_posts) :
?>
<div class="latest-posts">
    
    <ul>
        <?php
        $latest_posts = new WP_Query(array(
            'posts_per_page' => 3,
        ));

        if ($latest_posts->have_posts()) :
            while ($latest_posts->have_posts()) : $latest_posts->the_post();
        ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php the_content(); ?></li>
        <?php
            endwhile;
        else :
            echo '<p>No posts found</p>';
        endif;
        wp_reset_postdata();
        ?>
    </ul>
</div>
<?php endif ?>


</div>
        </div>
    </div>
</main>


<?php get_footer(); ?>
