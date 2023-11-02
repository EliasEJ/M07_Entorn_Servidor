<!-- Elyass Jerari -->
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&display=swap" rel="stylesheet">  
	<link rel="stylesheet" href="ESTIL/estils.css"> 
	<title>Paginació</title>
</head>
<body>
<body>
    <div class="contenidor">
        <h1>Articles</h1>
        <section class="articles">
            <ul>
                <?php
				articles()
				?>
            </ul>
        </section>
		<section class="paginacio">
			<ul>
				<?php 
				paginacio()
				?>
			</ul>
		</section>
		<div>
			<form action="" method="GET">
			<select name="articlesXpag" id="articlesXpag" onchange="this.form.submit()">
				<option value="0">Selecciona el número d'articles per pàgina</option>
				<option value="1">1 article per pàgina</option>
				<option value="5">5 articles per pàgina</option>
				<option value="10">10 articles per pàgina</option>
			</select>
			</form>
		</div>

    </div>
</body>
</html>