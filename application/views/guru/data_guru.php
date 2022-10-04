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
                    <a href="#your-link" class="btn btn-outline-primary fas fa-user-plus mr-1" title="tambah"></a>
                    <a href="#your-link" class="btn btn-outline-primary fas fa-print mr-1" title="cetak"></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="datatables">
                            <thead>
                                <tr>
                                    <th class="text-center" width="4%"><input type="checkbox" id="checkAll"></th>
                                    <th width="4%" class="text-center">No</th>
                                    <th>Nama Lengkap</th>
                                    <th>L/P</th>
                                    <th>Status & Golongan</th>
                                    <th>No. Telp / HP</th>
                                    <th>Email</th>
                                    <th class="text-center"><i class="fas fa-ellipsis-h"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($guru_res as $guru) : ?>
                                    <tr>
                                        <td class="text-center"><input type="checkbox" id="checkItem"></td>
                                        <td class="text-center"><?= $no++; ?>.</td>
                                        <td>
                                            <li class="media">
                                                <img class="mr-3 rounded-circle" width="50" src="<?= base_url('assets/img/guru/' . $guru['foto']); ?>" alt="img">
                                                <div class="media-body">
                                                    <h6 class="media-title"><a href="#" style="text-transform: uppercase;"><?= $guru['nama']; ?></a></h6>
                                                    <div class="text-small text-muted">NIP. <?= $guru['nip']; ?></div>
                                                </div>
                                            </li>
                                        </td>
                                        <td><?= $guru['jk']; ?></td>
                                        <td><?= $guru['status']; ?> <?= $guru['golongan']; ?></td>
                                        <td><?= $guru['telp']; ?></td>
                                        <td><?= $guru['email']; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <i class="fas fa-ellipsis-h" data-toggle="dropdown" aria-expanded="false"></i>
                                                <div class="dropdown-menu shadow">
                                                    <a href="#" class="dropdown-item has-icon "><i class="fas fa-edit"></i> Edit</a>
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