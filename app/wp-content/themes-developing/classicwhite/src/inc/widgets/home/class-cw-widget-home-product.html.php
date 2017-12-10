<section class="section-home-pages">
	<div class="container ">
		<div class="d-flex justify-content-center">
			<div class="w-75 text-center mt-4 mb-5">
				<?php echo $args['before_title'] . $title . $args['after_title']; ?>
			</div>
		</div>
		<div class="row justify-content-center mt-4">
			<div class="col-12 col-sm-12 col-md-10 d-flex justify-content-left flex-wrap">
				<?php for ( $i = 0; $i < 3; $i++ ) : ?>
					<div class="">
						<a href="#" class="card-page text-center">
							<img src="http://placehold.it/240x240?text=2" alt="" class="img-fluid_" />
							<h3 class="mt-3">CONOCE LA HISTORIA DE TORINO EL PAYASO PANADERO</h3>
						</a>
					</div>
				<?php endfor;?>
			</div>
		</div>
	</div>
</section>
