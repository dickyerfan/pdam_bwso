<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('../assets/img/kantor.png');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Info Pelanggan</h2>
            <ol>
                <li><a href="<?= base_url('publik') ?>">Beranda</a></li>
                <li><?= $title ?></li>
            </ol>

        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Tangki Section ======= -->
    <section id="tangki" class="visiMisi">
        <div class="container mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-around gy-4">

                <div class="col-lg-7 d-flex flex-column justify-content-center">
                    <h3>Layanan Tangki Air</h3>
                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                        <div>
                            <h4><a href="#!" class="stretched-link">PENJUALAN TANGKI AIR 4000 Liter</a></h4>
                        </div>
                    </div>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
                        <div>
                            <h4><a href="#!" class="stretched-link">Perumdam Ijen Tirta memberikan pelayanan dengan truk tangki untuk keperluan Sosial, Umum dan Bisnis</a></h4>
                        </div>
                    </div>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
                        <div>
                            <h4><a href="#!" class="stretched-link">Caranya cukup Mudah :</a></h4>
                        </div>
                    </div>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-patch-check flex-shrink-0"></i>
                        <div>
                            <h4><a href="#!" class="stretched-link">Pesan air dengan datang ke Kantor Perumdam Ijen Tirta Bondowoso atau menghubungi No kontak yang tertera</a></h4>
                        </div>
                    </div>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="600">
                        <i class="bi bi-patch-check flex-shrink-0"></i>
                        <div>
                            <h4><a href="#!" class="stretched-link">Membayar sesuai tarif yang dikenakan</a></h4>
                        </div>
                    </div>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="700">
                        <i class="bi bi-patch-check flex-shrink-0"></i>
                        <div>
                            <h4><a href="#!" class="stretched-link">Petugas mengirim sesuai dengan alamat pemesanan</a></h4>
                        </div>
                    </div>

                    <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="800">
                        <i class="bi bi-patch-check flex-shrink-0"></i>
                        <div>
                            <h4>
                                Kontak Person :<br>
                                <?php if (!empty($kontak)) : ?>
                                    <?php foreach ($kontak as $row) : ?>
                                        <?php
                                        $wa_number = $row->no_hp;
                                        if (substr($wa_number, 0, 1) === '0') {
                                            $wa_number = '62' . substr($wa_number, 1);
                                        }
                                        ?>
                                        <div style="display: flex; align-items: center; gap: 8px;">
                                            <span><?= $row->no_hp ?> (<?= $row->nama ?>)</span>
                                            <a href="https://wa.me/<?= $wa_number ?>" target="_blank" title="Chat WhatsApp">
                                                <i class="bi bi-whatsapp" style="color: #25D366; font-size: 18px;"></i>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    -
                                <?php endif; ?>
                            </h4>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                    <img src="<?= base_url('assets/img/tangki.jpg') ?>" alt="Tangki Air" class="img-fluid d-flex ">
                    <div class="row mt-2">
                        <div class="col-lg-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2" class="text-center">Tarif Tangki Air</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($tarif)) : ?>
                                        <?php foreach ($tarif as $row) : ?>
                                            <tr>
                                                <td><?= $row->nama_tarif ?></td>
                                                <td><?= $row->harga ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="2" class="text-center">-</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>