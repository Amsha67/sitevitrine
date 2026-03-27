<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("Accès non autorisé.");
}

// 1. HONEYPOT anti-robot
if (!empty($_POST["anti_robot"])) {
    die("Erreur : Robot détecté.");
}

// 2. CAPTCHA anti-robot
$reponseUtilisateur = intval($_POST["reponse_utilisateur"] ?? -1);
$reponseAttendue    = intval($_POST["total_secret"]        ?? -2);

if ($reponseUtilisateur !== $reponseAttendue) {
    die("Erreur : Mauvais calcul. Vous n'êtes pas humain !");
}

// 3. RGPD obligatoire
if (empty($_POST["rgpd"])) {
    die("Vous devez accepter l'utilisation de vos données.");
}

// 4. RÉCUPÉRATION ET NETTOYAGE DES CHAMPS
$nom       = htmlspecialchars(trim($_POST['nom']       ?? ''));
$email     = htmlspecialchars(trim($_POST['email']     ?? ''));
$telephone = htmlspecialchars(trim($_POST['telephone'] ?? ''));
$sujet     = htmlspecialchars(trim($_POST['objet']     ?? ''));
$message   = htmlspecialchars(trim($_POST['message']   ?? ''));

// 5. VALIDATION
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Email invalide.");
}

if (empty($nom) || empty($sujet) || empty($message)) {
    die("Tous les champs obligatoires doivent être remplis.");
}

// 6. ENVOI
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ericschmolzlin@gmail.com';
    $mail->Password   = 'eijq snin ddja emwx';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';

    // Mail envoyé 
    $mail->setFrom('ericschmolzlin@gmail.com', $nom);
    $mail->addAddress('ericschmolzlin@gmail.com');
    $mail->addReplyTo($email, $nom);

    $mail->isHTML(true);
    $mail->Subject = $sujet;
    $mail->Body    = "
        <h2>Nouveau message de diagnostic</h2>
        <p><strong>Nom :</strong> $nom</p>
        <p><strong>Email :</strong> $email</p>
        <p><strong>Téléphone :</strong> $telephone</p>
        <p><strong>Objet :</strong> $sujet</p>
        <p><strong>Message :</strong> $message</p>
    ";
    $mail->send();

    // Mail de confirmation vers le client
    $mail->clearAddresses();
    $mail->addAddress($email, $nom);
    $mail->Subject = 'Confirmation de réception de votre demande';
    $mail->Body    = "
        <h2>Bonjour $nom,</h2>
        <p>Nous avons bien reçu votre demande et vous répondrons dans les plus brefs délais.</p>
        <p><strong>Votre objet :</strong> $sujet</p>
        <p><strong>Votre message :</strong> $message</p>
    ";
    $mail->send();

    echo "success";

} catch (Exception $e) {
    echo "Erreur : " . $mail->ErrorInfo;
}
?>
