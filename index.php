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

$posts_per_page = isset($_GET['posts_per_page']) ? intval($_GET['posts_per_page']) : 3;

$latest_posts = new WP_Query(array(
    'posts_per_page' => $posts_per_page,
));
        previous_posts_link('Newer Posts');
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
    <?php if ($latest_posts->found_posts > $latest_posts->post_count) : ?>
    <button id="view-more-posts">Se fler inlägg</button>
<?php endif; ?>
    <input type="hidden" id="posts-per-page" value="3">
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var viewMorePostsButton = document.getElementById('view-more-posts');
        var postsPerPageInput = document.getElementById('posts-per-page');

        viewMorePostsButton.addEventListener('click', function () {
            var currentPostsPerPage = parseInt(postsPerPageInput.value);
            var newPostsPerPage = currentPostsPerPage + 9; // Increase by 3 or your desired increment

            // Update the input field with the new value
            postsPerPageInput.value = newPostsPerPage;

            // Append the posts_per_page value to the URL and reload
            var url = window.location.href.split('?')[0] + '?posts_per_page=' + newPostsPerPage;
            window.location.href = url;
        });
    });
</script>

</div>
<?php

 endif ?>


</div>
        </div>
    </div>



<?php get_footer(); ?>
