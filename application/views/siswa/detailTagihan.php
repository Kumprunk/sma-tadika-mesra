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

            <?= $this->session->flashdata('pesan'); ?>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1  shadow">
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Order ID</h4>
                            </div>
                            <div class="card-body mb-3">
                                <?php if ($tagihan['order_id'] == NULL) : ?>
                                    -
                                <?php else : ?>
                                    <?= $tagihan['order_id']; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1  shadow">
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah</h4>
                            </div>
                            <div class="card-body mb-3">
                                Rp. <?= number_format($tagihan['jumlah']); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1  shadow">
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Tipe Transaksi</h4>
                            </div>
                            <div class="card-body mb-3">
                                <?php if ($tagihan['tipe_transaksi'] == NULL) : ?>
                                    -
                                <?php else : ?>
                                    <?= $tagihan['tipe_transaksi']; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1  shadow">
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Status Tagihan</h4>
                            </div>
                            <div class="card-body mb-3">
                                <?php if ($tagihan['status_kode'] == 200) : ?>
                                    <span class="badge badge-success">[200] Success</span>
                                <?php elseif ($tagihan['status_kode'] == 201) : ?>
                                    <span class="badge badge-warning">[201] Panding</span>
                                <?php elseif ($tagihan['status_kode'] == 202) : ?>
                                    <span class="badge badge-danger">[202] Failure</span>
                                <?php elseif ($tagihan['status_kode'] == 1) : ?>
                                    <span class="badge badge-success">[1] Success</span>
                                <?php elseif ($tagihan['status_kode'] == 0) : ?>
                                    <span class="badge badge-secondary">[0] Bayar sekarang</span>
                                <?php else : ?>
                                    <span class="text-danger"><?= $tagihan['status_kode']; ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <!-- Detail Order -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4>Detail Order</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Order ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="<?= $tagihan['order_id']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tipe Transaksi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="<?= $tagihan['tipe_transaksi']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Payment Link</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="-">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Jumlah</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="RP. <?= number_format($tagihan['jumlah']); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Transaksi ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="<?= $tagihan['transaksi_id']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Waktu Transaksi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="<?= $tagihan['wkt_transaksi']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status Transaksi</label>
                                <div class="col-sm-9">
                                    <?php if ($tagihan['status_kode'] == 200) : ?>
                                        <input type="text" class="form-control" readonly value="[200] Success">
                                    <?php elseif ($tagihan['status_kode'] == 201) : ?>
                                        <input type="text" class="form-control" readonly value="[201] Panding">
                                    <?php elseif ($tagihan['status_kode'] == 202) : ?>
                                        <input type="text" class="form-control" readonly value="[202] Failure">
                                    <?php elseif ($tagihan['status_kode'] == 1) : ?>
                                        <input type="text" class="form-control" readonly value="[1] Success">
                                    <?php elseif ($tagihan['status_kode'] == 0) : ?>
                                        <input type="text" class="form-control" readonly value="[0] Belum bayar">
                                    <?php else : ?>
                                        <input type="text" class="form-control" readonly value="<?= $tagihan['status_kode']; ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke"></div>
                    </div>
                </div>
                <!-- Detail Pemabayaran -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4>Detail Pemabayaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Virtual Account</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="<?= $tagihan['va_numbers']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Acquiring / Bank</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="<?= $tagihan['bank']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Biller Code</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="<?= $tagihan['biller_code']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Reference ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="-">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Waktu Kadaluarsa</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="<?= $tagihan['wkt_kadaluarsa']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tagihan Bulanan (SPP)</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="<?= strftime('%B %Y', strtotime($tagihan['bulan'])); ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Penerima</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="<?= $tagihan['penerima']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke"></div>
                    </div>
                </div>
            </div>


            <div class="row">
                <!-- Detail Pelanggan -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4>Detail Pelanggan</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="<?= $tagihan['nis']; ?> - <?= $tagihan['nama']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">No. Telp / HP</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="<?= $tagihan['telp']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" readonly value="<?= $tagihan['email']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Catatan</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" readonly><?= $tagihan['catatan']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke"></div>
                    </div>
                </div>
            </div>


        </div>


    </section>
</div>
<!-- Main Content End -->