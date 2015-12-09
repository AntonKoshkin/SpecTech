<?php
/*
 Template Name: Портфолио
 */
get_header(); // Подключаем хедер?>

	<main>
		<?php get_template_part('partials/portf_subheader'); ?>
		<div class="portfolio">
		<?php 
			while (have_posts()) : the_post();
			$idd = get_the_ID();
			$cat = get_the_terms( $idd, 'portfolio__types');
		?>
			<div class="portfolio__item" data-termid="<?php echo $cat[0]->slug; ?>" style="background: url(<?php the_field('portfolio__bgi'); ?>) center no-repeat; background-size: cover;">
				<div class="container">
					<div class="row">
						<div class="col-lg-5">
							<div class="portfolio__content">
								<h3 class="portfolio__title"><?php the_title(); ?></h3>
								<div class="portfolio__text">
									<?php the_content(); ?>
								</div>
								<a href="<?php echo post_permalink($); ?>" class="portfolio__button">Подробнее</a>
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