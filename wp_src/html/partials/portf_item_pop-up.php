<div class="pipu">
	<div class="container">
		<div class="pipu__item">
			<span class="pipu_close"></span>
			<h3 class="pipu__title"></h3>
			<div class="pipu__text"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.portfolio__button').click(function(event) {
			var title = $(this).closest('.portfolio__item').find('.portfolio__title').html();
			var textqwe = $(this).closest('.portfolio__item').find('.portfolio__text').html();
			var bgi = $(this).closest('.portfolio__item').attr('style');
			event.preventDefault();
			$('.pipu__text').html(textqwe);
			$('.pipu__title').html(title);
			$('.pipu__item').attr('style', bgi);
			$('.pipu').show(400);
		});
		$('.pipu_close').click(function(event) {
			$('.pipu').hide(400);
		});
	});
</script>