<?php
//fungsi menampilkan data
function select($query)
{
    //panggil koneksi database
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

//fungsi menambahkan data paket
function create_paket($post)
{
    global $db;

    $nama   = $post['nama'];
    $jumlah = $post['jumlah'];
    $harga  = $post['harga'];

    //query tambah data
    $query = "INSERT INTO paket VALUES(null, '$nama', '$jumlah', '$harga', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  
}

//fungsi mengubah data paket
function update_paket($post)
{
    global $db;

    $id_paket = $post['id_paket'];
    $nama   = $post['nama'];
    $jumlah = $post['jumlah'];
    $harga  = $post['harga'];

    //query edit data
    $query = "UPDATE paket SET nama = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE id_paket = 
    $id_paket";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  
}

//fungsi menghapus paket

function delete_paket($id_paket)
{
    global $db;

    //query edit data
    $query = "DELETE FROM paket  WHERE id_paket = $id_paket";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}