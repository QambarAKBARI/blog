<?php

use App\Service\Session;


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS_PATH ?>style.css">
    <link rel="stylesheet" href="<?= CSS_PATH ?>bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title></title>

</head>

<body>
    <header>

        <nav class="navbar navbar-expand-lg navbar-light bg-light p-3 ">
            <div class="container">
                <a class="navbar-brand" href="#"><img width="200" src="../public/images/logo-t.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor03">
                    <ul class="navbar-nav ms-auto">
                        <?php
                        if ($user = Session::get("utilisateur")) {
                            if ($user->getRole() == "ROLE_ADMIN") {
                        ?>
                                <a class="nav-link" href="?ctrl=admin">Administration</a>
                            <?php
                            }
                            ?>

                            <a class="nav-link active" href="?ctrl=security&action=index">Accueil</a>
                            <a class="nav-link" href="?ctrl=blog&action=index">Blogs</a>
                            <a class="nav-link" href="?ctrl=security&action=logout">Déconnexion</a>
                            <span><?= $user->getNom() ?></span>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link active" href="?ctrl=security&action=index">Accueil</a>
                            <a class="nav-link" href="?ctrl=security&action=login">Connexion</a>
                            <a class="nav-link" href="?ctrl=security&action=register">Inscription</a>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-lg">

            <?php
            if ($Avis = Session::get("Avis")) {
            ?>
                <p id="Avis" class='<?= $Avis['type'] ?>'>
                    <?= $Avis['msg'] ?>
                </p>
            <?php
                Session::remove("Avis");
            }
            ?>
        </div>

    </header>


    <main>
        <?= $content ?>
    </main>
 
    <div class="footer-dark mt-4">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-3 item">
                        <h3>Services</h3>
                        <ul>
                            <li><a href="#">Web design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">Hosting</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-3 item">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Company</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 item text">
                        <h3>TorkouTorkou</h3>
                        <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
                    </div>
                    <div class="col item social">
                        <a href="#"><i class="fa-brands fa-github"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#"><i class="fa-sharp fa-light fa-file-arrow-down"></i></a>
                    </div>
                </div>
                <p class="copyright">TorkouTorkou © 2023</p>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script>
        const modalContainer = document.querySelector(".modal-container");
        const modalTriggers = document.querySelectorAll(".modal-trigger");

        modalTriggers.forEach(trigger => trigger.addEventListener("click", toggleModal))

        function toggleModal() {
            modalContainer.classList.toggle("active")
        }
    </script>

</body>

</html>