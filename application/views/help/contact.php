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
            <h2 class="section-title">Hubungi Kami</h2>
            <p class="section-lead">Kami siap membantu kapan pun dan dimana pun. Silahkan hubungi kami kapan pun melalui.</p>

            <div class="row">
                <?= $general['kontak']; ?>
            </div>
        </div>


    </section>
</div>
<!-- Main Content End -->