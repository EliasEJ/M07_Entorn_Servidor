<?php
//Elyass Jerari
require_once '../MODEL/model.php';
require_once '../VISTA/login.vista.php';
// Inicia la sessió
session_start();

/**
 * Funció per fer les comprovacions del formulari de login
 */
function comprovar() {
    // Comprova si s'ha enviat el formulari
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obte les dades del formulari
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Valida les dades
        $errors = [];
        if (empty($username)) {
            $errors[] = "El camp d'usuario es obligatori.";
        }
        if (empty($password)) {
            $errors[] = "El camp de contrasenya es obligatori.";
        }

        // Si hi ha errors, els mostra i acaba
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
        } else {
            // Si no hi ha errors fa el login
            login($username, $password);
        }
    }
}

/**
 * Funció per mantenir les dades del formulari en cas d'error
 */
function username() { if (isset($_POST["username"])) {return $_POST["username"];} }

/**
 * Funció per mantenir les dades del formulari en cas d'error
 */
function password() {if (isset($_POST["password"])) {return $_POST["password"];} }

?>
