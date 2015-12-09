<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SpecTech24
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<!-- RSS, стиль и всякая фигня -->
<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700&amp;subset=latin,cyrillic" rel="stylesheet">

 <!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->
<title>
<?php // Генерируем тайтл в зависимости от контента с разделителем " | "
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
?>
</title>
<?php
	wp_head(); // Необходимо для работы плагинов и функционала wp
?>

</head>
<body>
	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<a href="<?php echo post_permalink(10); ?>" <?php if (is_front_page()) { ?>style="pointer-events: none"<?php }; ?> class="header__logo">
						<span class="header__logo--fat">СпецТех</span>24
					</a>
				</div>
				<div class="col-lg-9">
					<?php wp_nav_menu(array(
						'theme_location'  => '',
						'menu'            => 'qwe', 
						'container'       => 'nav',
						'container_class' => 'header-menu',
						'container_id'    => '',
						'menu_class'      => 'main-menu', 
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
						'depth'           => 0
					)); ?>
				</div>
			</div>
		</div>
		<?php get_template_part('partials/pop-up_backcall'); ?>
	</header>