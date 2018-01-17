	<footer id="contacto" class="footer container-fluid no-gutters">
		<div class="">
<!--
			<div class="container">
				<div class="row footer__head">
					<div class="col-12 w-75_ text-center mt-5">
						<h2>!ENCUÉNTRANOS E EL WHAT'S UP!</h2>
					</div>
				</div>

				<div class="row footer__body">
					<div class="col-12 col-sm-8 col-md-6  d-flex justify-content-center align-items-center">
						<div>
							<p class="h1 px-2 py-2 mx-3 whatsapp-number text-center">956 000 000</p>
						</div>
						<div class="whatsapp-ico align-self-start">
							<i class="icon-whatsapp is-lg"></i>
						</div>
					</div>
					<div class="col-12 col-sm-4 col-md-6  d-flex justify-content-center align-items-center">
						<img src="<?php echo get_stylesheet_directory_uri() . '/img/logo-face.png' ?>" alt="logo">
					</div>
				</div>
			</div>
-->
			<?php $numberWhatsapp = get_theme_mod( 'url_field_whatsapp' ); ?>
			<?php if (is_numeric($numberWhatsapp)) : ?>
				<div class="container-fluid container-whatsapp">
					<a href="https://api.whatsapp.com/send?phone=<?php echo $numberWhatsapp; ?>" target="_blank">
						<img class="w-100" src="<?php echo get_stylesheet_directory_uri() . '/img/whatsapp-pedidos.jpg' ?>"" alt="whatsapp pedidos">
					</a>
				</div>
			<?php endif;?>
			<div class="footer__footer" style="/*min-height: 40vh;*/">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h4>CONTACTO</h4>
							<ul>
								<li>
									<i class="icon-phone"></i>&nbsp;&nbsp;(01)618 6309
								</li>
								<li>
									<i class="icon-location-arrow"></i>&nbsp;&nbsp;Av. francisco Bolognesi 551.
									<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Santa Anita - Lima
								</li>
								<li>
									<i class="icon-envelope"></i>&nbsp;&nbsp;atencionalcliente@productosunion.pe
								</li>
							</ul>
						</div>
						<div class="col-md-6 social-icons">
							<h3 class="mb-3">SÍGUENOS</h3>
							<?php
								$rrssFB = get_theme_mod( 'url_field_facebook' );
								$rrssTW = get_theme_mod( 'url_field_twitter' );
								$rrssPT = get_theme_mod( 'url_field_pinterest' );
								$rrssYT = get_theme_mod( 'url_field_youtube' );
								$rrssLK = get_theme_mod( 'url_field_linkedin' );
							?>
							<ul>
								<li class="d-flex justify-content-left flex-wrap">
									<?php if (!empty($rrssFB)) : ?>
										<a target="_blank" href="<?php echo $rrssFB ?>" class="d-flex justify-content-center align-items-center">
											<i class="icon-facebook is-lg"></i>
										</a>
									<?php endif; ?>
									<?php if (!empty($rrssTW)) : ?>
										<a target="_blank" href="<?php echo $rrssTW ?>" class="d-flex justify-content-center align-items-center">
											<i class="icon-twitter is-lg"></i>
										</a>
									<?php endif; ?>
									<?php if (!empty($rrssPT)) : ?>
										<a target="_blank" href="<?php echo $rrssPT ?>" class="d-flex justify-content-center align-items-center">
											<i class="icon-instagram is-lg"></i>
										</a>
									<?php endif; ?>
									<?php if (!empty($rrssYT)) : ?>
										<a target="_blank" href="<?php echo $rrssYT ?>" class="d-flex justify-content-center align-items-center">
											<i class="icon-youtube is-lg"></i>
										</a>
									<?php endif; ?>
									<?php if (!empty($rrssLK)) : ?>
										<a target="_blank" href="<?php echo $rrssLK ?>" class="d-flex justify-content-center align-items-center">
											<i class="icon-linkedin is-lg"></i>
										</a>
									<?php endif; ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<a href="#all" class="to-top scroll-to mr-3"><span class="icon-circle-up"></span></span></a>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	</body>
</html>
