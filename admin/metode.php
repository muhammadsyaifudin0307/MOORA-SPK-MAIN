<?php include "header.php"; ?>

<h2 class="mb-4 font-weight-bolder">Metode</h2>
<hr>
<br>
<h5 class="mb-4 font-weight-bolder">Data Kriteria</h5>

<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama kriteria</th>
            <th class="text-center">Bobot</th>
        </tr>
    </thead>
    <?php
    //normalisasi bobot
    $n_wj = array();
    $sql = "SELECT * FROM tbl_kriteria ORDER BY id_kriteria";
    $stm = $conn->query($sql);
    $no = 1;
    while ($a = $stm->fetch_assoc()) {
        //normalisasi bobot
        $nwj = $a['bobot_kriteria'];
        $n_wj[] = array(
            'nilai_wj' => $nwj
        );
    ?>
        <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td class="text-center"><?= $a['nama_kriteria'] ?> - (<?= $a['tipe_kriteria'] ?>)</td>
            <td class="text-center"><?= $a['bobot_kriteria'] ?></td>
        </tr>
    <?php } ?>
</table>
<br>
<h5 class="mb-4 font-weight-bolder">Matrik Keputusan</h5>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Alternatif</th>
            <?php
            $ket = "SELECT * FROM tbl_kriteria ORDER BY id_kriteria";
            $a = $conn->query($ket);
            while ($row = $a->fetch_assoc()) {
                echo "<th class='text-center'>$row[nama_kriteria]</th>";
            } ?>
        </tr>
    </thead>
    <?php
    $sql = "SELECT * FROM tbl_alternatif ORDER BY id_alternatif";
    $stm = $conn->query($sql);
    $no = 1;
    while ($a = $stm->fetch_assoc()) {
        $id_alternatif = $a['id_alternatif'];
        $nm_alternatif = $a['nama_alternatif'];
        $cek = "SELECT * FROM  tbl_nilai WHERE id_alternatif='$id_alternatif'";
        $k = $conn->query($cek);
        if ($k->num_rows > 0) { ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center"><?= $a['nama_alternatif'] ?></td>;
                <?php
                $data = "SELECT s.nama_subkriteria as nm_sub FROM tbl_nilai n, tbl_subkriteria s 
                         WHERE n.id_subkriteria=s.id_subkriteria AND n.id_alternatif='$id_alternatif' ORDER BY n.id_kriteria";
                $b = $conn->query($data);
                while ($dtn = $b->fetch_assoc()) {
                    echo "<td class='text-center'>$dtn[nm_sub]</td>";
                } ?>
            </tr>
    <?php }
    } ?>
</table>
<br>

<h5 class="mb-4 font-weight-bolder">Konversi Matrik Keputusan</h5>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Alternatif</th>
            <?php
            $ket = "SELECT * FROM tbl_kriteria ORDER BY id_kriteria";
            $a = $conn->query($ket);
            while ($row = $a->fetch_assoc()) {
                echo "<th class='text-center'>$row[nama_kriteria] - ($row[tipe_kriteria])</th>";
            } ?>
        </tr>
    </thead>
    <?php
    $sql = "SELECT * FROM tbl_alternatif ORDER BY id_alternatif";
    $stm = $conn->query($sql);
    $no = 1;
    while ($a = $stm->fetch_assoc()) {
        $id_alternatif = $a['id_alternatif'];
        $nm_alternatif = $a['nama_alternatif'];
        $cek = "SELECT * FROM  tbl_nilai WHERE id_alternatif='$id_alternatif'";
        $k = $conn->query($cek);
        if ($k->num_rows > 0) { ?>
            <tr>
                <td class="text-center"><?= $no++ ?></td>
                <td class="text-center"><?= $a['nama_alternatif'] ?></td>;
                <?php
                $data = "SELECT s.nilai_subkriteria as n_sub, n.id_kriteria as id_kriteria, k.tipe_kriteria as tipe_kriteria 
                         FROM tbl_nilai n, tbl_subkriteria s, tbl_kriteria k 
                         WHERE n.id_subkriteria=s.id_subkriteria AND n.id_kriteria = k.id_kriteria AND n.id_alternatif='$id_alternatif' 
                         ORDER BY n.id_kriteria";
                $b = $conn->query($data);
                while ($dtn = $b->fetch_assoc()) {
                    $nilai_sub = $dtn['n_sub'];
                    echo "<td class='text-center'>$nilai_sub</td>";
                } ?>
            </tr>
    <?php }
    } ?>
</table>
<br>

<h5 class="mb-4 font-weight-bolder">Normalisasi Matrik</h5>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">Nama Alternatif</th>
            <?php
            // Mengambil nama kriteria untuk header tabel
            $ket = "SELECT * FROM tbl_kriteria ORDER BY id_kriteria";
            $a = $conn->query($ket);
            while ($row = $a->fetch_assoc()) {
                echo "<th class='text-center'>{$row['nama_kriteria']}</th>";
            }
            ?>
        </tr>
    </thead>
    <?php
    // Mengambil daftar alternatif
    $sql = "SELECT * FROM tbl_alternatif ORDER BY id_alternatif";
    $stm = $conn->query($sql);

    // Inisialisasi variabel untuk menyimpan data
    $sample = [];
    $kriteria = [];
    $alternatif = [];

    // Memproses data dari database
    $query = "
    SELECT 
        n.id_alternatif, 
        n.id_kriteria, 
        k.tipe_kriteria, 
        s.nilai_subkriteria AS n_sub,
        a.nama_alternatif
    FROM 
        tbl_nilai n
    JOIN 
        tbl_subkriteria s ON n.id_subkriteria = s.id_subkriteria
    JOIN 
        tbl_kriteria k ON n.id_kriteria = k.id_kriteria
    JOIN 
        tbl_alternatif a ON n.id_alternatif = a.id_alternatif
    ORDER BY 
        n.id_alternatif, n.id_kriteria";

    $result = $conn->query($query);

    while ($row = $result->fetch_assoc()) {
        $id_alternatif = $row['id_alternatif'];
        $id_kriteria = $row['id_kriteria'];
        $n_sub = $row['n_sub'];
        $nama_alternatif = $row['nama_alternatif'];

        // Mengisi data alternatif dan kriteria
        $sample[$id_alternatif][$id_kriteria] = $n_sub;
        $kriteria[$id_kriteria] = $row['tipe_kriteria'];
        $alternatif[$id_alternatif] = $nama_alternatif;
    }

    // Inisialisasi nilai normalisasi dengan nilai dari $sample
    $normal = $sample;

    // Melakukan normalisasi
    foreach ($kriteria as $id_kriteria => $k) {
        // Inisialisasi nilai pembagi tiap kriteria
        $pembagi = 0;

        // Menghitung pembagi
        foreach ($alternatif as $id_alternatif => $nama_alternatif) {
            $pembagi += pow($sample[$id_alternatif][$id_kriteria], 2);
        }
        $pembagi = sqrt($pembagi);

        // Melakukan normalisasi
        foreach ($alternatif as $id_alternatif => $nama_alternatif) {
            $normal[$id_alternatif][$id_kriteria] /= $pembagi;
        }
    }

    // Menampilkan hasil normalisasi
    foreach ($alternatif as $id_alternatif => $nama_alternatif) {
        echo "<tr>";
        echo "<td class='text-center'>$nama_alternatif</td>";

        foreach ($kriteria as $id_kriteria => $nama_kriteria) {
            echo "<td class='text-center'>" . number_format($normal[$id_alternatif][$id_kriteria], 4) . "</td>"; // Menggunakan number_format untuk pembulatan
        }

        echo "</tr>";
    }
    ?>
</table>
<br>

<h5 class="mb-4 font-weight-bolder">Perhitungan Nilai Optimasi</h5>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Alternatif</th>
            <th class="text-center">Total Benefit</th>
            <th class="text-center">Total Cost</th>
            <th class="text-center">Nilai Optimasi (Benefit - Cost)</th>
        </tr>
    </thead>
    <?php
    // Fetch the weights for each criterion
    $weights = [];
    $weight_sql = "SELECT id_kriteria, bobot_kriteria FROM tbl_kriteria";
    $weight_stm = $conn->query($weight_sql);
    while ($row = $weight_stm->fetch_assoc()) {
        $weights[$row['id_kriteria']] = $row['bobot_kriteria'];
    }

    $sql = "SELECT * FROM tbl_alternatif ORDER BY id_alternatif";
    $stm = $conn->query($sql);
    $no = 1;
    while ($a = $stm->fetch_assoc()) {
        $id_alternatif = $a['id_alternatif'];
        $nm_alternatif = $a['nama_alternatif'];
        $total_benefit = 0;
        $total_cost = 0;

        foreach ($kriteria as $id_kriteria => $tipe_kriteria) {
            if (isset($normal[$id_alternatif][$id_kriteria])) {
                $nilai_sub = $normal[$id_alternatif][$id_kriteria];
                $nilai_berbobot = $nilai_sub * $weights[$id_kriteria]; // Multiply by weight
                if ($tipe_kriteria == 'Benefit') {
                    $total_benefit += $nilai_berbobot;
                } else if ($tipe_kriteria == 'Cost') {
                    $total_cost += $nilai_berbobot;
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>Error: Normalized value for alternative ID $id_alternatif and criteria ID $id_kriteria not found.</td></tr>";
            }
        }

        $nilai_optimasi = $total_benefit - $total_cost;

        $update_sql = "UPDATE tbl_alternatif SET nilai_moora = '$nilai_optimasi' WHERE id_alternatif = '$id_alternatif'";
        $conn->query($update_sql);

    ?>
        <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td class="text-center"><?= $nm_alternatif ?></td>
            <td class="text-center"><?= number_format($total_benefit, 4) ?></td>
            <td class="text-center"><?= number_format($total_cost, 4) ?></td>
            <td class="text-center"><?= number_format($nilai_optimasi, 4) ?></td>
        </tr>
    <?php } ?>
</table>


</div>
</div>