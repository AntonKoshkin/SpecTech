<div class="col-lg-4">
	<h2 class="tech-types__title">Вся техника</h2>
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
				echo "<li><a href=$link data-typeidd=".$term->slug.">".$term->name."</a></li>";
		}
		echo '</ul>';
	?>
	<a href="#" class="tech-types__button">Скачать каталог в PDF</a>
</div>