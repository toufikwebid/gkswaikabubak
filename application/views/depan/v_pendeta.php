<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                  <p>Gereja Kristen Sumba Jemaat Waikabubak</p>
                    <h1>Daftar Pendeta</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<!-- Doctors Section -->
<!-- application/views/doctors.php -->
<!-- Doctors Section -->
<section id="doctors" class="doctors section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">

    </div><!-- End Section Title -->

    <div class="container">

        <div class="row gy-4">

            <?php $delay = 100;
            foreach ($data->result() as $row) : ?>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                    <div class="team-member d-flex align-items-start">
                        <div class="pic"><img src="<?php echo base_url() . 'assets/images/' . $row->guru_photo; ?>" class="img-fluid" alt="<?php echo $row->guru_nama; ?>"></div>
                        <div class="member-info">
                            <h4><?php echo $row->guru_nama; ?></h4>
                            <span><?php echo $row->guru_mapel; ?></span> <!-- Anda perlu menambahkan kolom pendeta_jabatan di database jika belum ada -->
                            <!-- <div class="social">
                                <a href="<?php echo $row->pendeta_twitter; ?>"><i class="bi bi-twitter-x"></i></a>
                                <a href="<?php echo $row->pendeta_facebook; ?>"><i class="bi bi-facebook"></i></a>
                                <a href="<?php echo $row->pendeta_instagram; ?>"><i class="bi bi-instagram"></i></a>
                                <a href="<?php echo $row->pendeta_linkedin; ?>"> <i class="bi bi-linkedin"></i> </a>
                            </div> -->
                        </div>
                    </div>
                </div><!-- End Team Member -->
            <?php $delay += 100;
            endforeach; ?>

        </div>

    </div>

</section><!-- /Doctors Section -->