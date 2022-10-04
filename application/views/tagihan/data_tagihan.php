<!-- Main Content Start -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i></a></div>
                <!-- <div class="breadcrumb-item"><a href="<?= base_url(''); ?>">Layout</a></div> -->
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>


        <div class="section-body">
            <h2 class="section-title">Keterangan !</h2>
            <p class="section-lead">...</p>

            <div class="card shadow">
                <div class="card-header">
                    <a href="<?= base_url('tagihan/tagihanAdd'); ?>" class="btn btn-outline-primary mr-1 fas fa-plus" title="tagihan baru"></a>
                    <a href="#your-link" class="btn btn-outline-primary mr-1 fas fa-print" title="cetak"></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="datatables3">
                            <thead>
                                <tr>
                                    <th class="text-center" width="4%"><input type="checkbox" id="checkAll"></th>
                                    <th width="4%" class="text-center">No</th>
                                    <th>NIS - Nama Lengkap</th>
                                    <th>Bulan</th>
                                    <th>Jumlah Tagihan</th>
                                    <th>Tipe Transaksi</th>
                                    <th>Status</th>
                                    <th class="text-center"><i class="fas fa-ellipsis-h"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($tagihan_res as $tagihan) : ?>
                                    <tr>
                                        <td class="text-center"><input type="checkbox" id="checkItem"></td>
                                        <td class="text-center"><?= $no++; ?></td>
                                        <td><?= $tagihan['nis']; ?> - <?= $tagihan['nama']; ?></td>
                                        <td><a href="<?= base_url('tagihan/tagihanDetail/' . $tagihan['id']); ?>"><?= strftime('%B %Y', strtotime($tagihan['bulan'])); ?></a></td>
                                        <td>Rp. <?= number_format($tagihan['jml_tagihan']); ?></td>
                                        <td><?= $tagihan['tipe_transaksi']; ?> <span style="text-transform: uppercase;"><?= $tagihan['bank']; ?></span></td>
                                        <td>
                                            <?php if ($tagihan['status_kode'] == 200) : ?>
                                                <span class="badge badge-success">[200] Success</span>
                                            <?php elseif ($tagihan['status_kode'] == 201) : ?>
                                                <span class="badge badge-warning">[201] Pending</span>
                                            <?php elseif ($tagihan['status_kode'] == 202) : ?>
                                                <span class="badge badge-danger">[202] Failure</span>
                                            <?php elseif ($tagihan['status_kode'] == 1) : ?>
                                                <span class="badge badge-success">[1] Success</span>
                                            <?php elseif ($tagihan['status_kode'] == 0) : ?>
                                                <a href="#yourlink"><span class="badge badge-secondary">[0] Bayar Sekarang</span></a>
                                            <?php else : ?>
                                                <?= $tagihan['status_kode']; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <i class="fas fa-ellipsis-h" data-toggle="dropdown" aria-expanded="false"></i>
                                                <div class="dropdown-menu shadow">
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