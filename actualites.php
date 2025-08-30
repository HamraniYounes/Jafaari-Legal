<?php
require 'config/db.php';

// Fonction pour formater la date en français
function formatDate($dateString) {
    $date = new DateTime($dateString);
    setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra'); 
    return ucfirst(strftime('%d/%m/%Y à %Hh%M', $date->getTimestamp()));
}

// Fonction pour tronquer le HTML sans casser les balises
function truncateHtml($html, $maxLength = 150) {
    $printedLength = 0;
    $tags = [];
    $truncated = '';

    preg_match_all('/<[^>]+>|[^<]+/', $html, $matches, PREG_OFFSET_CAPTURE);

    foreach ($matches[0] as $match) {
        $str = $match[0];

        if ($str[0] === '<') {
            if ($str[1] !== '/') {
                preg_match('/<(\w+)/', $str, $tagName);
                $tags[] = $tagName[1];
            } else {
                array_pop($tags);
            }
            $truncated .= $str;
        } else {
            if ($printedLength + strlen($str) > $maxLength) {
                $truncated .= substr($str, 0, $maxLength - $printedLength);
                $printedLength = $maxLength;
                break;
            } else {
                $truncated .= $str;
                $printedLength += strlen($str);
            }
        }
    }

    while (!empty($tags)) {
        $truncated .= '</' . array_pop($tags) . '>';
    }

    return $truncated . '...';
}

// Récupération des articles
$stmt = $pdo->query("SELECT * FROM articles ORDER BY created_at DESC");
$articles = $stmt->fetchAll();

// Récupération des vidéos
$stmt = $pdo->query("SELECT * FROM videos ORDER BY created_at DESC");
$videos = $stmt->fetchAll();

// Fonction améliorée pour les vidéos YouTube (supporte les Shorts)
function getYouTubeEmbed($url) {
    $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/';
    if (preg_match($pattern, $url, $matches)) {
        return 'https://www.youtube.com/embed/' . $matches[1];
    }
    return false;
}
?>

<?php include 'includes/header.php'; ?>

<style>
    /* Fond orange pour toutes les cartes d'articles */
    .card.article-card {
        background-color: #f5aa5d;
        border: none;
        border-radius: 12px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease;
        color: #1a3a5f;
        height: 100%;
    }

    .card.article-card:hover {
        transform: translateY(-4px);
    }

    /* Adaptation du texte et liens */
    .card.article-card a {
        color: #1a3a5f;
    }

    .card.article-card a:hover {
        color: #da6600;
    }

    .card.article-card .text-muted {
        color: #1a3a5f !important;
    }

    /* Bouton sur fond orange */
    .card.article-card .btn-outline-primary,
    .card.article-card .btn-primary {
        background-color: #da6600;
        color: white;
        border: none;
        font-weight: 600;
    }

    .card.article-card .btn-outline-primary:hover,
    .card.article-card .btn-primary:hover {
        background-color: #ea580c;
        color: white;
    }

    /* Recherche */
    #searchArticles, #searchVideos {
        border-radius: 50px;
        border: 1px solid #ddd;
    }

    /* Onglets */
    .nav-tabs .nav-link {
        border: none;
        color: #555;
    }

    .nav-tabs .nav-link.active {
        color: #da6600;
        border-bottom: 3px solid #da6600;
    }

    /* Ratio 9x16 pour les Shorts YouTube */
    .ratio-9x16 {
        --bs-aspect-ratio: 56.25%;
    }

    .video-item .ratio-9x16 {
        max-width: 700px;
        width: 100%;
        margin: 0 auto;
    }

    @media (min-width: 992px) {
        .video-item .ratio-16x9 {
            height: 350px;
        }
    }
</style>

<div style="font-family: 'Lato', sans-serif;" class="container py-5">
    <h2 class="section-title" style="color: #da6600;">Actualités & Vidéos</h2>

    <!-- Onglets -->
    <ul class="nav nav-tabs mb-4" id="contentTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="articles-tab" data-bs-toggle="tab" data-bs-target="#articles" type="button" role="tab">
                Articles
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab">
                Vidéos
            </button>
        </li>
    </ul>

    <!-- Contenu des onglets -->
    <div class="tab-content" id="contentTabsContent">

        <!-- Onglet Articles -->
        <div class="tab-pane fade show active" id="articles" role="tabpanel">
            <div class="mb-3">
                <input type="text" class="form-control" id="searchArticles" placeholder="Rechercher un article..." oninput="filterArticles()">
            </div>
            <div class="row" id="articlesContainer">
                <?php if (empty($articles)): ?>
                    <div class="col-12">
                        <div class="alert alert-info">Aucun article disponible.</div>
                    </div>
                <?php else: ?>
                    <?php foreach ($articles as $article): ?>
                        <div class="col-md-6 mb-4 article-item">
                            <div class="card article-card">
                                <div class="card-body">
                                    <h5 class="mb-1">
                                        <a href="article.php?id=<?= $article['id'] ?>" class="text-decoration-none" target="_blank">
                                            <?= htmlspecialchars($article['title']) ?>
                                        </a>
                                    </h5>
                                    <p class="small text-muted mb-2">
                                        Par <strong><?= htmlspecialchars($article['author']) ?></strong>
                                    </p>
                                    <small class="text-muted">Publié le <?= formatDate($article['created_at']) ?></small>
                                    <br>
                                    <a href="article.php?id=<?= $article['id'] ?>" class="btn btn-sm btn-primary mt-2" target="_blank">Lire la suite</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Onglet Vidéos -->
        <div class="tab-pane fade" id="videos" role="tabpanel">
            <div class="mb-3">
                <input type="text" class="form-control" id="searchVideos" placeholder="Rechercher une vidéo..." oninput="filterVideos()">
            </div>
            <div class="row" id="videosContainer">
                <?php if (empty($videos)): ?>
                    <div class="col-12">
                        <div class="alert alert-info">Aucune vidéo disponible.</div>
                    </div>
                <?php else: ?>
                    <?php foreach ($videos as $video): ?>
                        <?php $embedUrl = getYouTubeEmbed($video['url']); ?>
                        <?php if ($embedUrl): ?>
                            <?php $isShort = strpos($video['url'], '/shorts/') !== false; ?>
                            <div class="col-12 col-lg-6 mb-4 video-item">
                                <div class="ratio <?= $isShort ? 'ratio-9x16' : 'ratio-16x9' ?>">
                                    <iframe 
                                        src="<?= $embedUrl ?>?rel=0" 
                                        title="<?= htmlspecialchars($video['title'] ?: 'Vidéo YouTube') ?>" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                    </iframe>
                                </div>
                                <h6 class="mt-2"><?= htmlspecialchars($video['title']) ?></h6>
                                <small class="text-muted">Publié le <?= formatDate($video['created_at']) ?></small>
                            </div>
                        <?php else: ?>
                            <div class="col-12 col-lg-6 mb-4 video-item">
                                <div class="alert alert-warning">Lien YouTube invalide</div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
function filterArticles() {
    const input = document.getElementById('searchArticles');
    const filter = input.value.toLowerCase();
    const items = document.getElementsByClassName('article-item');

    for (let i = 0; i < items.length; i++) {
        const title = items[i].querySelector('h5 a')?.textContent.toLowerCase() || '';
        const content = items[i].querySelector('p')?.textContent.toLowerCase() || '';
        if (title.includes(filter) || content.includes(filter)) {
            items[i].style.display = '';
        } else {
            items[i].style.display = 'none';
        }
    }
}

function filterVideos() {
    const input = document.getElementById('searchVideos');
    const filter = input.value.toLowerCase();
    const items = document.getElementsByClassName('video-item');

    for (let i = 0; i < items.length; i++) {
        const title = items[i].querySelector('h6')?.textContent.toLowerCase() || '';
        if (title.includes(filter)) {
            items[i].style.display = '';
        } else {
            items[i].style.display = 'none';
        }
    }
}
</script>

<?php include 'includes/footer.php'; ?>