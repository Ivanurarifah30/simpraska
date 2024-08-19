<?php
// Simulasi koneksi database
include('koneksi.php'); // Pastikan file koneksi database sudah ada

// Memeriksa apakah ada data yang dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan ID anggota dan status baru dari form
    $id_anggota = $_POST['id_anggota'];
    $status = $_POST['status'];

    // Melakukan sanitasi input untuk keamanan
    $id_anggota = $koneksi->real_escape_string($id_anggota);
    $status = $koneksi->real_escape_string($status);

    // Query SQL untuk memperbarui status anggota
    $sql = "UPDATE tb_anggota SET status='$status' WHERE id_anggota='$id_anggota'";

    // Menjalankan query
    if ($koneksi->query($sql) === TRUE) {
        echo "Status anggota berhasil diperbarui.";
    } else {
        echo "Kesalahan: " . $koneksi->error;
    }

    // Redirect ke halaman data anggota setelah memperbarui status
    header('Location: ?page=data-anggota');
    exit;
} else {
    echo "Permintaan tidak valid.";
}

// Menutup koneksi database
$koneksi->close();
?>
