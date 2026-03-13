<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

$nom = htmlspecialchars($_POST["nom"]);

echo "<h1>Bonjour $nom </h1>";

echo "<p>Le formulaire a bien été envoyé.</p>";

} else {

echo "Aucune donnée reçue.";

}

?> 