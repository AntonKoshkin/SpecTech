<div class="numbers-and-feedbacks">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h2 class="numbers-and-feedbacks__title">Спецтех<span class="numbers-and-feedbacks__title--slim"> в цифрах</span></h2>
				<ul class="numbers__menu">
					<li class="numbers__item"><span class="numbers__item--big">16</span>Лет работы</li>
					<li class="numbers__item"><span class="numbers__item--big">715</span>Объектов построено</li>
					<li class="numbers__item"><span class="numbers__item--big">108</span>Единиц техники</li>
					<li class="numbers__item"><span class="numbers__item--big">500+</span>Довольных клиентов</li>
				</ul>
			</div>
			<div class="col-lg-8">
				<h2 class="numbers-and-feedbacks__title">Нас рекомендуют клиенты</h2>
				<?php 
					query_posts(array(
						'post_type' => 'feedback',
						'showposts' => 2
					)); 
				?>
				<?php while (have_posts()) : the_post(); ?>
					<div class="feedbacks__item">
						<div class="feedbacks__face">
							<img src="<?php the_field('feedback__face'); ?>" alt="feedback-face">
						</div>
						<blockquote>
							<?php the_content(); ?>
							<cite class="feedbacks__name"><?php the_title(); ?><?php if (get_field('feedback__firm') !== '') { echo (', ');}?><?php the_field('feedback__firm'); ?></cite>
						</blockquote>
					</div>
				<?php endwhile;?>
			</div>
		</div>
	</div>
</div>