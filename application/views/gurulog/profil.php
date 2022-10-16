<!-- Main Content Start -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i></a></div>
                <!-- <div class="breadcrumb-item"><a href="<?= base_url(''); ?>">Layout</a></div> -->
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>


        <div class="section-body">
            <h2 class="section-title">Keterangan !</h2>
            <p class="section-lead">Profil guru berisi data pribadi pengguna SmartSchool. Apabila terdapat kesalahan data, anda dapat menghubungi pihak sekolah untuk memperbaikinya. Dan kami berharap agar guru tidak mengubah foto profil menjadi foto profil anime</p>

            <div class="card mb-3">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="row no-gutters">
                    <div class="col-md-9">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly value="<?= $guru['nip']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['nama']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <?php if ($guru['jk'] == 'L') : ?>
                                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="Laki-Laki">
                                    <?php elseif ($guru['jk'] == 'P') : ?>
                                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="Perempuan">
                                    <?php else : ?>
                                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['jk']; ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status guru</label>
                                <div class="col-sm-10">
                                
                                    <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?php switch ($guru['status_id']) 
                                        {
                                            case '1':
                                                echo 'ASN';
                                                break;
                                            case '2':
                                                echo 'Honorer';
                                                break;
                                            case '3':
                                                echo 'P3k';
                                                break;
                                            default:
                                                echo 'Anda belum mempunyai status sebagai guru';
                                        }
                                    ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Golongan guru</label>
                                <div class="col-sm-10">
                                
                                    <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?php switch ($guru['golongan_id']) 
                                        {
                                            case '1':
                                                echo 'II/a';
                                                break;
                                            case '2':
                                                echo 'II/b';
                                                break;
                                            case '3':
                                                echo 'II/c';
                                                break;                                                                                           
                                            case '4':
                                                echo 'II/d';
                                                break;                                                                                         
                                            case '5':
                                                echo 'III/a';
                                                break;                                                                                           
                                            case '6':
                                                echo 'III/b';
                                                break;
                                            case '7':
                                                echo 'III/c';
                                                break;
                                            case '8':
                                                echo 'III/d';
                                                break;
                                            case '9':
                                                echo 'IV/a';
                                                break;
                                            case '10':
                                                echo 'IV/b';
                                                break;
                                            case '11':
                                                echo 'IV/c';
                                                break;
                                            case '12';
                                                echo 'IV/d';
                                                break;
                                            case '13';
                                                echo 'IV/e';
                                                break;
                                            default:
                                                echo 'Anda belum mempunyai status sebagai guru';
                                        }
                                    ?>">
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    <div class="col-md-3 mt-4 mb-4" align="center">
                        <img src="<?= base_url('assets/img/guru/' . $guru['foto']); ?>" class="img-thumbnail" alt="image" style="max-width: 160px; max-height: 300px;"> <br>
                        <a href="#" data-toggle="modal" data-target="#ubah_foto"><i class="fas fa-camera"></i> [ubah foto]</a>
                    </div>
                </div>
            </div>
        </div>


    </section>
</div>
<!-- Main Content End -->





<!-- Modal ubah foto -->
<div class="modal fade" id="ubah_foto" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="ubah_fotoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ubah_fotoLabel">Ubah Foto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('gurulog/ubahFoto'); ?>" class="needs-validation" novalidate="" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="file" class="form-control" required name="foto" id="foto">
                    <small class="form-text text-muted">format foto (.jpg .png) dengan ukuran maksimal 2 Mb.</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>