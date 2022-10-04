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
                    <b style="text-transform: uppercase; font-size: 12pt;"><u>Transkrip Nilai</u></b><br>
                </td>
            </tr>
        </table>
        <br>



        <!-- Main Content Start -->
        <table style="border-collapse: collapse; font-size: 10pt; padding: 5px; width: 200mm;">
            <tr>
                <td width="22%">Nama Lengkap</td>
                <td width="1%">:</td>
                <td align="left" style="text-transform: uppercase;"><?= $siswa['nama']; ?></td>
            </tr>
            <tr>
                <td width="22%">NIS</td>
                <td width="1%">:</td>
                <td align="left"><?= $siswa['nis']; ?></td>
            </tr>
            <tr>
                <td width="22%">NISN</td>
                <td width="1%">:</td>
                <td align="left"><?= $siswa['nisn']; ?></td>
            </tr>
            <tr>
                <td width="22%">Kelas / Jurusan</td>
                <td width="1%">:</td>
                <td align="left" style="text-transform: uppercase;"><?= $siswa['kelas']; ?> / <?= $siswa['jurusan']; ?></td>
            </tr>
            <tr>
                <td width="22%">Tempat, Tanggal Lahir</td>
                <td width="1%">:</td>
                <td align="left" style="text-transform: uppercase;"><?= $siswa['tmp_lhr']; ?>, <?= strftime('%d %B %Y', strtotime($siswa['tgl_lhr'])); ?></td>
            </tr>
        </table>
        <br>

        <table style="border-collapse: collapse; font-size: 10pt; width: 200mm;" border="1">
            <thead>
                <tr>
                    <th width="5%" rowspan="2" style="text-transform: uppercase;">No.</th>
                    <th width="14%" rowspan="2" style="text-transform: uppercase;">Kode</th>
                    <th rowspan="2" style="text-transform: uppercase;">Mata Pelajaran</th>
                    <th width="12%" rowspan="2" style="text-transform: uppercase;">Semester</th>
                    <th colspan="2" style="text-transform: uppercase;">Nilai</th>
                </tr>
                <tr>
                    <th width="8%">UTS</th>
                    <th width="8%">UAS</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($nilai_res as $nilai) : ?>
                    <tr>
                        <td align="center"><?= $no++; ?>.</td>
                        <td><?= $nilai['kd_mapel']; ?></td>
                        <td><?= $nilai['mapel']; ?></td>
                        <td align="center"><?= $nilai['semester']; ?></td>
                        <td align="center"><?= $nilai['uts']; ?></td>
                        <td align="center"><?= $nilai['uas']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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