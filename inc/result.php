<?php function result()
{

    $user = $this->M_Admin->get_tableid_edit('tbl_login', 'nama', $this->input->post('kode_anggota')); //mengubah Kode buku pencarian jadi nama
    error_reporting(0);
    if ($user->nama != null) {
        echo '<table class="table table-striped">
    <tr>
        <td>Nama Anggota</td>
        <td>:</td>
        <td>' . $user->nama . '</td>
    </tr>
    <tr>
        <td>Telepon</td>
        <td>:</td>
        <td>' . $user->telepon . '</td>
    </tr>
    <tr>
        <td>E-mail</td>
        <td>:</td>
        <td>' . $user->email . '</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>' . $user->alamat . '</td>
    </tr>
    <tr>
        <td>Status</td>
        <td>:</td>
        <td>' . $user->status . '</td>
    </tr>
</table>';
    } else {
        echo 'Anggota Tidak Ditemukan !';
    }
}
