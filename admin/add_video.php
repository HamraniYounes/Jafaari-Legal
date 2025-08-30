<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

require '../config/db.php';
$error = $success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $url = trim($_POST['url']);

    // ✅ Regex améliorée : supporte watch, embed, youtu.be ET shorts
    $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';

    if (empty($title) || empty($url)) {
        $error = "Le titre et l'URL sont obligatoires.";
    } elseif (!preg_match($pattern, $url)) {
        $error = "Veuillez entrer un lien YouTube valide. Exemples acceptés :<br>
                  • https://www.youtube.com/watch?v=abc123def45<br>
                  • https://youtu.be/abc123def45<br>
                  • https://www.youtube.com/shorts/abc123def45";
    } else {
        $stmt = $pdo->prepare("INSERT INTO videos (title, url) VALUES (?, ?)");
        if ($stmt->execute([$title, $url])) {
            $success = "Vidéo YouTube (ou Short) ajoutée avec succès.";
        } else {
            $error = "Erreur lors de l'ajout à la base de données.";
        }
    }
}
?>

<?php include '../includes/header-admin.php'; ?>

<div class="container py-5">
    <h2 class="section-title">Ajouter une Vidéo YouTube</h2>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
        <a href="dashboard.php" class="btn btn-orange">Retour au tableau de bord</a>
    <?php else: ?>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Titre de la vidéo</label>
                <input type="text" name="title" class="form-control"
                       placeholder="Ex : Mes conseils sur le droit des étrangers" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Lien YouTube</label>
                <input type="url" name="url" class="form-control"
                       placeholder="https://www.youtube.com/watch?v=..." required>
                <small class="text-muted">
                    Liens acceptés :<br>
                    • <code>youtube.com/watch?v=...</code><br>
                    • <code>youtu.be/...</code><br>
                    • <code>youtube.com/embed/...</code><br>
                    • <code>youtube.com/shorts/...</code>
                </small>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter la vidéo</button>
        </form>
    <?php endif; ?>
</div>

<?php include '../includes/footer-admin.php'; ?>