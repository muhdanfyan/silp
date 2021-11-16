<ul class="navigation-menu">
    <li>
        <a href="<?= base_url() ?>">
        <i class="fe-home"></i>Dashboards</a>
    </li>

    <li class="has-submenu">
        <a href="#"> <i class="fe-cpu"></i>Agenda <div class="arrow-down"></div></a>
        <ul class="submenu">
            
            <li><a href="<?= base_url('data/index/agenda') ?>">Semua</a></li>
            <li><a href="<?= base_url('data/index/agenda/status_agenda/vote') ?>">E-Vote</a></li>
            <li><a href="<?= base_url('data/index/agenda/status_agenda/undangan') ?>">Undangan</a></li>
            <!-- <li><a href="<?= base_url('data/index/agenda/status_agenda/terlaksana') ?>">Terlaksana</a></li> -->
            <li><a href="<?= base_url('data/index/agenda/status_agenda/agenda_pribadi') ?>">Agenda Pribadi</a></li>
        </ul>
    </li>
    <li>
        <a href="<?= base_url('vote') ?>">
        <i class="fe-bar-chart-2"></i>Hasil Vote</a>
    </li>
    <li>
        <a href="<?= base_url('invite') ?>">
        <i class="fe-bar-chart-2"></i>Hasil Undangan</a>
    </li>
    <li class="has-submenu">
        <a href="#"> <i class="fe-settings"></i>Data Master <div class="arrow-down"></div></a>
        <ul class="submenu">
            
            <li><a href="<?= base_url('user') ?>">Pengguna</a></li>
            <li><a href="<?= base_url('data/index/dapil') ?>">Data Dapil</a></li>
            <li><a href="<?= base_url('data/index/fraksi') ?>">Data Fraksi</a></li>
            <li><a href="<?= base_url('data/index/jabatan') ?>">Data Jabatan</a></li>
            <li><a href="<?= base_url('data/index/bgevote') ?>">Background E-Vote</a></li>
        </ul>
    </li>
    <!-- <li>
        <a href="<?= base_url('user') ?>">
        <i class="fe-user"></i>Pengguna</a>
    </li> -->
</ul>