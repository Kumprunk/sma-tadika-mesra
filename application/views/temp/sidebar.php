<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url('dashboard/index'); ?>">SMA Tadika Mesra</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('dashboard/index'); ?>">TM</a>
        </div>
        <ul class="sidebar-menu">

            <?php if ($userLog['role_id'] == 1) : ?>
                <li class="menu-header">Dashboard</li>
                <li><a class="nav-link" href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li><a class="nav-link" href="<?= base_url('dashboard/blank_page'); ?>"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
                <li class="menu-header">Data Master</li>
                <li><a class="nav-link" href="<?= base_url('siswa/data_siswaAll'); ?>"><i class="fas fa-user-graduate"></i> <span>Siswa</span></a></li>
                <li><a class="nav-link" href="<?= base_url('guru/data_guru'); ?>"><i class="fas fa-user-tie"></i> <span>Guru</span></a></li>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-users"></i> <span>Users</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?= base_url('user/data_user'); ?>">Data Users</a></li>
                        <li><a class="nav-link" href="<?= base_url('user/aktivitasUsers'); ?>">Aktivitas Users</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="<?= base_url('kajur/data_kajur'); ?>"><i class="fas fa-server"></i> <span>Kelas & Jurusan</span></a></li>
                <li><a class="nav-link" href="<?= base_url('mapel/data_mapel'); ?>"><i class="fas fa-server"></i> <span>Mata Pelajaran</span></a></li>
                <!-- <li><a class="nav-link" href="<?= base_url('tagihan/data_tagihan'); ?>"><i class="fas fa-hand-holding-usd"></i> <span>Tagihan</span></a></li> -->
                <li class="menu-header">Web App Settings</li>
                <li><a class="nav-link" href="<?= base_url('settings/index'); ?>"><i class="fas fa-cog"></i> <span>Settings</span></a></li>
                <li class="menu-header">Pengaturan Akun</li>
                <li><a class="nav-link" href="<?= base_url('userlog/akunProfil'); ?>"><i class="fas fa-user-cog"></i> <span>Akun Profil</span></a></li>
                <li><a class="nav-link" href="<?= base_url('userlog/logAktivitas'); ?>"><i class="fas fa-bolt"></i> <span>Log Aktivitas</span></a></li>
                <li class="menu-header">Pusat Bantuan</li>
                <li><a class="nav-link" href="<?= base_url('help/faq'); ?>"><i class="far fa-square"></i> <span>FAQ</span></a></li>
                <li><a class="nav-link" href="<?= base_url('help/contact'); ?>"><i class="far fa-square"></i> <span>Kontak Kami</span></a></li>
            <?php elseif ($userLog['role_id'] == 2) : ?>
                <li class="menu-header">Dashboard</li>
                <li><a class="nav-link" href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li class="menu-header">Data Master</li>
                <li><a class="nav-link" href="<?= base_url('siswa/data_siswaAll'); ?>"><i class="fas fa-user-graduate"></i> <span>Siswa</span></a></li>
                <li><a class="nav-link" href="<?= base_url('guru/data_guru'); ?>"><i class="fas fa-user-tie"></i> <span>Guru</span></a></li>
                <li><a class="nav-link" href="<?= base_url('kajur/data_kajur'); ?>"><i class="fas fa-server"></i> <span>Kelas & Jurusan</span></a></li>
                <li><a class="nav-link" href="<?= base_url('mapel/data_mapel'); ?>"><i class="fas fa-server"></i> <span>Mata Pelajaran</span></a></li>
                <!-- <li><a class="nav-link" href="<?= base_url('tagihan/data_tagihan'); ?>"><i class="fas fa-hand-holding-usd"></i> <span>Tagihan</span></a></li> -->
                <li class="menu-header">Pengaturan Akun</li>
                <li><a class="nav-link" href="<?= base_url('userlog/akunProfil'); ?>"><i class="fas fa-user-cog"></i> <span>Akun Profil</span></a></li>
                <li><a class="nav-link" href="<?= base_url('userlog/logAktivitas'); ?>"><i class="fas fa-bolt"></i> <span>Log Aktivitas</span></a></li>
                <li class="menu-header">Pusat Bantuan</li>
                <li><a class="nav-link" href="<?= base_url('help/faq'); ?>"><i class="far fa-square"></i> <span>FAQ</span></a></li>
                <li><a class="nav-link" href="<?= base_url('help/contact'); ?>"><i class="far fa-square"></i> <span>Kontak Kami</span></a></li>
            <?php elseif ($userLog['role_id'] == 3) : ?>
                <li class="menu-header">Dashboard</li>
                <li><a class="nav-link" href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li class="menu-header">Siswa</li>
                <li><a class="nav-link" href="<?= base_url('siswalog/profil'); ?>"><i class="fas fa-user-graduate"></i> <span>Profil</span></a></li>
                <li><a class="nav-link" href="<?= base_url('siswalog/biodata'); ?>"><i class="fas fa-receipt"></i> <span>Biodata</span></a></li>
                <li><a class="nav-link" href="<?= base_url('siswalog/orangtua'); ?>"><i class="fas fa-receipt"></i> <span>Data Orang Tua</span></a></li>
                <li><a class="nav-link" href="<?= base_url('siswalog/transkripnilai'); ?>"><i class="fas fa-list"></i> <span>Transkrip Nilai</span></a></li>
                <!-- <li><a class="nav-link" href="<?= base_url('siswalog/tagihan'); ?>"><i class="fas fa-hand-holding-usd"></i> <span>Tagihan SPP</span></a></li> -->
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-print"></i> <span>Cetak</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?= base_url('siswalog/skaktifCetak'); ?>" target="_blank">Surat Keterangan Aktif</a></li>
                    </ul>
                </li>
                <li class="menu-header">Pengaturan Akun</li>
                <li><a class="nav-link" href="<?= base_url('userlog/akunProfil'); ?>"><i class="fas fa-user-cog"></i> <span>Akun Profil</span></a></li>
                <li><a class="nav-link" href="<?= base_url('userlog/logAktivitas'); ?>"><i class="fas fa-bolt"></i> <span>Log Aktivitas</span></a></li>
                <li class="menu-header">Pusat Bantuan</li>
                <li><a class="nav-link" href="<?= base_url('help/faq'); ?>"><i class="far fa-square"></i> <span>FAQ</span></a></li>
                <li><a class="nav-link" href="<?= base_url('help/contact'); ?>"><i class="far fa-square"></i> <span>Kontak Kami</span></a></li>
            <?php elseif ($userLog['role_id'] == 4) : ?>
                <li class="menu-header">Dashboard</li>
                <li><a class="nav-link" href="<?= base_url('dashboard/index'); ?>"><i class="fas fa-home"></i> <span>Dashboard</span></a></li>
                <li class="menu-header">Guru</li>
                <li><a class="nav-link" href="<?= base_url('gurulog/profil'); ?>"><i class="fas fa-user-graduate"></i> <span>Profil Guru</span></a></li>
                <li><a class="nav-link" href="<?= base_url('siswalog/biodata'); ?>"><i class="fas fa-receipt"></i> <span>Biodata</span></a></li>
                <!-- <li><a class="nav-link" href="<?= base_url('siswalog/orangtua'); ?>"><i class="fas fa-receipt"></i> <span>Data Orang Tua</span></a></li>
                <li><a class="nav-link" href="<?= base_url('siswalog/transkripnilai'); ?>"><i class="fas fa-list"></i> <span>Transkrip Nilai</span></a></li>
                 -->
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-print"></i> <span>Cetak</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="<?= base_url('gurulog/skaktifCetak'); ?>" target="_blank">Surat Keterangan Aktif</a></li>
                    </ul>
                </li>
                <li class="menu-header">Pengaturan Akun</li>
                <li><a class="nav-link" href="<?= base_url('userlog/akunProfil'); ?>"><i class="fas fa-user-cog"></i> <span>Akun Profil</span></a></li>
                <li><a class="nav-link" href="<?= base_url('userlog/logAktivitas'); ?>"><i class="fas fa-bolt"></i> <span>Log Aktivitas</span></a></li>
                <li class="menu-header">Pusat Bantuan</li>
                <li><a class="nav-link" href="<?= base_url('help/faq'); ?>"><i class="far fa-square"></i> <span>FAQ</span></a></li>
                <li><a class="nav-link" href="<?= base_url('help/contact'); ?>"><i class="far fa-square"></i> <span>Kontak Kami</span></a></li>
            <?php endif; ?>
            

        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="<?= base_url('login/logout'); ?>" class="btn btn-danger btn-lg btn-block btn-icon-split">
                <i class="fas fa-power-off"></i> Logout
            </a>
        </div>
    </aside>
</div>