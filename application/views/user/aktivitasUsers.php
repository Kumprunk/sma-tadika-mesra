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
                    <a href="<?= base_url('user/aktivitasUsersCetak'); ?>" target="_blank" class="btn btn-outline-primary fas fa-print" title="cetak"> Cetak</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="datatables3">
                            <thead>
                                <tr>
                                    <th class="text-center" width="4%"><input type="checkbox" id="checkAll" value=""></th>
                                    <th class="text-center" width="4%">#</th>
                                    <th>Datetime</th>
                                    <th>Username</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($log_res as $log) : ?>
                                    <tr>
                                        <td class="text-center"><input type="checkbox" class="checkbox" name="checked_id[]" value="<?= $log['id']; ?>"></td>
                                        <td class="text-center"><?= $no++; ?>.</td>
                                        <td><?= date('d-m-Y H:i:s', strtotime($log['datetime'])); ?></td>
                                        <td><?= $log['username']; ?> - <?= $log['nama']; ?></td>
                                        <td><?= $log['keterangan']; ?></td>
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

<script>
    $(document).ready(function() {
        $('#checkAll').on('click', function() {
            if (this.checked) {
                $('.checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.checkbox').each(function() {
                    this.checked = false;
                });
            }
        });

        $('.checkbox').on('click', function() {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
                $('#checkAll').prop('checked', true);
            } else {
                $('#checkAll').prop('checked', false);
            }
        });
    });
</script>