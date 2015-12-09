<div class="cont-feed">
	<div class="container">
		<h2 class="cont-feed__title">Отзывы</h2>
		<div class="row">
			<?php 
				query_posts(array(
					'post_type' => 'feedback',
					'showposts' => 4
				)); 
			?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="col-lg-3">
					<div class="cont-feed__item">
						<div class="cont-feed__img">
							<img src="<?php the_field('feedback__face'); ?>" alt="feedback-face">
						</div>
						<blockquote class="cont-feed__content">
							<?php the_content(); ?>
							<cite class="cont-feed__content--name"><?php the_field('feed_name'); ?></cite>
						</blockquote>
					</div>
				</div>
			<?php endwhile;?>
		</div>
	</div>
</div>