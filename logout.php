<?php
session_start();
session_destroy();
header("Location: login.php"); // Çıkış yaptıktan sonra giriş sayfasına yönlendir
exit;
?>
