<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SpecTech24
 */

	wp_footer(); // Необходимо для нормальной работы плагинов
?>
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<a href="<?php echo post_permalink(10); ?>" class="footer__logo">
						<span class="footer__logo--fat">СпецТех</span>24
					</a>
				</div>
				<div class="col-lg-9">
					<?php wp_nav_menu(array(
							'theme_location'  => '',
							'menu'            => 'qwe', 
							'container'       => 'nav',
							'container_class' => 'footer-menu',
							'container_id'    => '',
							'menu_class'      => 'main-menu', 
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
							'depth'           => 0
						));
					?>
				</div>
			</div>
		</div>
	</footer>
	<script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
	<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=cikF96qw878GBGcRyucSZVbLJ8nhbJQv&amp;width=100%&amp;height=100%&amp;lang=ru_RU&amp;sourceType=constructor&amp;id=indexmap"></script>
</body>
</html>