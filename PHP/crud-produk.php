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
    $harga_jual = $post['harga_jual'];
    $harga_beli = $post['harga_beli'];
    $berat = $post['berat'];
    $tanggal = $post['tanggal'];
    $stok = $post['stok'];

    $query = "INSERT INTO produk (kode, nama_produk, harga, harga_grosir, berat, tanggal_kadaluarsa, stok)
              VALUES ('$kode', '$nama_produk', '$harga_jual', '$harga_beli', '$berat', '$tanggal', '$stok')";

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

function cari_produk($keyword){
    global $conn;

    $query = "SELECT * FROM produk WHERE 
    kode LIKE '%$keyword%' OR
    nama_produk LIKE '%$keyword%' OR
    harga LIKE '%$keyword%' OR
    berat LIKE '%$keyword%' OR
    tanggal_kadaluarsa LIKE '%$keyword%';";


    return query($query);
}


function cari_transaksi($keyword){
    global $conn;

    $query = "SELECT  
            transaksi.kode AS kode_transaksi, 
            GROUP_CONCAT(produk.nama_produk SEPARATOR ', ') AS produk_terjual_multivalue, 
            SUM(detail_transaksi.kuantitas) AS total_kuantitas, 
            SUM(detail_transaksi.total) AS total_pembelian, 
            transaksi.tanggal AS tanggal_terjual, 
            karyawan.nama AS karyawan_melayani 
            FROM 
            transaksi 
            JOIN detail_transaksi ON detail_transaksi.kode_transaksi = transaksi.kode
            JOIN karyawan ON transaksi.karyawan = karyawan.id
            JOIN produk ON detail_transaksi.produk_terjual = produk.kode
            WHERE 
            transaksi.kode LIKE '%$keyword%' OR
            produk.nama_produk LIKE '%$keyword%' OR
            transaksi.tanggal LIKE '%$keyword%' OR
            karyawan.nama LIKE '%$keyword%'
            GROUP BY 
            transaksi.kode, 
            transaksi.tanggal, 
            karyawan.nama;
            
            ";

    return query($query);
}



?>