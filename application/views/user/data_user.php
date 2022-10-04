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
                <?= $this->session->flashdata('pesan'); ?>
                <div class="card-header">
                    <a href="<?= base_url('user/userAdd'); ?>" class="btn btn-outline-primary mr-1 fas fa-user-plus" title="tambah"></a>
                    <a href="<?= base_url('user/data_userCetak'); ?>" target="_blank" class="btn btn-outline-primary mr-1 fas fa-print" title="cetak"></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="datatables">
                            <thead>
                                <tr>
                                    <th class="text-center" width="4%"><input type="checkbox" id="checkAll"></th>
                                    <th width="4%">No</th>
                                    <th>Username</th>
                                    <th>Nama Pengguna</th>
                                    <th>Email</th>
                                    <th>Role Akses</th>
                                    <th>Status Akun</th>
                                    <th>Waktu Terdaftar</th>
                                    <th>Terakhir di Update</th>
                                    <th><i class="fas fa-ellipsis-h"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($user_res as $user) : ?>
                                    <tr>
                                        <td class="text-center"><input type="checkbox" id="checkItem"></td>
                                        <td class="text-center"><?= $no++; ?>.</td>
                                        <td><a href="<?= base_url('user/userProfil/' . $user['username']); ?>"><?= $user['username']; ?></a></td>
                                        <td><?= $user['nama']; ?></td>
                                        <td><?= $user['email']; ?></td>
                                        <td><?= $user['role']; ?></td>
                                        <td><?= $user['active']; ?></td>
                                        <td><?= $user['date_created']; ?></td>
                                        <td><?= $user['date_update']; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <i class="fas fa-ellipsis-h" data-toggle="dropdown" aria-expanded="false"></i>
                                                <div class="dropdown-menu shadow">
                                                    <a href="#resetPassword" class="dropdown-item has-icon" data-toggle="modal" data-target="#reset_password<?= $user['username']; ?>"><i class="fas fa-key"></i> Reset Password</a>
                                                    <a href="#userDelete" class="dropdown-item has-icon text-danger" data-toggle="modal" data-target="#userDelete<?= $user['username']; ?>"><i class="fas fa-trash-alt"></i> Hapus</a>
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



<!-- Modal reset password -->
<?php foreach ($user_res as $user) : ?>
    <div class="modal fade" id="reset_password<?= $user['username']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="reset_passwordLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reset_passwordLabel">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('user/resetPassword/' . $user['username']); ?>">
                    <div class="modal-body">
                        Password akan di reset di default (mengikuti username). Apakah anda yakin?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ya, Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>




<!-- Modal user delete -->
<?php foreach ($user_res as $user) : ?>
    <div class="modal fade" id="userDelete<?= $user['username']; ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="userDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userDeleteLabel">Konfirmasi !</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?= base_url('user/userDelete/' . $user['username']); ?>">
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus pengguna ini <b><?= $user['username'] . ' - ' . $user['nama']; ?></b>?. Ini akan menghapus seluruh data yang berkaitan dengan username ini.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>