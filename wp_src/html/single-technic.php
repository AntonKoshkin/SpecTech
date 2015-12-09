<?php

get_header(); // Подключаем хедер?>

<main>
	<?php get_template_part('partials/catalog-subheader'); ?>
	<div class="cat_item">
		<div class="container">
			<div class="row cata">
				<?php while (have_posts()) : the_post(); ?>
					<div class="col-lg-4">
						<div class="cat_item__img">
							<img src="<?php the_field('technic__img'); ?>" alt="technic_image">
						</div>
					</div>
					<div class="col-lg-8">
						<h1 class="cat_item__title"><?php the_title(); ?></h1>
						<?php the_content(); ?>
						<a href="<?php echo post_permalink(36); ?>" class="cat-item__button cat-item__button--blue">Назад</a>
					</div>
				<?php endwhile;?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); // Подключаем футер ?>