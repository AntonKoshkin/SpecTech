<div class="portfolio">
<?php
	query_posts(array(
		'post_type' => 'portfolio',
		'showposts' => 5
	));
?>
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
						<a href="<?php echo post_permalink($idd); ?>" class="portfolio__button">Подробнее</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endwhile;?>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		// показ/скрытие элементов по категории
		$('.port-sub__item').click(function(event) {
			var itemId = $(this).attr('data-term');
			event.preventDefault();
			$('.portfolio__item').each(function(index) {
				if ($(this).attr('data-termid') == itemId) {
					$(this).fadeIn(400);
				} else {
					$(this).fadeOut(400);
				};
			});
		});
		// показ всех элементов
		$('.port-sub__item--all').click(function(event) {
			$('.portfolio__item').fadeIn(400);
		});
	});
</script>