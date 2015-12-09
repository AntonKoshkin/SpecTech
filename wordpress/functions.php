<?php
/**
 * Чистый Шаблон для разработки
 * Функции шаблона
 * http://mkoreshkov.ru
 * @package WordPress
 * @subpackage clean
 */
register_nav_menus( array( // Регистрируем 2 меню
	'top' => 'Верхнее меню',
	'left' => 'Нижнее'
) );
add_theme_support('post-thumbnails'); // Включаем поддержку миниатюр
set_post_thumbnail_size(254, 190); // Задаем размеры миниатюре

if ( function_exists('register_sidebar') )
register_sidebar(); // Регистрируем сайдбар






function my_get_posts_for_pagination() {
	$paged = $_GET['page']; // Page number
	$html = '';
	$pag = 0;
	if( filter_var( intval( $paged ), FILTER_VALIDATE_INT ) ) {
		$pag = $paged;
		$args = array(
			'paged' => $pag, // Uses the page number passed via AJAX
			'post_type' => 'technic',
			'posts_per_page' => 2 // Change this as you wish
			
		);
		$loop = new WP_Query( $args );
			
		if( $loop->have_posts() ) {
			while( $loop->have_posts() ) {
				$loop->the_post(); ?>
				
				<div class="col-lg-6">
					<div class="cat-item"></div>
				</div> <?php
			}
				
			wp_reset_query();
		}
	}
		
	echo $html;
	exit();

}

add_action( 'wp_ajax_my_pagination', 'my_get_posts_for_pagination' );
add_action( 'wp_ajax_nopriv_my_pagination', 'my_get_posts_for_pagination' );

?>