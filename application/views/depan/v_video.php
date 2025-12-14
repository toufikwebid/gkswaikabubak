<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2 text-center">
        <div class="breadcrumb-text">
          <p>Gereja Kristen Sumba Jemaat Waikabubak</p>
          <h1>VIDEO GEREJA</h1>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- end breadcrumb section -->
<div class="recent_event_area section__padding">
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-lg-12">




        <div class="table-responsive">
          <table class="table table-striped" id="display">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul Video</th>
                <th>Kegiatan</th>
                <th>Lokasi</th>

                <th>#</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($data->result() as $row):
              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $row->judul_video; ?></td>
                  <td><?php echo $row->kelas_id; ?></td>
                  <td><?php echo $row->id_mapel; ?></td>

                  <td><a href="<?php echo site_url('video/lihat/' . $row->id_video); ?>" class="btn btn-info">Lihat Video</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>





      </div>

    </div>
  </div>
</div>