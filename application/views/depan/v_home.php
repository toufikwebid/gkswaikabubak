<!-- hero area -->
<div class="hero-area hero-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 offset-lg-2 text-center">
				<div class="hero-text">
					<div class="hero-text-tablecell">

						<h1>Gereja Kristen Sumba</h1>
						<p class="subtitle">Jemaat Waikabubak</p>
						<div class="hero-btns">
							<a href="<?php echo site_url('about'); ?>" class="boxed-btn">Tentang Kami</a>
							<a href="<?php echo site_url('contact'); ?>" class="bordered-btn">Hubungi Kami</a>
							<a href="<?php echo site_url('saran'); ?>" class="bordered-btn">Saran</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- end hero area -->
<!-- testimonail-section -->
<div class="testimonail-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 offset-lg-1 text-center">

				<div class="single-testimonial-slider">
					<?php $quotes = $this->db->get_where("tbl_situs");
					?>

					<?php foreach ($quotes->result_array() as $i) :

						$quotes = $i['situs_quotes'];
						$foto = $i['situs_ftpendeta'];
					?>
						<div class="client-avater">
							<img src="<?php echo site_url() . 'style/img/' . $foto; ?>" alt="">
						</div>
						<div class="client-meta">
							<h3>Apliyana Moto, STh <span>Ketua Badan Pelaksana Majelis Jemaat (BPMJ)</span></h3>
							<p class="testimonial-body">
								<?= $quotes; ?></p>
							<div class="last-icon">
								<i class="fas fa-quote-right"></i>
							</div>
						</div>
				</div>
			<?php endforeach ?>


			</div>
		</div>
	</div>
</div>
<!-- end testimonail-section -->
<!-- features list section -->
<div class="list-section pt-80 pb-80">
	<div class="container">

		<div class="row">
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<a href="<?php echo site_url('donasi'); ?>" class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-hand-holding-heart"></i> <!-- Ikon untuk "Berbagi Berkat" -->
					</div>
					<div class="content">
						<h3>Berbagi Berkat</h3>
						<p>Berikan Dengan Sukacita</p>
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
				<a href="<?php echo site_url('contact'); ?>" class="list-box d-flex align-items-center">
					<div class="list-icon">
						<i class="fas fa-headset"></i> <!-- Ikon untuk "24/7 Support" -->
					</div>
					<div class="content">
						<h3>24/7 Support</h3>
						<p>Get support all day</p>
					</div>
				</a>
			</div>
			<div class="col-lg-4 col-md-6">
				<a href="<?php echo site_url('registrasi'); ?>" class="list-box d-flex justify-content-start align-items-center">
					<div class="list-icon">
						<i class="fas fa-user-plus"></i> <!-- Ikon untuk "Registrasi Jemaat" -->
					</div>
					<div class="content">
						<h3>Registrasi Jemaat</h3>
						<p>Daftar dan Bergabung</p>
					</div>
				</a>
			</div>
		</div>

	</div>

</div>
<!-- end features list section -->



<!-- latest news -->
<div class="latest-news pt-150 pb-150">
	<div class="container">

		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">
					<h3><span class="orange-text">Kegiatan</span> Berita</h3>
					<p>Lihat dan Temukan Kegiatan dan berita terbaru yang mungkin anda ikuti atau lewati.</p>
				</div>
			</div>
		</div>

		<div class="row">
			<?php foreach ($berita->result() as $news): ?>
				<div class="col-lg-4 col-md-6 mb-4">
					<div class="card h-100">
						<a href="<?php echo site_url('artikel/' . $news->tulisan_slug); ?>">
							<div class="card-img-top latest-news-bg" style="background-image: url('<?php echo base_url('assets/images/' . $news->tulisan_gambar); ?>'); height: 200px; background-size: cover; background-position: center;"></div>
						</a>
						<div class="card-body d-flex flex-column">
							<h5 class="card-title">
								<a href="<?php echo site_url('artikel/' . $news->tulisan_slug); ?>" class="text-dark"><?php echo htmlspecialchars($news->tulisan_judul); ?></a>
							</h5>
							<p class="blog-meta mb-2">
								<span class="author"><i class="fas fa-user"></i> <?php echo htmlspecialchars($news->tulisan_author); ?></span>
								<span class="author"><i class="fas fa-calendar"></i> <?php echo date('d F, Y', strtotime($news->tulisan_tanggal)); ?></span>
							</p>
							<p class="card-text flex-grow-1">
								<?php echo htmlspecialchars(word_limiter(clean_excerpt($news->tulisan_isi), 20)); ?>
							</p>
							<a href="<?php echo site_url('artikel/' . $news->tulisan_slug); ?>" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="row">
			<div class="col-lg-12 text-center">
				<a href="<?php echo site_url('blog'); ?>" class="boxed-btn">More News</a>
			</div>
		</div>
	</div>
</div>

<!-- end latest news -->




<!-- agenda banner section -->
<section class="cart-banner pt-100 pb-100">
	<div class="container">
		<div class="row clearfix">
			<!--Image Column-->
			<div class="image-column col-lg-6">
				<div class="image">
					<div class="price-box">
						<div class="inner-price">
							<span class="price">
								<strong>Nearest</strong> <br> <span class="text-white font-weight-bold">Jadwal</span>

							</span>
						</div>
					</div>
					<img src="assets/img/a.jpg" alt="">
				</div>
			</div>
			<!--Content Column-->
			<div class="content-column col-lg-6">
				<h3><span class="orange-text">Jadwal</span> Kebaktian</h3>
				<h4><?php echo isset($agenda_nama) ? htmlspecialchars($agenda_nama) : 'Tidak ada jadwal'; ?></h4>
				<div class="text"><?php echo isset($agenda_deskripsi) ? htmlspecialchars($agenda_deskripsi) : 'Tidak ada deskripsi'; ?></div>
				<!--Countdown Timer-->
				<div class="time-counter">
					<div class="time-countdown clearfix" data-countdown="<?php echo htmlspecialchars($countdown_date); ?>">
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Days</div>
						</div>
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Hours</div>
						</div>
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Mins</div>
						</div>
						<div class="counter-column">
							<div class="inner"><span class="count">00</span>Secs</div>
						</div>
					</div>
					<?php if ($message): ?>
						<div class="message"><?php echo htmlspecialchars($message); ?></div>
					<?php endif; ?>
				</div>
				<a href="<?php echo site_url('agenda'); ?>" class="cart-btn mt-3"><i class="fas fa-calendar-alt"></i> Jadwal Lainnya</a>

			</div>
		</div>
	</div>
</section>
<!-- end agenda banner section -->







<!-- logo carousel -->
<!-- <div class="logo-carousel-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="logo-carousel-inner">
					<div class="single-logo-item">
						<img src="assets/img/company-logos/1.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/2.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/3.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/4.png" alt="">
					</div>
					<div class="single-logo-item">
						<img src="assets/img/company-logos/5.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<!-- end logo carousel -->


<!-- pop up -->
<div class="popup-overlay" id="overlay"></div>
<div class="popup-content" id="popup">
	<?php if (isset($announcement) && $announcement): ?>
		<h2><?php echo htmlspecialchars($announcement->pengumuman_judul); ?></h2>
		<p><strong>Tanggal:</strong> <?php echo htmlspecialchars(date('d F Y H:i', strtotime($announcement->pengumuman_tanggal))); ?></p>
		<p><?php echo nl2br(htmlspecialchars($announcement->pengumuman_deskripsi)); ?></p>
		<?php if (!empty($announcement->pengumuman_gambar)): ?>
			<img src="<?php echo base_url('assets/images/' . htmlspecialchars($announcement->pengumuman_gambar)); ?>" alt="Pengumuman">
		<?php endif; ?>
	<?php endif; ?>
</div>


<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Magnific Popup JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function() {
		var popup = document.getElementById('popup');
		var overlay = document.getElementById('overlay');

		<?php if (isset($announcement) && $announcement): ?>
			console.log('Pengumuman ditemukan:', <?php echo json_encode($announcement); ?>);
			// Initialize Magnific Popup
			$.magnificPopup.open({
				items: {
					src: '#popup',
					type: 'inline'
				},
				mainClass: 'mfp-fade',
				callbacks: {
					open: function() {
						overlay.classList.add('active');
						popup.classList.add('active');
					},
					close: function() {
						overlay.classList.remove('active');
						popup.classList.remove('active');
					}
				}
			});
		<?php else: ?>
			console.log('Tidak ada pengumuman yang tersedia.');
		<?php endif; ?>
	});
</script>
<!-- end pop up -->
<!-- script khusus home -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		var countdownElements = document.querySelectorAll('.time-countdown');
		countdownElements.forEach(function(element) {
			var countdownDate = new Date(element.getAttribute('data-countdown')).getTime();
			var now = new Date().getTime();
			var distance = countdownDate - now;

			if (distance < 0) {
				var passedTime = now - countdownDate;
				var days = Math.floor(passedTime / (1000 * 60 * 60 * 24));
				var hours = Math.floor((passedTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((passedTime % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((passedTime % (1000 * 60)) / 1000);

				element.innerHTML = `
                    <div class="counter-column">
                        <div class="inner"><span class="count">${days}</span>Days</div>
                    </div>
                    <div class="counter-column">
                        <div class="inner"><span class="count">${hours}</span>Hours</div>
                    </div>
                    <div class="counter-column">
                        <div class="inner"><span class="count">${minutes}</span>Mins</div>
                    </div>
                    <div class="counter-column">
                        <div class="inner"><span class="count">${seconds}</span>Secs</div>
                    </div>
                `;
			} else {
				var countdownFunction = setInterval(function() {
					var now = new Date().getTime();
					var distance = countdownDate - now;

					var days = Math.floor(distance / (1000 * 60 * 60 * 24));
					var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
					var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
					var seconds = Math.floor((distance % (1000 * 60)) / 1000);

					element.innerHTML = `
                        <div class="counter-column">
                            <div class="inner"><span class="count">${days}</span>Days</div>
                        </div>
                        <div class="counter-column">
                            <div class="inner"><span class="count">${hours}</span>Hours</div>
                        </div>
                        <div class="counter-column">
                            <div class="inner"><span class="count">${minutes}</span>Mins</div>
                        </div>
                        <div class="counter-column">
                            <div class="inner"><span class="count">${seconds}</span>Secs</div>
                        </div>
                    `;

					if (distance < 0) {
						clearInterval(countdownFunction);
						element.innerHTML = 'EXPIRED';
					}
				}, 1000);
			}
		});
	});
</script>