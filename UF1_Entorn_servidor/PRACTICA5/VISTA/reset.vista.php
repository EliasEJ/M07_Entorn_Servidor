<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="../ESTIL/estils.css"> 
  <title>Recuperar contrasenya</title>
</head>
<body>
  <h1>Recuperar contrasenya</h1>
  <form method="post" class="centrarFormulari">
    <label for="username">Email:</label>
    <input type="email" name="username" id="username" required>
    <br>
    <button type="submit" class="bttRegistre">Enviar</button>
    <button type='reset' value='Tornar' onclick="window.location.href='../index.php'" class="bttRegistre">Tornar</button>
    <?php
    require_once '../CONTROLADOR/controlador.reset.php';
    ?>
  </form>
</body>
</html>
