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
    $content = trim($_POST['content']);
    $author = trim($_POST['author']) ?: 'Walid Jafaari';
    $publish_date = date('Y-m-d');

    if (empty($title) || empty($content)) {
        $error = "Le titre et le contenu sont obligatoires.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO articles (title, content, author, publish_date) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$title, $content, $author, $publish_date])) {
            $success = "Article ajouté avec succès.";
        } else {
            $error = "Erreur lors de l'ajout.";
        }
    }
}
?>

<?php include '../includes/header-admin.php'; ?>

<div class="container py-5">
    <h2 class="section-title">Ajouter un Article</h2>

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
                <input type="text" name="title" class="form-control" placeholder="Titre de l'article" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Auteur</label>
                <input type="text" name="author" class="form-control" placeholder="Nom de l'auteur" value="Maître Dupont">
            </div>

            <div class="mb-3">
                <label class="form-label">Contenu</label>
                <div id="editor" style="height: 300px;"></div>
                <textarea name="content" id="hiddenContent" style="display:none;"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Publier l'article</button>
        </form>
    <?php endif; ?>
</div>

<!-- Quill CSS et JS -->
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

<script>
// Initialisation de Quill
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

// Synchroniser le contenu Quill dans le textarea avant envoi
function syncEditorContent() {
    document.getElementById('hiddenContent').value = quill.root.innerHTML;
    return true;
}
</script>

<?php include '../includes/footer-admin.php'; ?>
