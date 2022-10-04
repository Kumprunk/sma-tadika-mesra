<!-- Main Content Start -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i></a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('user/data_user'); ?>">Data Pengguna</a></div>
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>


        <div class="section-body">
            <h2 class="section-title">Keterangan !</h2>
            <p class="section-lead">...</p>

            <div class="card shadow">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('user/userAdd'); ?>" class="needs-validation" novalidate="">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Username <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="username" value="<?= set_value('username'); ?>">
                                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" readonly value="(otomatis mengikuti username)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Pengguna <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="nama" value="<?= set_value('nama'); ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Role Akses <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                            <div class="col-sm-10">
                                <select class="custom-select" required name="role_id">
                                    <option selected disabled value="">-- pilih --</option>
                                    <?php foreach ($l_role as $row) : ?>
                                        <option value="<?= $row['id']; ?>" <?= set_select('role_id', $row['id']); ?>><?= $row['role']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status Akun <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                            <div class="col-sm-10">
                                <select class="custom-select" required name="active_id">
                                    <option selected disabled value="">-- pilih --</option>
                                    <?php foreach ($l_active as $row) : ?>
                                        <option value="<?= $row['id']; ?>" <?= set_select('active_id', $row['id']); ?>><?= $row['active']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('active_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        <button type="reset" class="btn btn-danger btn-block">Reset</button>
                    </form>
                </div>
                <div class="card-footer bg-whitesmoke"></div>
            </div>
        </div>


    </section>
</div>
<!-- Main Content End -->