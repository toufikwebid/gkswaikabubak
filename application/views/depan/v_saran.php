<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                  <p>Gereja Kristen Sumba Jemaat Waikabubak</p>
                    <!-- <h1>Berikan Saran Anda</h1> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section --><section id="saran" class="saran section" style="margin-top: 50px; margin-bottom: 50px;">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Berikan Saran Anda</h2>
    </div>

    <div class="container">
        <!-- Menampilkan Flashdata -->
        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php elseif ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <!-- Form untuk mengirimkan saran -->
        <div class="row gy-4">
            <div class="col-lg-12">
                <form method="post" action="https://gkswaikabubak.com/saran/save ">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pesan">Saran:</label>
                        <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">
                        <i class="fas fa-lightbulb"></i> Kirim Saran
                    </button>
                </form>
            </div>
        </div>

        <!-- Tabel untuk menampilkan daftar saran -->
        <div class="row mt-5">
            <div class="col-lg-12">
                <h3 class="mb-4">Daftar Saran</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($saran)): ?>
                            <?php foreach ($saran as $row): ?>
                                <tr>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->pesan; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center">Belum ada saran.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
