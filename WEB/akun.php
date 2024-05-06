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
      href="../CSS/style-akun.css"
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
      <div class="container-karyawan">
        <span class="icon"><i data-feather="users"></i></span>
        <a
          href="karyawan.php"
          class="menu-nav"
          >Karyawan</a
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
      <div class="container-report">
          <span class="icon"><i data-feather="file-text"></i></span>
          <a
            href="report.php"
            class="menu-nav"
            >Report</a
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
        <span class="icon utama"><i data-feather="user"></i></span>
        <a
          href="#"
          class="menu-nav"
          >Akun</a
        >
      </div>
    </nav>
    <!-- Navigasi End -->

    <!-- Profile -->
    <header class="profile">
      <h2>FreshFruit</h2>
      <h1 style="margin-right: 90px">PROFILE</h1>
      <a
        href="#"
        id="profile"
        ><i data-feather="user"></i
      ></a>
    </header>
    <div id="batas"></div>
    <!-- Profile end -->

    <!-- Form Data Akun Start -->
    <div class="container-data">
      <div class="container-form">
        <div class="icon">
          <img
            src="../IMG/admin.jpg"
            alt="Foto Admin"
            width="200px"
            height="auto"
          />
          <h4>Admin FreshFruit</h4>
        </div>
        <table>
          <tr>
            <td>Nama</td>
            <td>: Adit Widodo</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>: aditw@gmail.com</td>
          </tr>
          <tr>
            <td>No HP / Whatsapp</td>
            <td>: 123456789012</td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>: Tidak disetel</td>
          </tr>
        </table>
      </div>

      <button type="button">Logout</button>
    </div>
    <!-- Form Data Akun End -->

    <script>
      feather.replace();
    </script>
    <script src="../JAVASCRIPT/script.js"></script>
  </body>
</html>
