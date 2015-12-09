<?php
/*
 Template Name: Портфолио
 */
get_header(); // Подключаем хедер?>

	<main>
		<div class="portfolio">
		<?php 
			while (have_posts()) : the_post();
		?>
			<div class="portfolio__item portfolio__item--podr" style="background: url(<?php the_field('portfolio__bgi'); ?>) center no-repeat; background-size: cover;">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="portfolio__content portfolio__content--podr">
								<h3 class="portfolio__title"><?php the_title(); ?></h3>
								<div class="portfolio__text">
									<?php the_content(); ?>
								</div>
								<a href="<?php echo post_permalink(16); ?>" class="portfolio__button portfolio__button--podr">Назад</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile;?>
		</div>
		<?php get_template_part('partials/main-form'); ?>
		<?php get_template_part('partials/perks'); ?>
		
	</main>

<?php get_footer(); // Подключаем футер ?>