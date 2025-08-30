<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

require '../config/db.php';
$error = $success = '';
$id = $_GET['id'] ?? null;

$stmt = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
$stmt->execute([$id]);
$article = $stmt->fetch();

if (!$article) {
    die("Article non trouvé.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']); // récupéré depuis Quill
    $author = trim($_POST['author']) ?: 'Maître Dupont';
    $publish_date = date('Y-m-d');

    if (empty($title) || empty($content)) {
        $error = "Le titre et le contenu sont obligatoires.";
    } else {
        $stmt = $pdo->prepare("UPDATE articles SET title = ?, content = ?, author = ?, publish_date = ? WHERE id = ?");
        if ($stmt->execute([$title, $content, $author, $publish_date, $id])) {
            $success = "Article mis à jour avec succès.";
        } else {
            $error = "Erreur lors de la mise à jour.";
        }
    }
}
?>

<?php include '../includes/header-admin.php'; ?>

<div class="container py-5">
    <h2 class="section-title">Modifier l'Article</h2>
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
        <a href="dashboard.php" class="btn btn-orange">Retour au tableau de bord</a>
    <?php else: ?>
        <form method="POST" onsubmit="return syncEditorContent();">
            <div class="mb-3">
                <label class="form-label">Titre</label>
                <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($article['title']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Auteur</label>
                <input type="text" name="author" class="form-control" value="<?= htmlspecialchars($article['author']) ?>">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Contenu</label>
                <!-- Div pour Quill -->
                <div id="editor" style="height: 300px;"><?= $article['content'] ?></div>
                <!-- Textarea caché pour envoyer le contenu -->
                <textarea name="content" id="hiddenContent" style="display:none;"></textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
        </form>
    <?php endif; ?>
</div>

<!-- Quill CSS et JS -->
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

<script>
// Initialisation de Quill avec le contenu existant
var quill = new Quill('#editor', {
    theme: 'snow',
    modules: {
        toolbar: [
            [{ 'header': [1, 2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            ['link', 'image'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            ['blockquote', 'code-block'],
            ['clean']
        ]
    }
});

// Fonction pour synchroniser le contenu Quill dans le textarea caché
function syncEditorContent() {
    document.getElementById('hiddenContent').value = quill.root.innerHTML;
    return true;
}
</script>

<style>
#editor {
    background-color: #fff;
}
</style>

<?php include '../includes/footer-admin.php'; ?>
