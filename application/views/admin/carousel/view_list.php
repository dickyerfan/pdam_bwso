<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="card mb-4 mt-2">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span class="fw-bold"><i class="fas fa-images me-1"></i> DAFTAR CAROUSEL</span>

                    <?php if ($is_admin) : ?>
                        <a href="<?= base_url('admin_carousel/tambah') ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Data
                        </a>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th width="5%">No</th>
                                    <th width="120">Gambar</th>
                                    <th>Judul</th>
                                    <th>Keterangan</th>
                                    <th>Link</th>
                                    <th width="80">Tipe</th>
                                    <th width="80">Urutan</th>
                                    <th width="100">Status</th>
                                    <?php if ($is_admin) : ?>
                                        <th width="180">Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($carousel)) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($carousel as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center">
                                                <img src="<?= base_url('assets/img/hero-carousel/' . $row->gambar) ?>" alt="<?= $row->judul ?>" style="width: 100px; height: 60px; object-fit: cover; border-radius: 5px;">
                                            </td>
                                            <td><?= $row->judul ?></td>
                                            <td><?= $row->keterangan ?></td>
                                            <td>
                                                <?php if (!empty($row->link)) : ?>
                                                    <span class="badge bg-info"><i class="fas fa-link"></i> <?= $row->link ?></span>
                                                <?php else : ?>
                                                    <span class="text-muted">-</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($row->tipe == 'hero') : ?>
                                                    <span class="badge bg-primary">Hero</span>
                                                <?php else : ?>
                                                    <span class="badge bg-warning">Modal</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center"><?= $row->urutan ?></td>
                                            <td class="text-center">
                                                <?php if ($row->aktif == '1') : ?>
                                                    <span class="badge bg-success">Aktif</span>
                                                <?php else : ?>
                                                    <span class="badge bg-danger">Nonaktif</span>
                                                <?php endif; ?>
                                            </td>
                                            <?php if ($is_admin) : ?>
                                                <td class="text-center">
                                                    <?php if ($row->aktif == '1') : ?>
                                                        <button class="btn btn-warning btn-sm" onclick="nonaktifkan(<?= $row->id ?>)" title="Nonaktifkan">
                                                            <i class="fas fa-eye-slash"></i>
                                                        </button>
                                                    <?php else : ?>
                                                        <button class="btn btn-success btn-sm" onclick="aktifkan(<?= $row->id ?>)" title="Aktifkan">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                    <a href="<?= base_url('admin_carousel/edit/' . $row->id) ?>" class="btn btn-info btn-sm" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <button class="btn btn-sm btn-hapus-carousel" style="background-color: #dc3545; color: white; border-color: #dc3545;" onclick="hapus('<?= base_url('admin_carousel/hapus/' . $row->id) ?>')" title="Hapus Permanen">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td class="text-center" colspan="<?= $is_admin ? 9 : 8 ?>">Belum ada data</td>
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

        function nonaktifkan(id) {
            Swal.fire({
                title: 'Nonaktifkan?',
                text: "Carousel ini akan disembunyikan dari halaman publik",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ffc107',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Nonaktifkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('admin_carousel/nonaktifkan/') ?>' + id;
                }
            });
        }

        function aktifkan(id) {
            Swal.fire({
                title: 'Aktifkan?',
                text: "Carousel ini akan tampil di halaman publik",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Aktifkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '<?= base_url('admin_carousel/aktifkan/') ?>' + id;
                }
            });
        }

        function hapus(url) {
            Swal.fire({
                title: 'Hapus Permanen?',
                text: "Data tidak dapat dikembalikan!",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
