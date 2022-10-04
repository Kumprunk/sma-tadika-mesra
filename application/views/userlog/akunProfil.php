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

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card shadow">
                        <?= $this->session->flashdata('pesan1'); ?>
                        <div class="card-header">
                            <h4>Edit Akun Profil</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= base_url('userlog/akunProfil'); ?>" class="needs-validation" novalidate="">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Username</label>
                                        <input type="text" class="form-control" readonly name="username" value="<?= $userLog['username']; ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Nama Pengguna <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                        <input type="text" class="form-control" required name="nama" value="<?= set_value('nama', $userLog['nama']); ?>">
                                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="<?= set_value('email', $userLog['email']); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Waktu Terdaftar</label>
                                        <input type="text" class="form-control" readonly value="<?= $userLog['date_created']; ?>">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Waktu Update</label>
                                        <input type="text" class="form-control" readonly value="<?= $userLog['date_update']; ?>">
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                                <button type="reset" class="btn btn-danger btn-block">Reset</button>
                            </form>
                        </div>
                        <div class="card-footer bg-whitesmoke"></div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card shadow">
                        <?= $this->session->flashdata('pesan2'); ?>
                        <div class="card-header">
                            <h4>Ubah Password</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?= base_url('userlog/ubahPassword'); ?>" class="needs-validation" novalidate="">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password Lama <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" required name="pass1">
                                        <?= form_error('pass1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password Baru <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" required name="pass2">
                                        <?= form_error('pass2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ulangi Password <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" required name="pass3">
                                        <?= form_error('pass3', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <hr>
                                <button type="submit" class="btn btn-primary btn-block">Ubah Password</button>
                                <button type="reset" class="btn btn-danger btn-block">Reset</button>
                            </form>
                        </div>
                        <div class="card-footer bg-whitesmoke"></div>
                    </div>
                </div>
            </div>


        </div>


    </section>
</div>
<!-- Main Content End -->