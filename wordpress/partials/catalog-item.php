<?php 
	query_posts(array(
		'orderby'	=> 'id',
		'post_type' => 'technic',
		'showposts' => 4,
		'paged' => get_query_var('paged') 
	)); 
?>
<?php while (have_posts()) : the_post();
$id = get_the_ID();
?>
	<div class="col-lg-6">
		<div class="cat-item <?php
			if (get_field('is-anytype') == 'is-new') {
				echo 'cat-item--new';
			} else if (get_field('is-anytype') == 'is-special') {
				echo 'cat-item--sale';
			} ?>">
			<h3 class="cat-item__title"><?php the_title(); ?></h3>
			<div class="cat-item__img">
				<img src="<?php the_field('technic__img'); ?>" alt="technic_image">
			</div>
			<p class="cat-item__price">
				<?php
					if (get_field('is-anytype') != 'is-special') {
						echo '<span class="cat-item__price--big">'.get_field("technic__price--month").'</span>';
					} else {
						echo '<span class="cat-item__price--old">'.get_field("is-special__price--old").'</span><span class="cat-item__price--new">'.get_field('is-special__price--new').'</span>';
					}
				?>
				<span class="cat-item__price--slash"> / </span>
				месяц
			</p>
			<a href="#" data-id="<?php echo $id ?>" class="cat-item__button cat-item__button--yellow">Арендовать</a>
			<a href="<?php echo post_permalink($id); ?>" class="cat-item__button cat-item__button--blue">Подробнее</a>
		</div>
	</div>
<?php endwhile;?>