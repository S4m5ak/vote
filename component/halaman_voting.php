<?php
include("koneksi.php"); // Sertakan file koneksi.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_peserta = $_POST['id_peserta'];

    // Lakukan verifikasi otentikasi pemilih di sini jika diperlukan

    // Update jumlah suara peserta yang dipilih
    $query = "UPDATE peserta_voting SET jumlah_suara = jumlah_suara + 1 WHERE id = $id_peserta";
    if ($koneksi->query($query) === TRUE) {
        header("Location: end.php");
    } else {
        $pesan = "Terjadi kesalahan dalam pemrosesan suara: " . $koneksi->error;
    }
}

// Mengambil daftar peserta dari basis data
$query_peserta = "SELECT id, nama_peserta FROM peserta_voting";
$result_peserta = $koneksi->query($query_peserta);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Voting</title>
</head>
<body>
    <h1>Pilih Peserta</h1>
    <?php
    if (isset($pesan)) {
        echo "<p>$pesan</p>";
    }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <select name="id_peserta">
            <?php
            while ($row_peserta = $result_peserta->fetch_assoc()) {
                echo '<option value="' . $row_peserta['id'] . '">' . $row_peserta['nama_peserta'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Pilih">
    </form>
</body>
</html>