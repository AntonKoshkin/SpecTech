<?php
/*
 Template Name: Контакты
 */
get_header(); // Подключаем хедер?>

	<main>
		<?php get_template_part('partials/contacts-subheader'); ?>
		<div class="map-n-consult">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="map-n-consult__map" id="indexmap"></div>
					</div>
					<div class="col-lg-4">
						<address class="consult__content">
							<p><a href="tel:+78122128506" class="consult__content--phone">+7 (812) 212 85 06</a></p>
							<p><a href="mailto:scink666@gmail.com" class="consult__content--mail">rent@speztech.ru</a></p>
							<div class="consult__form">
								<p class="consult__text">Заказать консультацию по подобру подходящей техники:</p>
								<?php echo do_shortcode('[contact-form-7 id="73" title="backcall-form"]') ?>
							</div>
						</address>
					</div>
				</div>
			</div>
		</div>
		<?php get_template_part('partials/contacts-feedbacks'); ?>
	</main>

<?php get_footer(); // Подключаем футер ?>