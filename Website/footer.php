
<footer>
    
    <div class="footer-contact">
        <strong>Address:</strong> <?php echo get_theme_mod('footer_address_setting', 'Default Address'); ?><br>
        <strong>Email:</strong> <?php echo get_theme_mod('footer_email_setting', 'support@example.com'); ?><br>
        <strong>Phone:</strong> <?php echo get_theme_mod('footer_phone_setting', '+(012)345-6789'); ?><br>
        <strong>Time:</strong> <?php echo get_theme_mod('footer_time_setting', 'Mon to Fri 8:00-5:00'); ?>
    </div>

  
</footer>

<?php wp_footer(); ?>
</body>
</html>