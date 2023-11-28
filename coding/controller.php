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
    header('location:index.php');
}