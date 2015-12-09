<?php
/*
 Template Name: Портфолио
 */
get_header(); // Подключаем хедер?>

	<main>
		<?php get_template_part('partials/portf_subheader'); ?>
		<?php get_template_part('partials/portf_items'); ?>
		<?php get_template_part('partials/main-form'); ?>
		<?php get_template_part('partials/perks'); ?>
		
	</main>

<?php get_footer(); // Подключаем футер ?>