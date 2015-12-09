<?php
/*
 Template Name: Каталог
 */
get_header(); // Подключаем хедер?>
	<main>
		<?php get_template_part('partials/catalog-subheader'); ?>
		<?php get_template_part('partials/catalog-items'); ?>
		<?php get_template_part('partials/catalog-specials'); ?>
		<?php get_template_part('partials/pop-up'); ?>
	</main>
<?php get_footer(); // Подключаем футер ?>