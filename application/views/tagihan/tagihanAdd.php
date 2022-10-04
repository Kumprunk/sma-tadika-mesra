<!-- Main Content Start -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i></a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('tagihan/data_tagihan'); ?>">Daftar Tagihan</a></div>
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>


        <div class="section-body">
            <h2 class="section-title">Keterangan !</h2>
            <p class="section-lead">...</p>

            <div class="card shadow">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('tagihan/tagihanAdd'); ?>" class="needs-validation" novalidate="">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIS Siswa <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" required name="nis">
                                    <option selected value="">-- pilih --</option>
                                    <?php foreach ($l_siswa as $row) : ?>
                                        <option value="<?= $row['nis']; ?>" <?= set_select('nis', $row['nis']); ?>><?= $row['nis']; ?> - <span style="text-transform: uppercase;"><?= $row['nama']; ?></span></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Bulan Tagihan <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                            <div class="col-sm-10">
                                <input type="month" class="form-control" required name="bulan" value="<?= set_value('bulan'); ?>">
                                <?= form_error('bulan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jumlah Tagihan (Rp) <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="jml_tagihan" value="<?= set_value('jml_tagihan'); ?>" placeholder="500000">
                                <?= form_error('jml_tagihan', '<small class="text-danger pl-3">', '</small>'); ?>
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