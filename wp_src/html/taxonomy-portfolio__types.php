<?php
/*
 Template Name: Портфолио
 */
get_header(); // Подключаем хедер?>

	<main>
		<div class="port-sub">
			<div class="container">
				<div class="row">
					<div class="col-lg-2">
						<h1 class="port-sub__title">Портфолио</h1>
					</div>
					<div class="col-lg-10">
						<?php
							$args = array(
								'orderby' => 'none', 
								'order' => 'ASC',
								'hide_empty' => true, 
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
							echo '<ul class="port-sub__menu">';
							foreach($allterms as $term){
								$link = get_term_link( $term );
								echo "<li><a href=".$link." class='port-sub__item'>".$term->name."</a></li>";
							}
							echo '</ul>';
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="portfolio">
			<?php while (have_posts()) : the_post();
			?>
				<div class="portfolio__item" style="background: url(<?php the_field('portfolio__bgi'); ?>) center no-repeat; background-size: cover;">
					<div class="container">
						<div class="row">
							<div class="col-lg-5">
								<div class="portfolio__content">
									<h3 class="portfolio__title"><?php the_title(); ?></h3>
									<?php the_content(); ?>
									<div class="portfolio__button">Подробнее</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile;?>
		</div>
		<div class="backcall">
			<div class="container">
				<h2 class="backcall__title">Закажите бесплатную консультацию по подбору подходящей техники </h2>
				<form action="mailto:scink666@gmail.com">
					<div class="row">
						<div class="col-lg-3">
							<input type="text" value="" placeholder="Как Вас зовут?" class="backcall__input" required>
						</div>
						<div class="col-lg-3">
							<input type="tel" value="" placeholder="Номер для связи" class="backcall__input"required>
						</div>
						<div class="col-lg-3">
							<span class="date-arrow">
								<input type="text" value="" placeholder="Выберите дату" name="date" class="backcall__input">
							</span>
						</div>
						<div class="col-lg-3">
							<input type="submit" value="Заказать консультацию" class="backcall__input backcall__input--submit">
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="perks">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<p class="perks__text perks__text--keys">Техника проходит обязательное обслуживание перед каждым выездом</p>
					</div>
					<div class="col-lg-3">
						<p class="perks__text perks__text--digger">Все машины оборудованы спец. сигналами, для предупреждения аварий</p>
					</div>
					<div class="col-lg-3">
						<p class="perks__text perks__text--fencing">Привезем модные строительные ограждения к каждому заказу от 20&nbsp;000</p>
					</div>
					<div class="col-lg-3">
						<p class="perks__text perks__text--worker">С техникой приедут квалифицированные операторы и водители</p>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php get_footer(); // Подключаем футер ?>