<?php

// Koneksikan ke database
include 'koneksi.php';

// Dapatkan data dari form
$id_lpj = $koneksi->escape_string($_POST["nama_kegiatan"]);
$kategori= $koneksi->escape_string($_POST["kategori"]);



// Buat query UPDATE
$query = "UPDATE tb_lpj SET kategori= '$kategori' WHERE nama = '$id_lpj'";

// Jalankan query
$result = $koneksi->query($query);

if ($result) {
  // Jika berhasil, tampilkan pesan sukses
  echo '<script>alert("Success...");window.location="' . $base_url . '/dashboard.php?page=data-lpj";</script>';
} else {
    // Jika gagal, tampilkan pesan kesalahan
    //   echo "Terjadi kesalahan saat mengubah status pengguna: " . $koneksi->error;
}

?>
