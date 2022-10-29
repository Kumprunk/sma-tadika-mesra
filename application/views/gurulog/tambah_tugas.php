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
            <p class="section-lead">Tambah Nilai Tugas Siswa</p>

            <div class="card shadow">
                <?= $this->session->flashdata('pesan'); ?>
                    <div class="card-body">
                        <form method="POST" action="<?= base_url('gurulog/update_tugas'); ?>" class="needs-validation" novalidate="" method="post">
                            <!-- biodata -->
                            <div>
                                <div class="alert alert-secondary" role="alert">
                                    <b>NILAI TUGAS</b>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Siswa <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" required name="tugas_1" value="<?= $nilai['nama']?>" readonly>
                                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">NIS <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" required name="tugas_2" value="<?= $nilai['nis']?>" readonly>
                                            <?= form_error('tugas_2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kelas <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" required name="tugas_2" value="<?= $nilai['kd_kelas']?>" readonly>
                                            <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Mata Pelajaran <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" required name="tugas_2" value="<?= $guru['mapel']?>" readonly>
                                            <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Semester</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="smt" value="<?= set_value('smt'); ?>" placeholder="-- pilih --" list="golda">
                                    <datalist id="golda">
                                        <?php foreach ($semester as $r) : ?>
                                            <option><?= $r['semester']; ?></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                    <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nilai Tugas 4 <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" required name="tugas_4" value="">
                                            <?= form_error('tugas_4', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nilai Tugas 5 <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                    <div class="col-sm-10">
                                            <input type="text" class="form-control" required name="tugas_5" value="">
                                            <?= form_error('tugas_5', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
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