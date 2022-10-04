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
                    <a href="<?= base_url('siswalog/transkripNilaiCetak'); ?>" target="_blank" class="btn btn-outline-primary"><i class="fas fa-print"></i> Cetak</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr style="text-transform: uppercase;">
                                    <th rowspan="2" width="4%" style="vertical-align: middle;" class="text-center">No</th>
                                    <th rowspan="2" style="vertical-align: middle;">Kode</th>
                                    <th rowspan="2" style="vertical-align: middle;">Mata Pelajaran</th>
                                    <th rowspan="2" style="vertical-align: middle;" class="text-center">Semester</th>
                                    <th colspan="2" class="text-center">Nilai</th>
                                </tr>
                                <tr>
                                    <th class="text-center">UTS</th>
                                    <th class="text-center">UAS</th>
                                </tr>
                            </tbody>
                            <tbody>
                                <?php $no = 1;
                                foreach ($nilai_res as $nilai) : ?>
                                    <tr>
                                        <td class="text-center"><?= $no++; ?>.</td>
                                        <td><?= $nilai['kd_mapel']; ?></td>
                                        <td><?= $nilai['mapel']; ?></td>
                                        <td class="text-center"><?= $nilai['semester']; ?></td>
                                        <td class="text-center"><?= $nilai['uts']; ?></td>
                                        <td class="text-center"><?= $nilai['uas']; ?></td>
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