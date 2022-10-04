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
        <table style="text-align: right; width: 200mm;" align="right">
            <tr>
                <td>
                    <i style="font-size: 10pt;">Dicetak pada <?= strftime('%d %B %Y'); ?></i><br>
                </td>
            </tr>
        </table>
        <br>

        <table style="text-align: center; width: 200mm;" align="center">
            <tr>
                <td>
                    <b style="text-transform: uppercase; font-size: 12pt;"><u>Laporan Daftar Tagihan Bulanan</u></b><br>
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
                <td width="22%">NIS / NISN</td>
                <td width="1%">:</td>
                <td align="left"><?= $siswa['nis']; ?> / <?= $siswa['nisn']; ?></td>
            </tr>
            <tr>
                <td width="22%">Kelas / Jurusan</td>
                <td width="1%">:</td>
                <td align="left" style="text-transform: uppercase;"><?= $siswa['kelas']; ?> / <?= $siswa['jurusan']; ?></td>
            </tr>
        </table>
        <br>


        <table style="border-collapse: collapse; font-size: 10pt; width: 200mm;" border="1">
            <thead>
                <tr>
                    <th width="5%">No.</th>
                    <th>Bulan Tahun</th>
                    <th>Jumlah Tagihan (Rp)</th>
                    <th>Tipe Transaksi</th>
                    <th>Status Tagihan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($tagihan_res as $tagihan) : ?>
                    <tr>
                        <td align="center"><?= $no++; ?>.</td>
                        <td><?= strftime('%B %Y', strtotime($tagihan['bulan'])); ?></td>
                        <td>Rp. <?= number_format($tagihan['jml_tagihan']); ?></td>
                        <td><?= $tagihan['tipe_transaksi']; ?> <span style="text-transform: uppercase;"><?= $tagihan['bank']; ?></span></td>
                        <td>
                            <?php if ($tagihan['status_kode'] == 200) : ?>
                                <span class="badge badge-success">[200] Lunas</span>
                            <?php elseif ($tagihan['status_kode'] == 201) : ?>
                                <span class="badge badge-warning">[201] Panding</span>
                            <?php elseif ($tagihan['status_kode'] == 202) : ?>
                                <span class="badge badge-danger">[202] Gagal</span>
                            <?php elseif ($tagihan['status_kode'] == 1) : ?>
                                <span class="badge badge-success">[1] Lunas</span>
                            <?php elseif ($tagihan['status_kode'] == 0) : ?>
                                <span class="badge badge-secondary">[0] Belum bayar</span>
                            <?php else : ?>
                                <span class="text-danger"><?= $tagihan['status_kode']; ?></span>
                            <?php endif; ?>
                        </td>
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