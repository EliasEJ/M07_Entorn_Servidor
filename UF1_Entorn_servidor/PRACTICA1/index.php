<?php require_once "CONTROLADOR/controlador.php" ;?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>FORMULARI P01</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="VISTA/estil.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>FORMULARI</h1>
  <p>Formulari de registre</p> 
</div>
<div class="container">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <div class="form-group">
            <label for="nom" class="">Nom:</label>
            <input type="text" class="form-control" id="nom" placeholder="Introdueix el teu nom" name="nom" value = "<?php echo nomExist() ?>">
          </div>
          <div class="form-group">
            <label for="correu">Correu:</label>
            <input type="email" class="form-control" id="correu" placeholder="Introdueix el correu" name="correu" value = "<?php echo correuExist() ?>">
          </div>
        <div class="form-group">
          <label for="missatge">Missatge:</label>
          <br>
          <textarea name="missatge" id="missatge" cols="30" rows="10" placeholder="Introdueix el missatge" ><?php echo missatgeExist()?></textarea>
        </div>
        <div>
            <?php verificacion() ?>
            
        </div>
        <div class="form-group">
          <button type="submit" class="button">Enviar</button>
          <button type="reset" class="button">Reset</button>
        </div>
    </form>
</div>

</body>
</html>
