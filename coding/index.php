<?php
include 'layout/header.php';

$paket = select("SELECT * FROM paket");

?>
    <div class="container mt-1">
    <h1>Data Paket</h1>

    <a href="tambah.php" class="btn btn-primary mb-1">Tambah</a>

    <table class="table table-bordered table-striped mt-1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama paket</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
        <tr>
    <thead>

    <tbody>
        <?php $no = 1; ?>
        <?php foreach ($paket as $paket) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $paket['nama'] ?></td>
            <td><?= $paket['jumlah']?></td>
            <td>Rp. <?= number_format($paket['harga'],0,',','.');?></td>
            <td><?= date('d/m/Y H:i:s', strtotime($paket['tanggal']));?></td>
            <td width="15%" class="text-center">
                <a href="" class="btn btn-success">Edit</a>
                <a href="" class="btn btn-danger">Hapus</a>
            </td>
        <tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>

<?php include'layout/footer.php'; ?>