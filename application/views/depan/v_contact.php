<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Get 24/7 Support</p>
					<h1>Contact us</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->

<!-- contact form -->
<div class="contact-from-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mb-5 mb-lg-0">
				<div class="form-title">
					<h2>Ada Pertanyaan?</h2>
					<p>Kami di sini untuk membantu. Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan atau membutuhkan informasi lebih lanjut tentang kegiatan-kegiatan gereja kami.</p>
				</div>

				<div id="form_status"></div>
				<div class="contact-form">
					<form id="fruitkha-contact">
						<p>
							<input type="text" placeholder="Name" name="name" id="name">
							<input type="email" placeholder="Email" name="email" id="email">
						</p>
						<p>
							<input type="tel" placeholder="Phone" name="phone" id="phone">
							<input type="text" placeholder="Subject" name="subject" id="subject">
						</p>
						<p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
						<input type="hidden" name="token" value="FsWga4&@f6aw" />
						<p>
							<button type="button" onclick="sendWhatsAppMessage();">Submit</button>
						</p>
					</form>
				</div>

				<script>
					function sendWhatsAppMessage() {
						// Mengambil nilai dari input form
						var name = document.getElementById('name').value.trim();
						var email = document.getElementById('email').value.trim();
						var phone = document.getElementById('phone').value.trim();
						var subject = document.getElementById('subject').value.trim();
						var message = document.getElementById('message').value.trim();

						// Validasi input
						if (name === "") {
							alert("Name is required.");
							return;
						}
						if (email === "") {
							alert("Email is required.");
							return;
						}
						if (!validateEmail(email)) {
							alert("Invalid email format.");
							return;
						}
						if (phone === "") {
							alert("Phone is required.");
							return;
						}
						if (subject === "") {
							alert("Subject is required.");
							return;
						}
						if (message === "") {
							alert("Message is required.");
							return;
						}

						// Membuat pesan WhatsApp
						var whatsappMessage = `Name: ${name}\nEmail: ${email}\nPhone: ${phone}\nSubject: ${subject}\nMessage: ${message}`;

						// Nomor WhatsApp yang dituju
						var phoneNumber = "6281805251993"; // Pastikan nomor sudah dalam format internasional

						// Membuat URL untuk membuka WhatsApp
						var whatsappURL = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(whatsappMessage)}`;

						// Membuka WhatsApp dengan pesan yang telah disiapkan
						window.open(whatsappURL, '_blank');
					}

					function validateEmail(email) {
						var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
						return re.test(email);
					}
				</script>

				<style>
					/* Menyimpan gaya tombol asli */
					button[type="button"] {
						background-color: #4CAF50;
						/* Warna latar belakang tombol */
						color: white;
						/* Warna teks tombol */
						padding: 10px 20px;
						/* Jarak antara teks dan tepi tombol */
						border: none;
						/* Menghilangkan border */
						border-radius: 5px;
						/* Menambahkan sudut bulat */
						cursor: pointer;
						/* Mengubah kursor menjadi pointer saat dihover */
						font-size: 16px;
						/* Ukuran font */
					}

					button[type="button"]:hover {
						background-color: #45a049;
						/* Warna latar belakang saat dihover */
					}
				</style>

			</div>
			<div class="col-lg-4">
				<div class="contact-form-wrap">
					<div class="contact-form-box">
						<h4><i class="fas fa-map"></i> Alamat Gereja</h4>
						<p>Jln Gajah Mada No.2<br> Waikabubak. <br> Sumba Barat</p>
					</div>
					<div class="contact-form-box">
						<h4><i class="far fa-clock"></i> Waktu Operasional</h4>
						<p>SENIN - JUMAT: 8 to 9 PM <br> SABTU - MINGGU: 10 to 8 PM </p>
					</div>
					<div class="contact-form-box">

						<?php
						$situs = $this->db->get_where("tbl_situs");
						foreach ($situs->result_array() as $i) :

							$hp = $i['situs_hp'];
							$mail = $i['situs_mail'];
						?>
							<h4><i class="fas fa-address-book"></i> Contact</h4>
							<p>Phone: <?= $hp; ?> <br> Email: <?= $mail; ?></p>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end contact form -->

<!-- find our location -->
<div class="find-location blue-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<p> <i class="fas fa-map-marker-alt"></i> Find Our Location</p>
			</div>
		</div>
	</div>
</div>
<!-- end find our location -->

<!-- google map section -->
<div class="embed-responsive embed-responsive-21by9">

	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3933.562751721967!2d119.41047347593512!3d-9.63286429045455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c4ae02b4d8b9af5%3A0x134ef7bbb958fd9!2sGKS%20Jemaat%20Waikabubak!5e0!3m2!1sid!2sid!4v1735994888817!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- end google map section -->