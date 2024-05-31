<div id="layoutSidenav_content" class="latar">
    <main>
        <div class="container-fluid px-2 mt-2">
            <div class="card mb-1">
                <div class="card-header shadow">
                    <nav class="navbar navbar-light bg-light">
                        <div class="navbar-nav ms-auto">
                            <a href="<?= base_url('pengaduan') ?>"><button class="float-end neumorphic-button"><i class="fas fa-arrow-left"></i> Kembali</button></a>
                        </div>
                    </nav>
                </div>
                <div class="p-2">
                    <?= $this->session->flashdata('info'); ?>
                    <?= $this->session->unset_userdata('info'); ?>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center mb-2">
                        <div class="col-lg-6 text-center">
                            <h5><?= strtoupper($title); ?></h5>
                        </div>
                    </div>
                    <div class="card p-2">
                        <div class="row justify-content-center">
                            <?php foreach ($detail_pengaduan as $row) : ?>
                                <div class="col-lg-6">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>No Pelanggan</td>
                                                    <td> : </td>
                                                    <td><?= $row->no_pel; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Pelanggan</td>
                                                    <td> : </td>
                                                    <td><?= $row->nama_pel; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat Pelanggan</td>
                                                    <td> : </td>
                                                    <td><?= $row->alamat; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Wilayah Aduan</td>
                                                    <td> : </td>
                                                    <td><?= $row->wil_layanan; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>No Telepon</td>
                                                    <td> : </td>
                                                    <td><?= $row->no_tel; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Isi Aduan</td>
                                                    <td> : </td>
                                                    <td><?= $row->isi_aduan; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Aduan</td>
                                                    <td> : </td>
                                                    <td><?= $row->tgl_aduan; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td class="text-center">Foto Pelanggan</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <img src="<?= base_url('uploads/' . $row->foto_aduan); ?>" alt="" style="width: 100%;">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>