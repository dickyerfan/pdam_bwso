 <!-- ======= Hero Section ======= -->
 <section id="hero" class="hero">

     <div class="info d-flex align-items-center">
         <div class="container">
             <div class="row justify-content-center">
                 <div class="col-lg-8 text-center">
                     <h2 data-aos="fade-down">Ijen Water <br> <span>Air Minum Dalam Kemasan </span>
                     </h2>
                     <p data-aos="fade-up">IJEN WATER di kenal memiliki kualitas air yang sangat baik dan kaya akan mineral yang diperlukan oleh tubuh. Air yang di ambil dari sumber mata air terbaik itu kemudian di proses dengan teknologi yang canggih dan steril untuk memastikan kebersihan dan kesegaran air sebelum di jual kepada masyarakat.</p>
                     <a data-aos="fade-up" data-aos-delay="200" href="#sejarah" class="btn-sejarah lengkap">Lihat
                         Selengkapnya</a>
                     <?php
                        // Format untuk tampilan: 628xxx jadi 08xxx
                        $no_display = $no_wa_ijen;
                        if (substr($no_wa_ijen, 0, 2) === '62') {
                            $no_display = '0' . substr($no_wa_ijen, 2);
                        }
                        ?>
                     <a data-aos="fade-up" data-aos-delay="200" href="https://wa.me/<?= $no_wa_ijen ?>" target="_blank" style="text-decoration:none;" class="btn-sejarah">Silakan Order</a>
                 </div>
             </div>
         </div>
     </div>

     <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

         <div class="carousel-item active" style="background-image: url(assets/img/ijenwater.png)">
         </div>
         <!-- <div class="carousel-item" style="background-image: url(assets/img/ijenWater/carousel2.jpg)"></div>
         <div class="carousel-item" style="background-image: url(assets/img/ijenWater/carousel3.jpg)"></div>
         <div class="carousel-item" style="background-image: url(assets/img/ijenWater/carousel4.jpg)"></div>
         <div class="carousel-item" style="background-image: url(assets/img/ijenWater/carousel5.jpg)"></div>
         <div class="carousel-item" style="background-image: url(assets/img/ijenWater/carousel6.jpg)"></div>

         <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
             <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
         </a>

         <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
             <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
         </a> -->

     </div>

 </section><!-- End Hero Section -->

 <main id="main">

     <!-- ======= Sejarah Section ======= -->
     <section id="sejarah" class="sejarah section-bg">
         <div class="container">

             <div class="row justify-content-between gy-4">

                 <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
                     <div class="content">
                         <h3>Apa itu AMDK?</h3>
                         <p>Air minum dalam kemasan (AMDK) adalah air yang telah dikemas dalam wadah tertutup, seperti botol atau kaleng, untuk memastikan kebersihan dan kesegaran. Proses pengemasan meliputi pengujian kualitas air, pembersihan dan sterilisasi wadah, dan penyegelan yang tepat.</p>
                         <p>AMDK harus memenuhi standar kualitas air yang ditentukan oleh pemerintah dan harus diuji secara berkala untuk memastikan bahwa air yang dikemas masih layak untuk dikonsumsi. AMDK sangat populer karena mudah didapat dan dibawa ke mana saja, serta dapat digunakan dalam situasi darurat.</p>
                         <p>Keuntungan lainnya dari AMDK adalah meminimalkan risiko kontaminasi air dan memudahkan untuk dikonsumsi dalam jumlah besar. Namun, juga harus diingat bahwa produksi dan pembuangan dari wadah AMDK dapat merusak lingkungan, sehingga penting untuk membuang wadah dengan benar dan meminimalkan produksi sampah.</p>
                         <p>Ijen Water Bondowoso adalah merk air mineral yang di produksi dan di distribusikan oleh Pdam kabupaten Bondowoso,Jawa Timur, Indonesia. Air ini diperoleh dari mata air alami yang berasal dari daerah pegunungan BONDOWOSO yang di kenal memiliki kualitas air yang sangat baik dan kaya akan mineral yang diperlukan oleh tubuh. Air mineral Ijen water memiliki kandungan mineral yang baik seperti Natrium, Kalium, Calcium, Magnesium dan lainnya yang diperlukan oleh tubuh. Selain itu, air ini juga di proses dengan teknologi yang canggih dan steril untuk memastikan kebersihan dan kesegaran air. Air mineral Ijen water di jual dalam berbagai ukuran wadah mulai dari botol kecil hingga galon-galon besar.</p>
                     </div>
                 </div>
                 <div class="col-lg-5 img-bg" style="background-image: url(assets/img/ijenWater/sejarah.jpg); background-repeat: no-repeat;" data-aos="zoom-in" data-aos-delay="100"></div>

             </div>

         </div>
     </section><!-- End sejarah Section -->

     <!-- ======= Produk Section ======= -->
     <section id="produk" class="produk">
         <div class="container" data-aos="fade-up">

             <div class="row justify-content-around gy-4">
                 <div class="col-lg-6 img-bg" style="background-image: url(assets/img/ijenWater/produk.jpg);background-repeat: no-repeat;" data-aos="zoom-in" data-aos-delay="100"></div>

                 <div class="col-lg-5 d-flex flex-column justify-content-center">
                     <h3>Produk - produk Ijen Water</h3>

                     <?php if (!empty($produk_list)) : ?>
                         <?php foreach ($produk_list as $index => $row) : ?>
                             <div class="icon-box d-flex position-relative" data-aos="fade-up" data-aos-delay="<?= ($index + 1) * 100 ?>">
                                 <i class="bi bi-patch-check flex-shrink-0"></i>
                                 <div>
                                     <h4><a href="#!" class="stretched-link" data-bs-toggle="modal" data-bs-target="#<?= $row->modal_id ?>"><?= $row->nama_produk ?></a></h4>
                                 </div>
                             </div>
                         <?php endforeach; ?>
                     <?php endif; ?>

                 </div>
             </div>

         </div>
     </section><!-- End Produk Section -->

     <!-- Modal Dynamic Produk -->
     <?php if (!empty($produk_list)) : ?>
         <?php foreach ($produk_list as $row) : ?>
             <div class="modal fade" id="<?= $row->modal_id ?>" tabindex="-1" aria-labelledby="<?= $row->modal_id ?>Label" aria-hidden="true">
                 <div class="modal-dialog modal-lg">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="<?= $row->modal_id ?>Label"><?= $row->nama_produk ?></h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                         <div class="modal-body">
                             <div class="row">
                                 <div class="col-lg-6">
                                     <?php if ($row->gambar) : ?>
                                         <img src="<?= base_url('assets/img/ijenWater/' . $row->gambar) ?>" alt="<?= $row->nama_produk ?>" class="img-fluid">
                                     <?php endif; ?>
                                 </div>
                                 <div class="col-lg-6 p-4">
                                     <h6><?= $row->deskripsi ?></h6>
                                     <br>
                                     <h6>Harga Eceran tertinggi<br><?= $row->harga ?></h6>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         <?php endforeach; ?>
     <?php endif; ?>

     <!-- ======= Galeri Section ======= -->
     <section id="galeri" class="galeri">
         <div class="container" data-aos="fade-up">
             <div class=" section-header">
                 <h2>Galeri Ijen Water</h2>
                 <!-- <p>In commodi voluptatem excepturi quaerat nihil error autem voluptate ut et officia consequuntu</p> -->
             </div>
             <div class="row gy-5">
                 <?php
                    $images = [
                        'ijen1.jpg',
                        'ijen2.jpg',
                        'ijen3.jpg',
                        'ijen4.jpg',
                        'ijen5.jpg',
                        'ijen6.jpg',
                        'ijen7.jpg',
                        'ijen8.jpg',
                        'ijen9.jpg',
                        'ijen10.jpg',
                        'ijen11.jpg',
                        'ijen12.jpg'
                    ];
                    ?>

                 <?php foreach ($images as $image) : ?>
                     <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                         <div class="post-item position-relative h-100">
                             <div class="post-img position-relative overflow-hidden">
                                 <img src="<?= base_url('assets/img/ijenWater/') . $image ?>" class="img-fluid" alt="<?= $image ?>">
                             </div>
                         </div>
                     </div><!-- End post item -->
                 <?php endforeach; ?>



             </div>
         </div>
     </section>
     <!-- End Galeri Section -->

     <!-- ======= Penghargaan Section ======= -->
     <!-- <section id="penghargaan" class="testimonials section-bg">
         <div class="container" data-aos="fade-up">

             <div class="section-header">
                 <h2>Penghargaan</h2>
                 <p>Beberapa penghargaan yang pernah diraih oleh PDAM Bondowoso</p>
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
                     </div>
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
                     </div>

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
                     </div>

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
                     </div>

                 </div>
                 <div class="swiper-pagination"></div>
             </div>

         </div>
     </section> -->

     <!-- End Penghargaan Section -->

     <!-- ======= Contact Section ======= -->
     <section id="contact" class="contact">
         <div class="container" data-aos="fade-up" data-aos-delay="100">

             <div class="section-header">
                 <h2>Kontak Kami</h2>
             </div>

             <div class="row gy-4">
                 <div class="col-lg-6">
                     <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                         <i class="bi bi-map"></i>
                         <h3>Alamat Kantor :</h3>
                         <p>Jalan Mastrip No 193 A Bondowoso Jawa Timur 68219</p>
                     </div>
                 </div><!-- End Info Item -->

                 <div class="col-lg-3 col-md-6">
                     <div class="info-item d-flex flex-column justify-content-center align-items-center">
                         <i class="bi bi-envelope"></i>
                         <h3>Hubungi via Email :</h3>
                         <p>ijenwaterofficial@gmail.com</p>
                     </div>
                 </div><!-- End Info Item -->

                 <div class="col-lg-3 col-md-6">
                     <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                         <i class="bi bi-telephone"></i>
                         <h3>Pemesanan :</h3>
                         <?php if ($no_wa_ijen) : ?>
                             <a href="https://wa.me/<?= $no_wa_ijen ?>" target="_blank" style="text-decoration:none; color:#52565e;"><?= $no_display ?></a>
                         <?php else : ?>
                             <p>-</p>
                         <?php endif; ?>
                     </div>
                 </div>
             </div><!-- End Info Item -->

         </div>

         <div class="row gy-4 mt-1">

             <div class="col-lg-6 ">
                 <!-- <iframe src="https://goo.gl/maps/nNXm4XscSQqcz3z26" frameborder="0"
          style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe> -->
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.6191188948856!2d113.8134776507582!3d-7.934787907717636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6c2e149d64cb9%3A0x9356649086292771!2sKantor%20PDAM%20Bondowoso!5e0!3m2!1sid!2sid!4v1687395183080!5m2!1sid!2sid" width="100%" height="275px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
             </div><!-- End Google Maps -->

             <div class="col-lg-6">
                 <div class="info-item d-flex flex-column justify-content-center py-5 px-4">
                     <h5><span class="bi bi-clock text-warning"> </span> Jam Pelayanan :</h5><br>
                     <p>
                         Senin - Jum'at : 7.00 - 15.00 WIB
                     </p>
                     <br>
                     <p>
                         Sabtu - Ahad : Kantor Tutup
                     </p>
                     <br>
                     <p class="pb-1">
                         Namun layanan pengiriman air mineral Ijen Water masih tetap berlanjut dan beroperasi.
                     </p>
                 </div>
             </div><!-- End Contact Form -->

         </div>

         </div>
     </section><!-- End Contact Section -->


 </main><!-- End #main -->