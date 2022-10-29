<div class="section-body">
    <h2 class="section-title">Keterangan !</h2>
    <p class="section-lead">Transkrip Nilai berisi informasi nilai hasil studi Siswa mulai dari semester awal sampai dengan semester terakhir Siswa.</p>

    <div class="card shadow">
        <div class="card-header">
            <a href="<?= base_url('gurulog/tambahnilai/'.$siswa['nis']) ?>" class="btn btn-outline-primary mr-1" title="tambah"><i class="fas fa-plus"></i></a>
            <a href="#yourlink" class="btn btn-outline-primary mr-1" title="cetak"><i class="fas fa-print"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead style="text-transform: uppercase;">
                        <tr>
                            <th rowspan="2" style="vertical-align: middle;" class="text-center" width="4%">No</th>
                            <th rowspan="2" style="vertical-align: middle;">Kode</th>
                            <th rowspan="2" style="vertical-align: middle;">Mata Pelajaran</th>
                            <th rowspan="3" style="vertical-align: middle;" class="text-center">Semester</th>
                            <th colspan="3" class="text-center">Nilai</th>
                        </tr>
                        <tr>
                            <th class="text-center">TUGAS</th>
                            <th class="text-center">UTS</th>
                            <th class="text-center">UAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($nilai_res as $nilai) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?>.</td>
                                <td><?= $nilai['kd_mapel']; ?></td>
                                <td><?= $nilai['mapel']; ?></td>
                                <td class="text-center"><?= $nilai['semester']; ?></td>
                                <td class="text-center"><?= $nilai['tugas'];?></th>
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