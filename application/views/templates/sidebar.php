<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav ustadz">
                    <!-- <a class="nav-link" href="<?= base_url('publik') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fas fa-wallet"></i></div>
                        Beranda
                    </a> -->
                    <a class="nav-link" href="<?= base_url('dashboard') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fas fa-tachometer-alt"></i></div>
                        <div style="font-size: 0.8rem;"> Dashboard</div>
                    </a>

                    <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#dataPekerjaan" aria-expanded="false" aria-controls="dataPekerjaan">
                        <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                        Data Kajian
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="dataPekerjaan" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="<?= base_url('mesjid') ?>">Daftar Mesjid</a>
                            <a class="nav-link" href="<?= base_url('kajian/kajian') ?>">Daftar Kajian</a>
                            <a class="nav-link" href="<?= base_url('kajian/ustadz') ?>">Daftar Ustadz</a>
                            <a class="nav-link" href="<?= base_url('kajian/kitab') ?>">Daftar Kitab</a>
                            <a class="nav-link" href="<?= base_url('kajian/waktu') ?>">Daftar Waktu</a>
                        </nav>
                    </div> -->
                    <!-- <a class="nav-link" href="<?= base_url('transaksi') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw far fa-list-alt"></i></div>
                        Data Transaksi
                    </a>
                    <a class="nav-link" href="<?= base_url('laporan') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fas fa-laptop"></i></div>
                        Laporan
                    </a>
                    <a class="nav-link" href="<?= base_url('donasi') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fas fa-money-check-dollar"></i></div>
                        Donasi
                    </a> -->
                    <a class="nav-link" href="<?= base_url('pengaduan') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fa fa-comments"></i></div>
                        <div style="font-size: 0.8rem;"> Pengaduan</div>
                    </a>
                    <a class="nav-link" href="<?= base_url('arsip') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-file fa-fw"></i></div>
                        <div style="font-size: 0.8rem;"> Data Arsip</div>
                    </a>
                    <a class="nav-link" href="<?= base_url('user/admin') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fas fa-user"></i></div>
                        <div style="font-size: 0.8rem;"> Data User</div>
                    </a>
                    <a class="nav-link" href="<?= base_url('backup') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fas fa-database"></i></div>
                        <div style="font-size: 0.8rem;"> Back up</div>
                    </a>
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        <div class="sb-nav-link-icon"><i class="fa-fw fas fa-sign-out-alt"></i></div>
                        <div style="font-size: 0.8rem;"> Logout</div>
                    </a>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small" style="font-size: 0.7rem;">Anda Login sebagai :</div>
                <div class="small" style="font-size: 0.7rem;"><?= $this->session->userdata('level'); ?></div>
            </div>
        </nav>
    </div>