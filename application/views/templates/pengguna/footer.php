<button id="btn-up"><i class="fas fa-chevron-circle-up logo"></i></button>
<footer class="py-2 bg-light mt-auto logo">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Built With <span class="text-danger">&hearts;</span> by DIE Art'S Production 2022</div>
        </div>
    </div>
</footer>
</div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="exampleModalLabel">Yakin Mau Logout.?</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">Pilih "Logout" jika anda yakin mau keluar</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Sweetalert2 -->
<script src="<?php echo base_url('assets/'); ?>sweetalert2.all.min.js"></script>

<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/js/scripts.js"></script>
<script src="<?= base_url() ?>assets/js/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>assets/demo/chart-bar-demo.js"></script>
<script src="<?= base_url() ?>assets/js/datatables-simple-demo.js"></script>

<!-- datatable bootstrap5 -->
<script src="<?= base_url(); ?>assets/datatables/bootstrap5/jquery-3.5.1.js"></script>
<script src="<?= base_url(); ?>assets/datatables/bootstrap5/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/datatables/bootstrap5/dataTables.bootstrap5.min.js"></script>
<!-- select2 js -->
<script src="<?= base_url() ?>assets/select2/select2.min.js"></script>
<script src="<?= base_url('assets/js/bootstrap-datepicker.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<script>
    $('.select2').select2({
        theme: 'bootstrap-5'
    });

    // $(function() {
    //     $('#datepicker').datepicker({
    //         format: 'yyyy-mm-dd',
    //         autoclose: true,
    //         todayHiglight: true,
    //     });
    // });
</script>

<script>
    $('.btn-danger').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
            title: 'Yakin mau Di Hapus?',
            text: 'Jika yakin tekan Hapus',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    })

    $("#btn-up").click(function() {
        $("html,body").animate({
            scrollTop: 0
        }, 500);
    });
</script>
<script>
    $('#belum').on('click', function() {
        $('#tanya').show();
    })

    $('#tombol_pilih').on('click', function() {
        $('#tanya').hide();
    })

    $('#cetak').on('click', function() {
        window.print();
    })
</script>

<script>
    window.setTimeout(function() {
        $(".alert").animate({
            left: "0",
            width: "80%"
        }, 5000, function() {}).fadeTo(1000, 0).slideUp(1000, function() {
            $(this).remove();
        });
    }, 1000);
</script>

<!-- <script>
    function tambahdata() {
        var tanggal = $("[name='tanggal']").val();
        var uraian = $("[name='uraian']").val();
        var rupiah = $("[name='rupiah']").val();
        var jenis_transaksi = $("[name='jenis_transaksi']").val();
        var jenis_donasi = $("[name='jenis_donasi']").val();
        var kode_saldo = $("[name='kode_saldo']").val();

        $.ajax({
            type: 'POST',
            data: 'tanggal=' + tanggal + '&uraian=' + uraian + '&rupiah=' + rupiah + '&jenis_transaksi=' + jenis_transaksi + '&jenis_donasi=' + jenis_donasi + '&kode_saldo=' + kode_saldo,
            url: '<?= base_url() . 'transaksi/tambahData' ?>',
            dataType: 'json',
            success: function(hasil) {
                $("#pesan").html(hasil.pesan);

                if (hasil.pesan == '') {
                    $("#form").modal('hide');
                    ambilData();
                    // $("#tanda").text('Data berhasil ditambah');
                    $("#tanda").html(
                        `<div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <strong>Sukses</strong> Data Berhasil ditambah.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>`
                    );
                    $("[name='tanggal']").val('');
                    $("[name='uraian']").val('');
                    $("[name='rupiah']").val('');
                    $("[name='jenis_transaksi']").val('');
                    $("[name='jenis_donasi']").val('');
                    $("[name='kode_saldo']").val('');
                }
            }
        });
    }

    function submit(x) {
        if (x == 'tambah') {
            $('#btn-tambah').show();
            $('#btn-ubah').hide();
        } else {
            $('#btn-tambah').hide();
            $('#btn-ubah').show();

            $.ajax({
                type: 'POST',
                data: 'id=' + x,
                url: '<?= base_url('mahasiswa/ambilId') ?>',
                dataType: 'json',
                success: function(hasil) {
                    $('[name="id"]').val(hasil[0].id);
                    $('[name="tanggal"]').val(hasil[0].tanggal);
                    $('[name="uraian"]').val(hasil[0].uraian);
                    $('[name="rupiah"]').val(hasil[0].rupiah);
                    $('[name="jenis_transaksi"]').val(hasil[0].jenis_transaksi);
                    $('[name="jenis_donasi"]').val(hasil[0].jenis_donasi);
                    $('[name="kode_saldo"]').val(hasil[0].kode_saldo);
                }
            })
        }
    }
</script> -->

</body>

</html>