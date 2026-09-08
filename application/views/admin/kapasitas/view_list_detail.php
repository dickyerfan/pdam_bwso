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

            <div class="d-flex justify-content-between align-items-center mb-3 mt-2">
                <h5 class="mb-0"><i class="fas fa-list me-1"></i> Detail Kapasitas - <?= $upk->nama_upk ?></h5>
                <a href="<?= base_url('admin_kapasitas') ?>" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="fw-bold">Daftar Lokasi & LPS</span>
                    <?php if ($is_admin) : ?>
                        <a href="<?= base_url('admin_kapasitas/tambahDetail/' . $upk->id) ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Detail
                        </a>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th width="5%">No</th>
                                    <th>Lokasi</th>
                                    <th width="120">LPS (l/detik)</th>
                                    <?php if ($is_admin) : ?>
                                        <th width="150">Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($details)) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($details as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $row->lokasi ?></td>
                                            <td class="text-center"><?= $row->lps ?></td>
                                            <?php if ($is_admin) : ?>
                                                <td class="text-center">
                                                    <a href="<?= base_url('admin_kapasitas/editDetail/' . $row->id) ?>" class="btn btn-warning btn-sm" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-sm" style="background-color: #dc3545; color: white; border-color: #dc3545;" onclick="hapus('<?= base_url('admin_kapasitas/hapusDetail/' . $row->id) ?>')" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td class="text-center" colspan="<?= $is_admin ? 4 : 3 ?>">Belum ada data detail</td>
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
                title: 'Hapus Detail?',
                text: "Data tidak dapat dikembalikan!",
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
