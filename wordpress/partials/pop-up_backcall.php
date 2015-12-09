<div class="pubc">
<div class="pubc__back"></div>
	<div class="pubc__cont">
		<span class="pubc_close"></span>
		<h3>Заказать обратный звонок</h3>
		<div class="pubc__form">
			<?php echo do_shortcode('[contact-form-7 id="6" title="common_backcall"]') ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.main-menu').find('a').each(function(event) {
			if ($(this).attr('href') == '#') {
				$(this).click(function(event) {
					event.preventDefault();
					$('.pubc').fadeIn(400);
				});
			};
		});
		$('.want-call').click(function(event) {
			$('.pubc').fadeIn(400);
		});
		$('.pubc_close, .pubc__back').click(function(event) {
			$('.pubc').fadeOut(400);
		});
	});
</script>