<div class="section-body">
    <h2 class="section-title">Keterangan !</h2>
    <p class="section-lead">...</p>

    <div class="card shadow">
        <div class="card-header">
            <a href="#" class="btn btn-outline-primary mr-1 mb-1"><i class="fas fa-edit"></i> Ubah</a>
        </div>
        <div class="card-body">
            <!-- biodata -->
            <div>
                <div class="alert alert-secondary" role="alert">
                    <b>I. BIODATA</b>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['nama']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['nik']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
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
                    <label class="col-sm-2 col-form-label">Tempat, Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['tmp_lhr']; ?>, <?= strftime('%d %B %Y', strtotime($siswa['tgl_lhr'])); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Golongan Darah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['golda']; ?>">
                    </div>
                </div>
            </div>
            <hr>

            <!-- kesiswaan -->
            <div>
                <div class="alert alert-secondary" role="alert">
                    <b>II. KESISWAAN</b>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['nis']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">NISN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['nisn']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kelas / Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['kelas']; ?> / <?= $siswa['jurusan']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Daftar</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= strftime('%d %B %Y', strtotime($siswa['tgl_daftar'])); ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['status_siswa']; ?>">
                    </div>
                </div>
            </div>
            <hr>

            <!-- kewenegaraan -->
            <div>
                <div class="alert alert-secondary" role="alert">
                    <b>III. KEWENEGARAAN</b>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Agama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['agama']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['alamat']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kelurahan / Desa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['kel']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['kec']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kabupaten / Kota</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['kab']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['prov']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Negara</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['negara']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kode Pos</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['kodepos']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Telp / HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly value="<?= $siswa['telp']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly value="<?= $siswa['email']; ?>">
                    </div>
                </div>
            </div>
            <hr>

            <!-- pendidikan sebelumnya -->
            <div>
                <div class="alert alert-secondary" role="alert">
                    <b>IV. PENDIDIKAN SEBELUMNYA</b>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Asal Sekolah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['asal_sekolah']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nomor SKHU</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['no_skhu']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nomor Ijazah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['no_ijazah']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nilai Ujian Nasional (UN)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['nilai_un']; ?>">
                    </div>
                </div>
            </div>
            <hr>

            <!-- data siswa pindah -->
            <div>
                <div class="alert alert-secondary" role="alert">
                    <b>V. DATA SISWA PINDAHAN</b>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pindah Dari Sekolah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['pindah_dari_sekolah']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tanggal Pindah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['tgl_pindah']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alasan Pindah</label>
                    <div class="col-sm-10">
                        <textarea cols="30" rows="10" class="form-control" readonly><?= $siswa['alasan_pindah']; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-whitesmoke"></div>
    </div>
</div>


</section>
</div>
<!-- Main Content End -->