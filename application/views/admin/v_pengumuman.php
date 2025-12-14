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
          <a href="" class="btn btn-success btn-flat" data-toggle="modal" data-target="#myModal"><span class="fa fa-plus"></span> Tambah Pengumuman</a>
        </div>

        <br>

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
                <th style="width:70px;">#</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal Post</th>
                <th>Author</th>
                <th style="text-align:right;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              function limit_words($string, $word_limit)
              {
                $words = explode(" ", $string);
                return implode(" ", array_splice($words, 0, $word_limit));
              }

              $no = 0;
              foreach ($data->result_array() as $i) :
                $no++;
                $id = $i['pengumuman_id'];
                $judul = $i['pengumuman_judul'];
                $deskripsi = $i['pengumuman_deskripsi'];
                $author = $i['pengumuman_author'];
                $tanggal = $i['pengumuman_tanggal'];
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $judul; ?></td>
                  <td><?php echo limit_words($deskripsi, 10); ?></td>
                  <td><?php echo $tanggal; ?></td>
                  <td><?php echo $author; ?></td>
                  <td style="text-align:right;">
                    <div class="d-flex justify-content-between">
                      <a href="#" class="btn btn-info btn-icon-split w-100 mb-1" data-toggle="modal" data-target="#ModalEdit<?php echo $id; ?>">
                        <span class="icon text-white-50">
                          <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">Edit</span>
                      </a>
                      <a href="#" class="btn btn-danger btn-icon-split w-100 mb-1" data-toggle="modal" data-target="#ModalHapus<?php echo $id; ?>">
                        <span class="icon text-white-50">
                          <i class="fas fa-trash"></i>
                        </span>
                        <span class="text">Hapus</span>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>


            </tbody>
          </table>



        </div>
      </div>
    </div>

  </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
          <h4 class="modal-title" id="myModalLabel">Add Pengumuman</h4>
        </div>
        <form class="form-horizontal" action="<?php echo base_url() . 'admin/pengumuman/simpan_pengumuman' ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
              <div class="col-sm-7">
                <input type="text" name="xjudul" class="form-control" id="inputUserName" placeholder="Judul" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
              <div class="col-sm-7">
                <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputTanggal" class="col-sm-4 control-label">Tanggal Pengumuman</label>
              <div class="col-sm-7">
                <input type="date" name="xtanggal" class="form-control" id="inputTanggal" required>
              </div>
            </div>
            <div class="form-group">
              <label for="inputUserName" class="col-sm-4 control-label">Gambar</label>
              <div class="col-sm-7">
                <input type="file" name="gambar" class="form-control-file" id="inputUserName" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>



  <?php foreach ($data->result_array() as $i) :
    $id = $i['pengumuman_id'];
    $judul = $i['pengumuman_judul'];
    $deskripsi = $i['pengumuman_deskripsi'];
    $author = $i['pengumuman_author'];
    $tanggal = $i['pengumuman_tanggal'];
    $gambar = $i['pengumuman_gambar']; // Pastikan ada kolom pengumuman_gambar di database  
  ?>
    <!--Modal Edit Pengguna-->
    <div class="modal fade" id="ModalEdit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Pengumuman</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'admin/pengumuman/update_pengumuman' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Judul</label>
                <div class="col-sm-7">
                  <input type="hidden" name="kode" value="<?php echo $id; ?>">
                  <input type="text" name="xjudul" class="form-control" value="<?php echo $judul; ?>" id="inputUserName" placeholder="Judul" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Deskripsi</label>
                <div class="col-sm-7">
                  <textarea class="form-control" rows="3" name="xdeskripsi" placeholder="Deskripsi ..." required><?php echo $deskripsi; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="inputTanggal" class="col-sm-4 control-label">Tanggal Pengumuman</label>
                <div class="col-sm-7">
                  <input type="date" name="xtanggal" class="form-control" value="<?php echo date('Y-m-d', strtotime($tanggal)); ?>" id="inputTanggal" required>
                </div>
              </div>
              <div class="form-group">
                <label for="inputUserName" class="col-sm-4 control-label">Gambar</label>
                <div class="col-sm-7">
                  <input type="file" name="gambar" class="form-control-file" id="inputUserName">
                  <?php if (!empty($gambar)): ?>
                    <img src="<?php echo base_url() . 'assets/images/' . $gambar; ?>" alt="Gambar Pengumuman" style="max-width: 100%; margin-top: 10px;">
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>


  <?php foreach ($data->result_array() as $i) :
    $id = $i['pengumuman_id'];
    $judul = $i['pengumuman_judul'];
    $deskripsi = $i['pengumuman_deskripsi'];
    $author = $i['pengumuman_author'];
    $tanggal = $i['pengumuman_tanggal'];
  ?>
    <!--Modal Hapus Pengguna-->
    <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
            <h4 class="modal-title" id="myModalLabel">Hapus Pengumuman</h4>
          </div>
          <form class="form-horizontal" action="<?php echo base_url() . 'admin/pengumuman/hapus_pengumuman' ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="kode" value="<?php echo $id; ?>" />
              <p>Apakah Anda yakin mau menghapus pengumuman <b><?php echo $judul; ?></b> ?</p>

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