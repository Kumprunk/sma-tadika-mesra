<!-- Main Content Start -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i></a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('siswalog/orangtua'); ?>">Data Orang Tua</a></div>
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>


        <div class="section-body">
            <h2 class="section-title">Keterangan !</h2>
            <p class="section-lead">Isi data orang tua / wali dengan lengkap dan benar.</p>

            <div class="card shadow">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('siswalog/orangtuaUpdate'); ?>" class="needs-validation" novalidate="">
                        <!-- ayah -->
                        <div>
                            <div class="alert alert-secondary" role="alert">
                                <b>I. DATA AYAH</b>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_ayah" value="<?= set_value('nama_ayah', $siswa['nama_ayah']); ?>">
                                    <?= form_error('nama_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Hidup</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="status_ayah">
                                        <option value="<?= $siswa['status_ayah']; ?>"><?= $siswa['status_ayah']; ?></option>
                                        <option value="" disabled>--pilih--</option>
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
                                    <input type="text" class="form-control" name="pendidikan_ayah" value="<?= set_value('pendidikan_ayah', $siswa['pendidikan_ayah']); ?>" placeholder="--pilih--" list="pendidikan_ayah">
                                    <?= form_error('pendidikan_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <datalist id="pendidikan_ayah">
                                        <?php foreach ($l_pendidikan as $row) : ?>
                                            <option><?= $row['pendidikan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pekerjaan_ayah" value="<?= set_value('pekerjaan_ayah', $siswa['pekerjaan_ayah']); ?>" placeholder="--pilih--" list="pekerjaan_ayah">
                                    <?= form_error('pekerjaan_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <datalist id="pekerjaan_ayah">
                                        <?php foreach ($l_pekerjaan as $row) : ?>
                                            <option><?= $row['pekerjaan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Penghasilan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="penghasilan_ayah" value="<?= set_value('penghasilan_ayah', $siswa['penghasilan_ayah']); ?>" placeholder="--pilih--" list="penghasilan_ayah">
                                    <?= form_error('penghasilan_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <datalist id="penghasilan_ayah">
                                        <?php foreach ($l_penghasilan as $row) : ?>
                                            <option><?= $row['penghasilan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. Telp / HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="telp_ayah" value="<?= set_value('telp_ayah', $siswa['telp_ayah']); ?>">
                                    <?= form_error('telp_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email_ayah" value="<?= set_value('email_ayah', $siswa['email_ayah']); ?>">
                                    <?= form_error('email_ayah', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- ibu -->
                        <div>
                            <div class="alert alert-secondary" role="alert">
                                <b>II. DATA IBU</b>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_ibu" value="<?= set_value('nama_ibu', $siswa['nama_ibu']); ?>">
                                    <?= form_error('nama_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Hidup</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="status_ibu">
                                        <option value="<?= $siswa['status_ibu']; ?>"><?= $siswa['status_ibu']; ?></option>
                                        <option value="" disabled>--pilih--</option>
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
                                    <input type="text" class="form-control" name="pendidikan_ibu" value="<?= set_value('pendidikan_ibu', $siswa['pendidikan_ibu']); ?>" placeholder="--pilih--" list="pendidikan_ibu">
                                    <?= form_error('pendidikan_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <datalist id="pendidikan_ibu">
                                        <?php foreach ($l_pendidikan as $row) : ?>
                                            <option><?= $row['pendidikan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pekerjaan_ibu" value="<?= set_value('pekerjaan_ibu', $siswa['pekerjaan_ibu']); ?>" placeholder="--pilih--" list="pekerjaan_ibu">
                                    <?= form_error('pekerjaan_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <datalist id="pekerjaan_ibu">
                                        <?php foreach ($l_pekerjaan as $row) : ?>
                                            <option><?= $row['pekerjaan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Penghasilan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="penghasilan_ibu" value="<?= set_value('penghasilan_ibu', $siswa['penghasilan_ibu']); ?>" placeholder="--pilih--" list="penghasilan_ibu">
                                    <?= form_error('penghasilan_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <datalist id="penghasilan_ibu">
                                        <?php foreach ($l_penghasilan as $row) : ?>
                                            <option><?= $row['penghasilan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. Telp / HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="telp_ibu" value="<?= set_value('telp_ibu', $siswa['telp_ibu']); ?>">
                                    <?= form_error('telp_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email_ibu" value="<?= set_value('email_ibu', $siswa['email_ibu']); ?>">
                                    <?= form_error('email_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- wali -->
                        <div>
                            <div class="alert alert-secondary" role="alert">
                                <b>III. DATA WALI</b>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_wali" value="<?= set_value('nama_wali', $siswa['nama_wali']); ?>">
                                    <?= form_error('nama_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Hidup</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="status_wali">
                                        <option value="<?= $siswa['status_wali']; ?>"><?= $siswa['status_wali']; ?></option>
                                        <option value="" disabled>--pilih--</option>
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
                                    <input type="text" class="form-control" name="pendidikan_wali" value="<?= set_value('pendidikan_wali', $siswa['pendidikan_wali']); ?>" placeholder="--pilih--" list="pendidikan_wali">
                                    <?= form_error('pendidikan_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <datalist id="pendidikan_wali">
                                        <?php foreach ($l_pendidikan as $row) : ?>
                                            <option><?= $row['pendidikan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Pekerjaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pekerjaan_wali" value="<?= set_value('pekerjaan_wali', $siswa['pekerjaan_wali']); ?>" placeholder="--pilih--" list="pekerjaan_wali">
                                    <?= form_error('pekerjaan_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <datalist id="pekerjaan_wali">
                                        <?php foreach ($l_pekerjaan as $row) : ?>
                                            <option><?= $row['pekerjaan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Penghasilan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="penghasilan_wali" value="<?= set_value('penghasilan_wali', $siswa['penghasilan_wali']); ?>" placeholder="--pilih--" list="penghasilan_wali">
                                    <?= form_error('penghasilan_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <datalist id="penghasilan_wali">
                                        <?php foreach ($l_penghasilan as $row) : ?>
                                            <option><?= $row['penghasilan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No. Telp / HP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="telp_wali" value="<?= set_value('telp_wali', $siswa['telp_wali']); ?>">
                                    <?= form_error('telp_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email_wali" value="<?= set_value('email_wali', $siswa['email_wali']); ?>">
                                    <?= form_error('email_wali', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- data orang tua -->
                        <div>
                            <div class="alert alert-secondary" role="alert">
                                <b>IV. DATA ORANG TUA</b>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamat_orangtua" value="<?= set_value('alamat_orangtua', $siswa['alamat_orangtua']); ?>">
                                    <?= form_error('alamat_orangtua', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kelurahan / Desa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kel_orangtua" value="<?= set_value('kel_orangtua', $siswa['kel_orangtua']); ?>">
                                    <?= form_error('kel_orangtua', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kec_orangtua" value="<?= set_value('kec_orangtua', $siswa['kec_orangtua']); ?>" placeholder="--pilih--" list="kec_orangtua">
                                    <?= form_error('kec_orangtua', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <datalist id="kec_orangtua">
                                        <?php foreach ($l_kecamatan as $row) : ?>
                                            <option><?= $row['kecamatan']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kabupaten / Kota</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kab_orangtua" value="<?= set_value('kab_orangtua', $siswa['kab_orangtua']); ?>" placeholder="--pilih--" list="kab_orangtua">
                                    <?= form_error('kab_orangtua', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <datalist id="kab_orangtua">
                                        <?php foreach ($l_kabupaten as $row) : ?>
                                            <option><?= $row['kabupaten']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="prov_orangtua" value="<?= set_value('prov_orangtua', $siswa['prov_orangtua']); ?>" placeholder="--pilih--" list="prov_orangtua">
                                    <?= form_error('prov_orangtua', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <datalist id="prov_orangtua">
                                        <?php foreach ($l_provinsi as $row) : ?>
                                            <option><?= $row['provinsi']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Negara</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="negara_orangtua" value="<?= set_value('negara_orangtua', $siswa['negara_orangtua']); ?>" placeholder="--pilih--" list="negara_orangtua">
                                    <?= form_error('negara_orangtua', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <datalist id="negara_orangtua">
                                        <?php foreach ($l_negara as $row) : ?>
                                            <option><?= $row['negara']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kodepos_orangtua" value="<?= set_value('kodepos_orangtua', $siswa['kodepos_orangtua']); ?>">
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