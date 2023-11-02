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
    <style>
    </style>
</head>
<body>
    <div class="login">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="centrarFormulari">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value = "<?php echo username() ?>" required><br>
        <label for="password">Password&nbsp;</label>
        <input type="password" name="password" id="password" value = "<?php echo password() ?>" required><br>
        <button type="submit" id="boto" value="Login" class="bttRegistre">Login</button>
        <button type='reset' value='Tornar' onclick="window.location.href='../index.php'" class="bttRegistre">Tornar</button>
        <br>
        <?php comprovar()?>
    </form>
    </div>
</body>
</html>
