<div class="pop-up" id="<?php echo $id ?>">
	<div class="pop-up__back"></div>
	<div class="container pop-up__container">
	<span class="pop-up_close"></span>
		<div class="row">
			<div class="col-lg-4">
				<div class="pop-up__img">
					<img src="" alt="">
					<p class="pop-up__price"><span class="pop-up__price--num"></span> р в месяц</p>
				</div>
			</div>
			<div class="col-lg-8">
				<h3 class="pop-up__title"></h3>
				<div class="pop-up__form">
					<?php echo do_shortcode('[contact-form-7 id="76" title="pop-up_form"]') ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.cat-item__button--yellow').click(function(event) {
			var popUpId = $(this).attr('data-id');
			var catImg = $(this).closest('.cat-item').find('.cat-item__img img').attr('src');
			var catName = $(this).closest('.cat-item').find('.cat-item__title').html();
			if ($(this).closest('.cat-item').find('.cat-item__price--new').text() != '') {
				var catPrice = $(this).closest('.cat-item').find('.cat-item__price--new').html();
			} else {
				var catPrice = $(this).closest('.cat-item').find('.cat-item__price--big').html();
			}
			event.preventDefault();
			$('.pop-up').fadeIn().attr('id', popUpId);
			$('.pop-up__img img').attr('src', catImg);
			$('.pop-up__title').text(catName);
			$('.pop-up__price--num').text(catPrice);
			$('.hidden-input input').val(catName);
		});
		$('.pop-up_close, .pop-up__back').click(function(event) {
			$('.pop-up').fadeOut();
		});
	});
</script>
