<?php
// Elyass Jerari
require_once '../CONTROLADOR/controlador.login.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="../ESTIL/estils.css"> 
    <title>Login</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
  <h1>Login</h1>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="centrarFormulari">
        <label for="username">Email</label>
        <input type="email" name="username" id="username" value = "<?php echo username() ?>" required><br>
        <label for="password">Password&nbsp;</label>
        <input type="password" name="password" id="password" value = "<?php echo password() ?>" required><br>
        <button type="submit" id="boto" value="Login" class="bttRegistre">Login</button>
        <button type='reset' value='Tornar' onclick="window.location.href='../index.php'" class="bttRegistre">Tornar</button>
        <?php comprovar()?><br>
        <div class="oblidat">
        Has oblidat la contrasenya ?<a href="reset.vista.php"> Recupera-la</a>
        </div>
    </form>
</body>
</html>
