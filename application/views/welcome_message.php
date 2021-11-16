<?php
    $ci =& get_instance()
?>
    

  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.css' rel='stylesheet' />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.js'></script>


    <script>
        
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        
        });
        <?php foreach ($musyawarah->result_array() as $jadwalMusyawarah) {?>

        calendar.addEvent({
              title: '<?= substr($jadwalMusyawarah['nama_agenda'], 0, 10) ?>',
              start: '<?= $jadwalMusyawarah['waktu_agenda'] ?>',
            //   tooltip : 'tes',
              allDay: true
            });

        <?php } ?>
        calendar.render();
    });

    </script>

	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">SIMLEG</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
				<h4 class="page-title">Halaman Utama</h4>
			</div>
		</div>
	</div>     
	<!-- end page title --> 

    </div>
	<!-- end row -->


    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-body">
                    <a href="<?= base_url('data/index/agenda/status_agenda/terjadwal')?>">
                        <div id="calendar"></div>
                    </a>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
