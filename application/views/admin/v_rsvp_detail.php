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
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jemaat Nama</th>
                                <th>Judul</th>
                                <th>Type</th>
                                <th>Event Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($rsvps as $rsvp): ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $rsvp->nama; ?></td>
                                    <td><?php echo $rsvp->judul; ?></td>
                                    <td><?php echo $rsvp->type; ?></td>
                                    <td><?php echo $rsvp->event_date; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="<?php echo site_url('admin/rsvp'); ?>" class="btn btn-secondary">Kembali</a>
                </div>

                <script>
                    $(document).ready(function() {
                        $('#rsvpTable').DataTable({
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