<!DOCTYPE html>
<html lang="en">

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
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/css/awesomefont6.css">
    <link rel="stylesheet" href="<?php echo base_url(''); ?>assets/vendor/aos/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

</head>

<body>

    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <?php $this->load->view('theme/header'); ?>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->

    <!-- slider_area_end -->

    <!-- service_area_start  -->
    <?php $this->load->view($main_view); ?>
    <!-- recent_news_area_end  -->

    <!-- footer start -->
    <?php $this->load->view('theme/footer'); ?>


</body>

</html>