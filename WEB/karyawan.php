<?php
require '../PHP/crud-produk.php';

$rows = query("SELECT karyawan.id, karyawan.nama, karyawan.email, CONCAT(alamat.alamat, ', ', alamat.kota, ', ', alamat.provinsi) AS alamat, posisi_karyawan.posisi, admin.nama AS manager
FROM karyawan
JOIN alamat ON karyawan.alamat = alamat.kode
JOIN posisi_karyawan ON karyawan.posisi = posisi_karyawan.kode
JOIN admin ON karyawan.manager = admin.id;

");


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>Manajemen Karyawan</title>

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="../CSS/style-karyawan.css"
    />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
  </head>
  <body>
    <!-- Navigasi -->
    <nav class="navbar">
      <h1>INVENTORY SYSTEM</h1>
      <div class="container-dashboard">
        <span class="icon"><i data-feather="home"></i></span>
        <a
          href="dashboard.php"
          class="menu-nav dashboard"
          >Dashboard</a
        >
      </div>
      <div class="container-produk">
        <span class="icon"><i data-feather="shopping-cart"></i></span>
        <a
          href="produk.php"
          class="menu-nav"
          >Produk</a
        >
      </div>
      <div class="container-transaksi">
        <span class="icon"><i data-feather="dollar-sign"></i></span>
        <a
          href="transaksi.php"
          class="menu-nav"
          >Transaksi</a
        >
      </div>
      <div class="container-karyawan">
        <span class="icon utama"><i data-feather="users"></i></span>
        <a
          href="#"
          class="menu-nav"
          >Karyawan</a
        >
      </div>
      <div class="container-promosi">
        <span class="icon"><i data-feather="table"></i></span>
        <a
          href="data_proses.php"
          class="menu-nav"
          >Data Proses</a
        >
      </div>
      <div class="container-akun">
        <span class="icon"><i data-feather="user"></i></span>
        <a
          href="akun.php"
          class="menu-nav"
          >Akun</a
        >
      </div>
    </nav>
    <!-- Navigasi End -->

    <!-- Profile -->
    <header class="profile">
      <h2>FreshFruit</h2>
      <h1 style="margin-right: 90px">MANAJEMEN KARYAWAN</h1>
      <a
        href="akun.php"
        id="profile"
        ><i data-feather="user"></i
      ></a>
    </header>
    <div id="batas"></div>
    <!-- Profile end -->

    <!-- Pencarian Start -->
    <div class="pencarian">
      <form action="">
        <button type="submit">Search</button>
        <input
          type="text"
          name="cari"
          placeholder="Search Product"
          required
        />
      </form>
    </div>
    <!-- Pencarian End -->

    <!-- Kolom Manajemen Karyawan Start -->
    <section class="container-manajemen-karyawan">
      <div class="icon">
        <div class="keterangan">
          <span id="feather-icon"><i data-feather="table"></i></span>
          <span>KARYAWAN</span>
        </div>
        <div class="tambah-data"><a href="form-tambah-karyawan.php">ADD NEW</a></div>
      </div>

      <div class="kolom karyawan">
        <table class="tb_karyawan">
          <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Posisi</th>
            <th>Manager</th>
            <th>Actions</th>
          </tr>

          <?php foreach ($rows as $row) :?>
          <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama']?></td>
            <td><?= $row['email']?></td>
            <td><?= $row['alamat']?></td>
            <td><?= $row['posisi']?></td>
            <td><?= $row['manager']?></td>
            <td>
              <div class="btn_edit"><a href="form-edit-karyawan.php">E</a></div>
              <div class="btn_hapus"><a href="..PHP/hapus-karyawan.php">x</a></div>
            </td>
          </tr>
          <?php endforeach; ?>
        </table>
      </div>
    </section>
    <!-- Kolom Manajemen Karyawan End -->
    <script>
      feather.replace();
    </script>
  </body>
</html>
