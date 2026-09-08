<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav ustadz">
                    <a class="nav-link" href="<?= base_url('dashboard_baru') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fa fa-chart-line"></i></div>
                        <div style="font-size: 0.8rem;"> Dashboard Rekap</div>
                    </a>

                    <!-- <a class="nav-link" href="<?= base_url('pengguna') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fas fa-tachometer-alt"></i></div>
                        <div style="font-size: 0.8rem;"> Dashboard</div>
                    </a> -->

                    <a class="nav-link" href="<?= base_url('pengaduan') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fa fa-comments"></i></div>
                        <div style="font-size: 0.8rem;"> Pengaduan</div>
                    </a>
                    <a class="nav-link" href="<?= base_url('admin_upk') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fa fa-phone"></i></div>
                        <div style="font-size: 0.8rem;"> No Pengaduan UPK</div>
                    </a>
                    <a class="nav-link" href="<?= base_url('admin_carousel') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fa fa-images"></i></div>
                        <div style="font-size: 0.8rem;"> Kelola Carousel</div>
                    </a>
                    <a class="nav-link" href="<?= base_url('admin_kapasitas') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fa fa-industry"></i></div>
                        <div style="font-size: 0.8rem;"> Kapasitas Produksi</div>
                    </a>
                    <a class="nav-link" href="<?= base_url('admin_tangki') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fa fa-truck"></i></div>
                        <div style="font-size: 0.8rem;"> Tangki Air</div>
                    </a>
                    <a class="nav-link" href="<?= base_url('admin_produk') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fa fa-box"></i></div>
                        <div style="font-size: 0.8rem;"> Produk Ijen Water</div>
                    </a>
                    <a class="nav-link" href="<?= base_url('dashboard_baru/kuisioner_list') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fa fa-clipboard-list"></i></div>
                        <div style="font-size: 0.8rem;"> Daftar Kuisioner</div>
                    </a>
                    <!-- <a class="nav-link" href="<?= base_url('arsip') ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-file fa-fw"></i></div>
                        <div style="font-size: 0.8rem;"> Data Arsip</div>
                    </a> -->
                    <!-- <a class="nav-link" href="<?= base_url('user/admin') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fas fa-user"></i></div>
                        Data User
                    </a> -->
                    <!-- <a class="nav-link" href="<?= base_url('backup') ?>">
                        <div class="sb-nav-link-icon"><i class="fa-fw fas fa-database"></i></div>
                        Back up
                    </a> -->
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