<!-- Main Content Start -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i></a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('siswalog/tagihan'); ?>">Daftar Tagihan</a></div>
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>


        <div class="section-body">
            <h2 class="section-title">Keterangan !</h2>
            <p class="section-lead">...</p>

            <div class="card shadow">
                <?= $this->session->flashdata('pesan'); ?>

                <div class="card-body">
                    <form id="payment-form" method="POST" action="<?= site_url() ?>/siswalog/checkoutfinish">
                        <input type="hidden" name="result_type" id="result-type" value="">
                        <input type="hidden" name="result_data" id="result-data" value="">

                        <input type="hidden" name="id_tagihan" id="id_tagihan" value="<?= $tagihan['id']; ?>">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>NIS</label>
                                <input type="text" class="form-control" readonly name="nis" id="nis" value="<?= $tagihan['nis']; ?>">
                                <?= form_error('nis', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" readonly name="nama" id="nama" value="<?= $siswa['nama']; ?>" style="text-transform: uppercase;">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Jumlah Tagihan (Rp)</label>
                                <input type="text" class="form-control" readonly name="jml_tagihan" id="jml_tagihan" value="<?= $tagihan['jml_tagihan']; ?>">
                                <?= form_error('jml_tagihan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tagihan Bulan</label>
                                <input type="date" class="form-control" readonly name="bulan" id="bulan" value="<?= $tagihan['bulan']; ?>">
                                <?= form_error('bulan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>No. Telepon / HP <span class="text-secondary" data-toggle="tooltip" data-placement="right" title="Opsional."><i class="far fa-question-circle"></i></span></label>
                                <input type="text" class="form-control" id="telp" name="telp" value="<?= set_value('telp'); ?>">
                                <?= form_error('telp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email <span class="text-secondary" data-toggle="tooltip" data-placement="right" title="Opsional."><i class="far fa-question-circle"></i></span></label>
                                <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Catatan <span class="text-secondary" data-toggle="tooltip" data-placement="right" title="Opsional."><i class="far fa-question-circle"></i></span></label>
                                <textarea class="form-control" rows="3" name="catatan" id="catatan"><?= set_value('catatan'); ?></textarea>
                                <?= form_error('catatan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-primary btn-block float-right" id="pay-button">Bayar Sekarang</button>
                    </form>
                </div>
                <div class="card-footer bg-whitesmoke"></div>
            </div>
        </div>


    </section>
</div>
<!-- Main Content End -->


<script type="text/javascript">
    $('#pay-button').click(function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        var id_tagihan = $("#id_tagihan").val();
        var nis = $("#nis").val();
        var nama = $("#nama").val();
        var jml_tagihan = $("#jml_tagihan").val();
        var bulan = $("#bulan").val();
        var telp = $("#telp").val();
        var email = $("#email").val();
        var catatan = $("#catatan").val();

        $.ajax({
            type: 'POST',
            url: '<?= site_url() ?>/siswalog/checkouttoken',
            data: {
                id_tagihan: id_tagihan,
                nis: nis,
                nama: nama,
                jml_tagihan: jml_tagihan,
                bulan: bulan,
                telp: telp,
                email: email,
                catatan: catatan,
            },
            cache: false,

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>