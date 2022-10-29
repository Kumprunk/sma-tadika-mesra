<!-- Main Content Start -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i></a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('siswa/data_siswaAll'); ?>">Data Guru</a></div>
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
                    <form method="POST" action="<?= base_url('guru/guruAdd'); ?>" class="needs-validation" novalidate="">
                        <!-- DATA KESISWAAN -->
                        <div class="alert alert-secondary" role="alert">
                            DATA GURU
                        </div>
                        <div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIP <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="nip" value="<?= set_value('nip'); ?>">
                                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Guru <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" required name="status">
                                        <option selected disabled value="">-- pilih --</option>
                                        <?php foreach ($status_guru as $r) : ?>
                                            <option value="<?= $r['id']; ?>" <?= set_select('status', $r['status']); ?>><?= $r['status']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Golongan Guru <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" required name="golongan">
                                        <option selected disabled value="">-- pilih --</option>
                                        <?php foreach ($golongan_guru as $r) : ?>
                                            <option value="<?= $r['id']; ?>" <?= set_select('golongan', $r['golongan']); ?>><?= $r['golongan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('golongan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mengajar Mata Pelajaran <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" required name="mapel">
                                        <option selected disabled value="">-- pilih --</option>
                                        <?php foreach ($guru_mapel as $r) : ?>
                                            <option value="<?= $r['kd_mapel']; ?>" <?= set_select('mapel', $r['mapel']); ?>><?= $r['mapel']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Mengajar Kelas <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" required name="kelas">
                                        <option selected disabled value="">-- pilih --</option>
                                        <?php foreach ($guru_kelas as $r) : ?>
                                            <option value="<?= $r['kd_kelas']; ?>" <?= set_select('kelas', $r['kelas']); ?>><?= $r['kelas']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
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
                        <div class="alert alert-secondary" role="alert">
                            DATA PRIBADI GURU
                        </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lengkap <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="nama" value="<?= set_value('nama'); ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIK <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="nik" value="<?= set_value('nik'); ?>">
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
                                    <input type="text" class="form-control" required name="tmp_lahir" value="<?= set_value('tmp_lahir'); ?>">
                                    <?= form_error('tmp_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tanggal Lahir <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" required name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
                                    <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
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