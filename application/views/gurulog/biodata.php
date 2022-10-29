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
            <p class="section-lead">Biodata Siswa berisi data Siswa pengguna SmartSchool. Apabila terdapat kesalahan data, anda dapat memperbaikinya.</p>

            <div class="card shadow">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="card-header">
                    <a href="<?= base_url('gurulog/biodata_update'); ?>" class="btn btn-outline-primary mr-1 mb-1"><i class="fas fa-edit"></i> Ubah</a>
                </div>
                <div class="card-body">
                    <!-- biodata -->
                    <div>
                        <div class="alert alert-secondary" role="alert">
                            <b>I. BIODATA</b>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['nama']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['nik']; ?>">
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
                            <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['tmp_lahir']; ?>, <?= strftime('%d %B %Y', strtotime($guru['tgl_lahir'])); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Golongan Darah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['golda']; ?>">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <!-- kesiswaan -->
                    <div>
                        <div class="alert alert-secondary" role="alert">
                            <b>II. KESISWAAN</b>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['nip']; ?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kelas / Mapel</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['kelas']; ?> / <?= $guru['mapel']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Daftar</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= strftime('%d %B %Y', strtotime($guru['tgl_daftar'])); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status Guru</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['status']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Golongan Guru</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['golongan']; ?>">
                            </div>
                        </div>
                    </div>
                    <hr>

                    <!-- kewenegaraan -->
                    <div>
                        <div class="alert alert-secondary" role="alert">
                            <b>III. KEWENEGARAAN</b>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Agama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['agama']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['alamat']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kelurahan / Desa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['kel']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kecamatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['kec']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kabupaten / Kota</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['kab']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Provinsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['prov']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Negara</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['negara']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kode Pos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['kodepos']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No. Telp / HP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly value="<?= $guru['telp']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly value="<?= $guru['email']; ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="card-footer bg-whitesmoke"></div>
            </div>
        </div>
    </section>
</div>
<!-- Main Content End -->