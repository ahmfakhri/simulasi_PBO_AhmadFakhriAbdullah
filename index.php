<?php

require_once __DIR__ . "/koneksi/database.php";
require_once __DIR__ . "/PendaftaranReguler.php";
require_once __DIR__ . "/PendaftaranPrestasi.php";
require_once __DIR__ . "/PendaftaranKedinasan.php";

$database = new Database();
$db = $database->getConnection();

$jalur = isset($_GET['jalur']) ? $_GET['jalur'] : 'semua';

$pendaftaranReguler = new PendaftaranReguler();
$pendaftaranPrestasi = new PendaftaranPrestasi();
$pendaftaranKedinasan = new PendaftaranKedinasan();

$dataPendaftaran = [];
$judulHalaman = "Semua Data Pendaftaran";

if ($jalur == 'reguler') {
    $dataPendaftaran = $pendaftaranReguler->getDaftarReguler($db);
    $judulHalaman = "Data Pendaftaran Jalur Reguler";
} elseif ($jalur == 'prestasi') {
    $dataPendaftaran = $pendaftaranPrestasi->getDaftarPrestasi($db);
    $judulHalaman = "Data Pendaftaran Jalur Prestasi";
} elseif ($jalur == 'kedinasan') {
    $dataPendaftaran = $pendaftaranKedinasan->getDaftarKedinasan($db);
    $judulHalaman = "Data Pendaftaran Jalur Kedinasan";
} else {
    $dataPendaftaran = array_merge(
        $pendaftaranReguler->getDaftarReguler($db),
        $pendaftaranPrestasi->getDaftarPrestasi($db),
        $pendaftaranKedinasan->getDaftarKedinasan($db)
    );
}

function formatRupiah($angka)
{
    return "Rp " . number_format($angka, 0, ',', '.');
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendaftaran Mahasiswa Baru</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            color: #222;
        }

        .navbar {
            background-color: #1f2937;
            padding: 18px 40px;
            color: white;
        }

        .navbar h1 {
            margin: 0;
            font-size: 22px;
        }

        .menu {
            background-color: white;
            padding: 16px 40px;
            display: flex;
            gap: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .menu a {
            text-decoration: none;
            padding: 10px 16px;
            border-radius: 8px;
            background-color: #e5e7eb;
            color: #111827;
            font-weight: bold;
            font-size: 14px;
        }

        .menu a.active {
            background-color: #2563eb;
            color: white;
        }

        .container {
            padding: 30px 40px;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        }

        h2 {
            margin-top: 0;
            margin-bottom: 20px;
            color: #111827;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th {
            background-color: #2563eb;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: top;
        }

        tr:hover {
            background-color: #f9fafb;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background-color: #dbeafe;
            color: #1e40af;
            font-size: 12px;
            font-weight: bold;
        }

        .biaya {
            font-weight: bold;
            color: #047857;
        }

        .kosong {
            text-align: center;
            padding: 20px;
            color: #6b7280;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <h1>Sistem Pendaftaran Mahasiswa Baru</h1>
    </div>

    <div class="menu">
        <a href="index.php?jalur=semua" class="<?php echo $jalur == 'semua' ? 'active' : ''; ?>">Semua Data</a>
        <a href="index.php?jalur=reguler" class="<?php echo $jalur == 'reguler' ? 'active' : ''; ?>">Jalur Reguler</a>
        <a href="index.php?jalur=prestasi" class="<?php echo $jalur == 'prestasi' ? 'active' : ''; ?>">Jalur Prestasi</a>
        <a href="index.php?jalur=kedinasan" class="<?php echo $jalur == 'kedinasan' ? 'active' : ''; ?>">Jalur Kedinasan</a>
    </div>

    <div class="container">
        <div class="card">
            <h2><?php echo $judulHalaman; ?></h2>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama Calon</th>
                        <th>Asal Sekolah</th>
                        <th>Nilai Ujian</th>
                        <th>Info Jalur</th>
                        <th>Biaya Dasar</th>
                        <th>Total Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($dataPendaftaran) > 0) : ?>
                        <?php $no = 1; ?>
                        <?php foreach ($dataPendaftaran as $pendaftaran) : ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $pendaftaran->getIdPendaftaran(); ?></td>
                                <td><?php echo $pendaftaran->getNamaCalon(); ?></td>
                                <td><?php echo $pendaftaran->getAsalSekolah(); ?></td>
                                <td><?php echo $pendaftaran->getNilaiUjian(); ?></td>
                                <td>
                                    <span class="badge">
                                        <?php echo $pendaftaran->tampilkanInfoJalur(); ?>
                                    </span>
                                </td>
                                <td><?php echo formatRupiah($pendaftaran->getBiayaPendaftaranDasar()); ?></td>
                                <td class="biaya"><?php echo formatRupiah($pendaftaran->hitungTotalBiaya()); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="8" class="kosong">Data pendaftaran belum tersedia.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>