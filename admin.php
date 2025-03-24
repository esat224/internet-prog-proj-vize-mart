<?php
session_start(); // Oturum başlatma
?>
<?php
try {
    $baglanti = new PDO("mysql:host=127.0.0.1:3306;dbname=safakyapi111;charset=utf8", "root", "");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}

if (isset($_GET["sil"])) {
    $IDPRKE = $_GET["sil"];
    $stmt = $baglanti->prepare("DELETE FROM stokbilgileri WHERE IDPRKE = ?");
    $stmt->execute([$IDPRKE]);
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?')); // Yönlendirme yaparak URL'yi temizle
    exit();
}

if (isset($_GET["silform"])) {
    $IDmsg = $_GET["silform"];
    $stmt = $baglanti->prepare("DELETE FROM formmessage WHERE IDmsg = ?");
    $stmt->execute([$IDmsg]);
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?')); // Yönlendirme yaparak URL'yi temizle
    exit();
}
if (isset($_GET["silpaylasim"])) {
  $ID = $_GET["silpaylasim"];
  $stmt = $baglanti->prepare("DELETE FROM duyurular WHERE ID = ?");
  $stmt->execute([$ID]);
  header("Location: " . strtok($_SERVER["REQUEST_URI"], '?')); // Yönlendirme yaparak URL'yi temizle
  exit();
}
if (isset($_GET["silpaylasimfir"])) {
  $ID = $_GET["silpaylasimfir"];
  $stmt = $baglanti->prepare("DELETE FROM firsatlar WHERE ID = ?");
  $stmt->execute([$ID]);
  header("Location: " . strtok($_SERVER["REQUEST_URI"], '?')); // Yönlendirme yaparak URL'yi temizle
  exit();
}
?>





<!DOCTYPE html>
<html style="font-size: 16px;" lang="tr"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="Şafak Yapı , Parke , Süpürgelik , Showroom , Uygun , 
    Ucuz , Dayanıklı ,Suya Dayanıklı , Suya Dayanıklı Parke , Her Renk Parke">
    <meta name="description" content="Şafak Yapı ile evinize sadece parke değil huzur ve 
    şıklık getirin.">
    <meta name="generator" content="Esat Yücel">
    <meta name="author" content="Esat Yücel">
    <title>ŞAFAK YAPI</title>
    <link rel="shortcut icon" href="images/favicon.ico"/>
    <link rel="stylesheet" href="style.css" media="screen">
    <link rel="stylesheet" href="style.css" media="screen">
    <script class="u-script" type="text/javascript" src="script.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="script.js" defer=""></script>
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Şafak Yapı">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">    <link rel="stylesheet" href="style.css">

    <style>
        /* Genel gövde ve tablo düzeni */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .table-container {
            width: 80%;
            max-width: 1200px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #f4f4f4;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: rgb(120, 122, 124);
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #eaeaea;
        }

        tr:hover {
            background-color: #d1e7ff;
        }

        td {
            background-color: #ffffff;
        }

        @media screen and (max-width: 768px) {
            table, th, td {
                font-size: 14px;
            }
        }

        footer {
            margin-top: auto;
        }

        .welcome-message {
            display: block;
            text-align: center;
            font-size: 44px; /* İstediğiniz boyutu ayarlayın */
            font-weight: bold;
            padding-bottom: 60px;
        }

        button {
          background-color: #ddd;
          width: 100px;
          height: 40px;
          display: block;
          
        }

        input {
          background-color:#f6f5f5 ;
          height: 40px;
        }

        .buttonn {
          display:flex;
          align-items:center;
          justify-content:center;
        }

        .containerr {
          width: 80%;
            max-width: 1200px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .containerr1 {
          width: 80%;
            max-width: 1200px;
            margin: 40px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            
          
        }

        input {
          border-radius: 6%;
          border-color: burlywood;
        }

        .labell {
          padding-right: 20px;
          border-color: burlywood;
        }

        button {
          border-color: burlywood;
          background-color: antiquewhite;
          border-radius: 10px;
        }

        .labell1 {
          background-color: antiquewhite;
          text-align: center;
        }
    </style>

    </head>
    <body data-home-page="index.html" data-home-page-title="ŞAFAK YAPI" data-path-to-root="/" data-include-products="false" class="u-body u-xl-mode" data-lang="tr"><header class="u-clearfix u-header u-header" id="sec-0bfd"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <a href="index.html" class="u-image u-logo u-image-1">
          <img src="images/default-logo.png" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
            <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-hamburger-link u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
            </g></svg>
            </a>
          </div>
          <div class="u-nav-container">
            <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="subemiz.html" style="padding: 10px 20px;">Şubemiz</a>
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="hakkinda.html" style="padding: 10px 20px;">Hakkında</a>
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="http://localhost/phpmyadmin/public_html/duyurular.php" style="padding: 10px 20px;">Duyurular</a>
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="http://localhost/phpmyadmin/public_html/iletisim.php" style="padding: 10px 20px;">İletişim</a>
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="projelerimiz.html" style="padding: 10px 20px;">Projelerimiz</a>
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="http://localhost/phpmyadmin/public_html/login.php" style="padding: 10px 20px;">Üye Girişi</a>
                </li></ul>
          </div>
          <hr>
          <div class="u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="subemiz.html">Şubemiz</a>
                    </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="hakkinda.html">Hakkında</a>
                    </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="http://localhost/phpmyadmin/public_html/duyurular.php" style="padding: 10px 20px;">Duyurular</a>
                    </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="http://localhost/phpmyadmin/public_html/iletisim.php">İletişim</a>
                    </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="projelerimiz.html">Projelerimiz</a>
                    </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="http://localhost/phpmyadmin/public_html/login.php">Üye Girişi</a>
                    </li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div>
    </header>
    <div class="table-container">
    
    
    <div class="container">
    
    
        
        <?php
          if (!isset($_SESSION["username"])) {
            header("Location: http://localhost/phpmyadmin/public_html/login.php");
            exit();
          }
          echo "<p class='welcome-message'>Hoş geldin, " . htmlspecialchars($_SESSION["username"]) . "!</p>";
      ?>

        <h2>Form Mesajları</h2>
        <?php
        $oku = $baglanti->query("SELECT * FROM formmessage", PDO::FETCH_ASSOC);
        if ($oku->rowCount() > 0) {
            echo "<table>
                    <tr>
                        <th>ID</th>
                        <th>İsim</th>
                        <th>Email</th>
                        <th>Mesaj</th>
                        <th>İşlem</th>
                    </tr>";
            foreach ($oku as $veriler) {
                echo "<tr>
                        <td>" . htmlspecialchars($veriler["IDmsg"]) . "</td>
                        <td>" . htmlspecialchars($veriler["name_"]) . "</td>
                        <td>" . htmlspecialchars($veriler["email_"]) . "</td>
                        <td>" . htmlspecialchars($veriler["message"]) . "</td>
                        <td><a href='?silform=" . $veriler['IDmsg'] . "' class='delete-btn'>Sil</a></td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Form mesajları bulunamadı.</p>";
        }
        ?>
    </div>
        <br> <br>
    <div class="container12" id="container12">
        <h2>Stok Ekle</h2>
        <form class="containerr" style="padding-left: 40px;" method="POST">
            <input type="text" name="prketuru" placeholder="Parke Türü" required>
            <input type="text" name="prkerengi" placeholder="Parke Rengi" required>
            <input type="number" name="miktar" placeholder="Miktar" required>
            <input type="number" name="fiyatim2" placeholder="Fiyat (m²)" required> <br> <br> 
            <button type="submit" name="ekle">Ekle</button> 
        </form>
        <br> <br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ekle"])) {
            $prketuru = $_POST["prketuru"];
            $prkerengi = $_POST["prkerengi"];
            $miktar = $_POST["miktar"];
            $fiyatim2 = $_POST["fiyatim2"];

            $stmt = $baglanti->prepare("INSERT INTO stokbilgileri (prketuru, prkerengi, miktar, fiyatim2) VALUES (?, ?, ?, ?)");
            $stmt->execute([$prketuru, $prkerengi, $miktar, $fiyatim2]);

            echo "<meta http-equiv='refresh' content='0'>";
        }
        ?>

        <h2>Stok Bilgileri</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Parke Türü</th>
                <th>Parke Rengi</th>
                <th>Miktar</th>
                <th>Fiyat (m²)</th>
                <th>İşlem</th>
            </tr>
            <?php
            $stokListesi = $baglanti->query("SELECT * FROM stokbilgileri", PDO::FETCH_ASSOC);
            foreach ($stokListesi as $stok) {
                echo "<tr>
                        <td>" . htmlspecialchars($stok["IDPRKE"]) . "</td>
                        <td>" . htmlspecialchars($stok["prketuru"]) . "</td>
                        <td>" . htmlspecialchars($stok["prkerengi"]) . "</td>
                        <td>" . htmlspecialchars($stok["miktar"]) . "</td>
                        <td>" . htmlspecialchars($stok["fiyatim2"]) . " ₺</td>
                        <td><a href='?sil=" . $stok['IDPRKE'] . "' class='delete-btn'>Sil</a></td>
                      </tr>";
            }
            ?>
        </table>

        <br> <br>
    </div>
    
        <h2>Yeni Duyuru / Fırsat Ekle</h2>
    <form class="containerr1" action="" method="post" enctype="multipart/form-data">
        <label class="labell">Başlık:</label>
        <input class="labell" type="text" name="baslik" required><br><br>

        <label class="labell">Açıklama:</label>
        <textarea name="aciklama" required></textarea><br><br>

        <label class="labell">Tür:</label>
        <select name="tur">
            <option value="duyuru" class="labell">Duyuru</option>
            <option value="fırsat" class="labell">Fırsat</option>
        </select><br><br>

        <label class="labell">Görsel Yükle:</label>
        <input class="labell" type="file" name="dosya" required><br><br>

        <button class="labell1" type="submit" name="kaydet" value="Paylaş">Paylaş</button>
    </form>
    <?php
if(isset($_POST['kaydet'])) {
    $baslik = $_POST['baslik'];
    $aciklama = $_POST['aciklama'];
    $tur = $_POST['tur']; // Fırsat mı duyuru mu seçimi

    // Dosya yükleme işlemi
    $hedef_klasor = "images/";  // Resimler için hedef klasör
    $dosya_adı = basename($_FILES["dosya"]["name"]);
    $hedef_dosya = $hedef_klasor . $dosya_adı;

    if(move_uploaded_file($_FILES["dosya"]["tmp_name"], $hedef_dosya)) {
        // Doğru tabloyu seç
        $tablo = ($tur == "fırsat") ? "firsatlar" : "duyurular";
        $sql = "INSERT INTO $tablo (baslik, aciklama, resim_yolu) VALUES (:baslik, :aciklama, :resim_yolu)";

        // PDO bağlantısının kontrolü ve sorgu hazırlama
        try {
            $stmt = $baglanti->prepare($sql);

            // Parametreleri bağla
            $stmt->bindValue(':baslik', $baslik, PDO::PARAM_STR);
            $stmt->bindValue(':aciklama', $aciklama, PDO::PARAM_STR);
            $stmt->bindValue(':resim_yolu', $hedef_dosya, PDO::PARAM_STR);

            // Sorguyu çalıştır
            if ($stmt->execute()) {
                echo "<p style='color:green;'>Başarıyla paylaşıldı !</p>";
            } else {
                echo "<p style='color:red;'>Veritabanına ekleme başarısız.</p>";
            }
        } catch (PDOException $e) {
            echo "<p style='color:red;'>Veritabanı hatası: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p style='color:red;'>Dosya yükleme başarısız.</p>";
    }
}
?>
            <br> <br>
      <h2>Duyurular</h2>
      <?php
      $tablo = "duyurular"; // Duyuruları ve fırsatları listelemek için tabloyu seçiyoruz
      $oku = $baglanti->query("SELECT * FROM $tablo", PDO::FETCH_ASSOC);
      if ($oku->rowCount() > 0) {
          echo "<table>
                  <tr>
                      <th>ID</th>
                      <th>Başlık</th>
                      <th>Açıklama</th>
                      <th>Görsel</th>
                      <th>İşlem</th>
                  </tr>";
          foreach ($oku as $veriler) {
              echo "<tr>
                      <td>" . htmlspecialchars($veriler["ID"]) . "</td>
                      <td>" . htmlspecialchars($veriler["baslik"]) . "</td>
                      <td>" . htmlspecialchars($veriler["aciklama"]) . "</td>
                      <td><img src='" . htmlspecialchars($veriler["resim_yolu"]) . "' width='100' height='100' alt='Görsel'></td>
                      <td><a href='?silpaylasim=" . $veriler['ID'] . "' class='delete-btn'>Sil</a></td>
                    </tr>";
          }
          echo "</table>";
      } else {
          echo "<p>Henüz duyuru bulunmamaktadır</p>";
      }
      ?>
      <br> <br>
      <h2>Fırsatlar</h2>
      <?php
      $tablo = "firsatlar"; // Duyuruları ve fırsatları listelemek için tabloyu seçiyoruz
      $oku = $baglanti->query("SELECT * FROM $tablo", PDO::FETCH_ASSOC);
      if ($oku->rowCount() > 0) {
          echo "<table>
                  <tr>
                      <th>ID</th>
                      <th>Başlık</th>
                      <th>Açıklama</th>
                      <th>Görsel</th>
                      <th>İşlem</th>
                  </tr>";
          foreach ($oku as $veriler) {
              echo "<tr>
                      <td>" . htmlspecialchars($veriler["ID"]) . "</td>
                      <td>" . htmlspecialchars($veriler["baslik"]) . "</td>
                      <td>" . htmlspecialchars($veriler["aciklama"]) . "</td>
                      <td><img src='" . htmlspecialchars($veriler["resim_yolu"]) . "' width='100' height='100' alt='Görsel'></td>
                      <td><a href='?silpaylasimfir=" . $veriler['ID'] . "' class='delete-btn'>Sil</a></td>
                    </tr>";
          }
          echo "</table>";
      } else {
          echo "<p>Henüz fırsat bulunmamaktadır.</p>";
      }
      ?>
      <br> <br>

    <a style="padding-top: 40px; display: block; text-align: center; font-size: 20px;" href="logout.php">Çıkış Yap</a>
    </div>
    <footer class="u-align-center u-clearfix u-container-align-center u-footer u-grey-80 u-footer" id="sec-8ac6"><div class="u-clearfix u-sheet u-sheet-1">
      <section class="u-backlink u-clearfix u-grey-80">
        <p>Şafak Yapı</p> <br><br>
        <p class="u-text">
          Producer of this site
          <a class="u-link" href="https://www.instagram.com/esatyucelsoftware" target="_blank" rel="nofollow">
            Esat Yücel
          </a>
        </p> <br><br> <br><br>
      </section>
      </div>
    </footer>
  
    <script src="script.js"></script>
</body></html>