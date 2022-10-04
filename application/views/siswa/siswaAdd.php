<!-- Main Content Start -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i></a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('siswa/data_siswaAll'); ?>">Data Siswa</a></div>
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>


        <div class="section-body">
            <h2 class="section-title">Keterangan !</h2>
            <p class="section-lead">...</p>

            <div class="card shadow">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="card-header">
                    <a href="#yourlink" class="btn btn-outline-primary mr-1 fas fa-file-excel" title="import data via excel"> Import</a>
                    <a href="#yourlink" class="btn btn-outline-primary mr-1 fas fa-download" title="download template excel"> Template Excel</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('siswa/siswaAdd'); ?>" class="needs-validation" novalidate="">
                        <!-- DATA KESISWAAN -->
                        <div class="alert alert-secondary" role="alert">
                            DATA KESISWAAN
                        </div>
                        <div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIS <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="nis" value="<?= set_value('nis'); ?>">
                                    <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NISN</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nisn" value="<?= set_value('nisn'); ?>">
                                    <?= form_error('nisn', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kelas <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" required name="kd_kelas">
                                        <option selected disabled value="">-- pilih --</option>
                                        <?php foreach ($l_kelas as $r) : ?>
                                            <option value="<?= $r['kd_kelas']; ?>" <?= set_select('kd_kelas', $r['kd_kelas']); ?>><?= $r['kelas']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('kd_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jurusan <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" required name="kd_jurusan">
                                        <option selected disabled value="">-- pilih --</option>
                                        <?php foreach ($l_jurusan as $r) : ?>
                                            <option value="<?= $r['kd_jurusan']; ?>" <?= set_select('kd_jurusan', $r['kd_jurusan']); ?>><?= $r['jurusan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('kd_jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Masuk <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" required name="kd_status_masuk">
                                        <option selected disabled value="">-- pilih --</option>
                                        <?php foreach ($l_status_masuk as $r) : ?>
                                            <option value="<?= $r['kd_status_masuk']; ?>" <?= set_select('kd_status_masuk', $r['kd_status_masuk']); ?>><?= $r['status_masuk']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('kd_status_masuk', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Siswa <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" required name="kd_status_siswa">
                                        <option selected disabled value="">-- pilih --</option>
                                        <?php foreach ($l_status_siswa as $r) : ?>
                                            <option value="<?= $r['kd_status_siswa']; ?>" <?= set_select('kd_status_siswa', $r['kd_status_siswa']); ?>><?= $r['status_siswa']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('kd_status_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal Daftar <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" required name="tgl_daftar" value="<?= set_value('tgl_daftar'); ?>">
                                    <?= form_error('tgl_daftar', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>


                        <!-- DATA PRIBADI SISWA -->
                        <div class="alert alert-secondary" role="alert">
                            DATA PRIBADI SISWA
                        </div>
                        <div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lengkap <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="nama" value="<?= set_value('nama'); ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIK </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nik" value="<?= set_value('nik'); ?>">
                                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jenis Kelamin <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" required name="jk">
                                        <option selected disabled value="">-- pilih --</option>
                                        <option value="L" <?= set_select('jk', 'L'); ?>>Laki-Laki</option>
                                        <option value="P" <?= set_select('jk', 'P'); ?>>Perempuan</option>
                                    </select>
                                    <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tempat Lahir <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="tmp_lhr" value="<?= set_value('tmp_lhr'); ?>">
                                    <?= form_error('tmp_lhr', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal Lahir <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" required name="tgl_lhr" value="<?= set_value('tgl_lhr'); ?>">
                                    <?= form_error('tgl_lhr', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Golongan Darah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="golda" value="<?= set_value('golda'); ?>" placeholder="-- pilih --" list="golda">
                                    <datalist id="golda">
                                        <?php foreach ($l_golda as $r) : ?>
                                            <option><?= $r['golda']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('golda', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Agama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="agama" value="<?= set_value('agama'); ?>" placeholder="-- pilih --" list="agama">
                                    <datalist id="agama">
                                        <?php foreach ($l_agama as $r) : ?>
                                            <option><?= $r['agama']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamat" value="<?= set_value('alamat'); ?>">
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kelurahan/Desa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kel" value="<?= set_value('kel'); ?>">
                                    <?= form_error('kel', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kec" value="<?= set_value('kec'); ?>" placeholder="-- pilih --" list="kec">
                                    <datalist id="kec">
                                        <?php foreach ($l_kecamatan as $r) : ?>
                                            <option><?= $r['kecamatan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('kec', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kabupaten/Kota</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kab" value="<?= set_value('kab'); ?>" placeholder="-- pilih --" list="kab">
                                    <datalist id="kab">
                                        <?php foreach ($l_kabupaten as $r) : ?>
                                            <option><?= $r['kabupaten']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('kab', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="prov" value="<?= set_value('prov'); ?>" placeholder="-- pilih --" list="prov">
                                    <datalist id="prov">
                                        <?php foreach ($l_provinsi as $r) : ?>
                                            <option><?= $r['provinsi']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('prov', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kewenegaraan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="negara" value="<?= set_value('negara'); ?>" placeholder="-- pilih --" list="negara">
                                    <datalist id="negara">
                                        <?php foreach ($l_negara as $r) : ?>
                                            <option><?= $r['negara']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('negara', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kodepos" value="<?= set_value('kodepos'); ?>">
                                    <?= form_error('kodepos', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. Telp/HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="telp" value="<?= set_value('telp'); ?>">
                                    <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>


                        <!-- DATA PENDIDIKAN SEBELUMNYA -->
                        <div class="alert alert-secondary" role="alert">
                            DATA PENDIDIKAN SEBELUMNYA
                        </div>
                        <div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Asal Sekolah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="asal_sekolah" value="<?= set_value('asal_sekolah'); ?>">
                                    <?= form_error('asal_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nomor SKHU</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="no_skhu" value="<?= set_value('no_skhu'); ?>">
                                    <?= form_error('no_skhu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nomor Ijazah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="no_ijazah" value="<?= set_value('no_ijazah'); ?>">
                                    <?= form_error('no_ijazah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nilai Ujian Nasional (UN)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nilai_un" value="<?= set_value('nilai_un'); ?>">
                                    <?= form_error('nilai_un', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>


                        <!-- DATA SISWA PINDAHAN -->
                        <div class="alert alert-secondary" role="alert">
                            DATA SISWA PINDAHAN
                        </div>
                        <div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pindah Dari Sekolah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pindah_dari_sekolah" value="<?= set_value('pindah_dari_sekolah'); ?>">
                                    <?= form_error('pindah_dari_sekolah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal Pindah</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tgl_pindah" value="<?= set_value('tgl_pindah'); ?>">
                                    <?= form_error('tgl_pindah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alasan Pindah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alasan_pindah" value="<?= set_value('alasan_pindah'); ?>">
                                    <?= form_error('alasan_pindah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- DATA AYAH -->
                        <div class="alert alert-secondary" role="alert">
                            DATA AYAH
                        </div>
                        <div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_ayah" value="<?= set_value('nama_ayah'); ?>">
                                    <?= form_error('nama_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Hidup</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="status_ayah">
                                        <option selected disabled value="">-- pilih --</option>
                                        <option value="-" <?= set_select('status_ayah', '-'); ?>>-</option>
                                        <option value="Hidup" <?= set_select('status_ayah', 'Hidup'); ?>>Hidup</option>
                                        <option value="Meninggal" <?= set_select('status_ayah', 'Meninggal'); ?>>Meninggal</option>
                                    </select>
                                    <?= form_error('status_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pendidikan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pendidikan_ayah" value="<?= set_value('pendidikan_ayah'); ?>" placeholder="-- pilih --" list="pendidikan_ayah">
                                    <datalist id="pendidikan_ayah">
                                        <?php foreach ($l_pendidikan as $r) : ?>
                                            <option><?= $r['pendidikan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('pendidikan_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pekerjaan_ayah" value="<?= set_value('pekerjaan_ayah'); ?>" placeholder="-- pilih --" list="pekerjaan_ayah">
                                    <datalist id="pekerjaan_ayah">
                                        <?php foreach ($l_pekerjaan as $r) : ?>
                                            <option><?= $r['pekerjaan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('pekerjaan_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Penghasilan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="penghasilan_ayah" value="<?= set_value('penghasilan_ayah'); ?>" placeholder="-- pilih --" list="penghasilan_ayah">
                                    <datalist id="penghasilan_ayah">
                                        <?php foreach ($l_penghasilan as $r) : ?>
                                            <option><?= $r['penghasilan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('penghasilan_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. Telp/HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="telp_ayah" value="<?= set_value('telp_ayah'); ?>">
                                    <?= form_error('telp_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email_ayah" value="<?= set_value('email_ayah'); ?>">
                                    <?= form_error('email_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>


                        <!-- DATA IBU -->
                        <div class="alert alert-secondary" role="alert">
                            DATA IBU
                        </div>
                        <div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_ibu" value="<?= set_value('nama_ibu'); ?>">
                                    <?= form_error('nama_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Hidup</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="status_ibu">
                                        <option selected disabled value="">-- pilih --</option>
                                        <option value="-" <?= set_select('status_ibu', '-'); ?>>-</option>
                                        <option value="Hidup" <?= set_select('status_ibu', 'Hidup'); ?>>Hidup</option>
                                        <option value="Meninggal" <?= set_select('status_ibu', 'Meninggal'); ?>>Meninggal</option>
                                    </select>
                                    <?= form_error('status_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pendidikan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pendidikan_ibu" value="<?= set_value('pendidikan_ibu'); ?>" placeholder="-- pilih --" list="pendidikan_ibu">
                                    <datalist id="pendidikan_ibu">
                                        <?php foreach ($l_pendidikan as $r) : ?>
                                            <option><?= $r['pendidikan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('pendidikan_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pekerjaan_ibu" value="<?= set_value('pekerjaan_ibu'); ?>" placeholder="-- pilih --" list="pekerjaan_ibu">
                                    <datalist id="pekerjaan_ibu">
                                        <?php foreach ($l_pekerjaan as $r) : ?>
                                            <option><?= $r['pekerjaan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('pekerjaan_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Penghasilan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="penghasilan_ibu" value="<?= set_value('penghasilan_ibu'); ?>" placeholder="-- pilih --" list="penghasilan_ibu">
                                    <datalist id="penghasilan_ibu">
                                        <?php foreach ($l_penghasilan as $r) : ?>
                                            <option><?= $r['penghasilan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('penghasilan_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. Telp/HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="telp_ibu" value="<?= set_value('telp_ibu'); ?>">
                                    <?= form_error('telp_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email_ibu" value="<?= set_value('email_ibu'); ?>">
                                    <?= form_error('email_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>



                        <!-- DATA WALI -->
                        <div class="alert alert-secondary" role="alert">
                            DATA WALI
                        </div>
                        <div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_wali" value="<?= set_value('nama_wali'); ?>">
                                    <?= form_error('nama_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Hidup</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="status_wali">
                                        <option selected disabled value="">-- pilih --</option>
                                        <option value="-" <?= set_select('status_wali', '-'); ?>>-</option>
                                        <option value="Hidup" <?= set_select('status_wali', 'Hidup'); ?>>Hidup</option>
                                        <option value="Meninggal" <?= set_select('status_wali', 'Meninggal'); ?>>Meninggal</option>
                                    </select>
                                    <?= form_error('status_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pendidikan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pendidikan_wali" value="<?= set_value('pendidikan_wali'); ?>" placeholder="-- pilih --" list="pendidikan_wali">
                                    <datalist id="pendidikan_wali">
                                        <?php foreach ($l_pendidikan as $r) : ?>
                                            <option><?= $r['pendidikan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('pendidikan_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pekerjaan_wali" value="<?= set_value('pekerjaan_wali'); ?>" placeholder="-- pilih --" list="pekerjaan_wali">
                                    <datalist id="pekerjaan_wali">
                                        <?php foreach ($l_pekerjaan as $r) : ?>
                                            <option><?= $r['pekerjaan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('pekerjaan_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Penghasilan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="penghasilan_wali" value="<?= set_value('penghasilan_wali'); ?>" placeholder="-- pilih --" list="penghasilan_wali">
                                    <datalist id="penghasilan_wali">
                                        <?php foreach ($l_penghasilan as $r) : ?>
                                            <option><?= $r['penghasilan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('penghasilan_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. Telp/HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="telp_wali" value="<?= set_value('telp_wali'); ?>">
                                    <?= form_error('telp_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email_wali" value="<?= set_value('email_wali'); ?>">
                                    <?= form_error('email_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>


                        <!-- DATA ORANGTUA -->
                        <div class="alert alert-secondary" role="alert">
                            DATA ORANGTUA
                        </div>
                        <div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat Orang Tua</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamat_orangtua" value="<?= set_value('alamat_orangtua'); ?>">
                                    <?= form_error('alamat_orangtua', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kelurahan Orang Tua</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kel_orangtua" value="<?= set_value('kel_orangtua'); ?>">
                                    <?= form_error('kel_orangtua', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kecamatan Orang Tua</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kec_orangtua" value="<?= set_value('kec_orangtua'); ?>" placeholder="-- pilih --" list="kec_orangtua">
                                    <datalist id="kec_orangtua">
                                        <?php foreach ($l_kecamatan as $r) : ?>
                                            <option><?= $r['kecamatan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('kec_orangtua', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kabupaten Orang Tua</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kab_orangtua" value="<?= set_value('kab_orangtua'); ?>" placeholder="-- pilih --" list="kab_orangtua">
                                    <datalist id="kab_orangtua">
                                        <?php foreach ($l_kabupaten as $r) : ?>
                                            <option><?= $r['kabupaten']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('kab_orangtua', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Provinsi Orang Tua</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="prov_orangtua" value="<?= set_value('prov_orangtua'); ?>" placeholder="-- pilih --" list="prov_orangtua">
                                    <datalist id="prov_orangtua">
                                        <?php foreach ($l_provinsi as $r) : ?>
                                            <option><?= $r['provinsi']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('prov_orangtua', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kewenegaraan Orang Tua</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="negara_orangtua" value="<?= set_value('negara_orangtua'); ?>" placeholder="-- pilih --" list="negara_orangtua">
                                    <datalist id="negara_orangtua">
                                        <?php foreach ($l_negara as $r) : ?>
                                            <option><?= $r['negara']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('negara_orangtua', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Pos Orang Tua</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="kodepos_orangtua" value="<?= set_value('kodepos_orangtua'); ?>">
                                    <?= form_error('kodepos_orangtua', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        <button type="reset" class="btn btn-danger btn-block">Reset</button>
                    </form>
                </div>
                <div class="card-footer bg-whitesmoke"></div>
            </div>
        </div>


    </section>
</div>
<!-- Main Content End -->