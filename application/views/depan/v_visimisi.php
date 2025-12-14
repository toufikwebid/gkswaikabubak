<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Gereja Kristen Sumba Jemaat Waikabubak</p>
                    <h1>Visi Misi</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- featured section -->
<div class="feature-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="featured-text">
                    <h2 class="pb-3">Visi <span class="orange-text">Misi</span></h2>
                    <div class="row">

                        <?php
                        // Set zona waktu ke GMT+8
                        date_default_timezone_set('Asia/Makassar');
                        $visi_misi = $this->db->get_where("tbl_situs");
                        ?>

                        <?php foreach ($visi_misi->result_array() as $i) :
                            $visi = $i['visi_misi'];
                        ?>
                            <p class="text-justify"><?= nl2br($visi); ?></p>


                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end featured section -->