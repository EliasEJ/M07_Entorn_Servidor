<?php

require '../MODEL/model.php';

// Obtenir el token de la URL
$token = $_GET['token'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novaPassword = $_POST['novaPassword'];

    // Obtenir el username a partir del token
    $username = obtenirUsername($token);

    // Actualitzar la contrasenya
    canviarPassword($username, $novaPassword);
    echo 'Contrasenya actualitzada amb èxit';
  }
?>