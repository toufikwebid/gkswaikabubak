<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Gereja Kristen Sumba Jemaat Waikabubak</p>
                    <h1>Galeri</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<div class="recent_event_area section__padding">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="filter-buttons mb-30">
                    <button class="btn btn-primary active" data-filter="all">Semua</button>
                    <?php foreach ($all_album as $album) : ?>
                        <button class="btn btn-primary" data-filter=".album-<?php echo $album->album_id; ?>"><?php echo $album->album_nama; ?></button>
                    <?php endforeach; ?>
                </div>
                <div class="gallery">
                    <div class="row">
                        <?php foreach ($all_galeri as $row) : ?>
                            <div class="col-md-4 gallery-item album-<?php echo $row->galeri_album_id; ?>">
                                <a href="<?php echo base_url() . 'assets/images/' . $row->galeri_gambar; ?>" data-lightbox="gallery" data-title="<?php echo $row->galeri_judul; ?>">
                                    <div class="single-gallery-image" style="background: url(<?php echo base_url() . 'assets/images/' . $row->galeri_gambar; ?>); background-size: cover; background-position: center;"></div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS, Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Lightbox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<!-- AOS JS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Custom JS -->
<script>
    $(document).ready(function() {
        // Filter gallery items
        $('.filter-buttons button').click(function() {
            var filterValue = $(this).attr('data-filter');
            $('.filter-buttons button').removeClass('active');
            $(this).addClass('active');
            if (filterValue === 'all') {
                $('.gallery-item').show();
            } else {
                $('.gallery-item').hide();
                $('.gallery-item' + filterValue).show();
            }
        });


        // Initialize Lightbox
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true
        });
    });
</script>