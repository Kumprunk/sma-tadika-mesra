<div class="section-body">
    <h2 class="section-title">Keterangan !</h2>
    <p class="section-lead">...</p>

    <div class="card mb-3">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row no-gutters">
            <div class="col-md-9">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIS / NISN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly value="<?= $siswa['nis']; ?> / <?= $siswa['nisn']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['nama']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Kealamin</label>
                        <div class="col-sm-10">
                            <?php if ($siswa['jk'] == 'L') : ?>
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="Laki-Laki">
                            <?php elseif ($siswa['jk'] == 'P') : ?>
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="Perempuan">
                            <?php else : ?>
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['jk']; ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tempat, Tgl Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['tmp_lhr']; ?>, <?= strftime('%d %B %Y', strtotime($siswa['tgl_lhr'])); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kelas / Jurusan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['kelas']; ?> <?= $siswa['jurusan']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status Siswa</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['status_siswa']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="text-transform: uppercase;" cols="30" rows="10" readonly><?= $siswa['alamat'] . ', Kel. ' . $siswa['kel'] . ', Kec. ' . $siswa['kec'] . ', Kab. ' . $siswa['kab'] . '. Provinsi ' . $siswa['prov'] . ' - ' . $siswa['negara'] . ' ' . $siswa['kodepos']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-4 mb-4" align="center">
                <img src="<?= base_url('assets/img/siswa/' . $siswa['foto']); ?>" class="img-thumbnail" alt="image" style="max-width: 160px; max-height: 300px;"> <br>
                <a href="#" class="fas fa-camera"> [ubah foto]</a>
            </div>
        </div>
    </div>
</div>


</section>
</div>
<!-- Main Content End -->