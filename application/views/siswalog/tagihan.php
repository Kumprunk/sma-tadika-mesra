<!-- Main Content Start -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i></a></div>
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>


        <div class="section-body">
            <h2 class="section-title">Keterangan !</h2>
            <p class="section-lead">...</p>

            <div class="card shadow">
                <div class="card-header">
                    <a href="<?= base_url('siswalog/tagihanCetak'); ?>" target="_blank" class="btn btn-outline-primary" title="cetak"><i class="fas fa-print"></i> Cetak</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="datatables3">
                            <thead>
                                <tr>
                                    <th width="4%" class="tetx-center">No</th>
                                    <th>Bulan & Tahun</th>
                                    <th>Jumlah Tagihan (Rp)</th>
                                    <th>Tipe Transaksi</th>
                                    <th><span data-toggle="modal" data-target="#status_kode">Status Kode <i class="fas fa-info-circle"></i></span></th>
                                    <th><i class="fas fa-ellipsis-h"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($tagihan_res as $tagihan) : ?>
                                    <tr>
                                        <td class="tetx-center"><?= $no++; ?>.</td>
                                        <td><a href="<?= base_url('siswalog/detailTagihan/' . $tagihan['id']); ?>"><?= strftime('%B %Y', strtotime($tagihan['bulan'])); ?></a></td>
                                        <td>Rp. <?= number_format($tagihan['jml_tagihan']); ?></td>
                                        <td><?= $tagihan['tipe_transaksi']; ?> <span style="text-transform: uppercase;"><?= $tagihan['bank']; ?></span></td>
                                        <td>
                                            <?php if ($tagihan['status_kode'] == 200) : ?>
                                                <span class="badge badge-success">[200] Success</span>
                                            <?php elseif ($tagihan['status_kode'] == 201) : ?>
                                                <span class="badge badge-warning">[201] Panding</span>
                                            <?php elseif ($tagihan['status_kode'] == 202) : ?>
                                                <span class="badge badge-danger">[202] Failure</span>
                                            <?php elseif ($tagihan['status_kode'] == 1) : ?>
                                                <span class="badge badge-success">[1] Success</span>
                                            <?php elseif ($tagihan['status_kode'] == 0) : ?>
                                                <a href="<?= base_url('siswalog/checkout/' . $tagihan['id']); ?>"><span class="badge badge-secondary">[0] Bayar sekarang</span></a>
                                            <?php else : ?>
                                                <span class="text-danger"><?= $tagihan['status_kode']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <i class="fas fa-ellipsis-h" data-toggle="dropdown" aria-expanded="false"></i>
                                                <div class="dropdown-menu shadow">
                                                    <a href="<?= base_url('siswalog/detailTagihan/' . $tagihan['id']); ?>" class="dropdown-item has-icon "><i class="fas fa-eye"></i> Detail Tagihan</a>
                                                    <?php if ($tagihan['status_kode'] == 201) : ?>
                                                        <a href="<?= $tagihan['pdf_url']; ?>" target="_blank" class="dropdown-item has-icon "><i class="fas fa-download"></i> Panduan Pembayaran</a>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-whitesmoke"></div>
            </div>
        </div>


    </section>
</div>
<!-- Main Content End -->




<!-- Modal status kode -->
<div class="modal fade" id="status_kode" tabindex="-1" aria-labelledby="status_kodeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="status_kodeLabel">Keterangan Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th><span class="badge badge-success">[200] Success</span></th>
                        <th>Transaksi berhasil.</th>
                    </tr>
                    <tr>
                        <th><span class="badge badge-warning">[201] Panding</span></th>
                        <th>Transaksi sedang diproses/menunggu pembayaran.</th>
                    </tr>
                    <tr>
                        <th><span class="badge badge-danger">[202] Failure</span></th>
                        <th>Transaksi gagal.</th>
                    </tr>
                    <tr>
                        <th><span class="badge badge-success">[1] Success</span></th>
                        <th>Transaksi berhasil.</th>
                    </tr>
                    <tr>
                        <th><span class="badge badge-secondary">[0] Belum bayar</span></th>
                        <th>Tagihan belum dibayar.</th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>