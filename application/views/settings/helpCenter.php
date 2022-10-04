<!-- Main Content Start -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i></a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('settings/index'); ?>">Settings</a></div>
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>


        <div class="section-body">
            <h2 class="section-title">All About <?= $title; ?></h2>
            <p class="section-lead">...</p>

            <div class="card shadow">
                <?= $this->session->flashdata('pesanFAQ'); ?>
                <div class="card-header">
                    <h4>FAQ</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('settings/helpCenterUpdateFAQ'); ?>">
                        <div class="form-group">
                            <textarea class="codeeditor" name="faq"><?= set_value('faq', $general['faq']); ?></textarea>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                        <button type="reset" class="btn btn-danger btn-block">Reset</button>
                    </form>
                </div>
            </div>

            <div class="card shadow">
                <?= $this->session->flashdata('pesanKontak'); ?>
                <div class="card-header">
                    <h4>Kontak Kami</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('settings/helpCenterUpdateKontak'); ?>">
                        <div class="form-group">
                            <textarea class="codeeditor" name="kontak"><?= set_value('kontak', $general['kontak']); ?></textarea>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                        <button type="reset" class="btn btn-danger btn-block">Reset</button>
                    </form>
                </div>
            </div>


        </div>


    </section>
</div>
<!-- Main Content End -->