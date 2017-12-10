<?php
		// echo __( 'Hello, World!', 'classicwhite-theme' );
?>
<section class="section-home-products">
	<div class="container">
		<div class="d-flex justify-content-center mt-4 mb-2">
			<div class="w-75 text-center mt-4 mb-5">
				<?php echo $args['before_title'] . $title . $args['after_title']; ?>
			</div>
		</div>

		<div class="row justify-content-center mt-4">
			<div class="col-12 col-sm-12 col-md-10">
				<section class="regular slider-product">
					<?php for ( $i = 0; $i < 6; $i++ ) : ?>
						<div>
							<a class="card-product" href="#">
								<img src="http://placehold.it/240x240?text=1" class="_img-fluid" />
								<h3 class="my-2">Product Name</h3>
								<p>Es un hecho establecido hace demasiado tiempo que un lector se distraerá</p>
							</a>
						</div>
					<?php endfor; ?>
				</section>
			</div>
		</div>
	</div>
</section>
