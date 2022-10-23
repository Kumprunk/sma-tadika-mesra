<div class="section-body">
    <h2 class="section-title">Keterangan !</h2>
    <p class="section-lead">...</p>

    <div class="card mb-3">
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row no-gutters">
            <div class="col-md-9">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly value="<?= $guru['nip']; ?> ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['nama']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Kealamin</label>
                        <div class="col-sm-10">
                            <?php if ($guru['jk'] == 'L') : ?>
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="Laki-Laki">
                            <?php elseif ($guru['jk'] == 'P') : ?>
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="Perempuan">
                            <?php else : ?>
                                <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['jk']; ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tempat, Tgl Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['tmp_lhr']; ?>, <?= strftime('%d %B %Y', strtotime($guru['tgl_lhr'])); ?>">
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kelas / Jurusan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['kelas']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status guru</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $guru['status']; ?>">
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" style="text-transform: uppercase;" cols="30" rows="10" readonly><?= $guru['alamat'] . ', Kel. ' . $guru['kel'] . ', Kec. ' . $guru['kec'] . ', Kab. ' . $guru['kab'] . '. Provinsi ' . $guru['prov'] . ' - ' . $guru['negara'] . ' ' . $guru['kodepos']; ?></textarea>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-md-3 mt-4 mb-4" align="center">
                <img src="<?= base_url('assets/img/guru/' . $guru['foto']); ?>" class="img-thumbnail" alt="image" style="max-width: 160px; max-height: 300px;"> <br>
                <a href="#" class="fas fa-camera"> [ubah foto]</a>
            </div>
        </div>
    </div>
</div>


</section>
</div>
<!-- Main Content End -->