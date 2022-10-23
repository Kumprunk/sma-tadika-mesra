<!-- Main Content Start -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="dropdown">
                <span class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <h1><?= $title2; ?></h1>
                </span>
                <div class="dropdown-menu shadow">
                    <a class="dropdown-item" href="<?= base_url('guru/profilguru/' . $guru['nip']); ?>">Profil guru</a>
                    <a class="dropdown-item" href="<?= base_url('guru/biodataguru/' . $guru['nip']); ?>">Biodata guru</a>
                    <a class="dropdown-item" href="<?= base_url('guru/orangtuaguru/' . $guru['nip']); ?>">Data Orang Tua guru</a>
                    <a class="dropdown-item" href="<?= base_url('guru/transkripnilaiguru/' . $guru['nip']); ?>">Transkrip Nilai guru</a>
                    <a class="dropdown-item" href="<?= base_url('guru/tagihansppguru/' . $guru['nip']); ?>">Tagihan SPP guru</a>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i></a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('guru/data_guruAll'); ?>">Data guru</a></div>
                <div class="breadcrumb-item"><?= $title2; ?></div>
            </div>
        </div>