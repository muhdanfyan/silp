<?php
    $ci =& get_instance()
?>
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="javascript: void(0);">PIsantri</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
				<h4 class="page-title">Halaman Utama</h4>
			</div>
		</div>
	</div>     
	<!-- end page title --> 

	<div class="row">

        <div class="col-md-6 col-xl-4">
			<div class="widget-rounded-circle card-box bg-info">
				<div class="row align-items-center">
					<div class="col-auto">
						<div class="avatar-lg">
                        <img src="assets/uploads/fotosantri/<?= $foto_pimpinan ?>" class="img-fluid rounded-circle" alt="user-img" style ="max-height:72px">
						</div>
					</div>
					<div class="col">
						<h5 class="mb-1 mt-2 text-white font-16"><?= $pimpinan ?></h5>
						<p class="mb-2 text-white-50">WK Harian II</p>
					</div>
				</div> <!-- end row-->
			</div> <!-- end widget-rounded-circle-->
		</div> <!-- end col-->
        
		<div class="col-md-6 col-xl-4">
			<div class="widget-rounded-circle card-box">
				<div class="row align-items-center">
					<div class="col-auto">
						<div class="avatar-lg">
							<img src="assets/uploads/fotosantri/<?= $foto_umum ?>" class="img-fluid rounded-circle" alt="user-img" style ="max-height:72px">
						</div>
					</div>
					<div class="col">
						<h5 class="mb-1 mt-2 font-16"><?= $umum ?></h5>
						<p class="mb-2 text-muted">Umum</p>
					</div>
				</div> <!-- end row-->
			</div> <!-- end widget-rounded-circle-->
		</div> <!-- end col-->
        
		<div class="col-md-6 col-xl-4">
			<div class="widget-rounded-circle card-box">
				<div class="row align-items-center">
					<div class="col-auto">
						<div class="avatar-lg">
							<img src="assets/uploads/fotosantri/<?= $foto_humas ?>" class="img-fluid rounded-circle" alt="user-img" style ="max-height:80px">
						</div>
					</div>
					<div class="col">
						<h5 class="mb-1 mt-2 font-16"><?= $humas ?></h5>
						<p class="mb-2 text-muted">Humas</p>
					</div>
				</div> <!-- end row-->
			</div> <!-- end widget-rounded-circle-->
		</div> <!-- end col-->

		<?php /*
		<div class="col-md-6 col-xl-6">
			<div class="widget-rounded-circle card-box">
				<div class="row align-items-center">
					<div class="col-auto">
						<div class="avatar-lg">
							<img src="assets/images/users/user-4.jpg" class="img-fluid rounded-circle" alt="user-img">
						</div>
					</div>
					<div class="col">
						<h5 class="mb-1 mt-2 font-16">Chandler Hervieux</h5>
						<p class="mb-2 text-muted">Manager</p>
					</div>
				</div> <!-- end row-->
			</div> <!-- end widget-rounded-circle-->
		</div> <!-- end col-->
		*/ ?>
	</div>
	<!-- end row -->

    <div class="row">
        <div class="col-sm-6 col-md-4 col-xl-3">
            <a href="<?= base_url('kas')?>">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                <i class="fe-dollar-sign font-22 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1">Rp. <span data-plugin="counterup"><?= substr($ci->comm_model->jumlah_kas(),0, -3)  ?></span>k</h3>
                                <p class="text-muted mb-1 text-truncate">Saldo Kas</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </a>
        </div> <!-- end col-->

        <div class="col-sm-6 col-md-4 col-xl-3">
            <a href="<?= base_url('data/index/masukan')?>">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                <i class="fe-clipboard font-22 avatar-title text-primary"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?=$ci->comm_model->jumlah_baris('tb_masukan', 'status = "belum diterima"')?></span><sup data-plugin="counterup"><?=$ci->comm_model->jumlah_baris('tb_masukan')?></sup></h3>
                                <p class="text-muted mb-1 text-truncate">Keluhan Santri</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </a>
        </div> <!-- end col-->
        
        <div class="col-sm-6 col-md-4 col-xl-3">
            <a href="<?= base_url('data/index/inventaris')?>">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                <i class="fe-briefcase font-22 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $jumlah_inventaris ?></span></h3>
                                <p class="text-muted mb-1 text-truncate"> Inventaris</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </a>
        </div> <!-- end col-->

        <div class="col-sm-6 col-md-4 col-xl-3">
            <a href="<?= base_url('data/index/relasi')?>">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                <i class="fe-external-link font-22 avatar-title text-primary"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?=$ci->comm_model->jumlah_baris('tb_relasi', 'status_relasi =1')?></span> <sup data-plugin="counterup"><?=$ci->comm_model->jumlah_baris('tb_relasi')?></sup></h3>
                                <p class="text-muted mb-1 text-truncate">Relasi</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </a>
        </div> <!-- end col-->
    </div>
	<!-- end row -->

    <div class="row">
		<div class="col-12">
			<!-- Portlet card -->
			<div class="card">
				<div class="card-body">
					<div class="card-widgets">
						<a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
						<a data-toggle="collapse" href="#cardCollpase4" role="button" aria-expanded="false" aria-controls="cardCollpase4"><i class="mdi mdi-minus"></i></a>
						<a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
					</div>
					<h4 class="header-title mb-0">Projects</h4>

					<div id="cardCollpase4" class="collapse pt-3 show">
						<div class="table-responsive">
							<table class="table table-centered table-borderless mb-0">
								<thead class="thead-light">
									<tr>
										<th>Project Name</th>
										<th class="xs-hidden">Project Type</th>
										<th class="xs-hidden">Due Date</th>
										<th>Team</th>
										<th>Status</th>
										<th class="xs-hidden">Clients</th>
									</tr>
								</thead>
								<tbody>
                                    <?php
                                    foreach ($project->result_array() as $row){
                                    ?>
									<tr>
										<td><?= $row['nama_project'] ?></td>
										<td class="xs-hidden"><?= $row['start_project'] ?></td>
										<td class="xs-hidden"><?= $row['deadline_project'] ?></td>
										<td>
                                            <!-- <?= $row['id_project'] ?> -->
											<div class="avatar-group">
                                            <?php
                                                $bgsoft = array("Work in Progress" => "bg-soft-info text-info",
                                                "Completed" => "bg-soft-success text-success",
                                                "Pending" => "bg-soft-warning text-warning",
                                                "Coming Soon" => "bg-soft-dark text-dark"
                                            );
                                                foreach ($santri_project->result_array() as $r){
                                                    if ($r['project'] == $row['id_project'] )
                                            ?>
												<a href="<?= base_url('data/index/santri/read/' . $r['id_santri']) ?>" class="avatar-group-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?= $r['nama_panggilan_santri'] ?>">
													<img src="<?= base_url() ?>/assets/uploads/fotosantri/<?= $r['foto_santri'] ?>" class="rounded-circle avatar-xs" alt="friend">
												</a>
                                            
                                            <?php
                                            }
                                            ?>
											</div>
										</td>
										<td><span class="badge <?= $bgsoft[$row['progress_project']] ?> p-1"><?= $row['progress_project'] ?></span></td>
										<td class="xs-hidden"><?= $row['clients'] ?></td>
									</tr>
                                    <?php
                                    }
                                    ?>

								</tbody>
							</table>
						</div> <!-- .table-responsive -->
					</div> <!-- end collapse-->
				</div> <!-- end card-body-->
			</div> <!-- end card-->
		</div> <!-- end col-->
	</div>
	<!-- end row -->
	