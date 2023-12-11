<?php

include 'layout/header.php';

// check apakah tombol tambah ditekan
if (isset($_POST['tambah'])) {
    // Assuming create_paket handles input securely
    if (create_paket($_POST) > 0) {
        echo "<script>
        alert('Data paket berhasil ditambahkan');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data paket gagal ditambahkan');
        document.location.href = 'index.php';
        </script>";
    }
}

?>

<div class="container mt-5">
    <h1>Tambah paket</h1>
    <hr>
    <form action="" method="post">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Paket</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Mau ngetik apa hayoo?" required>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Mau berapa?" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Berapa hayoo?" required>
        </div>

        <button type="submit" name="tambah" class="btn btn-primary" style="float: right;">Tambah</button>
    </form>
</div>

<?php include 'layout/footer.php'; ?>
