<div id="content">

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
    </nav>

    <div class="custom-container">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('hapus')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('hapus'); ?>
                            </div>
                        <?php endif; ?>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Photo</th>
                                <th>Nama Jemaat</th>
                                <th>Jenis Kelamin</th>
                                <th>No. Hp</th>
                                <th style="text-align:right;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            foreach ($data->result_array() as $i) :
                                $no++;
                                $id = $i['jemaat_id'];
                                $nama = $i['nama'];
                                $jenkel = $i['jenis_kelamin'];
                                $no_hp = $i['hp'];
                                $photo = $i['photo'];
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <?php if (empty($photo)): ?>
                                        <td><img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>"></td>
                                    <?php else: ?>
                                        <td><img style="width: 100px; height: 100px;"" class=" img-thumbnail" src="<?php echo base_url() . 'assets/images/' . $photo; ?>"></td>
                                    <?php endif; ?>
                                    <td><?php echo $nama; ?></td>
                                    <?php if ($jenkel == 'L'): ?>
                                        <td>Laki-Laki</td>
                                    <?php else: ?>
                                        <td>Perempuan</td>
                                    <?php endif; ?>
                                    <td><?php echo $no_hp; ?></td>
                                    <td style="text-align:right;">
                                        <a href="<?php echo base_url('user/management_keluarga/edit/' . $id); ?>" class="btn btn-info btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                            <span class="text">Edit</span>
                                        </a>

                                        <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-trash"></i>
                                            </span>
                                            <span class="text">Hapus</span>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($data->result_array() as $i) :
        $id = $i['jemaat_id'];
        $nama = $i['nama'];
        $jenkel = $i['jenis_kelamin'];
        $no_hp = $i['hp'];
        $photo = $i['photo'];
    ?>

        <!-- Modal Hapus Jemaat -->
        <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Jemaat</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url() . 'user/management_keluarga/hapus_jemaat' ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                            <input type="hidden" value="<?php echo $photo; ?>" name="gambar">
                            <p>Apakah Anda yakin mau menghapus jemaat <b><?php echo $nama; ?></b> ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>