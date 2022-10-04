<div class="section-body">
    <h2 class="section-title">Keterangan !</h2>
    <p class="section-lead">...</p>

    <div class="card shadow">
        <div class="card-header">
            <a href="#" class="btn btn-outline-primary mr-1 mb-1"><i class="fas fa-edit"></i> Ubah</a>
        </div>
        <div class="card-body">
            <!-- ayah -->
            <div>
                <div class="alert alert-secondary" role="alert">
                    <b>I. DATA AYAH</b>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['nama_ayah']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status Hidup</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['status_ayah']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['pendidikan_ayah']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['pekerjaan_ayah']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penghasilan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['penghasilan_ayah']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Telp / HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly value="<?= $siswa['telp_ayah']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly value="<?= $siswa['email_ayah']; ?>">
                    </div>
                </div>
            </div>
            <hr>

            <!-- ibu -->
            <div>
                <div class="alert alert-secondary" role="alert">
                    <b>II. DATA IBU</b>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['nama_ibu']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status Hidup</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['status_ibu']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['pendidikan_ibu']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['pekerjaan_ibu']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penghasilan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['penghasilan_ibu']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Telp / HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly value="<?= $siswa['telp_ibu']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly value="<?= $siswa['email_ibu']; ?>">
                    </div>
                </div>
            </div>
            <hr>

            <!-- wali -->
            <div>
                <div class="alert alert-secondary" role="alert">
                    <b>III. DATA WALI</b>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['nama_wali']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status Hidup</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['status_wali']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pendidikan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['pendidikan_wali']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['pekerjaan_wali']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Penghasilan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['penghasilan_wali']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">No. Telp / HP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly value="<?= $siswa['telp_wali']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly value="<?= $siswa['email_wali']; ?>">
                    </div>
                </div>
            </div>
            <hr>

            <!-- data orang tua -->
            <div>
                <div class="alert alert-secondary" role="alert">
                    <b>IV. DATA ORANG TUA</b>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['alamat_orangtua']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kelurahan / Desa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['kel_orangtua']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['kec_orangtua']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kabupaten / Kota</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['kab_orangtua']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['prov_orangtua']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Negara</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['negara_orangtua']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Kode Pos</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" readonly style="text-transform: uppercase;" value="<?= $siswa['kodepos_orangtua']; ?>">
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