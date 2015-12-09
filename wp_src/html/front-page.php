<?php
/*
 Template Name: Главная
 */
get_header(); // Подключаем хедер?>
   
	<main>
		<?php get_template_part('partials/main-promo'); ?>
		<?php get_template_part('partials/main-form'); ?>
		<?php get_template_part('partials/perks'); ?>
		<?php get_template_part('partials/main-offers'); ?>
		<div class="indexmap" id="indexmap"></div>
	</main>

<?php get_footer(); // Подключаем футер ?>