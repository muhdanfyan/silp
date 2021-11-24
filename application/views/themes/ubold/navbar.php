<div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>
    
    
                        <li class="dropdown notification-list">
                            <?php
                                $CI=&get_instance();
                                $masuk = $CI->ion_auth->user()->row();
                            ?>
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="https://i.imgur.com/<?= $masuk->photo ?>" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ml-1">
                                <?= $masuk->first_name ?> <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>
    
                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-user"></i>
                                    <span> My Account</span>
                                </a> -->
    
                                <!-- item-->
                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="fe-settings"></i>
                                    Settings
                                </a> -->
    
                                <!-- item-->
                                <a href="<?= base_url('auth/change_password') ?>" class="dropdown-item notify-item">
                                    <i class="fe-lock"></i>
                                    Change Password
                                </a>
    
                                <div class="dropdown-divider"></div>
    
                                <!-- item-->
                                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    Logout
                                </a>
    
                            </div>
                        </li>
<!--     
                        <li class="dropdown notification-list">
                            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect">
                                <i class="fe-settings noti-icon"></i>
                            </a>
                        </li> -->
    
                    </ul>
    
                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="<?= base_url() ?>" class="logo text-center">
                            <span class="logo-lg">
                                <img src="<?= base_url() ?>assets/images/logo-dark.png" alt="" height="40">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-sm">
                                <!-- <span class="logo-sm-text-dark">U</span> -->
                                <img src="<?= base_url() ?>assets/images/logo-sm.png" alt="" height="24">
                            </span>
                        </a>
                    </div>
                </div> <!-- end container-fluid-->
            </div>