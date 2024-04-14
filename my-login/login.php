<?php
// Mulai sesi untuk mengelola sesi pengguna
session_start();

/**
 * Fungsi untuk melakukan pemeriksaan login sederhana tanpa menggunakan database
 *
 * @param string $username Nama pengguna yang dimasukkan
 * @param string $password Kata sandi yang dimasukkan
 * @return bool Mengembalikan true jika login berhasil, false jika tidak berhasil
 */
function simpleLogin($username, $password)
{
    // Tentukan dua set username dan password yang valid
    $validUsers = ['user1', 'user2'];
    $validPasswords = ['pass1', 'pass2'];

    // Periksa apakah username dan password yang dimasukkan valid
    if (in_array($username, $validUsers) && in_array($password, $validPasswords)) {
        // Atur variabel sesi untuk menandakan bahwa pengguna telah masuk
        $_SESSION['logged_in'] = true;

        // Atur variabel sesi untuk menyimpan nama pengguna
        $_SESSION['username'] = $username;

        return true;
    } else {
        return false;
    }
}

// Jika pengguna belum login, alihkan ke halaman login
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

// Proses pengiriman formulir
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $enteredUsername = isset($_POST['username']) ? $_POST['username'] : '';
    $enteredPassword = isset($_POST['password']) ? $_POST['password'] : '';

    if (!empty($enteredUsername) && !empty($enteredPassword)) {
        if (simpleLogin($enteredUsername, $enteredPassword)) {
            //berhasil
            echo "Login berhasil! Selamat datang, $enteredUsername.";

            //arahkan ke halaman index
            header("Location: index.php");
            exit(); // Ensure that no further code is executed after the header redirection
        } else {
            //username password salah
            echo "Nama pengguna atau kata sandi tidak valid. Silakan coba lagi.";
        }
    } else {
        //gak boleh kosong
        echo "Harap masukkan baik username maupun password.";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulir Login Sederhana</title>
</head>

<body>

    <h2>Formulir Login</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Login">
    </form>

    <!-- ini taro di bagian index.php yang ada tombol enkripsi dan deskripsi -->

    <?php if (isset($_SESSION['logged_in'])) : ?>
        <p><a href="logout.php">Logout</a></p>
    <?php endif; ?>

</body>

</html>