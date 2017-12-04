<?php get_header(); ?>
<div class="wrapper-container">
	<!-- body -->
	<main class="home">
		<section class="section-home-baners">
			<div class="container">
				<?php echo do_shortcode( '[rev_slider alias="thehome"]' ); ?>
			</div>
		</section>

		<section class="section-home-products">
			<div class="container">
				<div class="d-flex justify-content-center mt-4 mb-2">
					<div class="w-75 text-center mt-4 mb-5">
						<h2>TENEMOS MÁS DE 10 AÑOS LLEVANDO PRODUCTOS DELICIOSOS A TU HOGAR</h2>
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

		<section class="section-home-pages">
			<div class="container ">
				<div class="d-flex justify-content-center">
					<div class="w-75 text-center mt-4 mb-5">
						<h2>CONOCE MÁS SOBRE TORRINO</h2>
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
	</main>
</div><!-- End.wrapper-container-->
<?php get_footer(); ?>
