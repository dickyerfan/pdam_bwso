<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- KONTAK PERSON -->
            <div class="card mb-4 mt-2">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="fw-bold"><i class="fas fa-phone me-1"></i> KONTAK PERSON TANGKI</span>
                    <?php if ($is_admin) : ?>
                        <a href="<?= base_url('admin_tangki/tambahKontak') ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah
                        </a>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>No HP</th>
                                    <th width="80">Urutan</th>
                                    <?php if ($is_admin) : ?>
                                        <th width="150">Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($kontak)) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($kontak as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $row->nama ?></td>
                                            <td><?= $row->no_hp ?></td>
                                            <td class="text-center"><?= $row->urutan ?></td>
                                            <?php if ($is_admin) : ?>
                                                <td class="text-center">
                                                    <a href="<?= base_url('admin_tangki/editKontak/' . $row->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <button class="btn btn-sm" style="background-color: #dc3545; color: white; border-color: #dc3545;" onclick="hapusKontak('<?= base_url('admin_tangki/hapusKontak/' . $row->id) ?>')"><i class="fas fa-trash"></i></button>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr><td class="text-center" colspan="<?= $is_admin ? 5 : 4 ?>">Belum ada data</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TARIF TANGKI -->
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="fw-bold"><i class="fas fa-tag me-1"></i> TARIF TANGKI AIR</span>
                    <?php if ($is_admin) : ?>
                        <a href="<?= base_url('admin_tangki/tambahTarif') ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah
                        </a>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-hover" width="100%" cellspacing="0">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th width="5%">No</th>
                                    <th>Nama Tarif</th>
                                    <th>Harga</th>
                                    <th width="80">Urutan</th>
                                    <?php if ($is_admin) : ?>
                                        <th width="150">Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($tarif)) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($tarif as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $row->nama_tarif ?></td>
                                            <td><?= $row->harga ?></td>
                                            <td class="text-center"><?= $row->urutan ?></td>
                                            <?php if ($is_admin) : ?>
                                                <td class="text-center">
                                                    <a href="<?= base_url('admin_tangki/editTarif/' . $row->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <button class="btn btn-sm" style="background-color: #dc3545; color: white; border-color: #dc3545;" onclick="hapusTarif('<?= base_url('admin_tangki/hapusTarif/' . $row->id) ?>')"><i class="fas fa-trash"></i></button>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr><td class="text-center" colspan="<?= $is_admin ? 5 : 4 ?>">Belum ada data</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        function hapusKontak(url) {
            Swal.fire({ title: 'Hapus Kontak?', text: "Data tidak dapat dikembalikan!", icon: 'warning', showCancelButton: true, confirmButtonColor: '#d33', cancelButtonColor: '#6c757d', confirmButtonText: 'Ya, Hapus!', cancelButtonText: 'Batal' }).then((result) => { if (result.isConfirmed) { window.location.href = url; } });
        }
        function hapusTarif(url) {
            Swal.fire({ title: 'Hapus Tarif?', text: "Data tidak dapat dikembalikan!", icon: 'warning', showCancelButton: true, confirmButtonColor: '#d33', cancelButtonColor: '#6c757d', confirmButtonText: 'Ya, Hapus!', cancelButtonText: 'Batal' }).then((result) => { if (result.isConfirmed) { window.location.href = url; } });
        }
    </script>
