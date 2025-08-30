<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

require '../config/db.php';

// Fonction pour formater la date
function formatDate($dateString) {
    $date = new DateTime($dateString);
    setlocale(LC_TIME, 'fr_FR', 'fra'); 
    return ucfirst(strftime('%d/%m/%Y à %Hh%M', $date->getTimestamp()));
}

$articles = $pdo->query("SELECT * FROM articles ORDER BY created_at DESC")->fetchAll();
$videos = $pdo->query("SELECT * FROM videos ORDER BY created_at DESC")->fetchAll();
?>

<?php include '../includes/header-admin.php'; ?>

<div class="container py-5">
    <h2 class="section-title">Tableau de Bord Admin</h2>

    <div class="admin-panel">
        <a href="add_article.php" class="btn btn-primary mb-3">+ Nouvel Article</a>
        <h5>Articles</h5>
        <ul class="list-group mb-4">
            <?php foreach ($articles as $a): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong><?= htmlspecialchars($a['title']) ?></strong><br>
                    <small class="text-muted"> Publié le <?= formatDate($a['created_at']) ?></small>
                </div>
                <span>
                    <a href="edit_article.php?id=<?= $a['id'] ?>" class="btn btn-sm btn-outline-primary">Modifier</a>
                    <a href="delete_article.php?id=<?= $a['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Supprimer cet article ?')">X</a>
                </span>
            </li>
            <?php endforeach; ?>
        </ul>

        <a href="add_video.php" class="btn btn-primary mb-3">+ Nouvelle Vidéo</a>
        <h5>Vidéos</h5>
        <ul class="list-group">
            <?php foreach ($videos as $v): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong><?= htmlspecialchars($v['title']) ?></strong><br>
                    <small class="text-muted"> Publié le <?= formatDate($v['created_at']) ?></small>
                </div>
                <span>
                    <a href="edit_video.php?id=<?= $v['id'] ?>" class="btn btn-sm btn-outline-primary">Modifier</a>
                    <a href="delete_video.php?id=<?= $v['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Supprimer cette vidéo ?')">X</a>
                </span>
            </li>
            <?php endforeach; ?>
        </ul>

        <a href="logout.php" class="btn btn-secondary mt-4">Déconnexion</a>
    </div>
</div>

<?php include '../includes/footer-admin.php'; ?>