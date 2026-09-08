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

            <div class="card mb-4 mt-2">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="fw-bold"><i class="fas fa-industry me-1"></i> DAFTAR UPK</span>
                    <?php if ($is_admin) : ?>
                        <a href="<?= base_url('admin_kapasitas/tambahUpk') ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah UPK
                        </a>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th width="5%">No</th>
                                    <th>Nama UPK</th>
                                    <th>Modal ID</th>
                                    <th width="80">Urutan</th>
                                    <th width="100">Status</th>
                                    <th width="100">Detail</th>
                                    <?php if ($is_admin) : ?>
                                        <th width="150">Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($upk)) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($upk as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $row->nama_upk ?></td>
                                            <td><code><?= $row->modal_id ?></code></td>
                                            <td class="text-center"><?= $row->urutan ?></td>
                                            <td class="text-center">
                                                <?php if ($row->aktif == '1') : ?>
                                                    <span class="badge bg-success">Aktif</span>
                                                <?php else : ?>
                                                    <span class="badge bg-danger">Nonaktif</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('admin_kapasitas/detail/' . $row->id) ?>" class="btn btn-info btn-sm" title="Lihat Detail">
                                                    <i class="fas fa-list"></i>
                                                </a>
                                            </td>
                                            <?php if ($is_admin) : ?>
                                                <td class="text-center">
                                                    <a href="<?= base_url('admin_kapasitas/editUpk/' . $row->id) ?>" class="btn btn-warning btn-sm" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-sm" style="background-color: #dc3545; color: white; border-color: #dc3545;" onclick="hapus('<?= base_url('admin_kapasitas/hapusUpk/' . $row->id) ?>')" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td class="text-center" colspan="<?= $is_admin ? 7 : 6 ?>">Belum ada data</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function hapus(url) {
            Swal.fire({
                title: 'Hapus UPK?',
                text: "Semua detail kapasitas juga akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
