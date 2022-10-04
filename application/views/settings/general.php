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
                <div class="card-header">
                    <h4>Example Card</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="#" class="needs-validation" novalidate="">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Favicon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="favicon" value="<?= set_value('favicon', $general['favicon']); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Login Brand</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="login_brand" value="<?= set_value('login_brand', $general['login_brand']); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Kepala Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="nama_kepsek" value="<?= set_value('nama_kepsek', $general['nama_kepsek']); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIP Kepala Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="nip_kepsek" value="<?= set_value('nip_kepsek', $general['nip_kepsek']); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanda Tangan Kepala Sekolah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="tandatangan_kepsek" value="<?= set_value('tandatangan_kepsek', $general['tandatangan_kepsek']); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Logo Kop 1</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="logokop1" value="<?= set_value('logokop1', $general['logokop1']); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Logo Kop 2</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required name="logokop2" value="<?= set_value('logokop2', $general['logokop2']); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kop</label>
                            <div class="col-sm-10">
                                <textarea class="codeeditor" name="kop"><?= set_value('kop', $general['kop']); ?></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer bg-whitesmoke"></div>
            </div>
        </div>


    </section>
</div>
<!-- Main Content End -->