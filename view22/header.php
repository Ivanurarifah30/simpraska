<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles.css">
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
            color: #fff;
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
    <link rel="shortcut icon" type="image/png" href="view/img/pramuka.png" />
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
            <a href="index.php"><img src="view/img/simpraska.png"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hidemenu()"></i>
                <ul>
                    <li><a href="index.php">BERANDA</a></li>
                    <li><a href="view/profil.html">PROFIL</a></li>
                    <li><a href="view/sejarah.html">SEJARAH</a></li>
                    <li><a href="view/blog.html">BLOG</a></li>
                    <li><a href="view/informasi.html">INFORMASI</a></li>
                    <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Link
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="http://uniska-bjm.ac.id" target="_blank">Website UNISKA</a>
              <a class="dropdown-item" href="https://pramuka.or.id/" target="_blank">Website KWARNAS</a>
              <a class="dropdown-item" href="https://linktr.ee/PramukaUniska" target="_blank">Linktree Pramuka</a>
            </div>
          </li>
                    <li><a href="login.php" class="btn-fill" onclick="handleClick()">
                    <i class="fas fa-sign-in-alt icon"></i> Login </a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showmenu()"></i>
        </nav>












