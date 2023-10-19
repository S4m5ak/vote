<?php
include("component/koneksi.php"); // Sertakan file koneksi.php untuk menghubungkan ke basis data

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $absen = $_POST['absen'];
    $nama_lengkap = $_POST['nama_lengkap'];

    $query = "SELECT * FROM user WHERE absen = '$absen' AND nama_lengkap = '$nama_lengkap'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        // Login berhasil
        // Lakukan tindakan yang diperlukan setelah login sukses
        header("Location: component/halaman_voting.php");
    } else {
        // Login gagal
        // Tampilkan pesan kesalahan
        echo "Login gagal. Absen: " . $absen . " dan Nama Lengkap: " . $nama_lengkap . " tidak cocok.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h1>Form Login</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="absen">Absen:</label>
        <input type="text" name="absen" id="absen" required><br><br>

        <label for="nama_lengkap">Nama Lengkap:</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>
