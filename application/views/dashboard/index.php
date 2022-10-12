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

        <h2 class="section-title">Selamat Datang <span style="text-transform: uppercase;"><?= $userLog['nama']; ?></span> !</h2>
        <p class="section-lead">
            <?php if ($userLog['email'] == NULL) : ?>
                Email belum terdaftar! satu langkah lagi untuk melengkapi data akun Anda <a href="<?= base_url('userlog/akunProfil'); ?>">disini</a>.
            <?php else : ?>
                Web App adalah sistem yang memungkinkan para aktifitas akademik untuk menerima informasi dengan lebih cepat melalui Internet. Sistem ini diharapkan dapat memberi kemudahan setipa citivas akademika untuk melakukan aktivitas-aktivitas akademik dan proses belajar mengajar. Selamat menggunakan fasilitas ini.
            <?php endif; ?>
        </p>



        <?php if ($userLog['role_id'] == 1) : ?>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Siswa</h4>
                            </div>
                            <div class="card-body">
                                <?= $jumlah_siswa; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Guru</h4>
                            </div>
                            <div class="card-body">
                                <?= $jumlah_guru; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Users</h4>
                            </div>
                            <div class="card-body">
                                <?= $jumlah_users; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow">
                        <div class="card-icon bg-success">
                            <i class="fas fa-server"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Kelas & Jurusan</h4>
                            </div>
                            <div class="card-body">
                                <?= $jumlah_kelas; ?> / <?= $jumlah_jurusan; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4>Statistics</h4>
                            <div class="card-header-action">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Week</a>
                                    <a href="#" class="btn">Month</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="182"></canvas>
                            <div class="statistic-details mt-sm-4">
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                                    <div class="detail-value">$243</div>
                                    <div class="detail-name">Today's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                                    <div class="detail-value">$2,902</div>
                                    <div class="detail-name">This Week's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                                    <div class="detail-value">$12,821</div>
                                    <div class="detail-name">This Month's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                                    <div class="detail-value">$92,142</div>
                                    <div class="detail-name">This Year's Sales</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        <?php elseif ($userLog['role_id'] == 2) : ?>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Siswa</h4>
                            </div>
                            <div class="card-body">
                                <?= $jumlah_siswa; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Guru</h4>
                            </div>
                            <div class="card-body">
                                <?= $jumlah_guru; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Jumlah Users</h4>
                            </div>
                            <div class="card-body">
                                <?= $jumlah_users; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1 shadow">
                        <div class="card-icon bg-success">
                            <i class="fas fa-server"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Kelas & Jurusan</h4>
                            </div>
                            <div class="card-body">
                                <?= $jumlah_kelas; ?> / <?= $jumlah_jurusan; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row">
                <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4>Statistics</h4>
                            <div class="card-header-action">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary">Week</a>
                                    <a href="#" class="btn">Month</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="182"></canvas>
                            <div class="statistic-details mt-sm-4">
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                                    <div class="detail-value">$243</div>
                                    <div class="detail-name">Today's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                                    <div class="detail-value">$2,902</div>
                                    <div class="detail-name">This Week's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                                    <div class="detail-value">$12,821</div>
                                    <div class="detail-name">This Month's Sales</div>
                                </div>
                                <div class="statistic-details-item">
                                    <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                                    <div class="detail-value">$92,142</div>
                                    <div class="detail-name">This Year's Sales</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

        <?php elseif ($userLog['role_id'] == 3) : ?>
            <div class="section-body">
                <div class="card shadow">
                    <div class="card-header">
                        <h4>Selamat Datang Di Tadika Mesra</h4>
                    </div>
                    <div class="card-body">
                        <p>Sebagai lembaga pendidikan, SMA Negeri Tadika Mesra tanggap dengan perkembangan teknologi tersebut. 
                        Dengan dukungan SDM yang di miliki sekolah ini siap untuk berkompetisi dengan sekolah lain dalam 
                        pelayanan informasi publik. Teknologi Informasi Web khususnya, menjadi sarana bagi SMA Negeri Tadika Mesra 
                        untuk memberi pelayanan informasi secara cepat, jelas, dan akurat. Dari layanan ini pula, sekolah siap 
                        memberikan para siswa untuk menggunakan teknologi sejak dini.
                        </p>
                    </div>
                    <div class="card-footer bg-whitesmoke"></div>
                </div>
            </div>

        <?php endif; ?>







    </section>
</div>
<!-- Main Content End -->