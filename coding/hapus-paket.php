<?php

include 'layout/header.php';

// Menerima id paket yang dipilih
$id_paket = (int)$_GET['id_paket'];


if (delete_paket($id_paket) > 0) {
    echo "<script>
        alert('Data paket berhasil dihapus');
        document.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
        alert('Data paket gagal dihapus');
        document.location.href = 'index.php';
        </script>";
}

