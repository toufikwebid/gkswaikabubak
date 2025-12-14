<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php $situs = $this->db->get_where("tbl_situs");
    ?>

    <?php foreach ($situs->result_array() as $i) :

        $title = $i['situs_nama'];
        $icon  = $i['situs_favicon'];
    ?>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?= $title; ?> - <?php echo isset($title2) ? $title2 : 'Default Title'; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- <link rel="manifest" href="site.webmanifest"> -->
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() . 'style/img/' . $icon ?>">
        <!-- Place favicon.ico in the root directory -->
    <?php endforeach ?>
    <!-- CSS here -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>style/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>style/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>style/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>style/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>style/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>style/css/nice-select.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>style/css/flaticon.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>style/css/gijgo.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>style/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>style/css/slicknav.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>style/css/styleku.css">
    <link href="<?php echo base_url() . 'theme/css/dataTables.bootstrap4.min.css' ?>" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div class="header-top_area" style="background-color: #4a6fdc">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header_top_wrap d-flex justify-content-between align-items-center">
                                <div class="text_wrap">
                                    <?php $situs = $this->db->get_where("tbl_situs");
                                    ?>

                                    <?php foreach ($situs->result_array() as $i) :

                                        $hp = $i['situs_hp'];
                                        $email = $i['situs_mail'];
                                    ?>
                                        <p><span>Call : <?= $hp; ?></span> | <span>Email : <?= $email; ?></span></p>
                                </div>
                                <div class="text_wrap">
                                    <p>
                                        <a href="<?php echo site_url('user/auth'); ?>"> <i class="ti-user"></i> Login</a>
                                        <a href="<?php echo site_url('registrasi'); ?>">Register</a>
                                    </p>
                                </div>
                            <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-header-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header_wrap d-flex justify-content-between align-items-center">
                                <div class="header_left">
                                    <div class="logo">
                                        <?php $situs = $this->db->get_where("tbl_situs");
                                        ?>

                                        <?php foreach ($situs->result_array() as $i) :

                                            $logo = $i['situs_logo'];
                                        ?>
                                            <a href="<?php echo base_url(''); ?>">
                                                <img src="<?php echo base_url('') . 'style/img/' . $logo; ?>" alt="">
                                            </a>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <div class="header_right d-flex align-items-center">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="<?php echo base_url(''); ?>">home</a></li>
                                            <li><a href="#">Profile <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="<?php echo site_url('visimisi'); ?>">Visi Misi</a></li>
                                                    <li><a href="<?php echo site_url('about'); ?>">Sambutan Pendeta</a></li>

                                                    <li><a href="<?php echo site_url('pendeta'); ?>">Daftar Pendeta</a></li>
                                                    <li><a href="<?php echo site_url('contact'); ?>">Kontak Kami</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Acara Gereja <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="<?php echo site_url('agenda'); ?>">Jadwal Kebaktian</a></li>
                                                    <li><a href="<?php echo site_url('blog'); ?>">Kegiatan / Berita</a></li>
                                                    <li><a href="<?php echo site_url('pengumuman'); ?>">Pengumuman</a></li>
                                                    <li><a href="<?php echo site_url('galeri'); ?>">Galeri</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Sumber Daya <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="<?php echo site_url('download'); ?>">Download</a></li>
                                                    <li><a href="<?php echo site_url('video'); ?>">Video</a></li>
                                                </ul>
                                            </li>


                                            <li><a href="<?php echo site_url('donasi'); ?>">Donasi</a></li>
                                            <li>
                                                <div class="text_wrap">
                                                    <p>
                                                    <form action="<?php echo site_url('blog/search'); ?>" method="get">
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <input type="text" name="keyword" class="form-control" placeholder='Search Keyword'
                                                                    onfocus="this.placeholder = ''"
                                                                    onblur="this.placeholder = 'Search Keyword'" autocomplete="off" required>
                                                                <div class="input-group-append">
                                                                    <button class="btn" type="submit"><i class="ti-search"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>
                                                    </p>
                                                </div>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->

    <!-- slider_area_end -->

    <!-- service_area_start  -->
    <?php
    function limit_words($string, $word_limit)
    {
        $words = explode(" ", $string);
        return implode(" ", array_splice($words, 0, $word_limit));
    }
    ?>


    <div class="container">
        <div class="row justify-content-center">
            <!-- <div class="row"> -->
            <?php $quotes = $this->db->get_where("tbl_situs");
            ?>

            <?php foreach ($quotes->result_array() as $i) :

                $quotes = $i['situs_quotes'];
                $foto = $i['situs_ftpendeta'];
            ?>

                <div class="section1">
                    <div class="card">
                        <div class="cardin1">
                            <img src="<?php echo site_url() . 'style/img/' . $foto; ?>" alt="inventor Thomas Edison">
                        </div>
                        <div class="cardin2">
                            <h2>
                                <?= $quotes; ?></h2>
                            <b>- Pendeta GKS Waikabubak -</b>
                            <div class="credit"><span style="color:tomato;font-size:20px;">❤</span><a href="<?php echo site_url('about'); ?>"> Baca selengkapnya</a></div>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="recent_news_area section__padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70">
                        <h3 class="mb-45">Kegiatan Gereja</h3>

                    </div>
                </div>
            </div>
            <div class="row">



                <?php foreach ($berita->result() as $row) : ?>
                    <div class="col-md-6">
                        <div class="single__news">
                            <div class="thumb">
                                <a href="<?php echo site_url('artikel/' . $row->tulisan_slug); ?>">
                                    <img src="<?php echo base_url() . 'assets/images/' . $row->tulisan_gambar; ?>" alt="<?php echo $row->tulisan_judul; ?>">
                                </a>
                                <span class="badge"><?php echo $row->tulisan_kategori_nama; ?></span>
                            </div>
                            <div class="news_info">
                                <a href="<?php echo site_url('artikel/' . $row->tulisan_slug); ?>">
                                    <h4><?php echo $row->tulisan_judul; ?></h4>
                                </a>
                                <p><?php echo limit_words($row->tulisan_isi, 10) . '...'; ?></p>
                                <p class="d-flex align-items-center"> <span><i class="flaticon-calendar-1"></i> <?php echo $row->tanggal; ?></span>

                                    <span> <i class="fa fa-user"></i> <?php echo $row->tulisan_author; ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <!--/ service_area_start  -->

    <!-- popular_program_area_start  -->
    <div class="popular_program_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title text-center">
                        <h3>Pengumuman Gereja</h3>
                    </div>
                </div>
            </div>

            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <?php foreach ($pengumuman->result() as $row) : ?>
                            <div class="col-lg-4 col-md-6">
                                <div class="single__program">
                                    <?php if (!empty($row->pengumuman_gambar)) : // Cek jika pengumuman_gambar tidak kosong 
                                    ?>
                                        <div class="program_thumb">
                                            <img src="<?php echo base_url() . 'assets/images/' . $row->pengumuman_gambar; ?>" alt="<?php echo $row->pengumuman_judul; ?>">
                                        </div>
                                    <?php endif; ?>
                                    <div class="program__content">
                                        <span><?php echo $row->pengumuman_tanggal; ?></span>
                                        <h4><a href="<?php echo site_url('pengumuman'); ?>"><?php echo $row->pengumuman_judul; ?></a></h4>
                                        <p><?php echo limit_words($row->pengumuman_deskripsi, 10) . '...'; ?></p>
                                        <a href="<?php echo site_url('pengumuman'); ?>" class="boxed-btn5">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="course_all_btn text-center">
                        <a href="<?php echo site_url('pengumuman'); ?>" class="boxed-btn4">Lihat Semua Pengumuman</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- popular_program_area_end -->

    <!-- latest_coures_area_start  -->

    <!--/ latest_coures_area_end -->

    <!-- recent_event_area_strat  -->
    <div class="recent_event_area section__padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70">
                        <h3 class="mb-45">Jadwal Kebaktian</h3>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">


                    <?php foreach ($agenda->result() as $row) : ?>
                        <div class="single_event d-flex align-items-center">
                            <div class="date text-center">
                                <span><?php echo date("d", strtotime($row->agenda_mulai)); ?></span>
                                <p><?php echo date("M. y", strtotime($row->agenda_mulai)); ?></p>
                            </div>
                            <div class="event_info">
                                <a href="<?php echo site_url('agenda'); ?>">
                                    <h4><?php echo $row->agenda_nama; ?></h4>
                                </a>
                                <p><?php echo limit_words($row->agenda_deskripsi, 10) . '...'; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <?php $situs = $this->db->get_where("tbl_situs");
                ?>

                <?php foreach ($situs->result_array() as $i) :

                    $footer = $i['situs_footer'];
                    $hp = $i['situs_hp'];
                    $email = $i['situs_mail'];
                ?>
                    <div class="row">
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                    Tentang Kami
                                </h3>
                                <img width="150" src="<?php echo base_url(''); ?>style/img/logogks.png" class="rounded" alt="Logo Gks Waikabubak">
                                <div class='social-profiles-widget'>
                                    <ul class='social-profile circle'>
                                        <li><a href='#'><i class='fa fa-facebook' /></i></a></li>
                                        <!-- <li><a href='#'><i class='fa fa-twitter'/></i></a></li> -->
                                        <li><a href='#'><i class='fa fa-youtube' /></i></a></li>
                                        <li><a href='#'><i class='fa fa-google-plus' /></i></a></li>
                                        <li><a href='#'><i class='fa fa-instagram' /></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                    Dashboard
                                </h3>
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
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                    Lainnya
                                </h3>
                                <ul>
                                    <li><a href="<?php echo site_url('pendeta'); ?>">Daftar Pendeta</a></li>
                                    <li><a href="<?php echo site_url('pengumuman'); ?>">Pengumuman</a></li>
                                    <li><a href="<?php echo site_url('agenda'); ?>">Agenda</a></li>
                                    <li><a href="<?php echo site_url('download'); ?>">Download File</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 col-lg-3">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                    Kontak Kami
                                </h3>

                                <div class="media contact-info">
                                    <span class="contact-info__icon"><i class="ti-home"></i></span>
                                    <div class="media-body">

                                        <p>GEREJA KRISTEN WAIKABUBAK</p>
                                    </div>
                                </div>
                                <div class="media contact-info">
                                    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                                    <div class="media-body">

                                        <p>Call : <?= $hp; ?></p>
                                    </div>
                                </div>
                                <div class="media contact-info">
                                    <span class="contact-info__icon"><i class="ti-email"></i></span>
                                    <div class="media-body">

                                        <p><?= $email; ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                        <p>

                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> <?= $footer; ?> </p>

                        </p>
                        </p>
                    </div>
                </div>
            <?php endforeach ?>
            </div>
        </div>
    </footer>
    <!-- footer end  -->


    <!-- JS here -->
    <script src="<?php echo base_url(''); ?>style/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/popper.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/ajax-form.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/waypoints.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/scrollIt.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/jquery.scrollUp.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/wow.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/nice-select.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/jquery.slicknav.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/plugins.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="<?php echo base_url(''); ?>style/js/contact.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/jquery.form.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(''); ?>style/js/mail-script.js"></script>
    <script src="<?php echo base_url() . 'theme/js/jquery.dataTables.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'theme/js/dataTables.bootstrap4.min.js' ?>"></script>
    <script>
        $(document).ready(function() {
            $('#display').DataTable();
        });
    </script>
    <script src="<?php echo base_url(''); ?>style/js/main.js"></script>

</body>

</html>