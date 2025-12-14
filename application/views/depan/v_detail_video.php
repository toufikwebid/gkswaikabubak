<?php foreach ($data->result() as $row) : ?>
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Gereja Kristen Sumba Jemaat Waikabubak</p>
                        <h1>VIDEO</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <div class="recent_event_area section__padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="section_title text-center mb-70">
                        <h3 class="mb-45"><?php echo $row->judul_video; ?></h3>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">





                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $row->kode_video; ?>" allowfullscreen></iframe>
                    </div>

                    <br>
                    <p>Deskripsi Video :</p>
                    <p><?php echo $row->deskripsi_video; ?></p>




                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>