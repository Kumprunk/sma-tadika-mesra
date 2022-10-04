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
            <h2 class="section-title">Overview</h2>
            <p class="section-lead">
                Atur dan sesuaikan semua pengaturan tentang situs ini.
            </p>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="card-body">
                            <h4>General</h4>
                            <p>Pengaturan umum seperti, judul situs, deskripsi situs, alamat dan sebagainya.</p>
                            <a href="<?= base_url('settings/general'); ?>" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-cog"></i>
                        </div>
                        <div class="card-body">
                            <h4>Pusat Bantuan</h4>
                            <p>Pengaturan umum seperti, FAQ, Kontak Kami dan sebagainya.</p>
                            <a href="<?= base_url('settings/helpCenter'); ?>" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-power-off"></i>
                        </div>
                        <div class="card-body">
                            <h4>System</h4>
                            <p>Pengaturan midtrans untuk transaksi dan lingkungan lainnya.</p>
                            <a href="<?= base_url('settings/system'); ?>" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="card-body">
                            <h4>Email</h4>
                            <p>Setting email SMTP berhubungan dengan email seperti reset password dan lainnya.</p>
                            <a href="<?= base_url('settings/email'); ?>" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="card-body">
                            <h4>SEO</h4>
                            <p>Pengaturan optimasi mesin pencari, seperti meta tag dan media sosial.</p>
                            <a href="<?= base_url('settings/seo'); ?>" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="card-body">
                            <h4>Security</h4>
                            <p>Pengaturan keamanan seperti firewall, akun server dan lain-lain.</p>
                            <a href="<?= base_url('settings/security'); ?>" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            <i class="fas fa-stopwatch"></i>
                        </div>
                        <div class="card-body">
                            <h4>Automation</h4>
                            <p>Pengaturan tentang otomatisasi seperti cron job, otomatisasi backup dan sebagainya.</p>
                            <a href="<?= base_url('settings/automation'); ?>" class="card-cta text-primary">Change Setting <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
</div>
<!-- Main Content End -->