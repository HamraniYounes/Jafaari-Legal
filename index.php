<?php include 'includes/header.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>JAAFARI Legal & Tax - Avocat Fiscaliste Bruxelles</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <style>
        body {
            font-family: 'Lato', sans-serif;
            color: #333;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        h2, h3, h4, h5 {
            font-family: 'Lato', serif;
            color: #da6600;
        }

        .section-title {
            font-size: 2.5rem;
            color: #da6600;
            position: relative;
            display: inline-block;
            margin-bottom: 1rem;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: #f97316;
        }

        .btn-orange {
            background-color: #da6600;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-block;
            text-decoration: none;
        }
        .btn-orange:hover {
            background-color: #ea580c;
            transform: scale(1.05);
            color: white;
        }

        /* --- HERO AVEC VIDÉO --- */
        .hero-video-section {
            height: 100vh;
            min-height: 600px;
            position: relative;
            overflow: hidden;
            background-color: #000;
            background-image: none;
        }

        .video-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            overflow: hidden;
        }

        .hero-video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translate(-50%, -50%);
            object-fit: cover;
            opacity: 0.7;
        }

        .hero-content {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 2;
            color: white;
            text-align: center;
            padding: 0 20px;
        }

        .hero-content h1, .hero-content p {
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.6);
            max-width: 800px;
            margin: 10px auto;
        }

        /* --- OPTIMISATION MOBILE : Remplacer vidéo par image --- */
        @media (max-width: 768px) {
            .video-wrapper {
                display: none;
            }

            .hero-video-section {
                height: 60vh;
                min-height: 400px;
                background-image: url('media/0824-preview.png');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            .hero-content h1 {
                font-size: 2.2rem;
                line-height: 1.3;
            }

            .lead {
                font-size: 1.1rem;
            }

            .btn-orange {
                font-size: 0.95rem;
                padding: 10px 20px;
            }
        }

        /* --- CARTES ET IMAGES --- */
        .carte-walid {
            height: 600px;
            width: 100%;
            max-width: 500px;
            overflow: hidden;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .walid-acceuil {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .walid-acceuil:hover {
            transform: translateY(-4px);
            box-shadow: 15px 10px 30px rgba(0, 0, 0, 0.25);
        }

        .value-img {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 75%;
            height: auto;
            object-fit: cover;
            object-position: center;
            transition: transform 0.3s ease;
        }

        .value-img:hover {
            transform: scale(1.05);
        }

        .py-section {
            padding: 80px 0;
        }

        /* --- SECTION GRUE EN ORIGAMI (bas à droite) --- */
        .origami-section-bottom-right {
            background-color: #f5aa5d;
            color: #ffffff;
            padding: 4rem;
            position: relative;
            text-align: center;
            overflow: hidden;
        }

        .origami-section-bottom-right h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #ffffff;
            position: relative;
            z-index: 2;
        }

        .origami-section-bottom-right .lead {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            color: #da6600;
            font-weight: 600;
            position: relative;
            z-index: 2;
        }

        .crane-bottom-right {
            position: absolute;
            bottom: 40px;
            right: 40px;
            z-index: 1;
            opacity: 0.8;
        }

        .crane-img {
            width: 120px;
            height: auto;
            filter: brightness(1.1) saturate(1.2);
            transition: transform 0.3s ease;
            transform: rotate(15deg);
        }

        .crane-img:hover {
            transform: rotate(10deg) scale(1.1);
        }

        /* --- ANIMATIONS --- */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* --- SERVICE CARDS --- */
        .service-card {
            background-color: #fff;
            border-radius: 16px;
            transition: all 0.4s ease;
            color: #333;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
            height: 100%;
            position: relative;
            overflow: hidden;
            padding: 24px 16px;
            cursor: pointer;
            text-align: center;
        }

        .service-card:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.15);
            background-color: #fef8f4;
        }

        .icon-circle {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
            background-color: #da6600;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 12px auto;
            transition: transform 0.3s ease;
        }

        .service-card:hover .icon-circle {
            transform: scale(1.1);
        }

        .cta-hover {
            opacity: 0;
            visibility: hidden;
            color: #da6600;
            font-weight: 600;
            font-size: 0.9rem;
            transition: opacity 0.3s ease;
        }

        .service-card:hover .cta-hover {
            opacity: 1;
            visibility: visible;
        }

        .service-card h5 {
            color: #1a3a5f;
            font-weight: 600;
            margin-bottom: 8px;
        }

        /* --- RESPONSIVE --- */
        @media (max-width: 768px) {
            .service-card {
                padding: 20px 12px;
            }
            h5 {
                font-size: 1.1rem;
            }
            .origami-section-bottom-right {
                padding: 80px 20px;
            }
            .origami-section-bottom-right h2 {
                font-size: 2rem;
            }
            .origami-section-bottom-right .lead {
                font-size: 1.1rem;
            }
            .crane-bottom-right {
                display: none;
            }
        }

        /* --- RESPONSIVE MOBILE : Images des valeurs --- */
        @media (max-width: 768px) {
            .value-img {
                width: 100% !important;
                height: auto;
                display: block;
                margin: 0 auto 20px auto;
            }

            .row.align-items-center.g-5 {
                flex-direction: column;
            }

            .row.align-items-center.g-5 > div {
                width: 100%;
                max-width: 100%;
                margin-bottom: 20px;
            }

            .row.align-items-center.g-5 > div:last-child {
                margin-bottom: 0;
            }
        }
    </style>
</head>
<body>

<!-- Section Hero avec vidéo en arrière-plan -->
<section class="hero-video-section text-center">
    <div class="video-wrapper">
        <video class="hero-video" autoplay muted loop playsinline preload="metadata">
            <source src="media/0824.mp4" type="video/mp4">
            <!-- Optionnel : format WebM plus léger -->
            <!-- <source src="media/0824.webm" type="video/webm"> -->
            Votre navigateur ne supporte pas la vidéo.
        </video>
    </div>
    <div class="hero-content">
        <h1 class="display-4 fw-bold">JAAFARI Legal & Tax</h1>
        <p class="lead">Cabinet d'avocats à Bruxelles</p>
        <p>Votre allié juridique et fiscal : conseils sur mesure, défense engagée, solutions innovantes.</p>
        <a href="contact.php" class="btn-orange mt-4"><i class="fas fa-envelope"></i> Prendre rendez-vous</a>
    </div>
</section>

<!-- Section À Propos -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">À Propos</h2>
            </div>
        </div>

        <div class="row align-items-start">
            <div class="col-lg-6">
                <br>
                <h3 class="text-orange fw-bold">Bienvenue chez JAAFARI Legal & Tax</h3>
                <br>
                <strong>
                    Ici, votre dossier ne passe pas de main en main.
                </strong>
                <br><br>
                <p class="text-muted">Il n’atterrit pas sur le bureau d’un collaborateur anonyme. Vous n’aurez pas à répéter votre histoire plusieurs fois.</p>
                <p class="text-muted" style="text-align: justify;">
                    Vous parlez à une seule personne : <strong>Me Walid JAAFARI</strong>.
                </p>
                <p class="text-muted" style="text-align: justify;">
                    Titulaire d’un master en droit international public et d’un master de spécialisation en droit fiscal à l’Université libre de Bruxelles (ULB), il a débuté sa carrière d’avocat au sein du département fiscal d’un cabinet spécialisé en contentieux judiciaire.
                </p>
                <p class="text-muted" style="text-align: justify;">
                  Il s’est ensuite formé auprès de feue Me Typhanie AFSCHRIFT, référence en fiscalité, avant de mettre son expertise au service d’un cabinet international.
                </p>
                <p class="text-muted">
                  Auteur de nombreux articles sur l’actualité fiscale, il crée le concept <i>« La Minute Fiscale »</i> : des vidéos courtes où il parle simplement de fiscalité.
                </p>
                <p class="text-muted" style="text-align: justify;">
                  Fort de ces expériences, il a fondé JAAFARI Legal & Tax pour incarner sa vision du métier : libre, profondément humain et résolument au service de ses clients.
                </p>
            </div>

            <div class="col-lg-6 d-flex justify-content-center">
                <div class="card border-0 rounded-4 carte-walid" style="width: 500px; background-color: #f8f9fa;">
                    <img src="media/photo_2_crop.jpg" alt="Me Walid JAFAARI" class="card-img-top rounded-3 walid-acceuil">
                    <div class="card-body text-center p-3">
                        <h5 class="mb-0 fw-bold" style="color: #1a3a5f;">Me Walid JAAFARI</h5>
                        <p class="text-muted small">Avocat au Barreau de Bruxelles</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Domaines d'intervention -->
        <div class="row mt-5 pt-5">
            <div class="col-12 text-center mb-5">
                <h3 class="section-title">Domaines d’intervention</h3>
            </div>
        </div>

        <div class="row g-4 justify-content-center mt-3">
            <!-- Droit Fiscal -->
            <div class="col-md-3 col-sm-6">
                <a href="services.php" class="text-decoration-none">
                    <div class="service-card">
                        <div class="icon-circle text-white">
                            <i class="fa-solid fa-wallet"></i>
                        </div>
                        <h5>Droit Fiscal</h5>
                        <span class="cta-hover">Découvrir →</span>
                    </div>
                </a>
            </div>

            <!-- Droit Patrimonial -->
            <div class="col-md-3 col-sm-6">
                <a href="services.php" class="text-decoration-none">
                    <div class="service-card">
                        <div class="icon-circle text-white">
                            <i class="fa-solid fa-house"></i>
                        </div>
                        <h5>Droit Patrimonial</h5>
                        <span class="cta-hover">Découvrir →</span>
                    </div>
                </a>
            </div>

            <!-- Droit Pénal -->
            <div class="col-md-3 col-sm-6">
                <a href="services.php" class="text-decoration-none">
                    <div class="service-card">
                        <div class="icon-circle text-white">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <h5>Droit Pénal</h5>
                        <span class="cta-hover">Découvrir →</span>
                    </div>
                </a>
            </div>

            <!-- Droit des Étrangers -->
            <div class="col-md-3 col-sm-6">
                <a href="services.php" class="text-decoration-none">
                    <div class="service-card">
                        <div class="icon-circle text-white">
                            <i class="fa-solid fa-passport"></i>
                        </div>
                        <h5>Droit des Étrangers</h5>
                        <span class="cta-hover">Découvrir →</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Section : La Grue en Origami (grue en bas à droite) -->
<section class="origami-section-bottom-right text-center">
    <div class="origami-content">
        <h2 class="mb-4">La grue en origami est le symbole du cabinet</h2>
        <p class="lead" style="font-size: 1.2rem; max-width: 700px; margin: 0 auto; color: #da6600;">
            Pourquoi une grue en origami ?
        </p>
    </div>

    <!-- Grue en bas à droite -->
    <div class="crane-bottom-right">
        <img src="media/Logo-Walid.png" alt="Grue en origami" class="crane-img">
    </div>
</section>

<!-- Valeur 1 : Rigueur -->
<section class="py-section bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-lg-1 align-items-center">
                <img src="media/rigueur.jpg" alt="Dossier juridique - Rigueur" class="value-img">
            </div>
            <div class="col-lg-6 order-lg-2">
                <div class="icon-circle text-white mb-3 mx-auto mx-lg-0">
                    <i class="fas fa-ruler-combined"></i>
                </div>
                <h4 class="fw-bold">Rigueur et excellence</h4>
                <p class="text-muted" style="text-align: justify;">
                    Plier une grue en origami exige précision et maîtrise. 
                    Chaque pli compte. Il n’y a pas de place pour l’approximation.
                    Dans la tradition japonaise, plier mille grues en origami est un geste de patience et de constance, où l’excellence naît de l’attention portée à chaque étape.
                    Cette exigence du geste juste, du détail soigné, reflète sa manière de travailler : il traite chaque dossier avec la rigueur technique et l’excellence qui s’imposent.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Valeur 2 : Créativité -->
<section class="py-section bg-light">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 align-items-center">
                <img src="media/creativite.jpg" alt="Origami - Créativité" class="value-img">
            </div>
            <div class="col-lg-6">
                <div class="icon-circle text-white mb-3 mx-auto mx-lg-0">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h4 class="fw-bold">Créativité</h4>
                <p class="text-muted" style="text-align: justify;">
                    L’origami transforme une feuille banale en œuvre.
                    De la même façon, JAAFARI Legal & Tax transforme la complexité fiscale en solutions limpides et sûres, grâce à une ingéniosité qui protège vos intérêts et maximise vos résultats.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Valeur 3 : Confiance -->
<section class="py-section bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 order-lg-1 align-items-center">
                <img src="media/confiance.jpg" alt="Confidentialité - Avocat" class="value-img">
            </div>
            <div class="col-lg-6 order-lg-2">
                <div class="icon-circle text-white mb-3 mx-auto mx-lg-0">
                    <i class="fas fa-lock"></i>
                </div>
                <h4 class="fw-bold">Confiance et confidentialité</h4>
                <p class="text-muted" style="text-align: justify;">
                    La grue en origami ne parle pas, mais elle contient tout.
                    Comme la relation entre un avocat et son client : fondée sur le secret.
                    Me Walid Jaafari vous écoute, vous conseille et vous défend.
                    Il vous parle franchement, sans détour, et vous tient informé à chaque étape.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Valeur 4 : Engagement -->
<section class="py-section bg-light">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 align-items-center">
                <img src="media/engagement.jpg" alt="Engagement client" class="value-img">
            </div>
            <div class="col-lg-6">
                <div class="icon-circle text-white mb-3 mx-auto mx-lg-0">
                    <i class="fas fa-handshake"></i>
                </div>
                <h4 class="fw-bold">Engagement</h4>
                <p class="text-muted" style="text-align: justify;">
                    Chaque dossier est traité avec la même implication que s’il s’agissait du sien.
                    <br>
                    Mais l’objectif ne se limite pas à résoudre un problème ponctuel.
                    Il construit avec ses clients une relation durable, fondée sur la confiance, la disponibilité et une connaissance approfondie de leur situation.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Clin d'œil -->
<section class="bg-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-light border text-center rounded-4 p-3 small">
                    Cette grue en origami est aussi un clin d’œil à une série culte… Parfois, le meilleur plan est celui qu’on ne voit pas.
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>