<?php
// Démarrer la session pour les messages
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Inclure PHPMailer
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// --------------------------
// TRAITEMENT DU FORMULAIRE
// --------------------------
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nettoyer les données
    $name = trim(htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'));
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message_body = trim(htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8'));

    // Validation
    if (empty($name) || !$email || empty($message_body)) {
        $message = '<div class="alert alert-danger">Veuillez remplir tous les champs correctement.</div>';
    } else {
        // Créer une nouvelle instance PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configuration du serveur SMTP IONOS
            $mail->isSMTP();
            $mail->Host       = 'smtp.ionos.fr'; // ou smtp.ionos.com selon votre région
            $mail->SMTPAuth   = true;
            $mail->Username   = 'walid@jaafari.be'; // Votre adresse email complète
            $mail->Password   = 'mURrvNAv48Y!&rBJTA^Y'; // À remplacer par le mot de passe
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            $mail->CharSet    = 'UTF-8';

            // Destinataires
            $mail->setFrom('walid@jaafari.be', 'JAAFARI Legal & Tax');
            $mail->addAddress('walid@jaafari.be', 'Me Walid Jaafari');
            $mail->addReplyTo($email, $name);

            // Contenu
            $mail->isHTML(true);
            $mail->Subject = 'Message de contact - ' . $name;
            
            $mail->Body = "
            <html>
            <body style='font-family: Arial, sans-serif; color: #333; line-height: 1.6;'>
                <h2>Nouveau message de contact</h2>
                <p><strong>Nom :</strong> {$name}</p>
                <p><strong>Email :</strong> {$email}</p>
                <p><strong>Message :</strong><br>" . nl2br($message_body) . "</p>
                <hr>
                <p><em>Ce message a été envoyé depuis le site web JAAFARI Legal & Tax.</em></p>
            </body>
            </html>
            ";

            // Version texte alternative
            $mail->AltBody = "Nouveau message de contact\n\n" .
                           "Nom: {$name}\n" .
                           "Email: {$email}\n" .
                           "Message: {$message_body}\n\n" .
                           "Ce message a été envoyé depuis le site web JAAFARI Legal & Tax.";

            // Envoyer le mail
            $mail->send();
            $message = '<div class="alert alert-success">Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.</div>';
            
            // Réinitialiser les champs après envoi réussi
            $_POST = array();
            
        } catch (Exception $e) {
            $message = '<div class="alert alert-danger">Échec de l\'envoi du message. Erreur: ' . $mail->ErrorInfo . '</div>';
        }
    }
}

// Inclure le header
include 'includes/header.php';
?>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<style>
    body {
        font-family: 'Lato', sans-serif;
        background-color: #fdfaf6;
        color: #333;
    }

    .section-title {
        font-size: 2.5rem;
        color: #da6600;
        position: relative;
        display: inline-block;
        margin-bottom: 1.5rem;
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

    /* Photo avocat */
    .walid-contact {
        max-width: 380px;
        border: 3px solid #f8f1e9;
        border-radius: 16px;
        object-fit: cover;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }
    .walid-contact:hover {
        transform: translateY(-4px);
        box-shadow: 15px 10px 30px rgba(0, 0, 0, 0.25);
    }

    /* Carte de contact */
    .contact-card {
        background-color: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease;
    }
    .contact-card:hover {
        transform: translateY(-4px);
    }

    .contact-info-line {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 1rem;
        font-size: 1rem;
        line-height: 1.6;
    }
    .contact-info-line i {
        color: #da6600;
        min-width: 24px;
        margin-top: 4px;
    }

    /* Bouton orange */
    .btn-orange {
        background-color: #da6600 !important;
        border-color: #da6600 !important;
        color: white !important;
        padding: 12px 28px;
        font-weight: 600;
        border-radius: 50px;
        font-size: 1rem;
        transition: all 0.3s ease;
        box-shadow: 0 4px 10px rgba(218, 102, 0, 0.2);
    }
    .btn-orange:hover {
        background-color: #b85600 !important;
        border-color: #b85600 !important;
        transform: scale(1.05);
        box-shadow: 0 6px 15px rgba(218, 102, 0, 0.3);
    }

    /* Formulaire */
    .form-control {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px 14px;
        font-size: 1rem;
    }
    .form-control:focus {
        border-color: #da6600;
        box-shadow: 0 0 0 0.2rem rgba(218, 102, 0, 0.15);
    }

    /* Texte justifié */
    .text-justify {
        text-align: justify;
        line-height: 1.7;
        font-size: 1.05rem;
    }

    /* Section photo + texte en bas */
    .photo-text-section {
        margin-top: 6rem;
        text-align: center;
    }

    .photo-text-section h3 {
        margin-bottom: 1.5rem;
        color: #da6600;
    }
    .texte-infos{
        font-size: 1.4rem;
    }

    @media (min-width: 768px) {
        .photo-text-section {
            text-align: left;
        }
        .photo-text-content {
            display: flex;
            align-items: center;
            gap: 40px;
        }
        .walid-contact {
            margin: 0;
        }
    }

    @media (max-width: 768px) {
        .section-title {
            font-size: 2.2rem;
        }
        .photo-text-content {
            flex-direction: column;
            text-align: center;
        }
        .walid-contact {
            margin-bottom: 2rem;
        }
        .texte-infos{
            font-size: 0.7rem;
        }
    }
</style>

<div class="container py-5">
    <!-- Message d'alerte -->
    <?php if (!empty($message)): ?>
        <div class="row justify-content-center mb-4">
            <div class="col-lg-10">
                <?= $message ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Section : Formulaire + Coordonnées (en haut) -->
    <div class="row mb-5">
        <!-- Coordonnées -->
        <div class="col-lg-5 mb-4 mb-lg-0">
            <h3 class="section-title" style="color: #da6600;">Travaillons ensemble</h3><br>
            <div class="contact-card">
                <div class="contact-info-line">
                    <i class="fa-solid fa-location-pin"></i>
                    <span><strong>Adresse</strong><br>Boulevard du Souverain 398, 1160 Bruxelles, Belgique</span>
                </div>
                <div class="contact-info-line">
                    <i class="fa-solid fa-phone"></i>
                    <span><strong>Téléphone</strong><br>+32 487 52 80 22</span>
                </div>
                <div class="contact-info-line">
                    <i class="fa-solid fa-envelope"></i>
                    <span><strong>Email</strong><br>walid@jaafari.be</span>
                </div>
                <div class="contact-info-line">
                    <i class="fa-solid fa-calendar"></i>
                    <span><strong>Horaires</strong><br>Lun-Ven : 9h00 - 18h00<br>Sam : 9h00 - 12h00</span>
                </div>
            </div>
        </div>

        <!-- Formulaire -->
        <div class="col-lg-7">
            <h3 class="section-title" style="color: #da6600;">Envoyez un message</h3>
            <form method="POST">
                <div class="mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Nom complet" 
                           value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Adresse email" 
                           value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                </div>
                <div class="mb-3">
                    <textarea name="message" class="form-control" rows="5" placeholder="Votre message..." required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                </div>
                <button type="submit" class="btn btn-orange">Envoyer le message</button>
            </form>
        </div>
    </div>

    <!-- Section : Photo + Texte (en bas) -->
    <div class="photo-text-section">
        <div class="photo-text-content">
            <!-- Photo -->
            <div class="col-lg-4 d-flex justify-content-center">
                <img src="media/photo_contact.jpg" alt="Me Walid Jaafari - Avocat Fiscaliste Bruxelles" 
                     class="img-fluid walid-contact rounded-4">
            </div>

            <!-- Texte -->
            <div class="flex-grow-1">
                <p class="text-justify texte-infos">
                    Il est possible de contacter le cabinet par téléphone, par e-mail ou en remplissant le formulaire de contact sur le site web, en expliquant brièvement la nature de la demande.
                    En général, dans les 24 heures, Me Walid Jaafari répond avec des informations pratiques et propose une réunion en ligne ou au bureau de Bruxelles (sous réserve d'honoraires forfaitaires).
                    Chaque réunion introductive est menée par Me Jaafari et dure généralement entre 45 et 60 minutes. Une orientation générale est alors fournie, avec un aperçu du planning, des tarifs et des autres exigences.
                    Lorsqu'un client accepte de travailler avec le cabinet, il doit remplir et signer le document KYC ainsi que le contrat de service client, disponibles sur le site web. Un acompte est facturé selon les modalités convenues.
                    Une fois ces étapes complétées, tout est prêt pour commencer la collaboration.
                </p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>