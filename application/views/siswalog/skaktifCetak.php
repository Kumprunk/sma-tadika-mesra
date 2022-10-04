<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
</head>

<body style="font-family: 'Times New Roman', Times, serif; font-size: 10pt; padding: 5px;">
    <center>


        <!-- kop -->
        <table style="width: 210mm; font-family:'Times New Roman', Times, serif">
            <tr>
                <td width="13%" align="left"><img src="<?= base_url('assets/img/general/' . $general['logokop1']); ?>" style="width: 90px; height: 90px;"></td>
                <td>
                    <?= $general['kop']; ?>
                </td>
                <td width="13%" align="right"><img src="<?= base_url('assets/img/general/' . $general['logokop2']); ?>" style="width: 90px; height: 90px;"></td>
            </tr>
            <tr>
                <td colspan="3">
                    <b>
                        <hr>
                    </b>
                </td>
            </tr>
        </table>


        <!-- Judul -->
        <table style="text-align: center; width: 200mm;" align="center">
            <tr>
                <td>
                    <b style="text-transform: uppercase; font-size: 12pt;"><u>Surat Keterangan Aktif</u></b><br>
                </td>
            </tr>
        </table>
        <br>


        <!-- Main Content Start -->
        <p>Yang bertanda tangan dibawah ini Kepala Sekolah <b>SMA MA'ARIF KETAPANG</b> menerangkan bahwa siswa berikut ini:</p>
        <table style="border-collapse: collapse; font-size: 10pt; padding: 5px; width: 200mm;">
            <tr>
                <td width="22%">Nama Lengkap</td>
                <td width="1%">:</td>
                <td align="left" style="text-transform: uppercase;"><?= $siswa['nama']; ?></td>
            </tr>
            <tr>
                <td width="22%">NIS / NISN</td>
                <td width="1%">:</td>
                <td align="left"><?= $siswa['nis']; ?> / <?= $siswa['nisn']; ?></td>
            </tr>
            <tr>
                <td width="22%">Jenis Kalamin</td>
                <td width="1%">:</td>
                <td align="left" style="text-transform: uppercase;">
                    <?php if ($siswa['jk'] == 'L') : ?>
                        Laki-Laki
                    <?php elseif ($siswa['jk'] == 'P') : ?>
                        Perempuan
                    <?php else : ?>
                        <?= $siswa['jk']; ?>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td width="22%">Tempat, Tanggal Lahir</td>
                <td width="1%">:</td>
                <td align="left" style="text-transform: uppercase;"><?= $siswa['tmp_lhr']; ?>, <?= strftime('%d %B %Y', strtotime($siswa['tgl_lhr'])); ?></td>
            </tr>
            <tr>
                <td width="22%">Kelas / Jurusan</td>
                <td width="1%">:</td>
                <td align="left" style="text-transform: uppercase;"><?= $siswa['kelas']; ?> / <?= $siswa['jurusan']; ?></td>
            </tr>
            <tr>
                <td width="22%" style="vertical-align: top;">Alamat</td>
                <td width="1%" style="vertical-align: top;">:</td>
                <td align="left" style="text-transform: uppercase;"><?= $siswa['alamat']; ?>, Kel. <?= $siswa['kel']; ?>, Kec. <?= $siswa['kec']; ?>, Kab. <?= $siswa['kab']; ?> - <?= $siswa['prov']; ?></td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td width="22%">Nama Ayah</td>
                <td width="1%">:</td>
                <td align="left" style="text-transform: uppercase;"><?= $siswa['nama_ayah']; ?></td>
            </tr>
            <tr>
                <td width="22%">Pekerjaan</td>
                <td width="1%">:</td>
                <td align="left" style="text-transform: uppercase;"><?= $siswa['pekerjaan_ayah']; ?></td>
            </tr>
            <tr>
                <td width="22%" style="vertical-align: top;">Alamat Orang Tua</td>
                <td width="1%" style="vertical-align: top;">:</td>
                <td align="left" style="text-transform: uppercase;"><?= $siswa['alamat_orangtua']; ?>, Kel. <?= $siswa['kel_orangtua']; ?>, Kec. <?= $siswa['kec_orangtua']; ?>, Kab. <?= $siswa['kab_orangtua']; ?> - <?= $siswa['prov_orangtua']; ?></td>
            </tr>
        </table>
        <br>

        <!-- Main Content End -->



        <!-- Footer Start -->
        <br><br><br><br>
        <!-- tanda tangan -->
        <table style="border-collapse: collapse; font-size: 10pt; padding: 5px; width: 200mm;">
            <tr>
                <td width="67%"> </td>
                <td style="text-align: left;">
                    Ketapang, <?= strftime('%d %B %Y'); ?><br>
                    Kepala Sekolah SMA Ma'Arif
                </td>
                <br><br>
            </tr>
            <tr>
                <td width="67%"> </td>
                <td style="text-align: left;"><img src="<?= base_url('assets/img/general/' . $general['tandatangan_kepsek']); ?>" style="width: 145px; height: 70px;"></td>
            </tr>
            <tr>
                <td width="67%"> </td>
                <td style="text-align: left;">
                    <u><?= $general['nama_kepsek']; ?></u>
                    <br>
                    NIP. <?= $general['nip_kepsek']; ?>
                </td>
                <br>
            </tr>
        </table>
        <!-- Footer End -->




    </center>
</body>

</html>