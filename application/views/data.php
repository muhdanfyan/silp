<?php 

    $CI =& get_instance(); 
    $link = $this->uri->segment(4);
    $link2 = $this->uri->segment(2);
    $linkController = $this->uri->segment(1);
    
    echo $output; 
    $view = false;
    $invite = false;
    if ($link == 'agenda_vote'){
        $view = TRUE;
        $id_agenda = $this->uri->segment(5);
        $title1 = "Vote Ya";
        $title2 = "Vote Tidak";
        $title3 = "Belum Vote";
        $apiYa=file_get_contents("https://api.simleg-dprdsulteng.com/index.php/vote/jumlah/" . $id_agenda . "/1");
        $apiTdk=file_get_contents("https://api.simleg-dprdsulteng.com/index.php/vote/jumlah/" . $id_agenda . "/0");
        $apiBlm=file_get_contents("https://api.simleg-dprdsulteng.com/index.php/vote/jumlah/" . $id_agenda. "/kosong");

        //mengubah standar encoding
        $apiYa=utf8_encode($apiYa);
        $apiTdk=utf8_encode($apiTdk);
        $apiBlm=utf8_encode($apiBlm);

        //mengubah data json menjadi data array asosiatif
        $ya=json_decode($apiYa,true);
        $tidak=json_decode($apiTdk,true);
        $belum=json_decode($apiBlm,true);

    }
    elseif ($link == 'agenda_invite'){
        $view = TRUE;
        $id_agenda = $this->uri->segment(5);
        $title1 = "Siap Hadir";
        $title2 = "Berhalangan";
        $title3 = "Belum Jawab";
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

    }
    
    
    if (($link2 == 'index') && ($linkController=='invite')){
        $invite=true;
        $id_agenda = $this->uri->segment(3);
        $pesertaYa = json_decode(utf8_encode(file_get_contents("https://api.simleg-dprdsulteng.com/index.php/invite/pesertafull/" . $id_agenda . "/1")));
        $pesertaTidak = json_decode(utf8_encode(file_get_contents("https://api.simleg-dprdsulteng.com/index.php/invite/pesertafull/" . $id_agenda . "/0")));
        $pesertaBelum = json_decode(utf8_encode(file_get_contents("https://api.simleg-dprdsulteng.com/index.php/invite/pesertafull/" . $id_agenda)));


    }

    if ($view){
?>

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

<?php
  }

if ($invite){
?>
    <div class="card-columns">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><i class="fe-mic"></i> Siap hadir</h3>
                <p class="card-text">
                <table>
                <?php
                    
                foreach($pesertaYa as $a){
                    ?>
                            <tr>
                                <td><?= $a->first_name. " " . $a->last_name ?></td>
                            </tr>

                        <?php
                }              
                ?>
                
                </table></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><i class="fe-mic-off"></i> Tidak hadir</h3>
                <p class="card-text">
                
                <table>
                <?php
                    
                foreach($pesertaTidak as $a){
                    ?>
                            <tr>
                                <td><?= $a->first_name. " " . $a->last_name ?></td>
                            </tr>

                        <?php
                }              
                ?>
                
                </table></p>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><i class="fe-info"></i> Belum menjawab</h3>
                <p class="card-text">
                <table>
                <?php
                    
                foreach($pesertaBelum as $a){
                    ?>
                            <tr>
                                <td><?= $a->first_name. " " . $a->last_name ?></td>
                            </tr>

                        <?php
                }              
                ?>
                
                </table></p>
            </div>
        </div>
    </div>
<?php
  }
?>