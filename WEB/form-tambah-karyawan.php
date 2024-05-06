<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <title>Tambah Karyawan</title>

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="../CSS/style-fe-karyawan.css"
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
      <h1 style="margin-right: 90px">MANAJEMEN KARYAWAN</h1>
      <a
        href="akun.php"
        id="profile"
        ><i data-feather="user"></i
      ></a>
    </header>
    <div id="batas"></div>
    <!-- Profile end -->

    <!-- Form Tambah Karyawan Start -->
    <div class="form-container">
      <div class="form">
        <div class="icon">
          <div class="keterangan">
            <span id="feather-icon"><i data-feather="table"></i></span>
            <span>ADD KARYAWAN</span>
          </div>
        </div>
        <form
          action=""
          method="POST"
        >
          <label for="id">Id</label><br />
          <input
            type="text"
            id="id"
            name="id"
            placeholder="K00X"
            required
          /><br />

          <label for="nama">Nama Karyawan</label><br />
          <input
            type="text"
            id="nama"
            name="nama"
            placeholder="Employee Name"
            required
          /><br />

          <label for="email">Email</label><br />
          <input
            type="email"
            id="email"
            name="email"
            placeholder="email@example.com"
            required
          /><br />

          <label for="password">Password</label><br />
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Their Password"
            required
          /><br />

          <label for="password">Konfirmasi Password</label><br />
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Their Password"
            required
          /><br />

          <label for="alamat">Alamat</label><br />
          <input
            type="text"
            id="alamat"
            name="alamat"
            step="2"
            placeholder="Address"
            required
          /><br />

          <label for="posisi_karyawan">Posisi Karyawan</label><br />
          <input
            type="text"
            id="posisi_karyawan"
            name="posisi_karyawan"
            step="2"
            placeholder="Position"
            required
          /><br />

          <button
            type="submit"
            name="submit"
            style="cursor: pointer"
          >
            Submit
          </button>

          <button
            type="reset"
            style="cursor: pointer"
            id="reset"
            name="reset"
          >
            Reset
          </button>
        </form>
      </div>
    </div>

    <!-- Form Tambah Karyawan End -->
    <script>
      feather.replace();
    </script>
  </body>
</html>
