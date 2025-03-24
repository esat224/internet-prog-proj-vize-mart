<?php
    $sunucu = "localhost";
    $kullanici_adi = "root";
    $sifre = "";
    $veri_tabani = "safakyapi111";

    $baglanti = new mysqli( $sunucu, $kullanici_adi, $sifre,$veri_tabani);
    if ($baglanti->connect_error) 
        die("Bağlantı sağlanamadı : ".$baglanti->connect_error);
    else 
        echo ".";
    






?>