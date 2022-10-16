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
                                <label class="col-sm-2 col-form-label">Nama Lengkap <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="nama" value="<?= set_value('nama'); ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NIP <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="nip" value="<?= set_value('nip'); ?>">
                                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
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
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Status Guru <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-control" required name="status">
                                        <option selected disabled value="">-- pilih --</option>
                                        <?php foreach ($status_guru as $r) : ?>
                                            <option value="<?= $r['id']; ?>" <?= set_select('status', $r['status']); ?>><?= $r['status']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('kd_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                    <?= form_error('kd_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
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