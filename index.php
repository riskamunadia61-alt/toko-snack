<?php

require_once "products.php";
require_once "functions.php";

$totalStok = hitungTotalNilaiStok($products);
$totalNilaiStok = hitungTotalHargaStok($products);

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Product Information System - Snack</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 30px;
        }

        .container {
            width: 90%;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        h1 {
            text-align: center;
        }

        h2 {
            margin-top: 30px;
        }

        .info {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }

        .card {
            padding: 15px 25px;
            background-color: #eeeeee;
            border-radius: 8px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        .kritis {
            background-color: #ffcccc;
        }

        .status {
            color: red;
            font-weight: bold;
        }

        .aman {
            color: green;
            font-weight: bold;
        }

    </style>

</head>

<body>

<div class="container">

    <h1> Product Information System</h1>

    <h2>Data Produk Snack</h2>


    <div class="info">

        <div class="card">

            <h3>Total Jenis Snack</h3>

            <p>
                <?= count($products); ?> Jenis
            </p>

        </div>


        <div class="card">

            <h3>Total Stok</h3>

            <p>
                <?= $totalStok; ?> Produk
            </p>

        </div>


        <div class="card">

            <h3>Nilai Seluruh Stok</h3>

            <p>
                Rp <?= number_format($totalNilaiStok, 0, ',', '.'); ?>
            </p>

        </div>

    </div>


    <table>

        <thead>

            <tr>

                <th>ID</th>

                <th>Nama Snack</th>

                <th>Kategori</th>

                <th>Harga</th>

                <th>Stok</th>

                <th>Deskripsi</th>

                <th>Status</th>

            </tr>

        </thead>


        <tbody>


        <?php foreach ($products as $product): ?>

            <tr class="<?= stokKritis($product['stok']) ? 'kritis' : ''; ?>">

                <td>
                    <?= $product["id"]; ?>
                </td>

                <td>
                    <?= $product["nama"]; ?>
                </td>

                <td>
                    <?= $product["kategori"]; ?>
                </td>

                <td>
                    Rp <?= number_format($product["harga"], 0, ',', '.'); ?>
                </td>

                <td>
                    <?= $product["stok"]; ?>
                </td>

                <td>
                    <?= $product["deskripsi"]; ?>
                </td>

                <td>

                    <?php if (stokKritis($product["stok"])): ?>

                        <span class="status">
                             Stok Kritis
                        </span>

                    <?php else: ?>

                        <span class="aman">
                            ✓ Stok Aman
                        </span>

                    <?php endif; ?>

                </td>

            </tr>

        <?php endforeach; ?>


        </tbody>

    </table>

</div>

</body>

</html>