<?php

// Menghitung total stok semua snack
function hitungTotalNilaiStok($products)
{
    $total = 0;

    foreach ($products as $product) {
        $total += $product["stok"];
    }

    return $total;
}


// Menghitung nilai seluruh stok berdasarkan harga
function hitungTotalHargaStok($products)
{
    $total = 0;

    foreach ($products as $product) {
        $total += $product["harga"] * $product["stok"];
    }

    return $total;
}


// Mengecek apakah stok kritis
function stokKritis($stok)
{
    return $stok < 3;
}

?>