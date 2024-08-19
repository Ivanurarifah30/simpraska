<?php

// Koneksikan ke database
include './inc/koneksi.php';

// Dapatkan data dari form
$id_kdr = $koneksi->escape_string($_POST["nama"]);
$jabatan = $koneksi->escape_string($_POST["jabatan"]);



// Buat query UPDATE
$query = "UPDATE kdr SET jabatan = '$jabatan' WHERE nama = '$id_kdr'";

// Jalankan query
$result = $koneksi->query($query);

if ($result) {
  // Jika berhasil, tampilkan pesan sukses
  echo '<script>alert("Success...");window.location="' . $base_url . '/index.php?page=data-anggota";</script>';
} else {
    // Jika gagal, tampilkan pesan kesalahan
    //   echo "Terjadi kesalahan saat mengubah jabatan pengguna: " . $koneksi->error;
}

?>
