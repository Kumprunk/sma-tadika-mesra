<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <img src="<?= base_url('assets/img/general/' . $general['login_brand']); ?>" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>

                <div class="card card-primary">
                    <div class="alert alert-warning" role="alert">
                        Fitur untuk versi 1.1.0 belum tersedia.
                    </div>
                    <div class="card-header">
                        <h4>Reset Password</h4>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('pesan'); ?>
                        <form method="POST" action="#" class="needs-validation" novalidate="">
                            <div class="form-group">
                                <label>Password baru <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <input type="password" class="form-control" required autofocus name="pass1" value="<?= set_value('pass1'); ?>">
                                <?= form_error('pass1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi password baru <span class="text-danger" data-toggle="tooltip" data-placement="right" title="wajib diisi.">*</span></label>
                                <input type="password" class="form-control" required autofocus name="pass2" value="<?= set_value('pass2'); ?>">
                                <?= form_error('pass2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<!-- General JS Scripts -->
<script src="<?= base_url('assets/'); ?>modules/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/popper.js"></script>
<script src="<?= base_url('assets/'); ?>modules/tooltip.js"></script>
<script src="<?= base_url('assets/'); ?>modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= base_url('assets/'); ?>modules/moment.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
<script src="<?= base_url('assets/'); ?>js/custom.js"></script>
</body>

</html>