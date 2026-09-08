<main id="main">

    <!-- Breadcrumbs -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= base_url('assets/img/kantor.png') ?>');">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Kuisioner Kepuasan Pelanggan</h2>
            <ol>
                <li><a href="<?= base_url('publik') ?>">Beranda</a></li>
                <li>Kuisioner</li>
            </ol>
        </div>
    </div>

    <!-- Kuisioner Section -->
    <section id="kuisioner" class="kuisioner">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-1"></i>
                    <?= $this->session->flashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-1"></i>
                    <?= $this->session->flashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-triangle me-1"></i>
                    <?= validation_errors() ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <div class="row justify-content-center">
                <div class="col-lg-11">

                    <!-- Info Box -->
                    <div class="card bg-light border-0 shadow-sm mb-4">
                        <div class="card-body text-center py-4">
                            <i class="fas fa-clipboard-list fa-3x text-primary mb-3"></i>
                            <h5>Survey Kepuasan Pelanggan</h5>
                            <p class="text-muted mb-0">Bantu kami meningkatkan kualitas layanan dengan memberikan penilaian Anda.
                                <br>Skala: <strong>1</strong> (Tidak Baik) s/d <strong>4</strong> (Sangat Baik)
                            </p>
                        </div>
                    </div>

                    <!-- Form Kuisioner -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white fw-bold">
                            <i class="fas fa-edit me-1"></i> Isi Kuisioner
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('kuisioner/submit') ?>" method="POST" id="formKuisioner">

                                <!-- Data Diri -->
                                <h6 class="fw-bold text-primary mb-3"><i class="fas fa-user me-1"></i> Data Diri</h6>
                                <div class="row mb-4">
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" name="nama_pelanggan" class="form-control" value="<?= set_value('nama_pelanggan') ?>" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">No Pelanggan (8 digit) <span class="text-danger">*</span></label>
                                        <input type="text" name="no_pel" class="form-control" maxlength="8" pattern="[0-9]{8}" placeholder="Contoh: 12345678" value="<?= set_value('no_pel') ?>" required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="form-label">Wilayah Pelayanan <span class="text-danger">*</span></label>
                                        <select name="wilayah" class="form-select" required>
                                            <option value="">Pilih Wilayah...</option>
                                            <option value="Bondowoso" <?= set_value('wilayah') == 'Bondowoso' ? 'selected' : '' ?>>Bondowoso</option>
                                            <option value="Sukosari 1" <?= set_value('wilayah') == 'Sukosari 1' ? 'selected' : '' ?>>Sukosari 1</option>
                                            <option value="Maesan" <?= set_value('wilayah') == 'Maesan' ? 'selected' : '' ?>>Maesan</option>
                                            <option value="Tegalampel" <?= set_value('wilayah') == 'Tegalampel' ? 'selected' : '' ?>>Tegalampel</option>
                                            <option value="Tapen" <?= set_value('wilayah') == 'Tapen' ? 'selected' : '' ?>>Tapen</option>
                                            <option value="Prajekan" <?= set_value('wilayah') == 'Prajekan' ? 'selected' : '' ?>>Prajekan</option>
                                            <option value="Tlogosari" <?= set_value('wilayah') == 'Tlogosari' ? 'selected' : '' ?>>Tlogosari</option>
                                            <option value="Wringin" <?= set_value('wilayah') == 'Wringin' ? 'selected' : '' ?>>Wringin</option>
                                            <option value="Curahdami" <?= set_value('wilayah') == 'Curahdami' ? 'selected' : '' ?>>Curahdami</option>
                                            <option value="Tamanan" <?= set_value('wilayah') == 'Tamanan' ? 'selected' : '' ?>>Tamanan</option>
                                            <option value="Tenggarang" <?= set_value('wilayah') == 'Tenggarang' ? 'selected' : '' ?>>Tenggarang</option>
                                            <option value="Tamankrocok" <?= set_value('wilayah') == 'Tamankrocok' ? 'selected' : '' ?>>Tamankrocok</option>
                                            <option value="Wonosari" <?= set_value('wilayah') == 'Wonosari' ? 'selected' : '' ?>>Wonosari</option>
                                            <option value="Klabang" <?= set_value('wilayah') == 'Klabang' ? 'selected' : '' ?>>Klabang</option>
                                            <option value="Sukosari 2" <?= set_value('wilayah') == 'Sukosari 2' ? 'selected' : '' ?>>Sukosari 2</option>
                                            <option value="Ijen Water" <?= set_value('wilayah') == 'Ijen Water' ? 'selected' : '' ?>>Ijen Water</option>
                                        </select>
                                    </div>
                                </div>

                                <?php
                                $kategori_sekarang = '';
                                $no = 1;
                                foreach ($pertanyaan as $row) :
                                    if ($row->kategori != $kategori_sekarang) :
                                        $kategori_sekarang = $row->kategori;
                                ?>
                                        <!-- Kategori: <?= $kategori_sekarang ?> -->
                                        <?php if ($no > 1) : ?>
                        </div><?php endif; ?>
                    <h6 class="fw-bold text-primary mt-3 mb-2">
                        <i class="fas fa-tag me-1"></i> <?= $kategori_sekarang ?>
                    </h6>
                    <div class="card bg-light border-0 mb-3">
                        <div class="card-body">
                        <?php endif; ?>

                        <!-- Pertanyaan <?= $no ?> -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold"><?= $no ?>. <?= $row->pertanyaan ?></label>
                            <div class="row mt-2">
                                <?php for ($i = 1; $i <= 4; $i++) : ?>
                                    <div class="col text-center">
                                        <div class="form-check d-flex flex-column align-items-center justify-content-center p-2 rounded" style="background: <?= $i == 1 ? '#f8d7da' : ($i == 2 ? '#fff3cd' : ($i == 3 ? '#cff4fc' : '#d1e7dd')) ?>; min-height: 90px;">
                                            <input class="form-check-input" type="radio" name="jawaban[<?= $row->id ?>]" value="<?= $i ?>" id="q<?= $row->id ?>_<?= $i ?>" required style="margin-bottom: 4px;">
                                            <label class="form-check-label fw-bold" for="q<?= $row->id ?>_<?= $i ?>" style="font-size:0.85rem; line-height:1.2;">
                                                <?= $i ?><br>
                                                <span class="fw-normal" style="font-size:0.7rem;">
                                                <?php
                                                if ($i == 1) echo 'Tidak<br>Baik';
                                                elseif ($i == 2) echo 'Kurang<br>Baik';
                                                elseif ($i == 3) echo 'Baik';
                                                else echo 'Sangat<br>Baik';
                                                ?>
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>

                    <?php $no++;
                                endforeach; ?>
                        </div> <!-- close last kategori card -->

                        <!-- Saran & Masukan -->
                        <h6 class="fw-bold text-primary mt-3 mb-2">
                            <i class="fas fa-comment-dots me-1"></i> Saran & Masukan
                        </h6>
                        <div class="card bg-light border-0 mb-3">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Saran dan masukan Anda untuk peningkatan kualitas layanan Perumdam Ijen Tirta:</label>
                                    <textarea name="saran" class="form-control" rows="4" placeholder="Tulis saran dan masukan Anda di sini..."><?= set_value('saran') ?></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-paper-plane me-1"></i> Kirim Jawaban
                            </button>
                        </div>

                        </form>
                    </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

</main>

<script>
    document.getElementById('formKuisioner').addEventListener('submit', function(e) {
        const radios = document.querySelectorAll('input[type="radio"]:checked');
        const totalPertanyaan = document.querySelectorAll('input[type="radio"][required]').length / 4;
        if (radios.length < totalPertanyaan) {
            e.preventDefault();
            alert('Mohon isi semua pertanyaan sebelum mengirim jawaban.');
        }
    });
</script>