<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-eye"></i> Lihat Dokumentasi Kegiatan
        </h3>
    </div>

    <div class="card-body">
        <?php
        include "koneksi.php";

        // Ambil semua data dokumentasi dari database
        $query = "SELECT * FROM dokumentasi_kegiatan ORDER BY tanggal_kegiatan DESC";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $judul_kegiatan = htmlspecialchars($row['judul_kegiatan']);
                $deskripsi_kegiatan = htmlspecialchars($row['deskripsi_kegiatan']);
                $tanggal_kegiatan = date("d F Y", strtotime($row['tanggal_kegiatan']));
                $file_paths = explode(',', $row['file_dokumentasi']);
                ?>

                <div class="card mb-4">
                    <div class="card-header">
                        <h4><?php echo $judul_kegiatan; ?></h4>
                        <small><i><?php echo $tanggal_kegiatan; ?></i></small>
                    </div>
                    <div class="card-body">
                        <p><?php echo nl2br($deskripsi_kegiatan); ?></p>
                        <div class="row">
                            <?php
                            foreach ($file_paths as $file_path) {
                                $file_ext = pathinfo($file_path, PATHINFO_EXTENSION);
                                $file_url = "uploads/dokumentasi_kegiatan/" . $file_path;
                                if (in_array($file_ext, ['jpg', 'jpeg', 'png', 'gif'])) {
                                    // Jika file adalah gambar
                                    echo "<div class='col-md-4 mb-3'>
                                            <img src='$file_url' class='img-fluid' alt='$judul_kegiatan'>
                                          </div>";
                                } elseif (in_array($file_ext, ['mp4', 'avi', 'mov'])) {
                                    // Jika file adalah video
                                    echo "<div class='col-md-4 mb-3'>
                                            <video controls class='img-fluid'>
                                                <source src='$file_url' type='video/$file_ext'>
                                                Browser Anda tidak mendukung tag video.
                                            </video>
                                          </div>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <?php
            }
        } else {
            echo "<div class='alert alert-info'>Belum ada dokumentasi yang di-upload.</div>";
        }
        ?>
    </div>
</div>
