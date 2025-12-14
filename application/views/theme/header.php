<!--PreLoader-->
<div class="loader">
    <div class="loader-inner">
        <div class="circle"></div>
    </div>
</div>
<!--PreLoader Ends-->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <?php $situs = $this->db->get_where("tbl_situs");
                            ?>

                            <?php foreach ($situs->result_array() as $i) :

                                $logo = $i['situs_logo'];
                            ?>
                                <a href="<?php echo base_url(''); ?>">
                                    <img src="<?php echo base_url('') . 'style/img/' . $logo; ?>" alt="">
                                </a>
                                 <?php endforeach ?>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li class="current-list-item"><a href="<?php echo base_url(''); ?>">Home</a></li>

                            <li><a href="#">Profile</a>
                                <ul class="sub-menu">
                                     <li><a href="<?php echo site_url('about'); ?>">About</a></li>
                                <li><a href="<?php echo site_url('strukturOrganisasi'); ?>">Struktur Organisasi</a></li>
                                <li><a href="<?php echo site_url('visimisi'); ?>">Visi Misi</a></li>
                                   
                                    <li><a href="<?php echo site_url('history'); ?>">History</a></li>
                                    <li><a href="<?php echo site_url('pendeta'); ?>">Daftar Pendeta</a></li>
                                    <!-- <li><a href="<?php echo site_url('jemaat'); ?>">Daftar Jemaat</a></li> -->
                                    <li><a href="<?php echo site_url('contact'); ?>">Contact</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Acara Gereja</a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo site_url('agenda'); ?>">Jadwal Kebaktian</a></li>
                                    <li><a href="<?php echo site_url('blog'); ?>">Kegiatan & berita</a></li>

                                    <li><a href="<?php echo site_url('pengumuman'); ?>">Pengumuman</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo site_url('galeri'); ?>">Galeri</a></li>
                            <li><a href="#">Sumber Daya</a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo site_url('download'); ?>">Download</a></li>
                                    <li><a href="<?php echo site_url('video'); ?>">Video</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo site_url('donasi'); ?>">Donasi</a></li>
                            <li>
                                <div class="header-icons">
                                    <a class="registration" href="<?php echo site_url('registrasi'); ?>">
                                        <i class="fas fa-user-plus"></i>
                                        <span class="mobile-text">Registrasi</span>
                                    </a>
                                    <a class="login" href="<?php echo site_url('user/auth'); ?>">
                                        <i class="fas fa-sign-in-alt"></i>
                                        <span class="mobile-text">Login</span>
                                    </a>
                                    <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- search area -->
<div class="search-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <span class="close-btn"><i class="fas fa-window-close"></i></span>
                <div class="search-bar">
                    <div class="search-bar-tablecell">
                        <h3>Search For:</h3>
                        <form action="<?php echo site_url('blog/search'); ?>" method="get">
                            <input type="text" name="keyword" placeholder="Keywords">
                            <button type="submit">Search <i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end search area -->