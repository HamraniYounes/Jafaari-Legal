<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAAFARI Legal & Tax</title>
   <!-- Balises Open Graph (pour le partage sur réseaux sociaux) -->
    <meta property="og:title" content="Avocat à Bruxelles | Cabinet JAAFARI Legal & Tax">
    <meta property="og:description" content="Expertise juridique et fiscale à Bruxelles. Droit des sociétés, fiscalité, immobilier, pénal. Contactez-nous pour un conseil personnalisé.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://www.jaafarilegal.be/">
    <meta property="og:image" content="https://www.jaafarilegal.be/media/Logo-Walid-New.png">
    <meta property="og:site_name" content="JAAFARI Legal & Tax">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <!-- Style personnalisé -->
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        html {
            font-family: 'Lato', sans-serif;
        }
        .nav-link:hover {
            border-bottom: 2px solid #da6600;
        }
        .navbar-brand img {
            width: 140px;
            height: 140px;
            object-fit: contain;
        }
        /* Bande supérieure orange */
        .top-bar {
            background-color: #f5aa5d;
            height: 25px;
            width: 100%;
        }

        /* Centrer le texte dans le menu mobile */
        @media (max-width: 991.98px) {
            .navbar-nav .nav-link {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <?php
    $base_url = '/';
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    ?>

    <!-- Bande supérieure orange -->
    <div class="top-bar"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-0">
        <div class="container-fluid">

            <!-- Logo à gauche -->
            <a class="navbar-brand" href="index.php">
                <img src="media/Logo-Walid-New.png" alt="Logo JAAFARI">
            </a>

            <!-- Bouton burger → poussé à droite -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu déroulant -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="actualites.php">Actualités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>