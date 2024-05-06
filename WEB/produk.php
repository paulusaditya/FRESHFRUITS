<?php
require '../PHP/crud-produk.php';
$rows = query("SELECT * FROM produk");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>Produk</title>

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="../CSS/style-produk.css"
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
        <span class="icon utama"><i data-feather="shopping-cart"></i></span>
        <a
          href="#"
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
        <span class="icon"><i data-feather="users"></i></span>
        <a
          href="karyawan.php"
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
      <h1 style="margin-right: 90px">PRODUK</h1>
      <a
        href="akun.php"
        id="profile"
        ><i data-feather="user"></i
      ></a>
    </header>
    <div id="batas"></div>
    <!-- Profile end -->

    <!-- Fitur Search and Sort Start -->
    <!-- Fitur Search Start -->
    <div class="fitur-tambahan">
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

      <!-- Fitur Sorting Start -->
      <div class="sorting">
        <form action="">
          <label for="sort">SORT</label>
          <select
            name="sort"
            id="sort"
          >
            <option value="nama">Nama</option>
            <option value="harga">Harga</option>
            <option value="stok">Stok</option>
          </select>
        </form>
      </div>
    </div>
    <!-- Fitur Search nd Sort End -->

    <!-- Kolom Manajemen produk Start -->
    <section class="container-manajemen-produk">
      <div class="kolom">
        <div class="icon">
          <div class="keterangan">
            <span id="feather-icon"><i data-feather="table"></i></span>
            <span>PRODUK</span>
          </div>
          <div class="tambah-data"><a href="form-tambah-produk.php">ADD NEW</a></div>
        </div>
        <table class="tb_produk">
          <tr>
            <th>kode</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Berat</th>
            <th>Tanggal<br>Kadaluarsa</th>
            <th>Stok</th>
            <th>Actions</th>
          </tr>
            <?php foreach ($rows as $row) :?>
              <tr>
                <td><?= $row['kode'] ?></td>
                <td><?= $row['nama_produk']?></td>
                <td><?= $row['harga']?></td>
                <td><?= $row['berat']?></td>
                <td><?= $row['tanggal_kadaluarsa']?></td>
                <td><?= $row['stok']?></td>
                <td>
                  <div class="btn_edit"><a href="form-edit-produk.php?kode=<?= $row['kode']?>">E</a></div>
                  <div class="btn_hapus"><a href="../PHP/hapus.php?kode=<?= $row['kode']?>" onclick="return confirm('apa Anda yakin mau menghapus?')" >x</a></div>
                </td>
              </tr>
                <?php endforeach; ?>
        </table>
      </div>
    </section>
    <!-- Kolom Manajemen produk End -->
    <script>
      feather.replace();
    </script>
    <!-- <script src="/JAVASCRIPT/produk.js"></script> -->
  </body>
</html>
