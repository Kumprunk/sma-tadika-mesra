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
                    <a href="<?= base_url('siswa/siswaAdd'); ?>" class="btn btn-outline-primary mr-1" title="tambah"><i class="fas fa-user-plus"></i></a>
                    <a href="<?= base_url('siswa/siswaAdd'); ?>" class="btn btn-outline-primary mr-1" title="cetak"><i class="fas fa-print"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="datatables">
                            <thead>
                                <tr>
                                    <th class="text-center" width="4%"><input type="checkbox" id="checkAll"></th>
                                    <th width="4%">No</th>
                                    <th>Nama Lengkap</th>
                                    <th>NISN</th>
                                    <th class="text-center">L/P</th>
                                    <th>Kelas & Jurusan</th>
                                    <th>Status Siswa</th>
                                    <th class="text-center"><i class="fas fa-ellipsis-h"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($siswaRes as $siswa) : ?>
                                    <tr>
                                        <td class="text-center"><input type="checkbox" id="checkItem"></td>
                                        <td><?= $no++; ?>.</td>
                                        <td>
                                            <li class="media">
                                                <img class="mr-3 rounded-circle" width="50" src="<?= base_url('assets/img/siswa/' . $siswa['foto']); ?>" alt="img">
                                                <div class="media-body">
                                                    <h6 class="media-title"><a href="<?= base_url('gurulog/transkip_nilai/' . $siswa['nis']); ?>" style="text-transform: uppercase;"><?= $siswa['nama']; ?></a></h6>
                                                    <div class="text-small text-muted">NIS. <?= $siswa['nis']; ?></div>
                                                </div>
                                            </li>
                                        </td>
                                        <td><?= $siswa['nisn']; ?></td>
                                        <td class="text-center"><?= $siswa['jk']; ?></td>
                                        <td><?= $siswa['kelas']; ?> <?= $siswa['jurusan']; ?></td>
                                        <td><?= $siswa['status_siswa']; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <i class="fas fa-ellipsis-h" data-toggle="dropdown" aria-expanded="false"></i>
                                                <div class="dropdown-menu shadow">
                                                    <a href="#" class="dropdown-item has-icon text-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
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