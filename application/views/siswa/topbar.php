<!-- Main Content Start -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="dropdown">
                <span class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <h1><?= $title2; ?></h1>
                </span>
                <div class="dropdown-menu shadow">
                    <a class="dropdown-item" href="<?= base_url('siswa/profilSiswa/' . $siswa['nis']); ?>">Profil Siswa</a>
                    <a class="dropdown-item" href="<?= base_url('siswa/biodataSiswa/' . $siswa['nis']); ?>">Biodata Siswa</a>
                    <a class="dropdown-item" href="<?= base_url('siswa/orangtuaSiswa/' . $siswa['nis']); ?>">Data Orang Tua Siswa</a>
                    <a class="dropdown-item" href="<?= base_url('siswa/transkripnilaiSiswa/' . $siswa['nis']); ?>">Transkrip Nilai Siswa</a>
                    <a class="dropdown-item" href="<?= base_url('siswa/tagihansppSiswa/' . $siswa['nis']); ?>">Tagihan SPP Siswa</a>
                </div>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i></a></div>
                <div class="breadcrumb-item"><a href="<?= base_url('siswa/data_siswaAll'); ?>">Data Siswa</a></div>
                <div class="breadcrumb-item"><?= $title2; ?></div>
            </div>
        </div>