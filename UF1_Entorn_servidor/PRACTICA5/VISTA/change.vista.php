<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="../ESTIL/estils.css"> 
  <title>Canviar contrasenya</title>
</head>
<body>
  <h1>Canviar contrasenya</h1>
  <form method="post" class="centrarFormulari">
    <label for="novaPassword">Nova password: </label>
    <input type="password" name="novaPassword" id="novaPassword" required>
    <br>
    <button type="submit">Enviar</button>
    <?php
    require_once '../CONTROLADOR/controlador.change.php';
    ?>
  </form>
</body>
</html>
