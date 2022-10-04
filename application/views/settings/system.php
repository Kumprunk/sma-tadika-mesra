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
            <p class="section-lead">Anda harus mengetahui Merchant ID and Server Key anda untuk melakukan integrasi dengan Midtrans.</p>

            <div class="card shadow">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="card-header">
                    <h4>Konfigurasi <a href="https://midtrans.com/" target="_blank">Midtrans</a> (API KEYS)</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?= base_url('settings/system'); ?>" class="needs-validation" novalidate="">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ID Merchant</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="id_merchant" value="<?= set_value('id_merchant', $general['id_merchant']); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Client Key</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="client_key" value="<?= set_value('client_key', $general['client_key']); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Server Key</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="server_key" value="<?= set_value('server_key', $general['server_key']); ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status Midtrans</label>
                            <div class="col-sm-10">
                                <select class="custom-select" required name="url_status">
                                    <option value="<?= $general['url_status']; ?>" <?= set_select('url_midtrans', $general['url_status']); ?>><?= $general['url_status']; ?></option>
                                    <option value="" disabled>-- pilih --</option>
                                    <option value="https://app.midtrans.com/snap/snap.js" <?= set_select('url_status', 'https://app.midtrans.com/snap/snap.js'); ?>>Production</option>
                                    <option value="https://app.sandbox.midtrans.com/snap/snap.js" <?= set_select('url_status', 'https://app.sandbox.midtrans.com/snap/snap.js'); ?>>Sandbox</option>
                                </select>
                                <small class="form-text text-muted">NOTE: Silahkan gunakan Konfigurasi Development Sandbox ketika anda sedang dalam fase testing. Dan anda dapat mengganti ke Konfigurasi Production jika anda sudah mendapatkan persetujuan dari Bank dan siap untuk go live.</small>
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