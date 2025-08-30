<?php
require 'config/db.php';

// Vérifier si l'ID est présent dans l'URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Aucun article spécifié.");
}

$id = (int)$_GET['id'];

// Récupérer l'article depuis la base de données
$stmt = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
$stmt->execute([$id]);
$article = $stmt->fetch();

// Si l'article n'existe pas
if (!$article) {
    die("Article non trouvé.");
}

// Fonction pour formater la date
function formatDate($dateString) {
    $date = new DateTime($dateString);
    return $date->format('d/m/Y \à H\hi'); // Ex: 16/08/2025 à 21h18
}
?>

<?php include 'includes/header.php'; ?>

<div class="container py-5">
    <a href="actualites.php" class="btn btn-secondary btn-sm mb-3">&larr; Retour aux actualités</a>
    
    <h1><?= htmlspecialchars($article['title']) ?></h1>
    
    <!-- Affichage de l'auteur et de la date -->
    <p>
        <small class="text-muted">
            Par <strong><?= htmlspecialchars($article['author']) ?></strong>, 
            publié le <?= formatDate($article['created_at']) ?>
        </small>
    </p>
    
    <hr>
    
    <div class="article-content mt-4">
        <?= $article['content'] ?> <!-- Le HTML est affiché tel quel -->
    </div>
</div>

<?php include 'includes/footer.php'; ?>