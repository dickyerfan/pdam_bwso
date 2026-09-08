 <!-- ======= Hero Section ======= -->
 <section id="hero" class="hero">
     <div class="info d-flex align-items-center">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-lg-10 text-center">
                     <h2 data-aos="fade-down" class="mb-4">Transformasi Menuju Pelayanan Terbaik</h2>

                     <!-- Transformasi Logo -->
                     <div class="d-flex align-items-center justify-content-center flex-wrap mb-4" data-aos="zoom-in" data-aos-delay="100">
                         <!-- Logo Lama -->
                         <div class="text-center mx-3 mb-3">
                             <div style="width: 100px; height: 100px; background: rgba(255,255,255,0.9); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                                 <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo PDAM" style="width: 80px;">
                             </div>
                             <p class="mt-2 mb-0 fw-bold" style="color: #fff; text-shadow: 1px 1px 3px rgba(0,0,0,0.5); font-size: 0.9rem;">PDAM Bondowoso</p>
                         </div>

                         <!-- Arrow -->
                         <div class="mx-3 mb-3" data-aos="fade-right" data-aos-delay="200">
                             <div class="arrow-transform">
                                 <i class="bi bi-arrow-right"></i>
                             </div>
                         </div>

                         <!-- Logo Baru -->
                         <div class="text-center mx-3 mb-3">
                             <div style="width: 100px; height: 100px; background: rgba(255,255,255,0.9); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto; box-shadow: 0 4px 15px rgba(0,0,0,0.2); border: 3px solid #ffc107;">
                                 <img src="<?= base_url('assets/img/tirta.png') ?>" alt="Logo Perumdam" style="width: 75px;">
                             </div>
                             <p class="mt-2 mb-0 fw-bold" style="color: #ffc107; text-shadow: 1px 1px 3px rgba(0,0,0,0.5); font-size: 0.9rem;">Perumdam IJEN TIRTA</p>
                         </div>
                     </div>

                     <!-- Judul Utama -->
                     <h3 data-aos="fade-up" data-aos-delay="150" class="mb-3" style="color: #ffc107; text-shadow: 1px 1px 3px rgba(0,0,0,0.5);">
                         <span style="background: rgba(0,0,0,0.3); padding: 5px 15px; border-radius: 5px;">
                             <small style="font-size: 0.6em;">Perusahaan Umum Daerah Air Minum</small> <br>
                             <strong>IJEN TIRTA BONDOWOSO</strong>
                         </span>
                     </h3>

                     <!-- Motto -->
                     <div data-aos="fade-up" data-aos-delay="250" class="mb-4">
                         <span class="motto-badge" style="background: rgba(255,193,7,0.2); padding: 8px 20px; border-radius: 20px; border: 1px solid rgba(255,193,7,0.5); color: #fff; font-style: italic; display: inline-block;">
                             <i class="bi bi-quote"></i> Mengalirkan Harapan, Membangun Keberlanjutan <i class="bi bi-quote"></i>
                         </span>
                     </div>

                     <p data-aos="fade-up" data-aos-delay="200" style="font-size: 1.05rem;">
                         Badan Usaha Milik Daerah yang bergerak di bidang penyediaan
                         air bersih untuk wilayah Kabupaten Bondowoso
                         <br>dan penyediaan air minum dalam kemasan bernama <strong style="color: #ffc107;">Ijen Water</strong>
                     </p>

                     <a data-aos="fade-up" data-aos-delay="300" href="#sejarah" class="btn-sejarah">
                         <i class="bi bi-info-circle"></i> Lihat Selengkapnya
                     </a>
                 </div>
             </div>
         </div>
     </div>

     <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

         <?php if (!empty($carousel)) : ?>
             <?php foreach ($carousel as $index => $row) : ?>
                 <?php if (!empty($row->link)) : ?>
                     <a href="<?= base_url($row->link) ?>" style="text-decoration: none;">
                         <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>" style="background-image: url(<?= base_url('assets/img/hero-carousel/' . $row->gambar) ?>)">
                             <div class="carousel-caption d-none d-md-block" style="background: rgba(0,0,0,0.4); padding: 10px 20px; border-radius: 10px; cursor: pointer;">
                                 <p style="margin: 0; color: #fff;"><i class="bi bi-link-45deg"></i> Klik untuk lihat selengkapnya</p>
                             </div>
                         </div>
                     </a>
                 <?php else : ?>
                     <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>" style="background-image: url(<?= base_url('assets/img/hero-carousel/' . $row->gambar) ?>)">
                     </div>
                 <?php endif; ?>
             <?php endforeach; ?>
         <?php else : ?>
             <!-- Fallback jika tidak ada data -->
             <div class="carousel-item active" style="background-image: url(assets/img/hero-carousel/hero1.jpg)"></div>
         <?php endif; ?>

         <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
             <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
         </a>

         <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
             <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
         </a>

     </div>

 </section><!-- End Hero Section -->

 <main id="main">

     <!-- ======= Sejarah Section ======= -->
     <section id="sejarah" class="sejarah section-bg">
         <div class="container">

             <div class="row justify-content-center" data-aos="fade-up">
                 <div class="col-lg-8 text-center mb-4">
                     <img src="assets/img/hero5.png" alt="Sejarah" class="img-fluid" style="width: 100%; height: 350px; border-radius: 10px; object-fit: cover;">
                 </div>
             </div>

             <div class="row justify-content-center">
                 <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
                     <h3 class="text-center mb-4" style="position: relative;">
                         <span style="background: #f5f6f7; padding: 0 20px; position: relative; z-index: 1;">Sejarah Singkat Perumdam Ijen Tirta Bondowoso</span>
                         <span style="position: absolute; top: 50%; left: 0; right: 0; height: 2px; background: #feb900; z-index: 0;"></span>
                     </h3>

                     <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="150" style="margin-top: 15px;">
                         <i class="bi bi-patch-check flex-shrink-0" style="display: flex; align-items: center; justify-content: center; color: #feb900; margin-right: 25px; font-size: 28px; flex-shrink: 0;"></i>
                         <div style="padding-top: 5px;">
                             <p style="font-size: 15px; font-weight: 400; margin-bottom: 0; line-height: 28px;">Perusahaan Umum Daerah Air Minum (Perumdam) Bondowoso adalah Badan Usaha Milik Pemerintah Kabupaten
                                 Bondowoso yang telah lama berdiri mulai tahun
                                 1989 dan sejak tahun 1993 sah terlegitimasi secara hukum menjadi Badan
                                 Usaha Milik Daerah (BUMD).</p>
                         </div>
                     </div>

                     <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200" style="margin-top: 15px;">
                         <i class="bi bi-patch-check flex-shrink-0" style="display: flex; align-items: center; justify-content: center; color: #feb900; margin-right: 25px; font-size: 28px; flex-shrink: 0;"></i>
                         <div style="padding-top: 5px;">
                             <p style="font-size: 15px; font-weight: 400; margin-bottom: 0; line-height: 28px;">Perusahaan Daerah Air Minum (PDAM) Kabupaten Bondowoso didirikan berdasarkan Peraturan Daerah Nomor 2
                                 Tahun 1993 tanggal 23 April 1993 yang
                                 telah disempurnakan dengan Peraturan Daerah Nomor 6 Tahun 2011 tanggal 1 Agustus 2011.</p>
                         </div>
                     </div>

                     <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="250" style="margin-top: 15px;">
                         <i class="bi bi-patch-check flex-shrink-0" style="display: flex; align-items: center; justify-content: center; color: #feb900; margin-right: 25px; font-size: 28px; flex-shrink: 0;"></i>
                         <div style="padding-top: 5px;">
                             <p style="font-size: 15px; font-weight: 400; margin-bottom: 0; line-height: 28px;">Pengalihan status BPAM menjadi PDAM berdasarkan Berita Acara Nomor :
                                 6090/2769/023/1992 dan 690/3567/438.23/1992 tanggal 28 Desember 1992.</p>
                         </div>
                     </div>

                     <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300" style="margin-top: 15px;">
                         <i class="bi bi-patch-check flex-shrink-0" style="display: flex; align-items: center; justify-content: center; color: #feb900; margin-right: 25px; font-size: 28px; flex-shrink: 0;"></i>
                         <div style="padding-top: 5px;">
                             <p style="font-size: 15px; font-weight: 400; margin-bottom: 0; line-height: 28px;">Selanjutnya Perusahaan Daerah Air Minum (PDAM) Kabupaten Bondowoso berubah menjadi Perusahaan Umum Daerah Air Minum (Perumdam) Ijen Tirta Bondowoso berdasarkan Peraturan Daerah Kabupaten Bondowoso Nomor 3 Tahun 2026.</p>
                         </div>
                     </div>

                     <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="350" style="margin-top: 15px;">
                         <i class="bi bi-patch-check flex-shrink-0" style="display: flex; align-items: center; justify-content: center; color: #feb900; margin-right: 25px; font-size: 28px; flex-shrink: 0;"></i>
                         <div style="padding-top: 5px;">
                             <p style="font-size: 15px; font-weight: 400; margin-bottom: 0; line-height: 28px;">Perusahaan Umum Daerah Air Minum (Perumdam) Bondowoso yang merupakan satu-satunya BUMD di Kabupaten
                                 Bondowoso memiliki fungsi yang strategis dalam pengelolaan potensi sumber daya alam
                                 daerah yakni air.</p>
                         </div>
                     </div>

                 </div>
             </div>

         </div>
     </section><!-- End sejarah Section -->

     <!-- ======= Visi Misi Section ======= -->
     <section id="visimisi" class="visiMisi">
         <div class="container" data-aos="fade-up">

             <div class="row mb-4">
                 <div class="col-lg-12 text-center">
                     <h3 style="position: relative;">
                         <span style="background: #fff; padding: 0 20px; position: relative; z-index: 1;">Motto, Visi dan Misi</span>
                         <span style="position: absolute; top: 50%; left: 0; right: 0; height: 2px; background: #feb900; z-index: 0;"></span>
                     </h3>
                 </div>
             </div>

             <div class="row justify-content-around gy-4">
                 <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
                     <img src="assets/img/kantor.png" alt="Visi Misi" class="img-fluid mb-3" style="width: 100%; height: 300px; border-radius: 10px; object-fit: cover;">

                     <div class="alert alert-success mt-3" role="alert" style="border-left: 4px solid #198754; background-color: #d1e7dd;">
                         <h5 class="alert-heading"><i class="bi bi-quote"></i> Motto</h5>
                         <p class="mb-0 fw-bold fst-italic">"Mengalirkan Harapan, Membangun Keberlanjutan"</p>
                     </div>
                     <div class="alert alert-primary" role="alert" style="border-left: 4px solid #0d6efd; background-color: #e7f1ff;">
                         <h5 class="alert-heading"><i class="bi bi-eye-fill"></i> Visi</h5>
                         <p class="mb-0">Menjadi penyedia layanan air bersih yang unggul dan berkelanjutan untuk masyarakat Bondowoso.</p>
                     </div>
                 </div>

                 <div class="col-lg-5 d-flex flex-column justify-content-center">
                     <h5><i class="bi bi-bullseye"></i> Misi</h5>

                     <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="100">
                         <i class="bi bi-patch-check flex-shrink-0"></i>
                         <div>
                             <h4>Mengelola sumber daya air secara bijaksana dan berkelanjutan.</h4>
                         </div>
                     </div>

                     <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="200">
                         <i class="bi bi-patch-check flex-shrink-0"></i>
                         <div>
                             <h4>Memberdayakan masyarakat dalam akses dan pemanfaatan air bersih.</h4>
                         </div>
                     </div>

                     <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="300">
                         <i class="bi bi-patch-check flex-shrink-0"></i>
                         <div>
                             <h4>Membangun kemitraan pembangunan yang terpercaya.</h4>
                         </div>
                     </div>

                     <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="400">
                         <i class="bi bi-patch-check flex-shrink-0"></i>
                         <div>
                             <h4>Melakukan inovasi dan peningkatan layanan.</h4>
                         </div>
                     </div>

                     <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="500">
                         <i class="bi bi-patch-check flex-shrink-0"></i>
                         <div>
                             <h4>Mendorong pendidikan dan kesadaran lingkungan.</h4>
                         </div>
                     </div>

                     <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="600">
                         <i class="bi bi-patch-check flex-shrink-0"></i>
                         <div>
                             <h4>Meningkatkan ketersediaan infrastruktur air yang andal, mandiri, dan berkelanjutan.</h4>
                         </div>
                     </div>

                 </div>
             </div>

         </div>
     </section><!-- End Visi Misi Section -->

     <!-- ======= Makna Logo Section ======= -->
     <section id="maknalogo" class="maknaLogo section-bg">
         <div class="container" data-aos="fade-up">

             <div class="row mb-4">
                 <div class="col-lg-12 text-center">
                     <h3 style="position: relative;">
                         <span style="background: #f5f6f7; padding: 0 20px; position: relative; z-index: 1;">Makna Logo Perumdam Ijen Tirta Bondowoso</span>
                         <span style="position: absolute; top: 50%; left: 0; right: 0; height: 2px; background: #feb900; z-index: 0;"></span>
                     </h3>
                 </div>
             </div>

             <div class="row align-items-center">
                 <!-- Logo -->
                 <div class="col-lg-4 text-center" data-aos="zoom-in" data-aos-delay="100">
                     <div class="d-flex justify-content-center">
                         <img src="assets/img/tirta2.png" alt="Logo Perumdam" style="width: 400px; height: auto;">
                     </div>
                 </div>

                 <!-- Penjelasan -->
                 <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                     <div class="alert border-0 shadow-sm mb-4" style="background: linear-gradient(135deg, #e8f4fd, #f0f9ff); border-radius: 10px; padding: 20px 25px;">
                         <div class="d-flex align-items-center">
                             <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #0d6efd, #0a58ca); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                 <i class="bi bi-info-circle-fill" style="font-size: 24px; color: #fff;"></i>
                             </div>
                             <div class="ms-3">
                                 <h6 class="fw-bold mb-1" style="color: #0d6efd;">Tentang Logo Perumdam Ijen Tirta</h6>
                                 <p class="mb-0 text-muted" style="font-size: 0.9rem; line-height: 1.7;">Tirta mencerminkan dengan kuat visi dan misi perusahaan sebagai penyedia air bersih yang andal dan berkualitas bagi masyarakat. Logo ini menggabungkan elemen-elemen yang mewakili sumber daya alam dan nilai-nilai inti perusahaan, memberikan identitas visual yang menginspirasi dan relevan.</p>
                             </div>
                         </div>
                     </div>

                     <h5 class="fw-bold mb-4">Arti Logo Perumdam Ijen Tirta Bondowoso</h5>

                     <!-- Elemen Biru -->
                     <div class="card mb-3 border-0 shadow-sm" data-aos="fade-up" data-aos-delay="300" style="border-left: 4px solid #0d6efd !important; border-radius: 8px;">
                         <div class="card-body">
                             <div class="d-flex align-items-start">
                                 <div style="width: 45px; height: 45px; background: linear-gradient(135deg, #0d6efd, #0a58ca); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                     <i class="bi bi-droplet-fill" style="font-size: 20px; color: #fff;"></i>
                                 </div>
                                 <div class="ms-3">
                                     <h6 class="fw-bold mb-2" style="color: #0d6efd;">Elemen Biru: Aliran Air</h6>
                                     <p class="mb-0 text-muted" style="font-size: 0.9rem; line-height: 1.7;">Logo berbentuk aliran air berwarna biru melambangkan fokus utama Perumdam Ijen Tirta Bondowoso sebagai penyedia air minum yang bersih dan sehat. Warna biru dipilih karena sering dikaitkan dengan ketenangan, keamanan, dan ketertiban. Warna ini mencerminkan bagaimana perusahaan menjaga kualitas air, memberikan rasa aman dan damai bagi masyarakat dalam penggunaan air bersih sehari-hari.</p>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Elemen Emas -->
                     <div class="card mb-3 border-0 shadow-sm" data-aos="fade-up" data-aos-delay="400" style="border-left: 4px solid #ffc107 !important; border-radius: 8px;">
                         <div class="card-body">
                             <div class="d-flex align-items-start">
                                 <div style="width: 45px; height: 45px; background: linear-gradient(135deg, #ffc107, #e0a800); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                     <i class="bi bi-flag-fill" style="font-size: 20px; color: #fff;"></i>
                                 </div>
                                 <div class="ms-3">
                                     <h6 class="fw-bold mb-2" style="color: #e0a800;">Elemen Emas: Bendera Emas</h6>
                                     <p class="mb-0 text-muted" style="font-size: 0.9rem; line-height: 1.7;">Warna emas dalam logo melambangkan prestasi, kesuksesan, kemewahan, dan kemakmuran. Ini menggambarkan tekad Perumdam Ijen Tirta Bondowoso untuk meningkatkan profesionalisme dan kesejahteraan pegawai, serta komitmen dalam meningkatkan kualitas, kuantitas, dan kontinuitas pelayanan demi kepuasan pelanggan.</p>
                                 </div>
                             </div>
                         </div>
                     </div>

                     <!-- Elemen Hijau -->
                     <div class="card mb-3 border-0 shadow-sm" data-aos="fade-up" data-aos-delay="500" style="border-left: 4px solid #198754 !important; border-radius: 8px;">
                         <div class="card-body">
                             <div class="d-flex align-items-start">
                                 <div style="width: 45px; height: 45px; background: linear-gradient(135deg, #198754, #157347); border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                     <i class="bi bi-mountain-fill" style="font-size: 20px; color: #fff;"></i>
                                 </div>
                                 <div class="ms-3">
                                     <h6 class="fw-bold mb-2" style="color: #198754;">Elemen Hijau: Gunung</h6>
                                     <p class="mb-0 text-muted" style="font-size: 0.9rem; line-height: 1.7;">Logo gunung berwarna hijau menggambarkan Gunung Kawah Ijen, salah satu ikon wisata Geopark di Bondowoso, serta komitmen perusahaan terhadap kelestarian alam. Hijau adalah warna yang melambangkan kehidupan, ketenangan, dan keseimbangan.</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </section><!-- End Makna Logo Section -->

     <!-- ======= Dasar Hukum Section ======= -->
     <section id="dakum" class="features section-bg">
         <div class="container" data-aos="fade-up">

             <div class="section-header">
                 <h2>Dasar Hukum</h2>
                 <!-- <p>Perusahaan Daerah Air Minum Kabupaten Bondowoso</p> -->
             </div>

             <ul class="nav nav-tabs row  g-2 d-flex">

                 <li class="nav-item col-4">
                     <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                         <h4>Dasar Hukum Pendirian</h4>
                     </a>
                 </li><!-- End tab nav item -->

                 <li class="nav-item col-4">
                     <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                         <h4>Dasar Hukum Pengelolaan</h4>
                     </a><!-- End tab nav item -->

                 <li class="nav-item col-4">
                     <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                         <h4>Dasar Hukum Pelayanan</h4>
                     </a>
                 </li><!-- End tab nav item -->

             </ul>

             <div class="tab-content">

                 <div class="tab-pane active show" id="tab-1">
                     <div class="row">
                         <div class="col-lg-8 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
                             <ul>
                                 <li><i class="bi bi-check2-all"></i> Perusahaan Daerah Air Minum (PDAM) Kabupaten Bondowoso didirikan
                                     berdasarkan Peraturan Daerah Nomor 2
                                     Tahun 1993 tanggal 23 April 1993 yang telah disempurnakan dengan Peraturan Daerah Nomor 6 Tahun 2011
                                     tanggal 1 Agustus 2011. (Tidak Berlaku)</li>
                                 <li><i class="bi bi-check2-all"></i> Dimana pembentukannya merupakan pengalihan status dari Badan
                                     Pengelola Air Minum (BPAM) sesuai Surat
                                     Keputusan
                                     Menteri Pekerjaan Umum Nomor 21/KPTS/1088 tanggal 11 Januari 1989 dan beroperasi secara komersial
                                     tanggal 1 April 1989. Pengalihan status BPAM menjadi PDAM berdasarkan Berita Acara Nomor :
                                     6090/2769/023/1992 dan 690/3567/438.23/1992 tanggal 28 Desember 1992. (Tidak Berlaku)</li>
                                 <li><i class="bi bi-check2-all"></i> Selanjutnya PDAM Kabupaten Bondowoso berubah menjadi Perusahaan Umum Daerah Air Minum (Perumdam) IJEN TIRTA Bondowoso berdasarkan Peraturan Daerah Kabupaten Bondowoso Nomor 3 Tahun 2026 tentang Perusahaan Umum Daerah Air Minum Ijen Tirta Bondowoso.</li>
                             </ul>
                         </div>
                         <div class="col-lg-4 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                             <img src="assets/img/hero-carousel/hero14.jpg" alt="" class="img-fluid">
                         </div>
                     </div>
                 </div><!-- End tab content item -->

                 <div class="tab-pane" id="tab-2">
                     <div class="row">
                         <div class="col-lg-8 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                             <ul>
                                 <li><i class="bi bi-check2-all"></i> Peraturan Pemerintah Republik Indonesia No. 54 tahun 2017 tentang
                                     Badan Usaha Milik Daerah.</li>
                                 <li><i class="bi bi-check2-all"></i> Peraturan Menteri Dalam Negeri Nomor 23 Tahun 2024 tentang Organ
                                     dan Kepegawaian Badan Usaha Milik daerah Air Minum.</li>
                                 <li><i class="bi bi-check2-all"></i> Peraturan Daerah Kabupaten Bondowoso Nomor 3 Tahun 2026 tentang Perusahaan Umum Daerah Air Minum Ijen Tirta Bondowoso.</li>
                                 </li>
                                 <li><i class="bi bi-check2-all"></i> Peraturan Bupati Bondowoso Nomor : 29 Tahun 2026
                                     tentang Peraturan Pelaksanaan Peraturan Daerah Nomor 3 Tahun 2026 .
                                 </li>
                             </ul>
                         </div>
                         <div class="col-lg-4 order-1 order-lg-2 text-center">
                             <img src="assets/img/hero-carousel/hero15.jpg" alt="" class="img-fluid">
                         </div>
                     </div>
                 </div><!-- End tab content item -->

                 <div class="tab-pane" id="tab-3">
                     <div class="row">
                         <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                             <ul>
                                 <li><i class="bi bi-check2-all"></i> Peraturan Menteri Negara Pendayagunaan Aparatur Negara Nomor
                                     PER/20/M.PAN/04/2006 Tentang Pedoman Penyusunan Standar Pelayanan Publik</li>
                                 <li><i class="bi bi-check2-all"></i> Keputusan Menteri Pendayagunaan Aparatur Negara Nomor
                                     63/KEP/M.PAN.7/2003 tentang Pedoman Umum Penyelenggaraan Pelayanan Publik.</li>
                                 <li><i class="bi bi-check2-all"></i> Keputusan Menteri Pendayagunaan Aparatur Negara Nomor :
                                     KEP/25/M.PAN/2/2004 tentang Pedoman Umum Penyusunan Indeks Kepuasan Masyarakat Unit Pelayanan
                                     Instansi Pemerintah</li>
                                 <li><i class="bi bi-check2-all"></i> Peraturan Gubernur Jawa Timur Nomor 14 Tahun 2006 Tentang
                                     Petunjuk Pelaksanaan Perda Propinsi Jawa Timur Nomor 11 Tahun 2005 Tentang Pelayanan Publik Propinsi
                                     jawa Timur</li>
                                 <li><i class="bi bi-check2-all"></i> Peraturan Daerah Propinsi Jawa Timur Nomor 11 Tahun 2005 Tentang
                                     Pelayanan Publik Di Propinsi Jawa Timur</li>

                             </ul>
                         </div>
                         <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                             <ul>

                                 <li><i class="bi bi-check2-all"></i> Peraturan Daerah Kabupaten Bondowoso Nomor 3 Tahun 2026 tentang Perusahaan Umum Daerah Air Minum Ijen Tirta Bondowoso.</li>
                                 <li><i class="bi bi-check2-all"></i> Surat Keputusan Bupati Kepala Daerah Tingkat II Bondowoso
                                     Nomor : 1631 tahun 1993 tentang Struktur Organisasi dan Tata Kerja
                                     Perusahaan Daerah Air Minum Kabupaten Dati II Bondowoso
                                 </li>
                                 <li><i class="bi bi-check2-all"></i> Surat Keputusan Bupati Kepala Daerah Tingkat II Bondowoso
                                     Nomor : 314 tahun 1995 tanggal 2 Mei 1995 tentang Ketentuan-
                                     ketentuan Pokok Kepegawaian Perusahaan Daerah Air Minum
                                     Kabupaten Daerah Tingkat II Bondowoso
                                 </li>
                                 <li><i class="bi bi-check2-all"></i> Surat Keputusan Direktur Utama Perusahaan Daerah Air Minum
                                     Kabupaten Daerah Tingkat II Bondowoso Nomor :
                                     22.2/KPTS/IV/1996 tentang Struktur Organisasi, Uraian Tugas dan Tata Kerja Perusahaan Daerah Air
                                     Minum Kabupaten Bondowoso
                                 </li>
                             </ul>
                         </div>
                         <!-- <div class="col-lg-4 order-1 order-lg-2 text-center">
            <img src="assets/img/hero-carousel/hero6.jpg" alt="" class="img-fluid">
          </div> -->
                     </div>
                 </div><!-- End tab content item -->

             </div>

         </div>
     </section><!-- End Dasar Hukum Section -->

     <!-- ======= Struktur Section ======= -->
     <section id="struktur" class="struktur">
         <div class="container" data-aos="fade-up">

             <div class="section-header">
                 <h2>Struktur Organisasi</h2>
                 <p>Perusahaan Umum Daerah Air Minum IJEN TIRTA Bondowoso </p>
             </div>

             <div class="row gy-4">

                 <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                     <div class="card-item">
                         <div class="row">
                             <div class="col-xl-12">
                                 <div class="card-bg" style="background-image: url(assets/img/struktur.png);"></div>
                             </div>
                         </div>
                     </div>
                 </div><!-- End Card Item -->

             </div>
         </div>
     </section><!-- End Struktur Section -->

     <!-- ======= Tupoksi Section ======= -->
     <!--
     <section id="tupoksi" class="tupoksi section-bg">
         <div class="container">

             <div class="row justify-content-between gy-4">

                 <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
                     <div class="content">
                         <h3>Tugas Pokok dan Fungsi</h3>
                         <p>Tugas Pokok Perusahaan Daerah Air Minum (PDAM) Kabupaten Bondowoso adalah untuk
                             mengusahakan penyediaan air minum yang sehat dan memenuhi syarat-syarat kesehatan bagi masyarakat.</p>
                         <h4>Fungsi Perumdam Ijen Tirta Bondowoso</h4>
                         <ul>
                             <li><i class="bi bi-check2-all"></i> Turut serta melaksanakan pembangunan daerah pada khususnya yang
                                 merupakan salah satu sumber pendapatan daerah, oleh karena itu Perusahaan Daerah Air Minum harus
                                 memupuk pendapatan yang ada dan yang akan datang.</li>
                             <li><i class="bi bi-check2-all"></i> Pemenuhan kebutuhan masyarakat dalam penyediaan air bersih serta
                                 penyehatan lingkungan, oleh karenanya Perusahaan Daerah Air Minum harus memberikan pelayanan air yang
                                 memenuhi syarat-syarat kesehatan kepada masyarakat yang lestari dan berkesinambungan.</li>
                             <li><i class="bi bi-check2-all"></i> Turut serta melaksanakan pembangunan perekonomian pada umumnya
                                 dalam rangka meningkatkan kesejahteraan dan memenuhi kebutuhan masyarakat serta ketenagakerjaan menuju
                                 masyarakat adil dan makmur berdasarkan Pancasila dan Undang-Undang Dasar 1945.</li>
                         </ul>

                     </div>
                 </div>
                 <div class="col-lg-5 img-bg" style="background-image: url(assets/img/hero-carousel/hero3.jpg); background-repeat: no-repeat;" data-aos="zoom-in" data-aos-delay="100"></div>
             </div>

         </div>
     </section>
     -->
     <!-- End Tupoksi Section -->

     <!-- ======= Budaya Kerja Section ======= -->
     <section id="budayakerja" class="budayaKerja">
         <div class="container" data-aos="fade-up">

             <div class="section-header">
                 <h2>Budaya Kerja <span style="color: var(--color-primary);">PRIMA</span></h2>
                 <p>Nilai-nilai yang menjadi landasan seluruh pegawai Perumdam Ijen Tirta Bondowoso</p>
             </div>

             <div class="row gy-4">

                 <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                     <div class="card h-100 border-0 shadow-sm text-center p-4" style="border-radius: 12px; transition: transform 0.3s;">
                         <div class="card-body">
                             <div class="mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #0d6efd, #0a58ca); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                 <i class="bi bi-award" style="font-size: 32px; color: #fff;"></i>
                             </div>
                             <h4 class="card-title fw-bold" style="color: #0d6efd;">P</h4>
                             <h5>Profesional</h5>
                             <p class="card-text text-muted">Setiap pegawai dituntut memiliki pengetahuan dan keterampilan yang mumpuni di bidang penyediaan air minum, serta bekerja secara disiplin, bertanggung jawab, dan berkomitmen tinggi memberikan layanan terbaik bagi pelanggan.</p>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                     <div class="card h-100 border-0 shadow-sm text-center p-4" style="border-radius: 12px; transition: transform 0.3s;">
                         <div class="card-body">
                             <div class="mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #198754, #157347); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                 <i class="bi bi-lightning" style="font-size: 32px; color: #fff;"></i>
                             </div>
                             <h4 class="card-title fw-bold" style="color: #198754;">R</h4>
                             <h5>Responsif</h5>
                             <p class="card-text text-muted">Berkomitmen untuk selalu tanggap dan cepat merespons kebutuhan serta keluhan pelanggan, serta proaktif memberikan informasi terkait layanan.</p>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                     <div class="card h-100 border-0 shadow-sm text-center p-4" style="border-radius: 12px; transition: transform 0.3s;">
                         <div class="card-body">
                             <div class="mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #ffc107, #e0a800); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                 <i class="bi bi-shield-check" style="font-size: 32px; color: #fff;"></i>
                             </div>
                             <h4 class="card-title fw-bold" style="color: #e0a800;">I</h4>
                             <h5>Integritas</h5>
                             <p class="card-text text-muted">Kejujuran, moral yang kuat, dan bertindak sesuai etika menjadi landasan setiap pegawai dalam melaksanakan tugas dan melayani pelanggan.</p>
                         </div>
                     </div>
                 </div>

             </div>

             <div class="row gy-4 justify-content-center mt-2">

                 <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                     <div class="card h-100 border-0 shadow-sm text-center p-4" style="border-radius: 12px; transition: transform 0.3s;">
                         <div class="card-body">
                             <div class="mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #0dcaf0, #0aa2c0); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                 <i class="bi bi-person-check" style="font-size: 32px; color: #fff;"></i>
                             </div>
                             <h4 class="card-title fw-bold" style="color: #0aa2c0;">M</h4>
                             <h5>Mandiri</h5>
                             <p class="card-text text-muted">Setiap pegawai didorong memiliki inisiatif, mampu menyelesaikan tugas secara mandiri, dan berani mengambil keputusan dengan penuh tanggung jawab.</p>
                         </div>
                     </div>
                 </div>

                 <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                     <div class="card h-100 border-0 shadow-sm text-center p-4" style="border-radius: 12px; transition: transform 0.3s;">
                         <div class="card-body">
                             <div class="mb-3" style="width: 70px; height: 70px; background: linear-gradient(135deg, #6f42c1, #5a32a3); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                                 <i class="bi bi-heart" style="font-size: 32px; color: #fff;"></i>
                             </div>
                             <h4 class="card-title fw-bold" style="color: #6f42c1;">A</h4>
                             <h5>Akhlak</h5>
                             <p class="card-text text-muted">Mengutamakan perilaku yang baik, sopan santun, dan saling menghargai dalam interaksi antar pegawai maupun dengan pelanggan.</p>
                         </div>
                     </div>
                 </div>

             </div>

         </div>
     </section><!-- End Budaya Kerja Section -->

     <!-- ======= Penghargaan Section ======= -->
     <section id="penghargaan" class="testimonials section-bg">
         <div class="container" data-aos="fade-up">

             <div class="section-header">
                 <h2>Penghargaan</h2>
                 <p>Beberapa penghargaan yang pernah diraih oleh Perumdam Ijen Tirta Bondowoso</p>
             </div>

             <div class="slides-2 swiper">
                 <div class="swiper-wrapper">

                     <div class="swiper-slide">
                         <div class="testimonial-wrap">
                             <div class="testimonial-item">
                                 <img src="assets/img/award16.jpg" class="testimonial-img" alt="">
                                 <h3>BUMD Award 2016</h3>
                                 <ul>
                                     <li>
                                         Penghargaan kategori Top Pembina BUMD.
                                     </li>
                                     <li>
                                         Penghargaan kategori keseimbangan Misi Bisnis dan Sosial.
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div><!-- End testimonial item -->
                     <div class="swiper-slide">
                         <div class="testimonial-wrap">
                             <div class="testimonial-item">
                                 <img src="assets/img/award19.jpg" class="testimonial-img" alt="">
                                 <h3>BUMD Award 2019</h3>
                                 <ul>
                                     <li>
                                         Penghargaan kategori Top Pembina BUMD.
                                     </li>
                                     <li>
                                         Penghargaan kategori Top PDAM pelanggan di bawah 30 ribu.
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div><!-- End testimonial item -->

                     <div class="swiper-slide">
                         <div class="testimonial-wrap">
                             <div class="testimonial-item">
                                 <img src="assets/img/award20.jpg" class="testimonial-img" alt="">
                                 <h3>BUMD Award 2020</h3>
                                 <ul>
                                     <li>
                                         Penghargaan kategori Top Pembina BUMD.
                                     </li>
                                     <li>
                                         Penghargaan kategori Top CEO BUMD Bintang 4.
                                     </li>
                                     <li>
                                         Penghargaan kategori Sektor PDAM-Bintang 4.
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div><!-- End testimonial item -->

                     <div class="swiper-slide">
                         <div class="testimonial-wrap">
                             <div class="testimonial-item">
                                 <img src="assets/img/award21.jpg" class="testimonial-img" alt="">
                                 <h3>Perhitungan Indikator Kinerja & Kesehatan</h3>
                                 <ul>
                                     <li>
                                         Prestasi Perhitungan Indikator Kinerja Baik berdasarkan KepMendagri No 47 Tahun 1999
                                     </li>
                                     <li>
                                         Prestasi Penilaian Kesehatan dengan hasil nilai baik 4.030 berdasarkan indikator BPPSPAM Tahun
                                         buku 2019
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div><!-- End testimonial item -->

                     <div class="swiper-slide">
                         <div class="testimonial-wrap">
                             <div class="testimonial-item">
                                 <img src="assets/img/bumd_award.png" class="testimonial-img" alt="">
                                 <h3>BUMD Award 2024</h3>
                                 <ul>
                                     <li>
                                         Penghargaan kategori Top Pembina BUMD.
                                     </li>
                                     <li>
                                         Penghargaan kategori Top CEO BUMD
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     </div><!-- End testimonial item -->

                 </div>
                 <div class="swiper-pagination"></div>
             </div>
         </div>

     </section><!-- End Penghargaan Section -->
     <!-- Modal Carousel -->
     <div class="modal fade" id="modalCarousel" tabindex="-1" role="dialog" aria-labelledby="modalCarouselLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg">
             <div class="modal-content" style="background-color: transparent; border:none;">
                 <div>
                     <button type="button" class="btn-close float-end px-3 pt-3 mt-5" data-bs-dismiss="modal" aria-label="Close" style="background-color: antiquewhite;"></button>
                 </div>
                 <div class="modal-body">
                     <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                         <div class="carousel-inner">
                             <?php if (!empty($modal_carousel)) : ?>
                                 <?php foreach ($modal_carousel as $index => $row) : ?>
                                     <?php if (!empty($row->link)) : ?>
                                         <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                                             <a href="<?= base_url($row->link) ?>" style="display: block; position: relative;">
                                                 <img src="<?= base_url('assets/img/hero-carousel/' . $row->gambar) ?>" class="d-block w-100" alt="<?= $row->judul ?>">
                                                 <div class="carousel-caption" style="bottom: 0;">
                                                     <p class="fw-bold" style="color: #feb900; text-shadow: 1px 1px 3px rgba(0,0,0,0.5);"><?= $row->keterangan ?></p>
                                                 </div>
                                             </a>
                                         </div>
                                     <?php else : ?>
                                         <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
                                             <img src="<?= base_url('assets/img/hero-carousel/' . $row->gambar) ?>" class="d-block w-100" alt="<?= $row->judul ?>">
                                         </div>
                                     <?php endif; ?>
                                 <?php endforeach; ?>
                             <?php else : ?>
                                 <!-- Fallback jika tidak ada data -->
                                 <div class="carousel-item active">
                                     <img src="<?= base_url('assets/img/pdampopup.png') ?>" class="d-block w-100" alt="Info">
                                 </div>
                             <?php endif; ?>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </main><!-- End #main -->