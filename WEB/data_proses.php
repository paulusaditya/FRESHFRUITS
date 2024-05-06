<?php
require '../PHP/crud-produk.php';
// require '../PHP/apriori.php';

$rows = query("SELECT 
              dt.kode_transaksi, 
              p.nama_produk 
              FROM 
              detail_transaksi dt 
              JOIN transaksi t ON  dt.kode_transaksi=t.kode 
              JOIN produk p ON dt.produk_terjual = p.kode
              ORDER BY dt.kode_transaksi
              ");

$dataset = array();
foreach ($rows as $row) {
    $dataset[$row['kode_transaksi']][] = $row['nama_produk'];
}
$dataset = array_values($dataset);

// var_dump($dataset);

$min_support = 0.3;
$min_frequency = 3;
$jumlah_transaksi = count($dataset);


function frequency_item($data) {
    $freq_dict = [];
    foreach ($data as $sublist) {
        foreach ($sublist as $item) {
            if (array_key_exists($item, $freq_dict)) {
                $freq_dict[$item] += 1;
            } else {
                $freq_dict[$item] = 1;
            }
        }
    }

    return $freq_dict;
}

$item_frequency = frequency_item($dataset);
// var_dump($item_frequency);


function eliminasi_item($frekuensi, $min_frequency, $dataset, $min_support) {
    $keys_to_remove = [];
    $eliminasi_item = [];
    foreach ($frekuensi as $key => $value) {
        $p_support = $value / count($dataset);

        if ($value < $min_frequency || $p_support < $min_support) {
            $keys_to_remove[] = $key;
            $eliminasi_item[$key] = "Tidak lolos";
        } else {
            $eliminasi_item[$key] = "lolos";
        }
    }
    

    foreach ($keys_to_remove as $key) {
        unset($frekuensi[$key]);
    }

    return [$frekuensi, $eliminasi_item];
}

$result = eliminasi_item($item_frequency, $min_frequency, $dataset, $min_support);
$sorted_items = $result[0];
$eliminasi_item = $result[1];


// Start Apriori
function removeDuplicateValues($array) {
    $uniqueArray = array();
    foreach ($array as $subArray) {
        // Urutkan nilai dalam sub array untuk membandingkan kesamaan isi
        sort($subArray);
        // Jika sub array belum ada di $uniqueArray, tambahkan ke $uniqueArray
        if (!in_array($subArray, $uniqueArray)) {
            $uniqueArray[] = $subArray;
        }
    }
    return $uniqueArray;
}

// Fungsi untuk menghasilkan candidate itemsets
function generate_candidate_itemsets($itemset, $k) {
    $candidate_itemsets = [];
    $n = count($itemset);
    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            $new_itemset = array_unique(array_merge($itemset[$i], $itemset[$j]));
            if (count($new_itemset) == $k) {
                $candidate_itemsets[] = array_values($new_itemset); // Convert to indexed array
            }
        }
    }
    
    // Panggil fungsi removeDuplicateValues untuk menghapus nilai ganda
    $candidate_itemsets = removeDuplicateValues($candidate_itemsets);
    
    return $candidate_itemsets;
}


function count_frequency($dataset, $candidate_itemsets) {
    $frequency = [];
    foreach ($dataset as $transaction) {
        foreach ($candidate_itemsets as $itemset) {
            if (empty(array_diff($itemset, $transaction))) {
                $itemset_str = implode(", ", $itemset);
                if (isset($frequency[$itemset_str])) {
                    $frequency[$itemset_str]++;
                } else {
                    $frequency[$itemset_str] = 1;
                }
            }
        }
    }
    return $frequency;
}


function check_frequency($frequency, $min_support, $min_frequency, $dataset) {
    $frequent_itemsets = [];
    $eliminasi_item = [];
    foreach ($frequency as $itemset => $count) {
        $support = $count / count($dataset);
        if ($count >= $min_frequency && $support >= $min_support) {
            $frequent_itemsets[$itemset] = $count;
            $eliminasi_item[$itemset] = "Lolos";
        } else {
            $eliminasi_item[$itemset] = "Tidak Lolos";
        }
    }
    return [$frequent_itemsets, $eliminasi_item];
}

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
      href="../CSS/style-data-proses.css"
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
        <span class="icon"><i data-feather="users"></i></span>
        <a
          href="karyawan.php"
          class="menu-nav"
          >Karyawan</a
        >
      </div>
      <div class="container-promosi">
        <span class="icon utama"><i data-feather="table"></i></span>
        <a
          href="#"
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
      <h1 style="margin-right: 90px">APRIORI</h1>
      <a
        href="akun.php"
        id="profile"
        ><i data-feather="user"></i
      ></a>
    </header>
    <div id="batas"></div>
    <!-- Profile end -->

    <!--  Content Promosi Diskon -->
    <section class="container-data-proses">

        <h3>Keterangan</h3>
        <h4>Min Support <?= $min_support ?></h4>
        <h4>Min Frequency <?= $min_frequency ?></h4>
        <table class="tabel">
                <h5>Candidate Itemsets 1</h5>
                <tr>
                    <th>Item Set</th>
                    <th>Frekuensi</th>
                    <th>Support</th>
                    <th>Keterangan</th>
                </tr>
                <?php foreach ($item_frequency as $item => $value): ?>
                <tr>
                    <td><?= $item ?></td>
                    <td><?= $value ?></td>
                    <td><?= number_format(($value / $jumlah_transaksi) * 100, 2) ?>%</td>
                    <?php if (isset($eliminasi_item[$item])): ?>
                        <td><?= $eliminasi_item[$item] ?></td>
                    <?php else: ?>
                        <td>-</td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
            </table>
            <table class="tabel">
                <h5> Large Itemset 1</h5>
                <tr>
                    <th>Item Set</th>
                    <th>Frekuensi</th>
                    <th>Support</th>
                </tr>
                    <?php foreach($sorted_items as $items  => $value): ?>
                        <tr>
                        <td><?=$items?></td>
                        <td><?=$value?></td>
                        <td><?= number_format(($value / $jumlah_transaksi) * 100, 2) ?>%</td>
                        </tr>
                    <?php endforeach; ?>
            </table>

            <?php 
            $itemset_1 = [];
            foreach ($dataset as $transaction) {
                foreach ($transaction as $item) {
                    if (!in_array([$item], $itemset_1)) {
                        $itemset_1[] = [$item];
                    }
                }
            }

            $k = 2;
            $candidate_itemsets = generate_candidate_itemsets($itemset_1, $k);
            // var_dump($candidate_itemsets);
            $frequent_itemsets_list_a = [];

            while ($candidate_itemsets):
                $frequent_itemsets = [];
                $frequent_itemsets_list = [];
                $antecedent = [];

                $frequency = count_frequency($dataset, $candidate_itemsets);
                // var_dump($frequency);

                $frequent_itemsets_list_a = array_merge($frequent_itemsets_list_a, check_frequency($frequency, $min_support, $min_support, $dataset)[0]);
                $frequent_itemsets = array_merge($frequent_itemsets, check_frequency($frequency, $min_support, $min_support, $dataset)[0]);

                // Buat ngecek lolos enggaknya
                $result = check_frequency($frequency, $min_support, $min_support, $dataset);
                $eliminasi_item = $result[1];

                foreach ($frequent_itemsets as $items => $value){
                    $frequent_itemsets_list[] = array_unique(explode(", ", $items));
                }

                foreach ($frequent_itemsets_list as $itemset){
                    $antecedent[] = array_slice($itemset, 0, -1);
                }

                $result = [];

                foreach ($antecedent as $key){
                    $antecedent_key = implode(", ", $key);
                    if (count($key) < 2){
                        if (isset($item_frequency[$antecedent_key])){
                            $result[$antecedent_key] = $item_frequency[$antecedent_key];
                        }
                    } else {
                        if (isset($frequent_itemsets_list_a[$antecedent_key])){
                            $result[$antecedent_key] = $frequent_itemsets_list_a[$antecedent_key];
                        }
                    }
                }
                // var_dump($result);
                // var_dump($antecedent);
                // var_dump($frequent_itemsets_list_a);
                // var_dump($frequent_itemsets);
                ?>

                <table class="tabel">
                <div class="icon">
                <div class="keterangan">
                    <span id="feather-icon"><i data-feather="table"></i></span>
                    <span>Candidate Itemset <?= $k ?></span>
                </div>
                </div>
                    <tr>
                    <th>Item Set</th>
                    <th>Frekuensi</th>
                    <th>Support</th>
                    <th>Keterangan</th>
                    </tr>
                    <?php foreach($frequency as $items => $value): ?>
                        <tr>
                            <td><?= $items ?></td>
                            <td><?= $value ?></td>
                            <td><?= number_format(($value / $jumlah_transaksi) * 100, 2) ?>%</td>
                            <?php if (isset($eliminasi_item[$items])): ?>
                                <td><?= $eliminasi_item[$items] ?></td>
                            <?php else: ?>
                                <td>-</td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </table>


                <table class="tabel">
                    <h5> Large Itemset <?= $k ?></h5>
                    <tr>
                        <th>Aturan</th>
                        <th>Support Itemset</th>
                        <th>Support Antecedent</th>
                        <th>Confidence</th>
                    </tr>
                    <?php foreach ($frequent_itemsets as $itemset => $values): ?>
                        <?php 
                        // $antecedents = [];
                        // $value_prev = [];
                        // foreach ($result as $items_prev => $val_prev){
                        //     if (strpos($itemset, $items_prev) !== false){
                        //         $antecedents[] = $items_prev;
                        //         $value_prev[] = $val_prev;
                        //         // break;
                        //     }
                        // }

                        // var_dump($antecedents);

                        ?>
                        <tr>
                            <td>Jika dibeli <?= substr_replace($itemset, " maka dibeli ", strrpos($itemset, ","), 1); ?></td>
                            <td><?= number_format(($values / $jumlah_transaksi) * 100, 2); ?>%</td>

                            <?php foreach ($result as $items_prev => $val_prev): ?>
                                <?php if (strpos($itemset, $items_prev) !== false): ?>
                                    <td><?= number_format(($val_prev / $jumlah_transaksi) * 100, 2); ?>%</td>
                                    <td><?= number_format(($values / $val_prev) * 100, 2); ?>%</td>
                                    <?php break;?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            
                        </tr>
                    <?php endforeach; ?>


                </table>
                <?php 

                    // $frequent_itemsets = array();


                    $k++;
                    $candidate_itemsets = generate_candidate_itemsets($frequent_itemsets_list, $k);

                    endwhile;
            ?>
        </section>

    <script>
      feather.replace();
    </script>
    <script src="../JAVASCRIPT/promosi.js"></script>
  </body>
</html>
