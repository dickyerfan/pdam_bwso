<div id="layoutSidenav_content" class="latar">
    <main>
        <div class="container-fluid px-2 mt-2">
            <?= $this->session->flashdata('info'); ?>
            <?= $this->session->unset_userdata('info'); ?>
            <div class="card border-0">
                <div class="card-header shadow text-light" style="background: linear-gradient(
                                            45deg,
                                            rgba(0, 0, 0, 0.9),
                                            rgba(0, 0, 0, 0.7) 100%
                                            )">
                    <!-- <h4 class="card-title"><?= strtoupper($title) ?></h4> -->
                    <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                        <span class="title">Selamat Datang <?= $this->session->userdata('nama_lengkap'); ?> di Website PDAM Bondowoso</span>
                    </marquee>
                </div>

                <div class="card-body text-center">
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <div class="mb-4" style="width: 12rem;">
                                <div class="card-body text-center fw-bold boxBiru" data-bs-toggle="modal" data-bs-target="#direktur">DIREKTUR</div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <div class="mb-4" style="width: 12rem;">
                                <div class="card-body text-center fw-bold boxMerah" data-bs-toggle="modal" data-bs-target="#spi">S P I</div>
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-3 text-uppercase">
                            <h5 class="font-weight-bold">Bagian</h5>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxHijau" data-bs-toggle="modal" data-bs-target="#langgan">
                                    pemeliharaan
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxHijau" data-bs-toggle="modal" data-bs-target="#umum">
                                    U m u m
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxHijau" data-bs-toggle="modal" data-bs-target="#keu">
                                    Keuangan
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxHijau" data-bs-toggle="modal" data-bs-target="#renc">
                                    Perencanaan
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxHijau" data-bs-toggle="modal" data-bs-target="#peml">
                                    Pemeliharaan
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mt-4 mb-3 text-uppercase">
                            <h5 class="font-weight-bold">U P K / Unit Pelayanan Kecamatan</h5>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <!-- <div class="col-md-2">
							<div class="card shadow bg-warning border-0 mb-4">
								<div class="card-body text-center fw-bold bg-light cardEffect border-start border-warning border-5 rounded" data-bs-toggle="modal" data-bs-target="#bondowoso">
									Bondowoso
								</div>
							</div>
						</div> -->
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#bondowoso">
                                    Bondowoso
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#suko1">
                                    Sukosari 1
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#maesan">
                                    Maesan
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#tegalampel">
                                    Tegalampel
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#tapen">
                                    Tapen
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#prajekan">
                                    Prajekan
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#tlogosari">
                                    Tlogosari
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#wringin">
                                    Wringin
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#curahdami">
                                    Curahdami
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#tamanan">
                                    Tamanan
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#tenggarang">
                                    Tenggarang
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#tamankrocok">
                                    Tamankrocok
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#wonosari">
                                    Wonosari
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#suko2">
                                    Sukosari 2
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-4">
                                <div class="card-body text-center fw-bold boxKuning" data-bs-toggle="modal" data-bs-target="#amdk">
                                    A M D K
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>


    <!-- Modal direktur -->
    <div class="modal fade" id="direktur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title" id="direktur">Direktur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <?php
                                if (isset($direktur['direktur']['nama'])) {
                                    echo strtoupper($direktur['direktur']['nama']);
                                } else {
                                    echo '';
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal spi -->
    <div class="modal fade" id="spi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-light">
                    <h5 class="modal-title" id="spi">S P I / Satuan Pengawas Intern</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">Ketua</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($spi['ketua']['nama'])) {
                                        echo $spi['ketua']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($spi['a_spi'] as $row) : ?>
                                <tr>
                                    <td>Anggota S P I</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($spi['a_spi'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal langganan -->
    <div class="modal fade" id="langgan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h5 class="modal-title" id="langgan">Pengaduan Pelanggan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">Kabag</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($langganan['k_lang']['nama'])) {
                                        echo $langganan['k_lang']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kasubag Langganan</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($langganan['ks_lang']['nama'])) {
                                        echo $langganan['ks_lang']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($langganan['s_lang'] as $row) : ?>
                                <tr>
                                    <td>Staf Langganan</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($langganan['s_lang'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Kasubag Penagihan</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($langganan['ks_tagih']['nama'])) {
                                        echo $langganan['ks_tagih']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($langganan['s_tagih'] as $row) : ?>
                                <tr>
                                    <td>Staf Penagihan</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($langganan['s_tagih'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Umum -->
    <div class="modal fade" id="umum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h5 class="modal-title" id="umum">Umum & Administrasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">Kabag</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($umum['k_umum']['nama'])) {
                                        echo $umum['k_umum']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kasubag Umum</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($umum['ks_umum']['nama'])) {
                                        echo $umum['ks_umum']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($umum['s_umum'] as $row) : ?>
                                <tr>
                                    <td>Staf Umum</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($umum['s_umum'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($umum['s_umumSec'] as $row) : ?>
                                <tr>
                                    <td>Staf Umum (Security)</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($umum['s_umumSec'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Kasubag Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($umum['ks_admin']['nama'])) {
                                        echo $umum['ks_admin']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($umum['s_admin'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($umum['s_admin'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Kasubag Personalia</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($umum['ks_person']['nama'])) {
                                        echo $umum['ks_person']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($umum['s_person'] as $row) : ?>
                                <tr>
                                    <td>Staf Personalia</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($umum['s_person'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Keuangan -->
    <div class="modal fade" id="keu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h5 class="modal-title" id="keu">Keuangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">Kabag</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($keuangan['k_keu']['nama'])) {
                                        echo $keuangan['k_keu']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kasubag Pembukuan</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($keuangan['ks_buku']['nama'])) {
                                        echo $keuangan['ks_buku']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($keuangan['s_buku'] as $row) : ?>
                                <tr>
                                    <td>Staf Pembukuan</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($keuangan['s_buku'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Kasubag Kas</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($keuangan['ks_kas']['nama'])) {
                                        echo $keuangan['ks_kas']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($keuangan['s_kas'] as $row) : ?>
                                <tr>
                                    <td>Staf Kas</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($keuangan['s_kas'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Kasubag Rekening</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($keuangan['ks_rek']['nama'])) {
                                        echo $keuangan['ks_rek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($keuangan['s_rek'] as $row) : ?>
                                <tr>
                                    <td>Staf Rekening</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($keuangan['s_rek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal perencanaan -->
    <div class="modal fade" id="renc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h5 class="modal-title" id="renc">Perencanaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">Kabag</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($perencanaan['k_renc']['nama'])) {
                                        echo $perencanaan['k_renc']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kasubag Perencanaan</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($perencanaan['ks_renc']['nama'])) {
                                        echo $perencanaan['ks_renc']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($perencanaan['s_renc'] as $row) : ?>
                                <tr>
                                    <td>Staf Perencanaan</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($perencanaan['s_renc'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Kasubag Pengawasan</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($perencanaan['ks_awas']['nama'])) {
                                        echo $perencanaan['ks_awas']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($perencanaan['s_awas'] as $row) : ?>
                                <tr>
                                    <td>Staf Pengawasan</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($perencanaan['s_awas'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pemeliharaan -->
    <div class="modal fade" id="peml" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-light">
                    <h5 class="modal-title" id="peml">Pemeliharaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">Kabag</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($pemeliharaan['k_peml']['nama'])) {
                                        echo $pemeliharaan['k_peml']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Kasubag Pemeliharaan</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($pemeliharaan['ks_peml']['nama'])) {
                                        echo $pemeliharaan['ks_peml']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($pemeliharaan['s_peml_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pemeliharaan</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($pemeliharaan['s_peml_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($pemeliharaan['s_peml_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik Pemeliharaan</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($pemeliharaan['s_peml_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Kasubag Peralatan</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($pemeliharaan['ks_alat']['nama'])) {
                                        echo $pemeliharaan['ks_alat']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($pemeliharaan['s_alat_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Peralatan</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($pemeliharaan['s_alat_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($pemeliharaan['s_alat_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik Peralatan</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($pemeliharaan['s_alat_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Suko 1 -->
    <div class="modal fade" id="suko1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="suko1">UPK SUKOSARI 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">KA UPK</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($sukosari_1['suko1']['nama'])) {
                                        echo $sukosari_1['suko1']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pelaksana Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($sukosari_1['suko1_p_adm']['nama'])) {
                                        echo $sukosari_1['suko1_p_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($sukosari_1['suko1_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($sukosari_1['suko1_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($sukosari_1['suko1_s_admPm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pembaca Meter</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($sukosari_1['suko1_s_admPm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Teknik</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($sukosari_1['suko1_p_tek']['nama'])) {
                                        echo $sukosari_1['suko1_p_tek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($sukosari_1['suko1_s_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($sukosari_1['suko1_s_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Bondowoso -->
    <div class="modal fade" id="bondowoso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="bondowoso">UPK BONDOWOSO</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">KA UPK</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($bondowoso['bond']['nama'])) {
                                        echo $bondowoso['bond']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pelaksana Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($bondowoso['bond_p_adm']['nama'])) {
                                        echo $bondowoso['bond_p_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($bondowoso['bond_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($bondowoso['bond_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($bondowoso['bond_s_admPm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pembaca Meter</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($bondowoso['bond_s_admPm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Teknik</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($bondowoso['bond_p_tek']['nama'])) {
                                        echo $bondowoso['bond_p_tek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($bondowoso['bond_s_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($bondowoso['bond_s_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Pelayanan Pelanggan</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($bondowoso['bond_p_lang']['nama'])) {
                                        echo $bondowoso['bond_p_lang']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($bondowoso['bond_s_lang'] as $row) : ?>
                                <tr>
                                    <td>Staf Pelayanan Pelanggan</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($bondowoso['bond_s_lang'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Maesan -->
    <div class="modal fade" id="maesan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="maesan">UPK MAESAN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">KA UPK</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($maesan['maesan']['nama'])) {
                                        echo $maesan['maesan']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pelaksana Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($maesan['maesan_p_adm']['nama'])) {
                                        echo $maesan['maesan_p_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($maesan['maesan_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($maesan['maesan_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($maesan['maesan_s_admPm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pembaca Meter</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($maesan['maesan_s_admPm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Teknik</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($maesan['maesan_p_tek']['nama'])) {
                                        echo $maesan['maesan_p_tek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($maesan['maesan_s_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($maesan['maesan_s_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tegalampel -->
    <div class="modal fade" id="tegalampel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="tegalampel">UPK TEGALAMPEL</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">KA UPK</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tegalampel['tegalampel']['nama'])) {
                                        echo $tegalampel['tegalampel']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pelaksana Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tegalampel['tegalampel_p_adm']['nama'])) {
                                        echo $tegalampel['tegalampel_p_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($tegalampel['tegalampel_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tegalampel['tegalampel_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($tegalampel['tegalampel_s_admPm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pembaca Meter</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tegalampel['tegalampel_s_admPm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Teknik</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tegalampel['tegalampel_p_tek']['nama'])) {
                                        echo $tegalampel['tegalampel_p_tek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($tegalampel['tegalampel_s_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tegalampel['tegalampel_s_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tapen -->
    <div class="modal fade" id="tapen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="tapen">UPK TAPEN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">KA UPK</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tapen['tapen']['nama'])) {
                                        echo $tapen['tapen']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pelaksana Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tapen['tapen_p_adm']['nama'])) {
                                        echo $tapen['tapen_p_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($tapen['tapen_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tapen['tapen_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($tapen['tapen_s_admPm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pembaca Meter</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tapen['tapen_s_admPm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Teknik</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tapen['tapen_p_tek']['nama'])) {
                                        echo $tapen['tapen_p_tek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($tapen['tapen_s_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tapen['tapen_s_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Prajekan-->
    <div class="modal fade" id="prajekan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="prajekan">UPK PRAJEKAN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">KA UPK</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($prajekan['prajekan']['nama'])) {
                                        echo $prajekan['prajekan']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pelaksana Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($prajekan['prajekan_p_adm']['nama'])) {
                                        echo $prajekan['prajekan_p_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($prajekan['prajekan_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($prajekan['prajekan_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($prajekan['prajekan_s_admPm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pembaca Meter</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($prajekan['prajekan_s_admPm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Teknik</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($prajekan['prajekan_p_tek']['nama'])) {
                                        echo $prajekan['prajekan_p_tek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($prajekan['prajekan_s_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($prajekan['prajekan_s_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tlogosari-->
    <div class="modal fade" id="tlogosari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="tlogosari">UPK TLOGOSARI</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">KA UPK</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tlogosari['tlogosari']['nama'])) {
                                        echo $tlogosari['tlogosari']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pelaksana Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tlogosari['tlogosari_p_adm']['nama'])) {
                                        echo $tlogosari['tlogosari_p_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($tlogosari['tlogosari_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tlogosari['tlogosari_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($tlogosari['tlogosari_s_admPm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pembaca Meter</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tlogosari['tlogosari_s_admPm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Teknik</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tlogosari['tlogosari_p_tek']['nama'])) {
                                        echo $tlogosari['tlogosari_p_tek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($tlogosari['tlogosari_s_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tlogosari['tlogosari_s_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Wringin-->
    <div class="modal fade" id="wringin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="wringin">UPK WRINGIN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">KA UPK</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($wringin['wringin']['nama'])) {
                                        echo $wringin['wringin']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pelaksana Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($wringin['wringin_p_adm']['nama'])) {
                                        echo $wringin['wringin_p_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($wringin['wringin_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($wringin['wringin_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($wringin['wringin_s_admPm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pembaca Meter</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($wringin['wringin_s_admPm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Teknik</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($wringin['wringin_p_tek']['nama'])) {
                                        echo $wringin['wringin_p_tek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($wringin['wringin_s_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($wringin['wringin_s_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Curahdami-->
    <div class="modal fade" id="curahdami" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="curahdami">UPK CURAHDAMI</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">KA UPK</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($curahdami['curahdami']['nama'])) {
                                        echo $curahdami['curahdami']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pelaksana Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($curahdami['curahdami_p_adm']['nama'])) {
                                        echo $curahdami['curahdami_p_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($curahdami['curahdami_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($curahdami['curahdami_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($curahdami['curahdami_s_admPm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pembaca Meter</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($curahdami['curahdami_s_admPm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Teknik</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($curahdami['curahdami_p_tek']['nama'])) {
                                        echo $curahdami['curahdami_p_tek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($curahdami['curahdami_s_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($curahdami['curahdami_s_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tamanan-->
    <div class="modal fade" id="tamanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="tamanan">UPK TAMANAN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">KA UPK</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tamanan['tamanan']['nama'])) {
                                        echo $tamanan['tamanan']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pelaksana Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tamanan['tamanan_p_adm']['nama'])) {
                                        echo $tamanan['tamanan_p_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($tamanan['tamanan_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tamanan['tamanan_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($tamanan['tamanan_s_admPm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pembaca Meter</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tamanan['tamanan_s_admPm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Teknik</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tamanan['tamanan_p_tek']['nama'])) {
                                        echo $tamanan['tamanan_p_tek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($tamanan['tamanan_s_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tamanan['tamanan_s_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tenggarang-->
    <div class="modal fade" id="tenggarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="tenggarang">UPK TENGGARANG</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">KA UPK</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tenggarang['tenggarang']['nama'])) {
                                        echo $tenggarang['tenggarang']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pelaksana Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tenggarang['tenggarang_p_adm']['nama'])) {
                                        echo $tenggarang['tenggarang_p_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($tenggarang['tenggarang_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tenggarang['tenggarang_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($tenggarang['tenggarang_s_admPm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pembaca Meter</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tenggarang['tenggarang_s_admPm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Teknik</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tenggarang['tenggarang_p_tek']['nama'])) {
                                        echo $tenggarang['tenggarang_p_tek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($tenggarang['tenggarang_s_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tenggarang['tenggarang_s_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tamankrocok-->
    <div class="modal fade" id="tamankrocok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="tamankrocok">UPK TAMANKROCOK</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">KA UPK</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tamankrocok['tamankrocok']['nama'])) {
                                        echo $tamankrocok['tamankrocok']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pelaksana Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tamankrocok['tamankrocok_p_adm']['nama'])) {
                                        echo $tamankrocok['tamankrocok_p_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($tamankrocok['tamankrocok_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tamankrocok['tamankrocok_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($tamankrocok['tamankrocok_s_admPm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pembaca Meter</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tamankrocok['tamankrocok_s_admPm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Teknik</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($tamankrocok['tamankrocok_p_tek']['nama'])) {
                                        echo $tamankrocok['tamankrocok_p_tek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($tamankrocok['tamankrocok_s_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($tamankrocok['tamankrocok_s_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal wonosari-->
    <div class="modal fade" id="wonosari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="wonosari">UPK WONOSARI</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">KA UPK</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($wonosari['wonosari']['nama'])) {
                                        echo $wonosari['wonosari']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pelaksana Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($wonosari['wonosari_p_adm']['nama'])) {
                                        echo $wonosari['wonosari_p_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($wonosari['wonosari_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($wonosari['wonosari_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($wonosari['wonosari_s_admPm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pembaca Meter</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($wonosari['wonosari_s_admPm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Teknik</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($wonosari['wonosari_p_tek']['nama'])) {
                                        echo $wonosari['wonosari_p_tek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($wonosari['wonosari_s_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($wonosari['wonosari_s_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sukosari 2-->
    <div class="modal fade" id="suko2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="suko2">UPK SUKOSARI 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">KA UPK</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($sukosari_2['suko2']['nama'])) {
                                        echo $sukosari_2['suko2']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Pelaksana Administrasi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($sukosari_2['suko2_p_adm']['nama'])) {
                                        echo $sukosari_2['suko2_p_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($sukosari_2['suko2_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($sukosari_2['suko2_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <?php foreach ($sukosari_2['suko2_s_admPm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi Pembaca Meter</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($sukosari_2['suko2_s_admPm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Pelaksana Teknik</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($sukosari_2['suko2_p_tek']['nama'])) {
                                        echo $sukosari_2['suko2_p_tek']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($sukosari_2['suko2_s_tek'] as $row) : ?>
                                <tr>
                                    <td>Staf Teknik</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($sukosari_2['suko2_s_tek'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal amdk-->
    <div class="modal fade" id="amdk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="amdk">Unit A M D K</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="fw-bold">Manager</td>
                                <td> : </td>
                                <td>

                                    <?php
                                    if (isset($amdk['amdk']['nama'])) {
                                        echo $amdk['amdk']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Wakil Manager</td>
                                <td> : </td>
                                <td>

                                    <?php
                                    if (isset($amdk['amdk2']['nama'])) {
                                        echo $amdk['amdk2']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Quality Control</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($amdk['amdk_qc']['nama'])) {
                                        echo $amdk['amdk_qc']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($amdk['amdk_s_qc'] as $row) : ?>
                                <tr>
                                    <td>Staf Quality Control</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($amdk['amdk_s_qc'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Kabag Produksi</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($amdk['amdk_pro']['nama'])) {
                                        echo $amdk['amdk_pro']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($amdk['amdk_s_pro'] as $row) : ?>
                                <tr>
                                    <td>Staf Produksi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($amdk['amdk_s_pro'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Kabag Administrasi dan Keu</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($amdk['amdk_adm']['nama'])) {
                                        echo $amdk['amdk_adm']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($amdk['amdk_s_adm'] as $row) : ?>
                                <tr>
                                    <td>Staf Administrasi</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($amdk['amdk_s_adm'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                            <tr>
                                <td class="fw-bold">Kabag Pemasaran</td>
                                <td> : </td>
                                <td>
                                    <?php
                                    if (isset($amdk['amdk_pasar']['nama'])) {
                                        echo $amdk['amdk_pasar']['nama'];
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php foreach ($amdk['amdk_s_pasar'] as $row) : ?>
                                <tr>
                                    <td>Staf Pemasaran</td>
                                    <td> : </td>
                                    <td>
                                        <?php
                                        if (isset($amdk['amdk_s_pasar'])) {
                                            echo $row['nama'];
                                        } else {
                                            echo '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach;  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>