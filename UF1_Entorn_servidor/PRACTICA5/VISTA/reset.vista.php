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
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="novaPassword">Nova contrasenya:</label>
    <input type="password" name="novaPassword" id="novaPassword" required>
    <br>
    <button type="submit">Enviar</button>
    <?php
    require_once '../CONTROLADOR/controlador.reset.php';
    ?>
  </form>
</body>
</html>