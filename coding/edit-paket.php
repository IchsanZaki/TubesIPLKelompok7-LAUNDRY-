<?php

include 'layout/header.php';

// Mengambil id_paket dari URL
$id_paket = (int)$_GET['id_paket'];

$paket = select("SELECT * FROM paket WHERE id_paket = $id_paket")[0];

// Check apakah tombol edit ditekan
if (isset($_POST['edit'])) {
    if (update_paket($_POST) > 0) {
        echo "<script>
        alert('Data paket berhasil diedit');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data paket gagal diedit');
        document.location.href = 'index.php';
        </script>";
    }
}

?>

<div class="container mt-3">
    <h1>Edit data paket</h1>
    <hr>
    <form action="" method="post">
        <input type="hidden" name="id_paket" value="<?= $paket['id_paket']; ?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Paket</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $paket['nama'] ?>"
                placeholder="Mau ngetik apa hayoo?" required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?= $paket['jumlah'] ?>"
                placeholder="Mau berapa?" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?= $paket['harga'] ?>"
                placeholder="Berapa hayoo?" required>
        </div>

        <button type="submit" name="edit" class="btn btn-primary" style="float: right;">Selesai</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>
