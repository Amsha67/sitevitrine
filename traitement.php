<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 1. Verification du champ "honeypot"
    if (!empty($_POST["bip_boop_robot"])) {
        die("Erreur : Robot détecté.");
    }

    // 2. Vérification du calcul aléatoire
    $reponseUtilisateur = intval($_POST["verif_humain"]);
    $reponseAttendue = intval($_POST["total_secret"]);

    if ($reponseUtilisateur !== $reponseAttendue) {
        die("Erreur : Mauvais calcul. Vous n'êtes pas humain !");
    }

    $nom = htmlspecialchars($_POST["nom"]);
    echo "<h1>Bonjour $nom</h1><p>Demande transmise avec succès.</p>";

}




?>