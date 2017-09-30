<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Laporan Anggota</title>
    <style type="text/css">
        h1 {
            line-height:-1px;
            text-align: center;
            font-size:18px;
        }

        table {
            font-size:10px;
            border-collapse:collapse;
        }
        .zebra {
            background-color: #CCCCCC;
        }
        th,td {
            padding: 4px 2px;
        }
        th, tfoot tr td{
            background-color: #999999;;
        }
        .style3 {font-size: 14px}
        .style4 {font-size: 10px}
        .style5 {text-align: center}
    </style>
</head>

<body>
<p align="left"><span class="style3"><img src="<?= base_url();?>/adminbsb/images/logobogor.jpg" width="72" height="78" align="left" /><img src="http://smandu.com/adminbsb/images/logo.jpg" width="78" height="77" align="right" /></span></p>
<h1>PEMERINTAH KABUPATEN BOGOR</h1>
<h1>DINAS PENDIDIKAN</h1>
<h1>SMA NEGERI 2 CILEUNGSI</h1>
<h1 class="style3">Komp. Metland Transyogi Jl. Gandaria Utara No. 2 Kab. Bogor 16820 </h1>
<hr>
<h1>LAPORAN DATA ANGGOTA</h1>
<br>
<br>
<br>
<?php $i = 0 ?>
<table width="600" border="1">
    <thead>
    <tr>
        <th width="30" class="style5">No</th>
        <th width="240" >Nama</th>
        <th width="80" class="style5">No Induk</th>
        <th width="100" class="style5">Jenis Kelamin</th>
        <th width="100" class="style5">No Handphone</th>
        <th width="50" class="style5">Kelas</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($anggotas as $anggota): ?>
        <?= ($i & 1) ? '<tr class="zebra">' : '<tr>'; ?>
        <td width="30" class="style5"><?= ++$i ?></td>
        <td width="240" ><?= $anggota->nama ?></td>
        <td width="80" class="style5"><?= $anggota->no_induk ?></td>
        <td width="100" class="style5"><?= $anggota->jenis_kelamin == 'p' ? 'Perempuan' : 'Laki - Laki'  ?></td>
        <td width="100" class="style5"><?= $anggota->no_hp ?></td>
        <td width="50" class="style5"><?= $anggota->nama_kelas ?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="6"><strong>Jumlah Anggota : <?= $jumlah_total ?></strong></td>
    </tr>
    </tfoot>
</table>

<p align="right" class="style4">Koord. Perpustakaan,</p>
<p align="right" class="style4">&nbsp;</p>
<p align="right" class="style4">(..............................) </p>
</body>
</html>