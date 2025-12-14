   <!-- breadcrumb-section -->
   <div class="breadcrumb-section breadcrumb-bg">
       <div class="container">
           <div class="row">
               <div class="col-lg-8 offset-lg-2 text-center">
                   <div class="breadcrumb-text">
                       <p>Gereja Kristen Sumba Jemaat Waikabubak</p>
                       <h1>Jadwal Kebaktian</h1>
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
                        $eventDate = strtotime($row->agenda_mulai);
                        $dateClass = ($eventDate < $currentDate) ? 'bg-past' : 'bg-future';
                        if ($eventDate == $currentDate) {
                            $dateClass = 'bg-today';
                        }
                        ?>
                       <div class="single_event d-flex align-items-center mb-4" data-aos="fade-up">
                           <div class="date text-center rounded <?php echo $dateClass; ?>">
                               <span><?php echo date("d", strtotime($row->agenda_mulai)); ?></span>
                               <p><?php echo date("M Y", strtotime($row->agenda_mulai)); ?></p>
                           </div>
                           <div class="event_info">
                               <h4><?php echo $row->agenda_nama; ?></h4>
                               <p><?php echo $row->agenda_deskripsi; ?></p>
                               <p><span><i class="fas fa-clock"></i> <?php echo $row->agenda_waktu; ?></span></p>
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