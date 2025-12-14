	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<?php $situs = $this->db->get_where("tbl_situs");
			?>

			<?php foreach ($situs->result_array() as $i) :

				$footer = $i['situs_footer'];
				$hp = $i['situs_hp'];
				$email = $i['situs_mail'];
			?>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="footer-box about-widget">
							<h2 class="widget-title">About us</h2>
							<p>Selamat datang di GKS Jemaat Waikabubak! Kami senang Anda telah bergabung dengan kami. Kami berkomitmen untuk memancarkan kasih dan terang Kristus di tengah masyarakat Waikabubak dan sekitarnya.</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="footer-box get-in-touch">
							<h2 class="widget-title">Get in Touch</h2>
							<ul>
								<li>Jl Gajah Mada No.2 Waikabubak</li>
								<li><?= $email; ?></li>
								<li><?= $hp; ?></li>
								<li><img width="150" src="<?php echo base_url(''); ?>style/img/logogks.png" class="rounded" alt="Logo Gks Waikabubak"></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="footer-box pages">
							<h2 class="widget-title">Pages</h2>
							<ul>
								<li><a href="<?php echo site_url(); ?>">Dashboard</a></li>
								<li><a href="<?php echo base_url(''); ?>administrator">Login Admin</a></li>
								<li><a href="<?php echo site_url('about'); ?>">Sambutan Pendeta</a></li>
								<li><a href="<?php echo site_url('artikel'); ?>">Berita Gereja</a></li>
								<li><a href="<?php echo site_url('galeri'); ?>">Galeri Gereja</a></li>
								<li><a href="<?php echo site_url('contact'); ?>">Alamat Gereja</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="footer-box subscribe">
							<h2 class="widget-title">Subscribe</h2>
							<p>Subscribe to our mailing list to get the latest updates.</p>
							<form id="subscribe-form">
								<input type="email" name="email" id="email" placeholder="Email" required>
								<button type="submit"><i class="fas fa-paper-plane"></i></button>
							</form>
							<div id="subscribe-message" class="alert" style="display: none;"></div>
						</div>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
	<!-- end footer -->

	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p> Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> <?= $footer; ?> </p>
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->

	<!-- jquery -->
	<script src="<?php echo base_url(''); ?>assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="<?php echo base_url(''); ?>assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="<?php echo base_url(''); ?>assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="<?php echo base_url(''); ?>assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="<?php echo base_url(''); ?>assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="<?php echo base_url(''); ?>assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="<?php echo base_url(''); ?>assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="<?php echo base_url(''); ?>assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="<?php echo base_url(''); ?>assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="<?php echo base_url(''); ?>assets/js/main.js"></script>
	<script src="<?php echo base_url(''); ?>assets/vendor/aos/aos.js"></script>
	<!-- AOS CSS -->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<!-- FontAwesome 6 CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- AOS JS -->
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<!-- lightbox -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#subscribe-form').on('submit', function(e) {
				e.preventDefault(); // Mencegah form dari submit biasa

				var email = $('#email').val();

				$.ajax({
					url: "<?php echo site_url('subscribe'); ?>",
					type: "POST",
					data: {
						email: email
					},
					dataType: "json",
					success: function(response) {
						if (response.status === 'success') {
							$('#subscribe-message').removeClass('alert-danger').addClass('alert-success').text(response.message).show();
						} else {
							$('#subscribe-message').removeClass('alert-success').addClass('alert-danger').text(response.message).show();
						}

						// Kosongkan input email setelah submit
						$('#email').val('');
					},
					error: function() {
						$('#subscribe-message').removeClass('alert-success').addClass('alert-danger').text('Terjadi kesalahan saat berlangganan.').show();
					}
				});
			});
		});
	</script>
	<script>
		AOS.init();
	</script>
	</body>

	</html>