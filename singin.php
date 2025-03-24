<?php
// Veritabanı bağlantısı
$host = "localhost";
$dbname = "safakyapi111";
$username = "root"; 
$password = ""; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}

// Formdan veri geldiyse işle
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $pass = trim($_POST["password"]);
    $pass_repeat = trim($_POST["password_repeat"]);

    // Şifreler aynı mı kontrol et
    if ($pass !== $pass_repeat) {
        $message = "Hata: Şifreler eşleşmiyor!";
    } else {
        // Kullanıcı adı veya e-posta kullanılıyor mu kontrol et
        $checkQuery = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $checkQuery->execute([$user, $email]);

        if ($checkQuery->rowCount() > 0) {
            $message = "Bu kullanıcı adı veya e-posta zaten kayıtlı!";
        } else {
            // ŞİFREYİ DÜZ METİN OLARAK KAYDETME (GÜVENLİ DEĞİL)
            $query = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            if ($query->execute([$user, $email, $pass])) {
                $message = "Kayıt başarılı! <a href='http://localhost/phpmyadmin/public_html/login.php'>Giriş Yap</a>";
            } else {
                $message = "Kayıt başarısız, tekrar deneyin!";
            }
        }
    }
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
    <meta author="Mustafa Esat Yücel">
    <title>ŞAFAK YAPI</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="index.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 6.21.2, nicepage.com">
    <meta name="referrer" content="origin">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
   
    
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Sayfa 2">
    <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">    <link rel="stylesheet" href="style.css">

  <style>
/* Animasyon ekleme */
@keyframes slideIn {
    from {
        transform: translate(-50%, -100%);
        opacity: 0;
    }
    to {
        transform: translate(-50%, -50%);
        opacity: 1;
    }
}

.panel {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    width: 450px;
    text-align: center;
    animation: slideIn 1s ease-out forwards;
}

.panel h2 {
    font-size: 30px;
    color: #3e2723;
    margin-bottom: 20px;
}

.panel input {
    width: 100%;
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 16px;
}

.panel input:focus {
    border-color: #c2a477;
    outline: none;
}

.panel button {
    width: 100%;
    padding: 15px;
    background-color: #c2a477;
    border: none;
    border-radius: 10px;
    color: white;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
}

.panel button:hover {
    background-color: #a68659;
    transform: translateY(-3px);
}

.password-container {
    position: relative;
    width: 100%;
}

.password-container input {
    padding-right: 40px;
}

.toggle-password {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 18px;
    color: #a68659;
    /* Göz ikonları için küçük boşluk bırak */
    width: 20px;
    height: 20px;
}

.toggle-password img {
    width: 20px;
    height: 20px;
}
  </style>
<script>// Sayfa yüklendiğinde animasyonu başlat
  // Sayfa yüklendiğinde animasyonu başlat
    window.onload = function() {
        const panel = document.querySelector('.panel');
        panel.style.animationPlayState = 'running'; // Animasyonu başlat
        
        // Başlangıçta göz ikonunu "göster" olarak ayarlıyoruz.
        const toggleIcon = document.querySelector(".toggle-password");
        toggleIcon.innerHTML = '<img src="images/866970.png" alt="Göster">'; // Başlangıçta göster ikonunu ekle
    };

    // Şifreyi göster/gizle fonksiyonu
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const toggleIcon = document.querySelector(".toggle-password");
        const isPassword = passwordField.type === "password";
        passwordField.type = isPassword ? "text" : "password";
        
        // Göz ikonunu değiştir
        if (isPassword) {
            toggleIcon.innerHTML = '<img src="images/866970.png" alt="Göster">'; // Göz ikonunu ekleyin
        } else {
            toggleIcon.innerHTML = '<img src="images/8442581.png" alt="Gizle">'; // Göz kapalı ikonunu ekleyin
        }
    }
</script>
  
</head>
  <body data-home-page="Sayfa-2.html" data-home-page-title="ŞAFAK YAPI" data-path-to-root="/" data-include-products="false" class="u-body u-xl-mode" data-lang="tr"><header class="u-clearfix u-header u-header" id="sec-0bfd"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
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
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="http://localhost/phpmyadmin/safakyapi1/iletisim.php" style="padding: 10px 20px;">İletişim</a>
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="projelerimiz.html" style="padding: 10px 20px;">Projelerimiz</a>
                </li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="http://localhost/phpmyadmin/safakyapi1/login.php" style="padding: 10px 20px;">Üye Girişi</a>
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
                    </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="http://localhost/phpmyadmin/safakyapi1/iletisim.php">İletişim</a>
                    </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="projelerimiz.html">Projelerimiz</a>
                    </li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="http://localhost/phpmyadmin/safakyapi1/login.php">Üye Girişi</a>
                    </li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div>
    </header>
    
    <h2 style="display: block; text-align: center; font-family: 'Times New Roman', Times, serif;">Kayıt Ol</h2>

    

    <form class="panel" method="post">
        <label>Kullanıcı Adı:</label>
        <input type="text" name="username" required><br><br>
        
        <label>E-Posta:</label>
        <input type="email" name="email" required><br><br>
        
        <label>Şifre:</label>
        <input type="password" name="password" required><br><br>

        <label>Şifre Tekrar:</label>
        <input type="password" name="password_repeat" required><br><br>

        <button type="submit">Kayıt Ol</button>

        <?php if ($message) { echo "<p>$message</p>"; } ?>
    </form>


    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
       <br><br><br><br><br><br>
       



    <footer style="" class="u-align-center u-clearfix u-container-align-center u-footer u-grey-80 u-footer" id="sec-8ac6"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1"></p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <p class="u-text">
        <span>Producer of this site</span>
        <a class="u-link" href="" target="_blank" rel="nofollow">
          <span>Mustafa Esat Yücel</span>
        </a>
      </p>
    </section>
  
    <script src="script.js"></script>
</body></html>