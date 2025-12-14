<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p><?php echo isset($breadcrumb_subtitle) ? htmlspecialchars($breadcrumb_subtitle, ENT_QUOTES, 'UTF-8') : 'Kumpulan Kegiatan Gereja'; ?></p>
                    <h1>Berita Gereja</h1>
                    <h1><?php echo isset($breadcrumb_title) ? htmlspecialchars($breadcrumb_title, ENT_QUOTES, 'UTF-8') : ''; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- latest news -->
<div class="latest-news mt-150 mb-150">

    <div class="container">

        <?php echo $this->session->flashdata('msg'); ?>
        <div class="row">
            <?php if ($data->num_rows() > 0): ?>
                <?php foreach ($data->result() as $row) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-latest-news">
                            <a href="<?php echo base_url('blog/detail/' . $row->tulisan_slug); ?>">
                                <div class="latest-news-bg" style="background-image: url('<?php echo base_url('assets/images/' . $row->tulisan_gambar); ?>');"></div>
                            </a>
                            <div class="news-text-box">
                                <h3><a href="<?php echo base_url('blog/detail/' . $row->tulisan_slug); ?>"><?php echo $row->tulisan_judul; ?></a></h3>
                                <p class="blog-meta">
                                    <span class="author"><i class="fas fa-user"></i> <?php echo $row->tulisan_author; ?></span>
                                    <span class="author"><i class="fas fa-calendar-alt"></i> <?php echo $row->tanggal; ?></span>

                                </p>
                                <p class="excerpt"><?php echo word_limiter($row->tulisan_isi, 10); ?></p>
                                <a href="<?php echo base_url('blog/detail/' . $row->tulisan_slug); ?>" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-lg-12 text-center">
                    <p>Tidak ada artikel untuk bulan ini.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <?php echo $page; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end latest news -->