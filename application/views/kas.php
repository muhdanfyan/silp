
        <?php echo $output; ?>

        <?php
                $servername = "localhost";
                $username = "u7690686_user";
                $password = "pondokitmakassar2017";
                $database = "u7690686_pisantri";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $database);
                
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                else
                {
                        $result = $conn->query("SELECT SUM(nominal_keuangan) FROM `tb_keuangan` WHERE jenis_keuangan='Debet'");
                        $row = mysqli_fetch_row($result);
                        $totalmasuk = $row[0];

                        $result = $conn->query("SELECT SUM(nominal_keuangan) FROM `tb_keuangan` WHERE jenis_keuangan='Kredit'");
                        $row = mysqli_fetch_row($result);
                        $totalkeluar = $row[0];

                        $result = $conn->query("SELECT SUM(nominal_keuangan) FROM `tb_keuangan` WHERE jenis_keuangan='Debet' AND terlapor=0");
                        $row = mysqli_fetch_row($result);
                        $pemasukan = $row[0];

                        $result = $conn->query("SELECT SUM(nominal_keuangan) FROM `tb_keuangan` WHERE jenis_keuangan='Kredit' AND terlapor=0");
                        $row = mysqli_fetch_row($result);
                        $pengeluaran = $row[0] ; 

                        // $pengeluaran = $row[0];

                        $saldo = $totalmasuk - $totalkeluar;

                        ?>
                        <div class="panel panel-default">
                                <div class="panel-heading">Saldo Pekan Ini <a href="<?= base_url('data/index/keuangan') ?>" class="btn">See All</a></div>
                                <div class="panel-body">
                                        <p> Pemasukan : <b><?= "Rp. " . number_format( $pemasukan, 2, "," ,".")  ?></b> | 
                                            Pengeluaran : <b><?= "Rp. " . number_format( $pengeluaran, 2, "," ,".")  ?></b></p>
                                        <h2><?= "Rp. " . number_format($saldo, 2, "," ,".")  ?></h2>
                                        <!-- <a href="<?= base_url('kas/tutupsaldo/'. $saldo . '/'. $pemasukan . '/'. $pengeluaran) ?>" class="btn btn-info">Tutup Saldo Pekanan</a> -->
                                        <button class="btn btn-info" onclick='tes()'>Tutup Saldo Pekanan</button>
                                </div>
                        </div>
                        <?php
                }
        ?>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <?php
                if(isset($pengeluaran) && isset($pemasukan)){
        ?>
        <script>
                function tes(){
                        swal({
                                title: "Yakin ingin menutup Laporan Saldo Pekan ini?",
                                text: "data aktifitas akan diarsipkan",
                                icon: "warning",
                                buttons: true,
                                // dangerMode: true,
                                })
                                .then((willDelete) => {
                                        if (willDelete) {
                                                swal("ALhamdulillah, Laporan Pekan ini telah diarsipkan", {
                                                icon: "success"});
                                                setTimeout("location.href = '<?= base_url('kas/tutupsaldo/'.$saldo . '/'. $pemasukan . '/'. $pengeluaran) ?>';", 1000);
                                        } else {
                                                swal("Data belum diarsipkan!");
                                                }
                                });
                }
        </script>
        <?php } ?>
