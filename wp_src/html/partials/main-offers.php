<div class="offers">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<h2 class="offers__title">Вся техника</h2>
				<?php
					$args = array(
						'orderby'		=> 'none', 
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
					echo '<ul class="offers__menu">';
					foreach($allterms as $term){
							$link = get_term_link( $term );
							echo "<li><a href=$link class='offers__item'>".$term->name."</a></li>";
					}
					echo '</ul>';
				?>
			</div>
			<div class="col-lg-9">
				<h2 class="offers__title">Спецпредложение</h2>
				<table class="offers__table">
					<thead>
						<tr>
							<th>Позиция для аренды</th>
							<th>За смену</th>
							<th>За неделю</th>
							<th>За месяц</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							query_posts(array(
								'post_type' => 'technic',
								'meta_key' => 'is-anytype',
								'showposts' => 5,
								'meta_value' => 'is-special'
							)); 
						?>
						<?php while (have_posts()) : the_post(); ?>
							<tr>
								<td><?php the_title(); ?></td>
								<td><?php the_field('technic__price--day'); ?></td>
								<td><?php the_field('technic__price--week'); ?></td>
								<td><?php the_field('is-special__price--new'); ?></td>
							</tr>
						<?php endwhile;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>