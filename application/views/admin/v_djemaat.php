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

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filter and Buttons</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Filter Dan Download Data Jemaat</h2>

   <!-- Filter Section -->
<div class="card p-4 shadow-sm">
    <form action="<?php echo site_url('admin/Djemaat/downloadExcel'); ?>" method="get">
        <div class="form-group">
          <label for="wilayah">Filter by Wilayah Pelayanan</label>
          <select class="form-control" id="wilayah" name="wilayah"> <!-- Add name attribute -->
            <option value="all">All</option>
            <option value="Komerda">Komerda</option>
            <option value="Kampung Baru">Kampung Baru</option>
            <option value="Kasau">Kasau</option>
            <option value="Kolada">Kolada</option>
            <option value="Dokaka">Dokaka</option>
            <option value="Kasel">Kasel</option>
            <option value="Modu">Modu</option>
            <option value="Iya Ate">Iya Ate</option>
            <option value="Tawasangu">Tawasangu</option>
            <option value="Watu Takula">Watu Takula</option>
            <option value="Bali Ledo">Bali Ledo</option>
            <option value="Wee Kaka">Wee Kaka</option>
            <option value="Sobarade">Sobarade</option>
            <option value="Praipare">Praipare</option>
          </select>
        </div>
        <div class="form-group">
          <label for="filter">Filter By Nama Jemaat</label>
          <input type="text" class="form-control" id="filter" name="filter" placeholder="Kosongkan jika tidak ingin Filter...">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary mr-2">Download Data</button>
        </div>
  
        </div>
      </form>
    </div>
  </div>
</body>
</html>
    </form>
