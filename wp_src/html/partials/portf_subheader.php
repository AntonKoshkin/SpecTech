<div class="port-sub">
	<div class="container">
		<div class="row">
			<div class="col-lg-2">
				<h1 class="port-sub__title">Портфолио</h1>
			</div>
			<div class="col-lg-10">
				<?php
					$args = array(
						'orderby' => 'name', 
						'order' => 'ASC',
						'hide_empty' => false, 
						'exclude' => array(), 
						'exclude_tree' => array(), 
						'include' => array(),
						'fields' => 'all', 
						'hierarchical' => true, 
						'child_of' => 0,
						'childless' => false,
						'pad_counts' => false, 
						'cache_domain' => 'core'
					);
					$allterms = get_terms('portfolio__types', $args);
					echo '<ul class="port-sub__menu"><li><a href="#" class="port-sub__item port-sub__item--all">Все работы</a></li>';
					foreach($allterms as $term){
						$link = get_term_link( $term );
						echo "<li><a href=".$link." data-term=".$term->slug." class='port-sub__item'>".$term->name."</a></li>";
					}
					echo '</ul>';
				?>
			</div>
		</div>
	</div>
</div>