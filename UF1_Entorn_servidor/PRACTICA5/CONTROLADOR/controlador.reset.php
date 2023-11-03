<?php
// Elyass Jerari
session_start();

$idUser = $_SESSION['id'];


// Importamos la clase PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '..\PHPMailer\src\Exception.php';
require '..\PHPMailer\src\PHPMailer.php';
require '..\PHPMailer\src\SMTP.php';
require '..\MODEL\model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtenemos los datos del formulario
  $username = $_POST['username'];
  $newPassword = $_POST['novaPassword'];

  $token = bin2hex(random_bytes(32));

  // Guardamos el token en la base de datos junto con el username
  token($idUser, $token);
  

  // Creamos un objeto PHPMailer
  $mail = new PHPMailer(true);

  try {
    // Configuramos el servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ccdarckx@gmail.com';
    $mail->Password = 'nmlvqkjwfrxamuwk';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configuramos el mensaje
    $mail->setFrom('ccdarckx@gmail.com', 'Elyass Jerari');
    $mail->addAddress($username);
    $mail->Subject = 'Recuperació de contrasenya';
    $mail->Body = 'Per recuperar la teva contrasenya, fes clic en el següent enllaç: http://localhost/reset.php?token=' . $token;

    // Enviamos el mensaje
    $mail->send();

    // Mostramos un mensaje de éxito
    echo 'Correu enviat a la adreça ' . $username . ' amb èxit';
  } catch (Exception $e) {
    // Mostramos un mensaje de error
    echo 'Error: ' . $mail->ErrorInfo;
  }
}
?>