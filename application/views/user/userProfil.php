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
                <div class="card-header">
                    <h4>Edit Pengguna</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('user/userProfil/' . $user['username']); ?>" class="needs-validation" novalidate="">
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Username</label>
                                <input type="text" class="form-control" readonly value="<?= $user['username']; ?>">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Nama Pengguna</label>
                                <input type="text" class="form-control" readonly value="<?= $user['nama']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Email</label>
                                <input type="text" class="form-control" readonly value="<?= $user['email']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Role Akses</label>
                                <select class="custom-select" required name="role_id">
                                    <option value="<?= $user['role_id']; ?>"><?= $user['role']; ?></option>
                                    <option value="" disabled>-- pilih --</option>
                                    <?php foreach ($l_role as $row) : ?>
                                        <option value="<?= $row['id']; ?>" <?= set_select('role_id', $row['id']); ?>><?= $row['role']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Status Akun</label>
                                <select class="custom-select" required name="active_id">
                                    <option value="<?= $user['active_id']; ?>"><?= $user['active']; ?></option>
                                    <option value="" disabled>-- pilih --</option>
                                    <?php foreach ($l_active as $row) : ?>
                                        <option value="<?= $row['id']; ?>" <?= set_select('active_id', $row['id']); ?>><?= $row['active']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('active_id', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Waktu Terdaftar</label>
                                <input type="text" class="form-control" readonly value="<?= $user['date_created']; ?>">
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Terakhir di Update</label>
                                <input type="text" class="form-control" readonly value="<?= $user['date_update']; ?>">
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


    </section>
</div>
<!-- Main Content End -->