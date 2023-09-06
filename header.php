<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php bloginfo('name') ; ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?> </title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header>
		<div class="navbar">
			<a href="../"><h1><?= get_bloginfo('name') ?></h1></a>
			<nav>
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'menu_class' => 'primary-menu',
				));
				?>
			</nav>
		</div>
		
		<div id="hero">
			<?php
				$custom_image_url = get_theme_mod('custom_image_setting');
				if ($custom_image_url) {
					echo '<img src="' . esc_url($custom_image_url) . '" alt="Custom Image">';
				}
			?>
		</div>
	</header>