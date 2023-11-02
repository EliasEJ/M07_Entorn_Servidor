<?php
    //Elyass Jerari
    require_once("MODEL/model.php");
    
    function verificarEleccio(){
        if (isset($_POST['eleccio'])){
            //Recogemos los datos del formulario
            $dni = htmlspecialchars($_POST['dni']);
            $nom = htmlspecialchars($_POST['nom']);
            $adreca = htmlspecialchars($_POST['adreca']);
            $eleccio = $_POST['eleccio']; 
            $con = con();           

            //Comprobamos si se necesita hacer alguna verificación de los datos
            if($eleccio == "inserir" || $eleccio == "modificar" || $eleccio == "esborrar"){
                compruebaDatos($dni, $nom, $adreca, $eleccio);
            }elseif($eleccio == "mostrar"){
                mostrar($con);
            }else{
                echo '<div id="resultat" style="color: red;">No has seleccionado ninguna opción</div>';
            }
        }
    }

    /**
     * Comprueba los datos introducidos por el usuario y los envía a la función correspondiente.
     * 
     * @param string $dni El DNI del usuario.
     * @param string $nom El nombre del usuario.
     * @param string $adreca La dirección del usuario.
     * @param string $eleccio La opción seleccionada por el usuario.
     */
    function compruebaDatos($dni, $nom, $adreca, $eleccio){
        $con = con();
        $falta = [];
        $errors = '';

        if (empty($dni)) {
            $falta[] = "DNI";
        }
        if (empty($nom)) {
            $falta[] = "Nom";
        }
        if (empty($adreca)) {
            $falta[] = "Adreça";
        }

        //Comprobamos que los campos no estén vacíos
        if (!empty($dni) || !empty($nom) || !empty($adreca)) {

            //Comprobamos que el DNI sea válido
            if(!preg_match("/^[0-9]{8}[A-Za-z]$/", $dni)) {
            $errors = "El DNI introducido no es correcto";
            }
            
            //Comprobamos que el nombre solo contiene letras
            if(!preg_match("/^[A-Za-z]+$/", $nom)){
            $errors = "El nombre solo puede contener letras";
            }

            //Mostramos que campos faltan en caso de que falten
            if (!empty($falta)) {
                echo '<div class="faltanDatos">Los siguientes campos están vacíos: <br>';
                foreach ($falta as $campo) {
                    echo "- $campo <br>";
                }
                echo '<br></div>';
            } elseif (!empty($errors)) {
                echo '<div id="resultat" style="color: red;">' . $errors . '</div>';
            }
            
            //Si no hay errores ni campos vacíos, enviamos los datos a la función correspondiente
            if ($eleccio == "inserir"){
                if (empty($falta) && empty($errors) ) {
                    inserir($dni, $nom, $adreca, $con);
                }
            }elseif ($eleccio == "modificar"){
                if (empty($falta) && empty($errors) ) {
                    modificar($dni, $nom, $adreca, $con);
                }
            }elseif ($eleccio == "esborrar"){
                if (empty($falta) && empty($errors) ) {
                    esborrar($dni, $con);
                }
            }

        }
    }
    //Funciones que guardan el valor de los campos por si ocurre algún error
    function dniExist() { if (isset($_POST["dni"])) {return $_POST["dni"];} }

    function nomExist() {if (isset($_POST["nom"])) {return $_POST["nom"];} }

    function adrecaExist() {if (isset($_POST["adreca"])) {return $_POST["adreca"];} }
?>