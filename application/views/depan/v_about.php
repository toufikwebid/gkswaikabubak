   <!-- breadcrumb-section -->
   <div class="breadcrumb-section breadcrumb-bg">
       <div class="container">
           <div class="row">
               <div class="col-lg-8 offset-lg-2 text-center">
                   <div class="breadcrumb-text">
                       <p>Gereja Kristen Sumba Jemaat Waikabubak</p>
                       <h1>Sambutan Ketua BPMJ Periode 2024-2028</h1>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- end breadcrumb section -->
   <section id="about" class="about section">
       <?php
        // Set zona waktu ke GMT+8
        date_default_timezone_set('Asia/Makassar');
        $currentTime = date('H:i:s'); // Contoh format waktu
        $quotes = $this->db->get_where("tbl_situs");
        ?>

       <?php foreach ($quotes->result_array() as $i) :

            $quotes = $i['situs_quotes'];
            $foto = $i['situs_ftpendeta'];
            $sambutan = $i['sambutan'];
        ?>
           <div class="container">
               <div class="row gx-0">

                   <div class="col-lg-6 d-flex flex-column justify-content-center">
                       <div class="content">
                           <p><span><i class="fa-regular fa-clock"></i> <?php echo $currentTime; ?></span> <span><i class="fa-regular fa-calendar"></i> <?php echo date('d F Y'); ?></span></p>
                           <h2><span><i class="fa-solid fa-map-marker-alt"></i> GKS Waikabubak</span></h2>
                           <p><?= nl2br($sambutan); ?></p>
                       </div>
                   </div>

                   <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                       <img src="<?php echo site_url() . 'style/img/' . $foto; ?>" class="img-fluid" alt="kepala gereja">
                   </div>

               </div>
           </div>
       <?php endforeach ?>
   </section>

   <!-- AOS CSS -->
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
   <!-- FontAwesome 6 CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- AOS JS -->
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script>
       AOS.init();
   </script>