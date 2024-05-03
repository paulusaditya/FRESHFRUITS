<?php
require '../PHP/crud-produk.php';
$rows = query("SELECT transaksi.kode, produk.nama_produk, detail_transaksi.kuantitas, detail_transaksi.total, transaksi.tanggal, karyawan.nama 
                FROM transaksi 
                JOIN detail_transaksi ON transaksi.kode = detail_transaksi.kode
                JOIN karyawan ON transaksi.karyawan = karyawan.id
                JOIN produk ON detail_transaksi.produk_terjual = produk.kode
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
    <title>Dashboard</title>

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="../CSS/style-transaksi.css"
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
        <span class="icon utama"><i data-feather="dollar-sign"></i></span>
        <a
          href="#"
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
        <span class="icon"><i data-feather="tag"></i></span>
        <a
          href="promosi.php"
          class="menu-nav"
          >Promosi</a
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
      <h1 style="margin-right: 90px">TRANSAKSI</h1>
      <a
        href="akun.php"
        id="profile"
        ><i data-feather="user"></i
      ></a>
    </header>
    <div id="batas"></div>
    <!-- Profile end -->

    <!-- Kolom Manajemen Transaksi Start -->
    <section class="container-manajemen-transaksi">
      <div class="icon">
        <div class="keterangan">
          <span id="feather-icon"><i data-feather="table"></i></span>
          <span>TRANSAKSI</span>
        </div>
      </div>

      <!-- Fitur Search and Sort Start -->
      <!-- Fitur Search Start -->
      <div class="fitur-tambahan">
        <div class="pencarian">
          <form action="">
            <button type="submit">Search</button>
            <input
              type="text"
              name="cari"
              placeholder="Search"
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
              <option value="nama">Tebaru</option>
              <option value="harga">Terlama</option>
            </select>
          </form>
        </div>
      </div>
      <!-- Fitur Search nd Sort End -->

      <div class="kolom">
        <table class="tb_transaksi">
          <tr>
            <th>Kode</th>
            <th>Produk</th>
            <th>Kuantitas</th>
            <th>Total</th>
            <th>Tgl Transaksi</th>
            <th>Karyawan</th>
            <th>Actions</th>
          </tr>

          <?php foreach ($rows as $row) : ?>
            <tr>
              <td><?=$row['kode']?></td>
              <td><?=$row['nama_produk']?></td>
              <td><?=$row['kuantitas']?></td>
              <td><?=$row['total']?></td>
              <td><?=$row['tanggal']?></td>
              <td><?=$row['nama']?></td>
              <td>
                ex
              </td>
            </tr>
            <?php endforeach; ?>
        </table>
      </div>
    </section>
    <!-- Kolom Manajemen Transaksi End -->

    <!-- Section Detail Laporan Start -->
    <section class="container-detail-transaksi">
      <div class="icon">
        <div class="keterangan">
          <span id="feather-icon"><i data-feather="table"></i></span>
          <span>DETAIL TRANSAKSI</span>
        </div>
      </div>

      <div class="kolom">
        <form
          action=""
          class="range-period"
        >
          <h4>Choose Period</h4>
          <input
            type="date"
            id="range-start"
            name="range-start"
            placeholder="Start Date"
          />
          <label>&gt;</label>
          <input
            type="date"
            id="range-end"
            name="range-end"
            placeholder="End Date"
          />
        </form>
        <table class="tabel periode">
          <thead>
            <tr>
              <th>Periode Penjualan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>dd-mm-yyyy Sampai dd-mm-yyyy</td>
            </tr>
          </tbody>
        </table>
        <table class="tabel tb_detail_transaksi">
          <tr>
            <th>Kode</th>
            <th>Produk</th>
            <th>Kuantitas</th>
            <th>Total</th>
            <th>Tgl Transaksi</th>
            <th>Karyawan</th>
          </tr>
        </table>
      </div>
    </section>
    <!-- Section Detail Laporan End -->

    <!-- Section Prediksi Permintaan Start -->
    <section class="container-prediksi-permintaan">
      <div class="icon">
        <div class="keterangan">
          <span id="feather-icon"><i data-feather="table"></i></span>
          <span>PREDIKSI PERMINTAAN</span>
        </div>
      </div>

      <div class="kolom">
        <table class="tabel tb_prediksi_permintaan">
          <tr>
            <th>Kode</th>
            <th>Prediksi Tanggal</th>
            <th>Produk</th>
            <th>Jumlah Permintaan Stok</th>
          </tr>
        </table>
      </div>
    </section>
    <!-- Section Prediksi Permintaan End -->

    <script>
      feather.replace();
    </script>
  </body>
</html>
