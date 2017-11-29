<?php get_header(); ?>
<header>
	<div class="nav-top">
		<div class="container">
			<nav class="nav-top__social hidden-sm-down">
				<ul>
					<li>
						<a href="#">
							<i class="icon-facebook is-md"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="icon-youtube is-md"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="icon-instagram is-md"></i>
						</a>
					</li>
				</ul>
			</nav>

			<div>
				<div class="d-flex_ d-sm-flex justify-content-between align-items-center no-gutters">
					<div class="col-md-5 col-xs-12">
						<nav class="nav-menu">
							<ul class="navbar-nav mr-auto_ w-100 d-flex justify-content-center flex-row">
								<li class="nav-item active">
									<a href="#">NOSTROS</a>
								</li>
								<li class="nav-item">
									<a href="#">PRODUCTOS</a>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-md-2 d-none d-sm-block">
						<a href="#">
							<img class="w-100" src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png' ?>" alt=""/>
						</a>
					</div>
					<div class="col-md-5 col-xs-12">
						<nav class="nav-menu">
							<ul class="navbar-nav mr-auto w-100 d-flex justify-content-center flex-row">
								<li class="nav-item active">
									<a href="#">BLOG</a>
								</li>
								<li class="nav-item">
									<a href="#">CONTACTO</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- body -->
<main class="home">
	<section class="section-home-baners my-2">
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

<footer class="footer">
	<div class="footer__contact">
		<div class="container">
			<div class="d-flex justify-content-center">
				<div class="w-75 text-center mt-5">
					<h2>!ENCUÉNTRANOS E EL WHAT'S UP!</h2>
				</div>
			</div>
			<div class="row footer__contact__whatsapp">
				<div class="col-12 col-sm-8 col-md-6  d-flex justify-content-center align-items-center">
					<div>
						<p class="h1 px-2 py-2 mx-3 footer__contact__whatsapp-number text-center">956 000 000</p>
					</div>
					<div class="footer__contact__whatsapp-ico align-self-start">
						<i class="icon-whatsapp is-lg"></i>
					</div>
				</div>
				<div class="col-12 col-sm-4 col-md-6  d-flex justify-content-center align-items-center">
					<img src="<?php echo get_stylesheet_directory_uri() . '/img/logo-face.png' ?>" alt="logo">
				</div>
			</div>
			<div class="row py-5 footer__content-black">
				<div class="col-md-6">
					<h4>CONTACTO</h4>
					<ul>
						<li>
							<i class="icon-phone"></i> (01)618 6309
						</li>
						<li>
							<i class="icon-location-arrow"></i> Av. francisco Bolognesi 551.
						</li>
						<li>
							<i class="icon-envelope"></i> atencionalcliente@productosunion.pe
						</li>
					</ul>
				</div>
				<div class="col-md-6 footer__social-icons">
					<h3>SÍGUENOS</h3>
					<ul>
						<li class="d-flex justify-content-left flex-wrap">
							<a href="#" class="d-flex justify-content-center align-items-center">
								<i class="icon-facebook is-lg"></i>
							</a>
							<a href="#" class="d-flex justify-content-center align-items-center">
								<i class="icon-twitter is-lg"></i>
							</a>
							<a href="#" class="d-flex justify-content-center align-items-center">
								<i class="icon-instagram is-lg"></i>
							</a>
							<a href="#" class="d-flex justify-content-center align-items-center">
								<i class="icon-youtube is-lg"></i>
							</a>
							<a href="#" class="d-flex justify-content-center align-items-center">
								<i class="icon-linkedin is-lg"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php get_footer(); ?>
