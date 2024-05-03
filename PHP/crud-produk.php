<?php

$conn = mysqli_connect("localhost", "root", "", "freshfruit");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function tambah($post){
    global $conn;

    $kode = $post['kode'];
    $nama_produk = $post['nama_produk'];
    $harga = $post['harga'];
    $berat = $post['berat'];
    $tanggal = $post['tanggal'];
    $stok = $post['stok'];

    $query = "INSERT INTO produk (kode, nama_produk, harga, berat, tanggal_kadaluarsa, stok)
              VALUES ('$kode', '$nama_produk', '$harga', '$berat', '$tanggal', '$stok')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($kode){
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE kode = '$kode'");

    return mysqli_affected_rows($conn);
}


function ubah($post){
    global $conn;

    $kode = $post['kode'];
    $nama_produk = $post['nama_produk'];
    $harga = $post['harga'];
    $berat = $post['berat'];
    $tanggal = $post['tanggal'];
    $stok = $post['stok'];

    $query = "UPDATE produk SET
                kode='$kode',
                nama_produk='$nama_produk',
                harga='$harga',
                berat='$berat',
                tanggal_kadaluarsa='$tanggal',
                stok='$stok'
                WHERE kode= '$kode'
                ";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


?>