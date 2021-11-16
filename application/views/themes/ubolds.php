<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Sistem Informasi Rapat Kerja | DPRD Sulteng</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		
		<?php
			/** -- Copy from here -- */
			if(!empty($meta))
			foreach($meta as $name=>$content){
				echo "\n\t\t";
				?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
					}
			echo "\n";

			if(!empty($canonical))
			{
				echo "\n\t\t";
				?><link rel="canonical" href="<?php echo $canonical?>" /><?php

			}
			echo "\n\t";

			foreach($css as $file){
				echo "\n\t\t";
				?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
			} echo "\n\t";

			foreach($js as $file){
					echo "\n\t\t";
					?><script src="<?php echo $file; ?>"></script><?php
			} echo "\n\t";

			/** -- to here -- */
		?>

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url() ?>assets/images/logo-sm.png">

        <!-- Plugins css -->
        <link href="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/libs/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        
        <!-- App css -->
        <link href="<?= base_url() ?>assets/css/bootstrap2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />


    </head>

    <body>

        <!-- Navigation Bar-->
        <header id="topnav">

            <!-- Topbar Start -->
            <?php
                $this->load->view('themes/ubold/navbar');
            ?>
            <!-- end Topbar -->

            <div class="topbar-menu">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <?php
                            $this->load->view('themes/ubold/navigation');
                        ?>
                        <!-- End navigation menu -->

                        <div class="clearfix"></div>
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->

        </header>
        <!-- End Navigation Bar-->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="wrapper">
            <div class="container-fluid">
                <?php if($this->load->get_section('text_header') != '') { ?>
                    <h1><?php echo $this->load->get_section('text_header');?></h1>
                <?php }?>

                <?php echo $output;?>
                <?php echo $this->load->get_section('sidebar'); ?>
                    
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Footer Start -->
        <?php
            $this->load->view('themes/ubold/footer');
        ?>
        <!-- end Footer -->
        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="<?= base_url() ?>assets/js/vendor.min.js"></script>

        <!-- Plugins js-->
        <script src="<?= base_url() ?>assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/jquery-knob/jquery.knob.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/flot-charts/jquery.flot.js"></script>
        <script src="<?= base_url() ?>assets/libs/flot-charts/jquery.flot.resize.js"></script>
        <script src="<?= base_url() ?>assets/libs/flot-charts/jquery.flot.time.js"></script>
        <script src="<?= base_url() ?>assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/flot-charts/jquery.flot.selection.js"></script>
        <script src="<?= base_url() ?>assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

        <!-- Dashboar 1 init js-->
        <script src="<?= base_url() ?>assets/js/pages/dashboard-1.init.js"></script>

        <!-- App js-->
        <script src="<?= base_url() ?>assets/js/app.min.js"></script>
        
        <!-- Plugin js -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <script src="<?= base_url() ?>assets/libs/fullcalendar/fullcalendar.min.js"></script> -->
   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.js"></script>
    
    </body>
</html>