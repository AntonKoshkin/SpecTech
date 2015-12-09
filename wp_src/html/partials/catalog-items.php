<div class="tt-and-cat">
	<div class="container">
		<div class="row">
			<?php get_template_part('partials/catalog-items-menu'); ?> <!-- подключение меню -->
			<!-- элементы каталога -->
			<div class="col-lg-8 qwerty">
				<div class="row" id="pagination">
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
					$cat = get_the_terms( $id, 'technic__types');
					?>
						<div class="col-lg-6">
							<div data-typeid="<?php echo $cat[0]->slug; ?>" class="cat-item 
								<?php
									if (get_field('is-anytype') == 'is-new') {
										echo 'cat-item--new';
									} else if (get_field('is-anytype') == 'is-special') {
										echo 'cat-item--sale';
									} 
								?>" 
							>
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
					<!-- пагинация -->
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