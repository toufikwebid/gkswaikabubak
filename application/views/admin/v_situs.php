<div id="content">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
    </nav>

    <div class="custom-container">
        <div class="card shadow mb-4">
            <div class="content-wrapper">
                <?php foreach ($data as $i) : ?>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Pengaturan Website GKS Waikabubak</h5>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo base_url() . 'admin/situs/update_situs' ?>" id="form-setting" enctype="multipart/form-data">
                                <div class="tab-content">
                                    <!-- Data Situs -->
                                    <h5 class="bg-light text-center d-flex align-items-center justify-content-center" style="height: 50px; margin: 0;">
                                        PENGATURAN SITUS
                                    </h5>
                                    <hr />

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Logo Website</label>
                                        <div class="col-sm-9">
                                            <img class="img-fluid" src="<?php echo base_url() . 'style/img/' . $i['situs_logo']; ?>" />
                                            <input type="file" class="file form-control mt-1" name="xlogo">
                                            <input type="hidden" value="<?php echo $i['situs_logo']; ?>" name="gbrlogo">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Favicon</label>
                                        <div class="col-sm-9">
                                            <img class="img-fluid" src="<?php echo base_url() . 'style/img/' . $i['situs_favicon']; ?>" />
                                            <input type="file" class="file form-control mt-1" name="xfav">
                                            <input type="hidden" value="<?php echo $i['situs_favicon']; ?>" name="gbrfav">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Website</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="xnama" value="<?php echo $i['situs_nama']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Deskripsi Web</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="xdeskripsi"><?php echo $i['situs_deskripsi']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">HP Gereja</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="xhp" value="<?php echo $i['situs_hp']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email Gereja</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="xemail" value="<?php echo $i['situs_mail']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Footer</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="xfooter"><?php echo $i['situs_footer']; ?></textarea>
                                        </div>
                                    </div>

                                    <!-- Isi Situs -->
                                    <h5 class="bg-light text-center d-flex align-items-center justify-content-center" style="height: 50px; margin: 0;">
                                        PENGATURAN ISI SITUS
                                    </h5>
                                    <hr />
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Quotes</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="xquotes"><?php echo $i['situs_quotes']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Visi Misi</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="xvisimisi" name="xvisimisi" style="min-height: 100px; max-height: 400px; overflow-y: auto; resize: vertical;"><?php echo $i['visi_misi']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Sambutan Ketua Badan Pelaksana Majelis Jemaat (BPMJ)</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="xsambutan" name="xsambutan" style="min-height: 100px; max-height: 400px; overflow-y: auto; resize: vertical;"><?php echo $i['sambutan']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Foto Pendeta Depan</label>
                                        <div class="col-sm-9">
                                            <img class="img-fluid" src="<?php echo base_url() . 'style/img/' . $i['situs_ftpendeta']; ?>" />
                                            <input type="file" class="file form-control" name="xpen">
                                            <input type="hidden" value="<?php echo $i['situs_ftpendeta']; ?>" name="gbrpen">
                                            <input type="hidden" value="<?php echo $i['situs_id']; ?>" name="kode">
                                        </div>
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const visimisiTextarea = document.getElementById('xvisimisi');
                                            const sambutanTextarea = document.getElementById('xsambutan');

                                            if (visimisiTextarea) {
                                                visimisiTextarea.addEventListener('input', autoResize, false);
                                                visimisiTextarea.addEventListener('change', autoResize, false);
                                                autoResize.call(visimisiTextarea); // Set tinggi awal
                                            }

                                            if (sambutanTextarea) {
                                                sambutanTextarea.addEventListener('input', autoResize, false);
                                                sambutanTextarea.addEventListener('change', autoResize, false);
                                                autoResize.call(sambutanTextarea); // Set tinggi awal
                                            }

                                            function autoResize() {
                                                this.style.height = 'auto'; // Reset tinggi
                                                this.style.height = (this.scrollHeight > 200 ? this.scrollHeight : 200) + 'px'; // Atur tinggi berdasarkan konten
                                            }
                                        });
                                    </script>
                                    <div class="form-group row">
                                        <div class="col-sm-9 offset-sm-3">
                                            <button type="submit" name="submit" id="btn-submit" value="submit" class="btn btn-primary btn-block">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>