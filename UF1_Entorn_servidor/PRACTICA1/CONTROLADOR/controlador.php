<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\PHPMailer\src\Exception.php';
require 'C:\xampp\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\PHPMailer\src\SMTP.php';

function verificacion() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Guarda els valors dels camps en variables i els filtra per a que no es pugui injectar codi
        $nom = htmlspecialchars($_POST["nom"]);
        $correu = htmlspecialchars($_POST["correu"]);
        $missatge = htmlspecialchars($_POST["missatge"]);

        $falta = [];
        $errors = '';

        //Comprova si els camps estan buits i si ho estan, els afegeix a un array
        if (empty($nom)) {
            $falta[] = "Nom";
        }
        if (empty($correu)) {
            $falta[] = "Correu";
        }
        if (empty($missatge)) {
            $falta[] = "Missatge";
        }


        //ENVIAMENT DE CORREU MITJANÇANT PHP.INI
        
        //Comprova si el correu es valid i si no ho es, mostra un error
        if (!empty($correu)) {
            if (!filter_var($correu, FILTER_VALIDATE_EMAIL)) {
                $errors = "El correo no es válido";
            }
        }
        
        //Comprova si hi ha algun error, si no hi ha, envia el correu
        /*
        if (!empty($nom) && !empty($correu) && !empty($missatge)) {
            $to = $correu;
            $subject = "Formulario de contacto";
            $message = $missatge;
            $headers = "From: ccdarckx@gmail.com";

            //Envia el correu utilitzant la funció mail del php sendmail
            if (mail($to, $subject, $message, $headers)) {
                $errors = "Enviat correctament.";
            }
            
        }
        */
        

        //ENVIAMENT DE CORREU MITJANÇANT PHPMAILER
        
        if (!empty($nom) && !empty($correu) && !empty($missatge)) {
            $to = $correu;
            $nom = htmlspecialchars($_POST["nom"]);
            $message = $missatge;
            //Envia el correu utilitzant la funció mail del phpMailer on li passem el correu, el nom i el missatge
            enviarMail($to, $nom, $message);
        } 


        //Mostra els errors o els camps que falten
        if (!empty($errors)) {
            echo '<div id="resultat" style="color: ' . ($errors === "Enviat correctament." ? 'green' : 'red') . ';">' . $errors . '</div>';
        } elseif (!empty($falta)) {
            echo '<div id="resultat" class="faltanDatos">Los siguientes campos están vacíos: <br>';
            foreach ($falta as $campo) {
                echo "- $campo <br>";
                
            }
            echo '<br></div>';
        }
    }
}

function enviarMail($correu, $nom, $missatge){
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ccdarckx@gmail.com';                   //SMTP username
        $mail->Password   = 'nmlvqkjwfrxamuwk';                     //SMTP password
        $mail->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom($correu, $nom);
        $mail->addAddress($correu);                                 //Name is optional
    
        //Content
        $mail->isHTML(true);                                        //Set email format to HTML
        $mail->Subject = 'Formulario de contacto con PHPMailer';
        $mail->Body    = $missatge;
    
        $mail->send();
        echo 'Enviat correctament.';
    } catch (Exception $e) {
        echo "No se pudo enviar el mensaje. Error de envío: {$mail->ErrorInfo}";
    }
}

//Funcions que verifiquen si els camps existeixen per a que no s'elimini el contingut dels camps en cas de que hi hagi un error
function nomExist() { if (isset($_POST["nom"])) {return $_POST["nom"];} }

function correuExist() {if (isset($_POST["correu"])) {return $_POST["correu"];} }

function missatgeExist() {if (isset($_POST["missatge"])) {return $_POST["missatge"];} }
?>
