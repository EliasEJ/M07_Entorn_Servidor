<?php
//Elyass Jerari
include '../MODEL/model.php';
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
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        // Guardar el nombre d'intents en una cookie.
        if (!isset($_COOKIE['numIntents'])) {
            $numIntents = 0;
            setcookie('numIntents', $numIntents, time() + 3600);
        } else {
            $numIntents = $_COOKIE['numIntents'];
        }

        // Valida les dades
        $errors = [];
        if (empty($username)) {
            $errors[] = "El camp d'usuario es obligatori.";
        }
        if (empty($password)) {
            $errors[] = "El camp de contrasenya es obligatori.";
            $numIntents++;
        }

        // Si hi ha errors, els mostra i acaba
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
        } else {
            // Si no hi ha errors fa el login
            login($username, $password);
            // Si la contrasenya es incorrecte incrementa el nombre d'intents
            if (!login($username, $password)) {
                $numIntents++;
                setcookie('numIntents', $numIntents, time() + 60);
            }
            // Si el nombre d'intents es igual a 3, mostra un captcha
            if ($numIntents >= 3) {
                echo '<div class="g-recaptcha" data-sitekey="6LdYWP4oAAAAAHatuy7MghKYp7hdYZTiKI7BtXgo"></div>';
            }
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
