<?php
// Aktifkan laporan kesalahan untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Simulasi koneksi database
include('koneksi.php'); // Pastikan file koneksi database sudah ada

// Pastikan tidak ada output yang dikirim sebelum header
if (headers_sent()) {
    die("Terjadi kesalahan: Header sudah dikirim sebelumnya. Pastikan tidak ada output sebelum header.");
}

// Mengatur header untuk file download
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data_keuangan.csv');

// Buka output stream
$output = fopen('php://output', 'w');
if ($output === false) {
    die("Terjadi kesalahan saat membuka stream output.");
}

// Menuliskan header kolom ke file CSV
$header = array('No', 'Tgl Transaksi', 'Jenis Transaksi', 'Keterangan', 'Jumalah');
if (fputcsv($output, $header) === false) {
    die("Terjadi kesalahan saat menulis header ke CSV.");
}

// Query SQL untuk mendapatkan semua data anggota
$sql = $koneksi->query("SELECT * FROM tb_danakas");
if (!$sql) {
    die("Query gagal: " . $koneksi->error);
}

// Nomor urut
$no = 1;

// Loop melalui setiap baris data
while ($row = $sql->fetch_assoc()) {
    // Tuliskan data ke dalam file CSV
    $csvRow = array(
        $no++,
        $row['tgl_transaksi'],
        $row['jenis_transaksi'],
        $row['keterangan'],
        $row['jumlah'],
        $row['saldo'],
    );

    if (fputcsv($output, $csvRow) === false) {
        die("Terjadi kesalahan saat menulis data ke CSV.");
    }
}

// Tutup output stream
fclose($output);

// Tutup koneksi database
$koneksi->close();

exit;
?>
