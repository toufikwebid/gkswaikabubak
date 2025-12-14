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


                                <li><a href="<?php echo site_url('donasi'); ?>">Donasi & Persembahan</a></li>
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