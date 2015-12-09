<div class="specials">
	<div class="container">
		<h2 class="specials__title">Спецпредложения</h2>
		<div class="row">
			<?php 
				query_posts(array(
					'post_type' => 'technic',
					'meta_key' => 'is-anytype',
					'showposts' => 3,
					'meta_value' => 'is-special'
				));
			?>
			<?php while (have_posts()) : the_post();
			$id = get_the_ID();
			?>
				<div class="col-lg-4">
					<div class="cat-item cat-item--sale">
						<h3 class="cat-item__title"><?php the_title(); ?></h3>
						<div class="cat-item__img">
							<img src="<?php the_field('technic__img'); ?>" alt="technic_img">
						</div>
						<p class="cat-item__price">
							<span class="cat-item__price--old"><?php the_field('is-special__price--old'); ?></span>
							<span class="cat-item__price--new"><?php the_field('is-special__price--new'); ?></span>
							<span class="cat-item__price--slash"> / </span>
							месяц
						</p>
						<a href="#" class="cat-item__button cat-item__button--yellow">Арендовать</a>
						<a href="<?php echo post_permalink($id); ?>" class="cat-item__button cat-item__button--blue">Подробнее</a>
					</div>
				</div>
			<?php endwhile;?>
		</div>
	</div>
</div>