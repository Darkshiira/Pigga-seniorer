<?php get_header(); ?>

<style>
    .error-404 {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 70vh;
        text-align: center;
    }

    .error-content {
        font-size: 1.5rem;
        margin-bottom: 20px;
    }

    .error-content .page-title {
        font-size: 2.5rem;
        margin-bottom: 10px;
    }

    .error-content p {
        margin: 0; /* Reset the paragraph's default margin */
        margin-bottom: 20px;
    }

    .go-home-btn {
        padding: 10px 20px;
        font-size: 1.2rem;
        background-color: #0073aa; /* Adjust the color as needed */
        color: #ffffff;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .go-home-btn:hover,
    .go-home-btn:focus {
        background-color: #005a87; /* Adjust the hover color as needed */
    }

    @media (max-width: 600px) {
        .error-content {
            font-size: 1.2rem;
        }

        .error-content .page-title {
            font-size: 2rem;
            margin-bottom: 8px;
        }
    }
</style>

<main id="main" class="site-main" role="main">

    <section class="error-404 not-found">
        <div class="error-content">
          
                <h1 class="page-title"><?php _e( 'Oj! Sidan kunde inte hittas.', 'text-domain' ); ?></h1>
    
            <p><?php _e( 'Det verkar som att ingenting hittades på den här platsen.', 'text-domain' ); ?></p>
            <a class="go-home-btn" href="<?php echo home_url(); ?>"><?php _e( 'Gå tillbaka till startsidan', 'text-domain' ); ?></a>
        </div>
    </section>

</main>

<?php get_footer(); ?>
