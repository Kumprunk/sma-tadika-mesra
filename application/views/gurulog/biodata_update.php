<!-- Main Content Start -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i></a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('gurulog/biodata'); ?>">Biodata</a></div>
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>


        <div class="section-body">
            <h2 class="section-title">Keterangan !</h2>
            <p class="section-lead">Isilah biodata anda dengan lengkap dan benar.</p>

            <div class="card shadow">
                <?= $this->session->flashdata('pesan'); ?>
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('gurulog/biodata_update'); ?>" class="needs-validation" novalidate="" method="post">
                            <!-- biodata -->
                            <div>
                                <div class="alert alert-secondary" role="alert">
                                    <b>BIODATA</b>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Lengkap <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" required name="nama" value="<?=  set_value('nama', $guru['nama']);?>">
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIK <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" required name="nik" value="<?=  set_value('nik', $guru['nik']);?>">
                                            <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                    <div class="col-sm-10">
                                        <select class="custom-select" name="jk" required>
                                            <option value="<?= $guru['jk']; ?>">
                                                <?php if ($guru['jk'] == 'L') : ?>
                                                    Laki-Laki
                                                <?php elseif ($guru['jk'] == 'P') : ?>
                                                    Perempuan
                                                <?php else : ?>
                                                    <?= $guru['jk']; ?>
                                                <?php endif; ?>
                                            </option>
                                            <option value="" disabled>-- pilih --</option>
                                            <option value="L" <?= set_select('jk', 'L'); ?>>Laki-Laki</option>
                                            <option value="P" <?= set_select('jk', 'P'); ?>>Perempuan</option>
                                        </select>
                                        <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Tempat, Tgl Lahir <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                    <div class="col-sm-10">
                                        <div class="form-row">
                                            <div class="col">
                                                <input type="text" class="form-control" required name="tmp_lahir" value="<?= set_value('tmp_lahir', $guru['tmp_lahir']); ?>">
                                                <?= form_error('tmp_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                            <div class="col">
                                                <input type="date" class="form-control" required name="tgl_lahir" value="<?= set_value('tgl_lahir', $guru['tgl_lahir']); ?>">
                                                <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Golongan Darah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="golda" value="<?= set_value('golda', $guru['golda']); ?>" placeholder="--pilih--" list="golda">
                                    <datalist id="golda">
                                        <?php foreach ($l_golda as $row) : ?>
                                            <option><?= $row['golda']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            </div>
                            <hr>
                            <div> 
                                <div class="alert alert-secondary" role="alert">
                                    <b>KEWENEGARAAN</b>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Agama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="agama" value="<?= set_value('agama', $guru['agama']); ?>" placeholder="--pilih--" list="agama">
                                        <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <datalist id="agama">
                                            <?php foreach ($l_agama as $row) : ?>
                                                <option><?= $row['agama']; ?></option>
                                            <?php endforeach; ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="alamat" value="<?= set_value('alamat', $guru['alamat']); ?>">
                                        <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kelurahan / Desa</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kel" value="<?= set_value('kel', $guru['kel']); ?>">
                                        <?= form_error('kel', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kec" value="<?= set_value('kec', $guru['kec']); ?>" placeholder="--pilih--" list="kec">
                                        <?= form_error('kec', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <datalist id="kec">
                                            <?php foreach ($l_kecamatan as $row) : ?>
                                                <option><?= $row['kecamatan']; ?></option>
                                            <?php endforeach; ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kabupaten / Kota</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kab" value="<?= set_value('kab', $guru['kab']); ?>" placeholder="--pilih--" list="kab">
                                        <?= form_error('kab', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <datalist id="kab">
                                            <?php foreach ($l_kabupaten as $row) : ?>
                                                <option><?= $row['kabupaten']; ?></option>
                                            <?php endforeach; ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="prov" value="<?= set_value('prov', $guru['prov']); ?>" placeholder="--pilih--" list="prov">
                                        <?= form_error('prov', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <datalist id="prov">
                                            <?php foreach ($l_provinsi as $row) : ?>
                                                <option><?= $row['provinsi']; ?></option>
                                            <?php endforeach; ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kewenegaraan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="negara" value="<?= set_value('negara', $guru['negara']); ?>" placeholder="--pilih--" list="negara">
                                        <?= form_error('negara', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <datalist id="negara">
                                            <?php foreach ($l_negara as $row) : ?>
                                                <option><?= $row['negara']; ?></option>
                                            <?php endforeach; ?>
                                        </datalist>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kode Pos</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="kodepos" value="<?= set_value('kodepos', $guru['kodepos']); ?>">
                                        <?= form_error('kodepos', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">No. Telp / HP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="telp" value="<?= set_value('telp', $guru['telp']); ?>">
                                        <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" value="<?= set_value('email', $guru['email']); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
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