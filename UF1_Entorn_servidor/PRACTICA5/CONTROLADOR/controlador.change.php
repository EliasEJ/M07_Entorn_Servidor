<?php

require '../MODEL/model.php';

// Obtenir el token de la URL
$token = $_GET['token'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novaPassword = htmlspecialchars($_POST['novaPassword']);
    $novaPassword2 = htmlspecialchars($_POST['novaPassword2']);

    if ($novaPassword !== $novaPassword2) {
        echo 'Les contrasenyes no coincideixen';
        exit;
    }

    // Obtenir el username a partir del token
    $username = obtenirUsername($token);

    // Actualitzar la contrasenya
    canviarPassword($username, $novaPassword);
    echo 'Contrasenya actualitzada amb èxit';
  }
?>