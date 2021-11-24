
<?php 

        $CI =& get_instance(); 
        $link = $this->uri->segment(4);    
        $view = TRUE;
        $id_agenda = $this->uri->segment(3);
        $title1 = "invite Ya";
        $title2 = "invite Tidak";
        $title3 = "Belum invite";
        $apiYa=file_get_contents("https://api.simleg-dprdsulteng.com/index.php/invite/jumlah/" . $id_agenda . "/1");
        $apiTdk=file_get_contents("https://api.simleg-dprdsulteng.com/index.php/invite/jumlah/" . $id_agenda . "/0");
        $apiBlm=file_get_contents("https://api.simleg-dprdsulteng.com/index.php/invite/jumlah/" . $id_agenda. "/kosong");

        
        //mengubah standar encoding
        $apiYa=utf8_encode($apiYa);
        $apiTdk=utf8_encode($apiTdk);
        $apiBlm=utf8_encode($apiBlm);

        //mengubah data json menjadi data array asosiatif
        $ya=json_decode($apiYa,true);
        $tidak=json_decode($apiTdk,true);
        $belum=json_decode($apiBlm,true);
?>

<div class="row justify-content-center">
    <div class="col-8">
            
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>

        <div class="card">
            <div class="card-body">
                <h4 class="header-title"><h1><?= $agenda->nama_agenda ?></h1></h4>
                <canvas id="inicanvas"></canvas>
            </div> <!-- end card-body-->
        </div>

        <script>

            var ctx = document.getElementById("inicanvas").getContext("2d");
            // tampilan chart
            var piechart = new Chart(ctx,{type: 'pie',
                data : {
            // label nama setiap Value
            labels:[
                        'Ya',
                        'Tidak',
                        'Belum'
                ],
            datasets: [{
                // Jumlah Value yang ditampilkan
                data:[<?= $ya ?>,<?= $tidak ?>,<?= $belum ?>],

                backgroundColor:[
                        'rgba(24, 220, 110, 0.5)',
                        'rgba(111, 80, 10, 0.5)',
                        'rgba(11, 120, 170, 0.5)'
                        ]
            }],
            }
            });

        </script>

        <div class="card-columns">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><i class="fe-mic"></i> <?= $title1 ?></h3>
                    <p class="card-text"><?= $ya ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><i class="fe-mic-off"></i> <?= $title2 ?></h3>
                    <p class="card-text"><?= $tidak ?></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><i class="fe-info"></i> <?= $title3 ?></h3>
                    <p class="card-text"><?=$belum ?></p>
                </div>
            </div>
        </div>

    </div>
</div>
