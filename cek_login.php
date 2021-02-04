<?php
include 'config.php';

if (isset($_POST['log'])) {
    $user = $link->real_escape_string($_POST['username']);
    $pass = $link->real_escape_string($_POST['password']);

    // $pass = md5($pass);
    $query = $link->query("SELECT * FROM tb_user WHERE username = '$user' AND password='$pass'");
    $data = $query->fetch_array();
    $username = $data['username'];
    $password = $data['password'];

    if ($user == $username && $pass == $password) {
        session_start();
        $_SESSION['nama'] = $username;
        $name = $_SESSION['nama'];

        echo "<script>alert('Anda berhasil login. Sebagai : $name');</script>";
        echo "<meta http-equiv='refresh' content='0; url=home.php'>";
    } else {
        echo "<script>alert('Username dan Password Tidak Ditemukan');</script>";
        echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
    }
}
