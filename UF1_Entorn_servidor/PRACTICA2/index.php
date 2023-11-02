<?php
require_once "CONTROLADOR/controlador.php";
?>
<!-- Elyass Jerari -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/ESTILS/estil.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ESTILS/estil.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>PT02 ELYASS</title>
</head>
<body>
<h1 class="titulo">PT02 ELYASS</h1>
<div class="container">
    <form action="" method="POST">
        <label for="dni">DNI:
            <input type="text" name="dni" placeholder="00000000A" value = "<?php echo dniExist()?>">
        </label><br><hr>
        <label for="nom">Nom: 
            <input type="text" name="nom" placeholder="Juanito" value = "<?php echo nomExist()?>">
        </label><br><hr>
        <label for="adreca">Adreça: 
            <input type="text" name="adreca" placeholder="C/ Vilar Petit 2" value = "<?php echo adrecaExist()?>">
        </label>
        <hr>
        <br>

        <label for="eleccio">QUÈ VOLS FER ?: </label><br>
        <label for="inserir">
            <input type="radio" name="eleccio" value="inserir" id="inserir"> INSERIR
        </label><br>
        <label for="modificar">
            <input type="radio" name="eleccio" value="modificar"id="modificar"> MODIFICAR 
        </label><br>
        <label for="esborrar">
            <input type="radio" name="eleccio" value="esborrar" id="esborrar"> ESBORRAR 
        </label><br>
        <label>
            <input type="radio" name="eleccio" value="mostrar" id="mostrar"> MOSTRAR
        </label>
        <br><br>

        <?php echo verificarEleccio()?>

        <button type="submit" class="button">Enviar</button>
        <button type="reset" class="button">Reset</button>

        
    </form>
</div>
</body>
</html>