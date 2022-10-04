<!-- Main Content Start -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i></a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('siswa/tagihansppSiswa/' . $tagihan['nis']); ?>">Daftar Tagihan SPP</a></div>
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>


        <div class="section-body">
            <h2 class="section-title">Keterangan !</h2>
            <p class="section-lead">...</p>

            <div class="card shadow">
                <div class="card-header">
                    <h4>Tagihan SPP Bulan <?= strftime('%B %Y', strtotime($tagihan['bulan'])); ?></h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('siswa/bayarCash/' . $tagihan['id']); ?>" class="needs-validation" novalidate="">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly name="nis" value="<?= $tagihan['nis']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly name="nama" value="<?= $tagihan['nama']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jumlah Tagihan (Rp)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly name="jml_tagihan" value="Rp. <?= number_format($tagihan['jml_tagihan']); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tagihan Bulan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly name="bulan" value="<?= strftime('%B %Y', strtotime($tagihan['bulan'])); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email (opsional)</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No. Telp / HP (opsional)</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="telp" value="<?= set_value('telp'); ?>">
                                <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Penerima / Admin</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly name="penerima" value="<?= $userLog['username']; ?> - <?= $userLog['nama']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Catatan (opsional)</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="catatan"><?= set_value('catatan'); ?></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Bayar Sekarang</button>
                    </form>
                </div>
                <div class="card-footer bg-whitesmoke"></div>
            </div>
        </div>


    </section>
</div>
<!-- Main Content End -->