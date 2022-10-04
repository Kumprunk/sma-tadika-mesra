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
                    <b style="text-transform: uppercase; font-size: 12pt;"><u>Data Aktifitas Pengguna</u></b><br>
                </td>
            </tr>
        </table>
        <br>


        <!-- Main Content Start -->
        <table style="border-collapse: collapse; font-size: 10pt; padding: 5px; width: 200mm;" border="1">
            <thead>
                <tr>
                    <th align="center">No</th>
                    <th>Datetime</th>
                    <th>Username</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($log_res as $log) : ?>
                    <tr>
                        <td align="center"><?= $no++; ?>.</td>
                        <td><?= date('d-m-Y H:i:s', strtotime($log['datetime'])); ?></td>
                        <td><?= $log['username']; ?> - <?= $log['nama']; ?></td>
                        <td><?= $log['keterangan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- Main Content End -->


    </center>
</body>

</html>