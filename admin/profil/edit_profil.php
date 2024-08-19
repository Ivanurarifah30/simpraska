<?php
include('koneksi.php');

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_profil WHERE id_profil='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }

?>
<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Profil
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <input type="hidden" class="form-control" name="id_profil" value="<?php echo htmlspecialchars($data_cek['id_profil']); ?>" readonly/>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Unit Kegiatan Mahasiswa</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="ukm" name="ukm" value="<?php echo htmlspecialchars($data_cek['ukm']); ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Racana</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="racana" name="racana" value="<?php echo htmlspecialchars($data_cek['racana']); ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Instansi</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="<?php echo htmlspecialchars($data_cek['nama_instansi']); ?>" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo htmlspecialchars($data_cek['alamat']); ?>" />
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Ubah" value="Simpan" class="btn btn-success">
            <a href="?page=data-profil" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>


<?php

    if (isset ($_POST['Ubah'])){
    $sql_ubah = "UPDATE tb_profil SET 
    ukm='".$_POST['ukm']."', 
	racana='".$_POST['racana']."',
    nama_instansi='".$_POST['nama_instansi']."', 
    alamat='".$_POST['alamat']."'
    WHERE id_profil='".$_POST['id_profil']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'dashboard.php?page=data-profil';
        }
      })</script>";
      }else{
      echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'dashboard.php?page=data-profil';
        }
      })</script>";
    }}

