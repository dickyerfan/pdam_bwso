<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="footer-info">
                        <h3>PERUMDAM <br> IJEN TIRTA <br> BONDOWOSO</h3>
                        <p>
                            Jalan. Mastrip No. 193 A <br>
                            Bondowoso, Jawa Timur<br>
                            kodepos 68219<br>
                            <strong>Phone:</strong> (0332) 427017<br>
                            <strong>Email:</strong> pdambondowoso@gmail.com /<br>
                            perumdamijentirta@gmail.com<br>
                        </p>
                        <div class="social-links d-flex mt-3">
                            <a href="https://www.instagram.com/pdam_bondowoso" target="_blank" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram" title="Akun Resmi Instagram PDAM Bondowoso"></i></a>
                            <a href="https://www.youtube.com/@infopdambondowoso" target="_blank" class="d-flex align-items-center justify-content-center"><i class="bi bi-youtube" title="channel YouTube PDAM Bondowoso"></i></a>
                            <a href="https://www.facebook.com/pdambondowosoijenwater" target="_blank" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook" title="Akun Facebook PDAM Bondowoso"></i></a>
                            <a href="https://www.tiktok.com/@pdam.bondowoso" target="_blank" class="d-flex align-items-center justify-content-center"><i class="bi bi-tiktok" title="Akun Resmi Tiktok Pdam Bondowoso"></i></a>
                            <a href="https://www.instagram.com/ijenwater.official" target="_blank" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram" title="Akun Resmi Instagram Ijen Water"></i></a>
                        </div>
                    </div>
                </div><!-- End footer info column-->

                <div class="col-lg-3 col-md-3 footer-links">
                    <ul>
                        <p><a href="#!">Profil</a></p>
                        <li><a href="<?= base_url('publik'); ?>#sejarah">Sejarah</a></li>
                        <li><a href="<?= base_url('publik'); ?>#visimisi">Visi Misi</a></li>
                        <li><a href="<?= base_url('publik'); ?>#maknalogo">Makna Logo</a></li>
                        <li><a href="<?= base_url('publik'); ?>#dakum">Dasar Hukum</a></li>
                        <li><a href="<?= base_url('publik'); ?>#struktur">Struktur Organisasi</a></li>
                        <li><a href="<?= base_url('publik'); ?>#budayakerja">Budaya Kerja</a></li>
                        <li><a href="<?= base_url('publik'); ?>#penghargaan">Penghargaan</a></li>
                    </ul>
                </div><!-- End footer links column-->
                <div class="col-lg-3 col-md-3 footer-links">
                    <ul>
                        <p><a href="#!">Info Layanan</a></p>
                        <li><a href="<?= base_url('layanan'); ?>">Cakupan Layanan</a></li>
                        <li><a href="<?= base_url('layanan/sumberAirBaku'); ?>">Sumber Air Baku</a></li>
                        <li><a href="<?= base_url('layanan/infoPelayanan') ?>">Informasi Pelayanan</a></li>
                        <li><a href="<?= base_url('layanan/kapasitasProduksi') ?>">Kapasitas Produksi</a></li>
                        <li><a href="<?= base_url('layanan/informasiTeknis') ?>">Informasi Teknis</a></li>
                    </ul>
                </div><!-- End footer links column-->
                <div class="col-lg-3 col-md-3 footer-links">
                    <ul>
                        <p><a href="#!">Info Pelanggan</a></p>
                        <li><a href="<?= base_url('pelanggan') ?>">Tarif Air Minum</a></li>
                        <li><a href="<?= base_url('pelanggan/biayaPasangBaru') ?>">Layanan Pasang baru</a></li>
                        <li><a href="<?= base_url('pelanggan/tangkiAir') ?>">Layanan Tangki Air</a></li>
                        <li><a href="<?= base_url('pelanggan/gantiNama') ?>">Layanan Ganti Nama</a></li>
                        <li><a href="<?= base_url('pelanggan/denda') ?>">Denda / Pelanggaran</a></li>
                        <li><a href="<?= base_url('pelanggan/pengaduanPelanggan') ?>">Pengaduan Online</a></li>
                        <li><a href="<?= base_url('kuisioner') ?>">Kuisioner Kepuasan</a></li>
                    </ul>
                </div><!-- End footer links column-->
            </div>
        </div>
    </div>

    <div class="footer-legal text-center position-relative">
        <div class="copyright">
            &copy; Copyright <strong><span>perumdamijentirta2026</span></strong>. All Rights Reserved
        </div>
    </div>

</footer>
<!-- End Footer -->

<!-- Floating Button Pengaduan -->
<a href="<?= base_url('pelanggan/noPengaduanUPK') ?>" class="floating-btn-pengaduan" title="No Pengaduan UPK">
    <i class="bi bi-telephone-fill"></i>
</a>

<style>
    .floating-btn-pengaduan {
        position: fixed;
        bottom: 25px;
        left: 25px;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #198754, #157347);
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 15px rgba(25, 135, 84, 0.4);
        z-index: 9999;
        text-decoration: none;
        font-size: 20px;
        transition: all 0.3s ease;
        animation: pulse-glow 2s infinite;
    }

    .floating-btn-pengaduan i {
        animation: ring-phone 1.5s infinite;
    }

    .floating-btn-pengaduan:hover {
        transform: translateY(-3px) scale(1.1);
        box-shadow: 0 6px 25px rgba(25, 135, 84, 0.6);
        color: #fff;
        text-decoration: none;
    }

    @keyframes pulse-glow {
        0% { box-shadow: 0 4px 15px rgba(25, 135, 84, 0.4); }
        50% { box-shadow: 0 4px 25px rgba(25, 135, 84, 0.7); }
        100% { box-shadow: 0 4px 15px rgba(25, 135, 84, 0.4); }
    }

    @keyframes ring-phone {
        0% { transform: rotate(0deg); }
        10% { transform: rotate(15deg); }
        20% { transform: rotate(-10deg); }
        30% { transform: rotate(10deg); }
        40% { transform: rotate(-5deg); }
        50% { transform: rotate(0deg); }
        100% { transform: rotate(0deg); }
    }

    @media (max-width: 768px) {
        .floating-btn-pengaduan {
            bottom: 15px;
            left: 15px;
            width: 45px;
            height: 45px;
            font-size: 18px;
        }
    }
</style>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/aos/aos.js"></script>
<script src="<?= base_url() ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?= base_url() ?>assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="<?= base_url() ?>assets/js/main.js"></script>

</body>

</html>
