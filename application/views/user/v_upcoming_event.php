<!-- views/user/v_upcoming_event.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Events</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .blink {
            animation: blink-animation 1s steps(5, start) infinite;
        }

        @keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }
    </style>
</head>

<body>
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
        </nav>

        <div class="custom-container">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></h6>
                </div>
                <div class="card-body">
                    <!-- Menampilkan flashdata -->
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $this->session->flashdata('success'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $this->session->flashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-center">Title</th>
                                    <th scope="col" class="text-center">Description</th>
                                    <th scope="col" class="text-center">Event Date</th>
                                    <th scope="col" class="text-center">Type</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($events)): ?>
                                    <?php foreach ($events as $event): ?>
                                        <tr>
                                            <td class="text-center"><?php echo htmlspecialchars($event['title']); ?></td>
                                            <td class="text-center"><?php echo nl2br(htmlspecialchars($event['description'])); ?></td>
                                            <td class="text-center"><?php echo  htmlspecialchars($event['event_date']); ?></td>
                                            <td class="text-center"><?php echo htmlspecialchars($event['type']); ?></td>
                                            <td class="text-center">
                                                <?php if ($event['is_rsvped']): ?>
                                                    <button type="button" class="btn btn-primary btn-sm" disabled>
                                                        SAYA AKAN HADIR!
                                                    </button>
                                                <?php else: ?>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#confirmModal"
                                                        data-jemaat-id="<?php echo htmlspecialchars($iduser); ?>"
                                                        data-pengumuman-id="<?php echo htmlspecialchars($event['pengumuman_id'] ?? ''); ?>"
                                                        data-agenda-id="<?php echo htmlspecialchars($event['agenda_id'] ?? ''); ?>"
                                                        data-event-date="<?php echo htmlspecialchars($event['event_date']); ?>"
                                                        data-title="<?php echo htmlspecialchars($event['title']); ?>"
                                                        data-type="<?php echo htmlspecialchars($event['type']); ?>">
                                                        SAYA AKAN HADIR!
                                                    </button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada event yang tersedia.</td>
                                    </tr>
                                <?php endif; ?>

                            </tbody>

                        </table>
                        <p class="text-center text-danger blink">
                            JIKA TOMBOL <span class="text-primary">SAYA AKAN HADIR</span> TIDAK BISA DI KLIK. ARTINYA ANDA TELAH MENGINPUT RSVP
                        </p>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Konfirmasi RSVP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="confirmMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary" id="confirmRSVPButton">Ya</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Form RSVP -->
    <form id="rsvpForm" action="<?php echo site_url('user/upcoming_event/rsvp'); ?>" method="post" style="display:none;">
        <input type="hidden" name="jemaat_id" value="">
        <input type="hidden" name="pengumuman_id" value="">
        <input type="hidden" name="agenda_id" value="">
        <input type="hidden" name="event_date" value="">
        <input type="hidden" name="title" value="">
        <input type="hidden" name="type" value="">
    </form>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#confirmModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var jemaatId = button.data('jemaat-id');
                var pengumumanId = button.data('pengumuman-id');
                var agendaId = button.data('agenda-id');
                var eventDate = button.data('event-date');
                var title = button.data('title');
                var type = button.data('type');

                // Set data to form
                $('#rsvpForm').find('input[name="jemaat_id"]').val(jemaatId);
                $('#rsvpForm').find('input[name="pengumuman_id"]').val(pengumumanId);
                $('#rsvpForm').find('input[name="agenda_id"]').val(agendaId);
                $('#rsvpForm').find('input[name="event_date"]').val(eventDate);
                $('#rsvpForm').find('input[name="title"]').val(title);
                $('#rsvpForm').find('input[name="type"]').val(type);

                // Set confirm message
                var jemaatNama = "<?php echo htmlspecialchars($user->jemaat_nama ?? 'Jemaat'); ?>";
                var confirmMessage = "Hai " + jemaatNama + ", Apakah Anda Yakin Akan Menghadiri " + title + "?";
                $('#confirmMessage').text(confirmMessage);

                // Debugging
                console.log('Jemaat ID:', jemaatId);
                console.log('Pengumuman ID:', pengumumanId);
                console.log('Agenda ID:', agendaId);
                console.log('Event Date:', eventDate);
                console.log('Title:', title);
                console.log('Type:', type);
                console.log('Confirm Message:', confirmMessage);
            });

            $('#confirmRSVPButton').click(function() {
                $('#rsvpForm').submit();
            });
        });
    </script>
</body>

</html>