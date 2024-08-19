<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="view/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* CSS Styling */
        .btn-fill {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: #000000;
            background-color: #007bff;
            /* Blue color */
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-fill:hover {
            background-color: #0056b3;
            /* Darker blue on hover */
        }

        .btn-fill .icon {
            margin-right: 8px;
            /* Space between icon and text */
        }

        /* Optional: Responsive Design */
        @media (max-width: 768px) {
            .btn-fill {
                width: 100%;
                box-sizing: border-box;
            }
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPRASKA</title>
    <link rel="shortcut icon" type="image/png" href="view/images/pramuka.png" />
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,100&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <!------ header section---->

    <section class="header">
        <nav>
            <a href="index.php"><img src="view/images/simpraska2.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hidemenu()"></i>
                <ul>
                    <li><a href="index.php">BERANDA</a></li>
                    <li><a href="view/profil.html">PROFIL</a></li>
                    <li><a href="view/sejarah.html">SEJARAH</a></li>
                    <li><a href="view/informasi.html">INFORMASI</a></li>
                    <li><a href="login.php" class="btn-fill" onclick="handleClick()">
                    <i class="fas fa-sign-in-alt icon"></i> LOGIN </a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showmenu()"></i>
        </nav>

        <div class="text-box">
            <h1>SIMPRASKA</h1>
            <p>“SISTEM INFORMASI MANAGEMEN UNIT KEGIATAN MAHASISWA PRAMUKA ” <br> “UNIVERSITAS ISLAM KALIMANTAN MUHAMMAD ARSYAD AL-BANJARI BANJARMASIN”
            </p>
        </div>

    </section>


    <!---- course section-->

    <section class="course">
        <h1>UNIT KEGIATAN MAHASISWA PRAMUKA</h1>
       

    </section>
  
    <section class="facilities">
        <div class="row">
            <div class="facilities-col">
                <img src="view/images/pramuka.png">
            </div>
            <div class="facilities-col">
                <img src="view/images/semua.png">
            </div>
            <div class="facilities-col">
                <img src="view/images/logouniska.png">
            </div>
        </div>
    </section>


    <!------- campus---------->


    <section class="campus">
        <h1>SATYAKU KUDARMAKAN, DARMAKU KUBAKTIKAN</h1>
       
        <div class="row">
            <div class="campus-col">
                <img src="view/images/ina.png">
                <div class="layer">
                    <h3></h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="view/images/bendera.png">
                <div class="layer">
                    <h3></h3>
                </div>
            </div>
            <div class="campus-col">
                <img src="view/images/word.png">
                <div class="layer">
                    <h3></h3>
                </div>
            </div>
        </div>
    </section>


    <!-- call to action-->

    <section class="cta">
        <h1>"Terima kasih banyak telah mengunjungi situs web kami."</h1>
        <a href="https://wa.me/6285651920389/?text=Assalamualaikum%20Kakak,%20Saya%20mau%20bertanya" class="hero-btn">Contact Us Humas Pramuka</a>
    </section>

    <section class="footer">
      <h4>SOSIAL MEDIA</h4>
      <div class="icons">
      </a>
      <a href="https://www.instagram.com/pramuka.uniska?igsh=dThpc2QwdnQ5YzU=" target="blank">
          <i class="fa fa-instagram"></i>
      </a>
        <a href="https://www.facebook.com/share/LSJqNMrS7FzRK4R1/?mibextid=qi2Omg target="blank">
            <i class="fa fa-facebook"></i>
        </a>
      </a>
      <a href="mailto:pramuka.uniska@gmail.com" target="_blank">
        <i class="fa fa-envelope"></i>
      </a>
      <a href="https://www.tiktok.com/@pramuka.uniska?_t=8ozWOOFz9zL&_r=1" target="blank">
        <i class="fa fa-tiktok"></i>
       </a>
       <a href="http://www.youtube.com/@pramukauniskabanjarmasin3587" target="blank">
        <i class="fa fa-youtube"></i>
    </a>
    </div>
   <p>Gerakan Pramuka Univeritas Islam Kalimantan Muhammad Arsyad Al-Banjari Banjarmasin </p>
    </section>




    <!-------------(header section) javascript for toggle menu---->
    <script>

        var navLinks = document.getElementById("navLinks");
        function showmenu() {
            navLinks.style.right = "0";
        }
        function hidemenu() {
            navLinks.style.right = "-200px";
        }

    </script>

</body>

</html>