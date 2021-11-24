<?php
    $ci =& get_instance()
?>

<!-- Awal Konten -->

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">SIDOMAWAS</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Data</a></li>
                            <li class="breadcrumb-item active">Kader</li>
                        </ol>
                    </div>
                    <h4 class="page-title">KADER</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 
<?php /*
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-primary">
                                <i class="fe-tag font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $kader->num_rows(); ?></span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Kader</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-warning">
                                <i class="fe-clock font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">624</span></h3>
                                <p class="text-muted mb-1 text-truncate">Pending Tickets</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-success">
                                <i class="fe-check-circle font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><?= $kader_t_tsani->num_rows() ?></span></h3>
                                <p class="text-muted mb-1 text-truncate">Ta'rifiyah Tsani</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-6 col-xl-3">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-danger">
                                <i class="fe-trash-2 font-22 avatar-title text-white"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup">128</span></h3>
                                <p class="text-muted mb-1 text-truncate">Deleted Tickets</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->
        </div>
        <!-- end row -->
*/ ?>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <a href="<?= base_url('kader/crud/add') ?>" class="btn btn-blue waves-effect waves-light float-right text-white">
                        <i class="mdi mdi-plus-circle"></i> Tambah Kader
                    </a>
                    <h4 class="header-title mb-4">Data Kader</h4>

                    <div id="tickets-table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <!-- <div class="dataTables_length" id="tickets-table_length"><label>Show <select name="tickets-table_length" aria-controls="tickets-table" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="tickets-table_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="tickets-table"></label>
                        </div> -->
                    </div>
                    </div>
                    
                    <div class="row"><div class="col-sm-12">
                            
                            <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 dataTable no-footer dtr-inline collapsed" id="tickets-table" role="grid" aria-describedby="tickets-table_info" style="width: 1010px;">
                        
                        <thead>
                            
                            <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="tickets-table" rowspan="1" colspan="1" style="width: 27.4px;" aria-sort="ascending" aria-label="
                                ID
                                : activate to sort column descending">
                                Nama Kader
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="tickets-table" rowspan="1" colspan="1" style="width: 141.4px;" aria-label="Nama Kader: activate to sort column ascending">Nomor HP</th>
                            <th class="sorting" tabindex="0" aria-controls="tickets-table" rowspan="1" colspan="1" style="width: 267.4px;" aria-label="Subject: activate to sort column ascending">Halaqah</th>
                            <!-- <th class="sorting" tabindex="0" aria-controls="tickets-table" rowspan="1" colspan="1" style="width: 69.4px;" aria-label="Assignee: activate to sort column ascending">Assignee</th> -->
                            <th class="sorting" tabindex="0" aria-controls="tickets-table" rowspan="1" colspan="1" style="width: 54.4px;" aria-label="Priority: activate to sort column ascending">Marhalah</th>
                            <th class="sorting" tabindex="0" aria-controls="tickets-table" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Due Date: activate to sort column ascending">Unit</th>
                            <th class="sorting" tabindex="0" aria-controls="tickets-table" rowspan="1" colspan="1" style="width: 95.4px;" aria-label="Created Date: activate to sort column ascending">Murabbiyah</th>
                            <th class="sorting" tabindex="0" aria-controls="tickets-table" rowspan="1" colspan="1" style="width: 48.4px;" aria-label="Status: activate to sort column ascending">Status</th>
                            <th class="hidden-sm sorting" tabindex="0" aria-controls="tickets-table" rowspan="1" colspan="1" style="width: 0px; display: none;" aria-label="Action: activate to sort column ascending">Action</th></tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($kader->result() as $row)
                                {
                                ?>
                                <tr role="row" class="odd">
                                    <td tabindex="0" class="sorting_1"><b>#<?= $row->nama_kader ?></b></td>
                                    <td>
                                        <a href="javascript: void(0);" class="text-body">
                                            <?php
                                                if (!isset($row->foto))
                                            ?>
                                                <img src="assets/images/noimage.png" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                            <span class="ml-2"><?= $row->nomor_hp ?></span>
                                        </a>
                                    </td>

                                    <td style="">
                                                <?= $row->nama_halaqah ?>
                                    </td>

                                    <!-- <td style="">
                                        <a href="javascript: void(0);">
                                            <img src="assets/images/users/user-1.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                        </a>
                                    </td> -->

                                    <td style="">
                                        <span class="badge bg-soft-warning text-warning"><?= $row->nama_marhalah ?></span>
                                    </td>
                                    <td style="display: none;">
                                        (<?= $row->jenis_unit ?>) <?= $row->nama_unit ?>
                                    </td>

                                    <td style="">
                                        Ustadzah 
                                        <?php
                                            $ci->db->join('tb_kader', 'tb_kader.id = tb_halaqah.murabbiyah', 'left');
                                            $this->db->where('id_halaqah', $row->halaqah);
                                            $m = $ci->db->get('tb_halaqah');
                                            
                                            foreach ($m->result() as $r)
                                                echo $r->nama_kader;
                                        ?>
                                    </td>


                                    <td style="">
                                        <span class="badge badge-secondary"><?= $row->keaktifan ?></span>
                                    </td>
                                    <td style="display: none;">
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit Ticket</a>
                                                <a class="dropdown-item" href="#"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Close</a>
                                                <a class="dropdown-item" href="#"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                                <a class="dropdown-item" href="#"><i class="mdi mdi-star mr-2 font-18 text-muted vertical-middle"></i>Mark as Unread</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
                            ?>
                        <!--                             
                            <tr role="row" class="even">
                                <td tabindex="0" class="sorting_1"><b>#1254</b></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-body">
                                        <img src="assets/images/users/user-8.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                        <span class="ml-2">Margeret V. Ligon</span>
                                    </a>
                                </td>

                                <td style="">
                                    Your application has been received!
                                </td>

                                <td style="">
                                    <a href="javascript: void(0);">
                                        <img src="assets/images/users/user-10.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                    </a>
                                </td>

                                <td style="">
                                    <span class="badge bg-soft-danger text-danger">High</span>
                                </td>

                                <td style="">
                                    <span class="badge badge-secondary">Closed</span>
                                </td>

                                <td style="">
                                    01/04/2017
                                </td>

                                <td style="display: none;">
                                    21/05/2017
                                </td>

                                <td style="display: none;">
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit Ticket</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-star mr-2 font-18 text-muted vertical-middle"></i>Mark as Unread</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td tabindex="0" class="sorting_1"><b>#1256</b></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-body">
                                        <img src="assets/images/users/user-2.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                        <span class="ml-2">George A. Llanes</span>
                                    </a>
                                </td>

                                <td style="">
                                    Support for theme
                                </td>

                                <td style="">
                                    <a href="javascript: void(0);">
                                        <img src="assets/images/users/user-10.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                    </a>
                                </td>

                                <td style="">
                                    <span class="badge bg-soft-secondary text-secondary">Low</span>
                                </td>

                                <td style="">
                                    <span class="badge badge-success">Open</span>
                                </td>

                                <td style="">
                                    2017/04/28
                                </td>

                                <td style="display: none;">
                                    2017/04/28
                                </td>

                                <td style="display: none;">
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit Ticket</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-star mr-2 font-18 text-muted vertical-middle"></i>Mark as Unread</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td class="sorting_1" tabindex="0"><b>#1352</b></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-body">
                                        <img src="assets/images/users/user-5.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                        <span class="ml-2">Karen R. Doyle</span>
                                    </a>
                                </td>

                                <td style="">
                                    Question regarding your Bootstrap Theme
                                </td>

                                <td style="">
                                    <a href="javascript: void(0);">
                                        <img src="assets/images/users/user-8.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                    </a>
                                </td>

                                <td style="">
                                    <span class="badge bg-soft-danger text-danger">High</span>
                                </td>

                                <td style="">
                                    <span class="badge badge-success">Open</span>
                                </td>

                                <td style="">
                                    01/04/2017
                                </td>

                                <td style="display: none;">
                                    21/05/2017
                                </td>

                                <td style="display: none;">
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit Ticket</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-star mr-2 font-18 text-muted vertical-middle"></i>Mark as Unread</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td class="sorting_1" tabindex="0"><b>#2251</b></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-body">
                                        <img src="assets/images/users/user-8.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                        <span class="ml-2">Mark C. Diaz</span>
                                    </a>
                                </td>

                                <td style="">
                                    Verify your new email address!
                                </td>

                                <td style="">
                                    <a href="javascript: void(0);">
                                        <img src="assets/images/users/user-10.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                    </a>
                                </td>

                                <td style="">
                                    <span class="badge bg-soft-danger text-danger">High</span>
                                </td>

                                <td style="">
                                    <span class="badge badge-success">Open</span>
                                </td>

                                <td style="">
                                    01/04/2017
                                </td>

                                <td style="display: none;">
                                    21/05/2017
                                </td>

                                <td style="display: none;">
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit Ticket</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-star mr-2 font-18 text-muted vertical-middle"></i>Mark as Unread</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td tabindex="0" class="sorting_1"><b>#2542</b></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-body">
                                        <img src="assets/images/users/user-3.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                        <span class="ml-2">Jose D. Delacruz</span>
                                    </a>
                                </td>

                                <td style="">
                                    New submission on your website
                                </td>

                                <td style="">
                                    <a href="javascript: void(0);">
                                        <img src="assets/images/users/user-9.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                    </a>
                                </td>

                                <td style="">
                                    <span class="badge bg-soft-warning text-warning">Medium</span>
                                </td>

                                <td style="">
                                    <span class="badge badge-secondary">Closed</span>
                                </td>

                                <td style="">
                                    2008/04/25
                                </td>

                                <td style="display: none;">
                                    2008/04/25
                                </td>

                                <td style="display: none;">
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit Ticket</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-star mr-2 font-18 text-muted vertical-middle"></i>Mark as Unread</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td tabindex="0" class="sorting_1"><b>#320</b></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-body">
                                        <img src="assets/images/users/user-5.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                        <span class="ml-2">Phyllis K. Maciel</span>
                                    </a>
                                </td>

                                <td style="">
                                    Verify your new email address!
                                </td>

                                <td style="">
                                    <a href="javascript: void(0);">
                                        <img src="assets/images/users/user-10.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                    </a>
                                </td>

                                <td style="">
                                    <span class="badge bg-soft-danger text-danger">High</span>
                                </td>

                                <td style="">
                                    <span class="badge badge-success">Open</span>
                                </td>

                                <td style="">
                                    2017/04/20
                                </td>

                                <td style="display: none;">
                                    2017/04/25
                                </td>

                                <td style="display: none;">
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit Ticket</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-star mr-2 font-18 text-muted vertical-middle"></i>Mark as Unread</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td class="sorting_1" tabindex="0"><b>#3562</b></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-body">
                                        <img src="assets/images/users/user-8.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                        <span class="ml-2">Freddie J. Plourde</span>
                                    </a>
                                </td>

                                <td style="">
                                    Security alert for my account
                                </td>

                                <td style="">
                                    <a href="javascript: void(0);">
                                        <img src="assets/images/users/user-2.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                    </a>
                                </td>

                                <td style="">
                                    <span class="badge bg-soft-secondary text-secondary">Low</span>
                                </td>

                                <td style="">
                                    <span class="badge badge-success">Open</span>
                                </td>

                                <td style="">
                                    01/04/2017
                                </td>

                                <td style="display: none;">
                                    21/05/2017
                                </td>

                                <td style="display: none;">
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit Ticket</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-star mr-2 font-18 text-muted vertical-middle"></i>Mark as Unread</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr role="row" class="odd">
                                <td tabindex="0" class="sorting_1"><b>#3652</b></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-body">
                                        <img src="assets/images/users/user-3.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                        <span class="ml-2">Jessica T. Phillips</span>
                                    </a>
                                </td>

                                <td style="">
                                    Item Support Message sent
                                </td>

                                <td style="">
                                    <a href="javascript: void(0);">
                                        <img src="assets/images/users/user-9.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                    </a>
                                </td>

                                <td style="">
                                    <span class="badge bg-soft-warning text-warning">Medium</span>
                                </td>

                                <td style="">
                                    <span class="badge badge-secondary">Closed</span>
                                </td>

                                <td style="">
                                    01/04/2017
                                </td>

                                <td style="display: none;">
                                    21/05/2017
                                </td>

                                <td style="display: none;">
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit Ticket</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-star mr-2 font-18 text-muted vertical-middle"></i>Mark as Unread</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr role="row" class="even">
                                <td tabindex="0" class="sorting_1"><b>#3652</b></td>
                                <td>
                                    <a href="javascript: void(0);" class="text-body">
                                        <img src="assets/images/users/user-4.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                        <span class="ml-2">Luke J. Sain</span>
                                    </a>
                                </td>

                                <td style="">
                                    Your password has been reset
                                </td>

                                <td style="">
                                    <a href="javascript: void(0);">
                                        <img src="assets/images/users/user-10.jpg" alt="contact-img" title="contact-img" class="rounded-circle avatar-xs">
                                    </a>
                                </td>

                                <td style="">
                                    <span class="badge bg-soft-secondary text-secondary">Low</span>
                                </td>

                                <td style="">
                                    <span class="badge badge-success">Open</span>
                                </td>

                                <td style="">
                                    01/04/2017
                                </td>

                                <td style="display: none;">
                                    21/05/2017
                                </td>

                                <td style="display: none;">
                                    <div class="btn-group dropdown">
                                        <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-pencil mr-2 text-muted font-18 vertical-middle"></i>Edit Ticket</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-check-all mr-2 text-muted font-18 vertical-middle"></i>Close</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Remove</a>
                                            <a class="dropdown-item" href="#"><i class="mdi mdi-star mr-2 font-18 text-muted vertical-middle"></i>Mark as Unread</a>
                                        </div>
                                    </div>
                                </td>
                            </tr> -->
                            
                        </tbody>
                    </table></div></div><div class="row"><div class="col-sm-12 col-md-5">
                        <!-- <div class="dataTables_info" id="tickets-table_info" role="status" aria-live="polite">Showing 1 to 10 of 15 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="tickets-table_paginate"><ul class="pagination pagination-rounded"><li class="paginate_button page-item previous disabled" id="tickets-table_previous"><a href="#" aria-controls="tickets-table" data-dt-idx="0" tabindex="0" class="page-link"><i class="mdi mdi-chevron-left"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="tickets-table" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="tickets-table" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item next" id="tickets-table_next"><a href="#" aria-controls="tickets-table" data-dt-idx="3" tabindex="0" class="page-link"><i class="mdi mdi-chevron-right"></i></a></li></ul></div> -->
                    </div></div></div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
        
    </div> <!-- container -->


<!-- Akhir Konten -->