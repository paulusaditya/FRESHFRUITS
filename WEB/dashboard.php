<?php
require '../PHP/crud-produk.php';
$rows = query("SELECT karyawan.id, karyawan.nama, karyawan.email, posisi_karyawan.posisi FROM karyawan JOIN posisi_karyawan ON (karyawan.posisi = posisi_karyawan.kode)");

?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>Dashboard</title>

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="../CSS/style-dashboard.css"
    />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

  </head>
  <body>
    <!-- Navigasi -->
    <nav class="navbar">
      <h1>INVENTORY SYSTEM</h1>
      <div class="container-dashboard">
        <span class="icon utama"><i data-feather="home"></i></span>
        <a href="#" class="menu-nav dashboard">Dashboard</a>
      </div>
      <div class="container-produk">
        <span class="icon"><i data-feather="shopping-cart"></i></span>
        <a href="produk.php" class="menu-nav">Produk</a>
      </div>
      <div class="container-transaksi">
        <span class="icon"><i data-feather="dollar-sign"></i></span>
        <a href="transaksi.php" class="menu-nav">Transaksi</a>
      </div>
      <div class="container-karyawan">
        <span class="icon"><i data-feather="users"></i></span>
        <a href="karyawan.php" class="menu-nav">Karyawan</a>
      </div>
      <div class="container-promosi">
        <span class="icon"><i data-feather="table"></i></span>
        <a href="data_proses.php" class="menu-nav">Data Proses</a>
      </div>
      <div class="container-akun">
        <span class="icon"><i data-feather="user"></i></span>
        <a href="akun.php" class="menu-nav">Akun</a>
      </div>
    </nav>
    <!-- Navigasi End -->

    <!-- Profile -->
    <header class="profile">
      <h2>FreshFruit</h2>
      <h1 style="margin-right: 90px;">DASHBOARD</h1>
      <a href="akun.php" id="profile"><i data-feather="user"></i></a>
    </header>
    <div id="batas"></div>
    <!-- Profile end -->

    <!-- Content Card -->
    <section class="container-card">
        <div class="cards">
          <div class="simbol card-1">
            <span><i data-feather="user"></i></span>
          </div>
          <div class="keterangan">
            <h4>30</h4>
            <a href="produk.php">Produk</a>
          </div>
        </div>
        <div class="cards">
          <div class="simbol card-2">
            <span><i data-feather="dollar-sign"></i></span>
          </div>
          <div class="keterangan">          
            <h4>Rp 10.000.000</h4>
            <a href="transaksi.php">Income</a>
          </div>
        </div>
        <div class="cards">
          <div class="simbol card-3">
            <span><i data-feather="users"></i></span>
          </div>
          <div class="keterangan">
            <h4>10</h4>
            <a href="karyawan.php">Karyawan</a>
          </div>
        </div>
        <div class="cards">
          <div class="simbol card-4">
            <span><i data-feather="tag"></i></span>
          </div>
          <div class="keterangan">
            <a href="#">Promosi</a>
          </div>
        </div>
      </section>
    </div>
    <!-- Content Card End -->


    <!-- Kolom Keterangan Lanjutan -->
    <section class="container-kolom-keterangan">
      <div class="kolom produk">
        <div class="icon">
          <span><i data-feather="table"></i></span>
          <h4>PRODUK TERLARIS</h4>
        </div>
        <table class="tb_produk">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Tgl Kdlwrs</th>
          </tr>
        </table>
      </div>

      <div class="kolom karyawan">
        <div class="icon">
          <span><i data-feather="table"></i></span>
          <h4>KARYAWAN</h4>
        </div>
        <table class="tb_karyawan">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Posisi</th>
          </tr>

          <tr>
            <?php foreach ( $rows as $row ): ?>
              <td><?= $row['id']; ?></td>
              <td><?= $row['nama']; ?></td>
              <td><?= $row['email']; ?></td>
              <td><?= $row['posisi']; ?></td>
              <?php endforeach;?>
          </tr>
        </table>
      </div>
    </section>
    <!-- Kolom Keterangan Lanjutan End -->

    <script>
      feather.replace();
    </script>
    <script src="/JAVASCRIPT/script.js"></script>
  </body>
</html>
