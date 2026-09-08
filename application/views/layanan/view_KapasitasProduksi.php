<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('../assets/img/breadcrumbs-bg.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2 style="font-size: 30px;">Info Layanan</h2>
            <ol>
                <li><a href="<?= base_url('publik') ?>">Beranda</a></li>
                <li><?= $title ?></li>
            </ol>

        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="kapasitasProduksi" class="visiMisi">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row justify-content-around gy-4">
                <h3>Kapasitas Produksi Perumdam Ijen Tirta</h3>
                <p class="data">Data Update Terakhir : <?= $update_terakhir ? $update_terakhir . ' ' : '-' ?></p>

                <?php
                // Bagi UPK menjadi 2 kolom
                $total = count($upk_list);
                $half = ceil($total / 2);
                $left = array_slice($upk_list, 0, $half);
                $right = array_slice($upk_list, $half);
                ?>

                <!-- Kolom Kiri -->
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <?php foreach ($left as $index => $row) : ?>
                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="<?= ($index + 1) * 100 ?>">
                            <i class="bi bi-speedometer flex-shrink-0"></i>
                            <div>
                                <h4><a href="#!" class="stretched-link" data-bs-toggle="modal" data-bs-target="#<?= $row->modal_id ?>"><?= $row->nama_upk ?></a></h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <?php foreach ($right as $index => $row) : ?>
                        <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="<?= ($index + 1) * 100 ?>">
                            <i class="bi bi-speedometer flex-shrink-0"></i>
                            <div>
                                <h4><a href="#!" class="stretched-link" data-bs-toggle="modal" data-bs-target="#<?= $row->modal_id ?>"><?= $row->nama_upk ?></a></h4>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

    <!-- Modal Dynamic untuk setiap UPK -->
    <?php foreach ($upk_list as $row) : ?>
        <div class="modal fade" id="<?= $row->modal_id ?>" tabindex="-1" aria-labelledby="<?= $row->modal_id ?>Label" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="<?= $row->modal_id ?>Label">Kapasitas Produksi <?= $row->nama_upk ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row gy-4 posts-list">
                            <?php if (!empty($row->detail)) : ?>
                                <?php foreach ($row->detail as $item) : ?>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="card text-center border-0 shadow">
                                            <div class="card-header fw-bold bg-warning">
                                                <?= $item->lokasi ?>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"><?= $item->lps ?> lps</h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="col-12 text-center">
                                    <p class="text-muted">Belum ada data kapasitas</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

</main><!-- End #main -->