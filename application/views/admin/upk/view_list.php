<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <!-- <h1 class="mt-4" style="font-size: 1.5rem;"><?= $title ?></h1> -->

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
                    <span class="fw-bold"><i class="fas fa-table me-1"></i> DAFTAR NO PENGADUAN KEPALA UPK</span>

                    <a href="<?= base_url('admin_upk/tambah') ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Data
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th width="5%">No</th>
                                    <th>Nama UPK</th>
                                    <th>Kepala UPK</th>
                                    <th>No WhatsApp</th>
                                    <th>Link WA</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($upk)) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($upk as $row) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $row->nama_upk ?></td>
                                            <td><?= $row->nama_kepala ?></td>
                                            <td class="text-center"><?= $row->no_wa ?></td>
                                            <td class="text-center">
                                                <a href="https://wa.me/<?= $row->no_wa ?>" target="_blank" class="btn btn-success btn-sm">
                                                    <i class="fab fa-whatsapp"></i> Chat
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('admin_upk/edit/' . $row->id) ?>" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger btn-sm btn-hapus" data-url="<?= base_url('admin_upk/hapus/' . $row->id) ?>">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td class="text-center">Belum ada data</td>
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

            // SweetAlert untuk hapus
            $('.btn-hapus').on('click', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
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
            });
        });
    </script>