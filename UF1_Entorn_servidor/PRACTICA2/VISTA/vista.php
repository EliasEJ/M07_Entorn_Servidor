<?php
require_once "../MODEL/model.php";
?>
<!-- Elyass Jerari -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../ESTILS/estil.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>PT02 ELYASS</title>
</head>
<body>
    <?php
    mostrarTabla(con());
    ?>
    <button type="button" class="retornar"><a href="../index.php">Tornar</a></button>
</body>
</html>