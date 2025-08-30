<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAAFARI Legal & Tax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Une seule règle CSS pour l'effet hover (minimal) -->
    <style>
        .nav-link:hover {
            border-bottom: 2px solid #FF8C00;
        }
    </style>
</head>
<body>

<?php
$base_url = '/'; // ← Change ça selon ton cas
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
    <div class="container">
        <!-- Logo et Nom -->
        <a class="navbar-brand d-flex align-items-center" href="../index.php">
            <img src="../media/Logo-Walid.png" alt="Logo JAAFARI" class="me-2" style="width: 40px; height: 40px;">
            <span class="fs-4 fw-bold text-orange">JAAFARI Legal & Tax</span>
        </a>

        <!-- Menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../services.php">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../actualites.php">Actualités</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../contact.php">Contact</a>
                </li>
              	<li class="nav-item">
                    <a class="nav-link text-dark" href="dashboard.php">
                  <i class="fas fa-tachometer-alt"></i>
                  </a>
                </li>
            </ul>
        </div>
    </div>
</nav>