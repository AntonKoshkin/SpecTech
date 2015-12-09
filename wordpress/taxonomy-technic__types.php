<?php
/*
 Template Name: Каталог
 */
get_header(); // Подключаем хедер?>

	<main>
		<?php get_template_part('partials/catalog-subheader'); ?>
		<div class="tt-and-cat">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<h2 class="tech-types__title"><a href="<?php echo post_permalink(36); ?>">Вся техника</a></h2>
						<?php
							$args = array(
								'orderby'		=> 'id', 
								'order'			=> 'ASC',
								'hide_empty'	=> true, 
								'exclude'		=> array(), 
								'exclude_tree' => array(), 
								'include'		=> array(),
								'number'			=> '',
								'fields'			=> 'all', 
								'hierarchical' => true, 
								'child_of'		=> 0,
								'get'				=> '',
								'childless'		=> false,
								'pad_counts'	=> false, 
								'cache_domain' => 'core'
							);
							$allterms = get_terms('technic__types', $args);
							echo '<ul class="tech-types__menu">';
							foreach($allterms as $term){
									$link = get_term_link( $term );
									echo "<li><a href=$link>".$term->name."</a></li>";
							}
							echo '</ul>';
						?>
						<a href="#" class="tech-types__button">Скачать каталог в PDF</a>
					</div>
					<div class="col-lg-8">
						<div class="row">
							<?php while (have_posts()) : the_post(); ?>
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
										<a href="#" class="cat-item__button cat-item__button--yellow">Арендовать</a>
										<a href="<?php echo post_permalink($id); ?>" class="cat-item__button cat-item__button--blue">Подробнее</a>
									</div>
								</div>
							<?php endwhile;?>
							<div class="col-lg-12">
								<?php 
									$args = array(
										'mid_size' => 5,
										'prev_next' => false,
										'type' => 'list',
										'screen_reader_text' => ' ',
									); 
									echo $pagination = get_the_posts_pagination($args);
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php get_template_part('partials/catalog-specials'); ?>
		<?php get_template_part('partials/pop-up'); ?>
	</main>

<?php get_footer(); // Подключаем футер ?>