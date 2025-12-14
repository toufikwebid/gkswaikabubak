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

                <div class="box-header">
                    <a href="<?php echo site_url('admin/registrasi/'); ?>" class="btn btn-success btn-flat"><span class="fa fa-plus"></span> Tambah Data Jemaat</a>
                </div><br>

                <div class="table-responsive">
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
                                    <th>Photo</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Hp</th>
                                    <th style="text-align:right;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $j): ?>
                                    <tr>
                                        <td>
                                            <?php if (empty($j['photo'])): ?>
                                                <img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/user_blank.png'; ?>">
                                            <?php else: ?>
                                                <img class="img-thumbnail" src="<?php echo base_url() . 'assets/images/' . $j['photo']; ?>">
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $j['nama']; ?></td>
                                        <td><?php echo $j['tempat_lahir']; ?></td>
                                        <td><?php echo $j['tanggal_lahir']; ?></td>
                                        <td><?php echo ($j['jenis_kelamin'] == 'L') ? 'Laki-Laki' : 'Perempuan'; ?></td>
                                        <td><?php echo $j['hp']; ?></td>
                                        <td style="text-align:right;">
                                            <a href="<?php echo base_url('admin/jemaat/edit/' . $j['jemaat_id']); ?>" class="btn btn-success btn-flat"><span class="fa fa-edit"></span> Edit</a>

                                            <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#ModalHapus<?php echo $j['jemaat_id']; ?>">
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
    </div>

    <?php foreach ($data as $j): ?>
        <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $j['jemaat_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Jemaat</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url() . 'admin/jemaat/hapus_jemaat/' . $j['jemaat_id'];  ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="kode" value="<?php echo $j['jemaat_id']; ?>" />
                            <input type="hidden" value="<?php echo $j['photo']; ?>" name="gambar">
                            <p>Apakah Anda yakin mau menghapus jemaat <b><?php echo $j['nama']; ?></b> ?</p>

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