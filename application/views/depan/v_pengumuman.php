<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Gereja Kristen Sumba Jemaat Waikabubak</p>
                    <h1>Pengumuman Gereja</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<div class="recent_event_area section__padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php foreach ($data->result() as $row): ?>
                    <?php
                    $currentDate = strtotime(date('Y-m-d'));
                    $eventDate = strtotime($row->pengumuman_tanggal);
                    $dateClass = '';
                    if ($eventDate < $currentDate) {
                        $dateClass = 'bg-past';
                    } elseif ($eventDate == $currentDate) {
                        $dateClass = 'bg-today';
                    } else {
                        $dateClass = 'bg-future';
                    }
                    ?>
                    <div class="single_event d-flex align-items-center mb-4" data-aos="fade-up">
                        <div class="date text-center rounded <?php echo $dateClass; ?>">
                            <span><?php echo date("d", strtotime($row->pengumuman_tanggal)); ?></span>
                            <p><?php echo date("M Y", strtotime($row->pengumuman_tanggal)); ?></p>
                        </div>
                        <div class="event_info">
                            <h4><?php echo $row->pengumuman_judul; ?></h4>
                            <p><?php echo nl2br(htmlspecialchars($row->pengumuman_deskripsi)); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-12 text-center">
                <?php echo $page; ?>
            </div>
        </div>
    </div>
</div>