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
                            <div class="alert alert-warning" role="alert">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif; ?>



                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Agenda Nama</th>
                                <th>Agenda Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($agendas as $agenda): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $agenda->agenda_nama; ?></td>
                                    <td><?php echo $agenda->agenda_mulai; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('admin/rsvp/detail/' . $agenda->agenda_id); ?>" class="btn btn-primary btn-block btn-flat">Lihat Detail RSVP</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#agendaTable').DataTable({
                            "pagingType": "full_numbers",
                            "lengthMenu": [
                                [5, 10, 25, -1],
                                [5, 10, 25, "All"]
                            ],
                            "searching": true
                        });
                    });
                </script>
            </div>
        </div>
    </div>
</div>