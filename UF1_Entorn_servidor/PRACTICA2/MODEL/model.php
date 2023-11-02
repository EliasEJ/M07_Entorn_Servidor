<?php
    //Elyass Jerari
    require_once("env.php");
    //Función que conecta con la base de datos y devuelve la conexión
    /**
     * Conecta con la base de datos y devuelve la conexión.
     *
     * @return PDO $con Una conexión a la base de datos.
     */
    function con(){
        try {
            $con = new PDO("mysql:host=".HOST.";dbname=".DB, USER, PASS);
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
        return $con;
    }

    /**
     * Inserta los datos pasados por parámetro en la base de datos.
     *
     * @param string $dni El DNI del usuario.
     * @param string $nom El nombre del usuario.
     * @param string $adreca La dirección del usuario.
     * @param PDO $con La conexión a la base de datos.
     */
    function inserir($dni, $nom, $adreca, $con){
        try {
            $statement = $con->prepare("INSERT INTO usuaris (dni, nom, adreca) VALUES (:dni, :nom, :adreca)");
            $statement->bindParam(':dni', $dni);
            $statement->bindParam(':nom', $nom);
            $statement->bindParam(':adreca', $adreca);
            $statement->execute();
            taula();
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Modifica los datos pasados por parámetro en la base de datos.
     *
     * @param string $dni El DNI del usuario.
     * @param string $nom El nombre del usuario.
     * @param string $adreca La dirección del usuario.
     * @param PDO $con La conexión a la base de datos.
     */
    function modificar($dni, $nom, $adreca, $con){
        try {
            $statement = $con->prepare("UPDATE usuaris SET nom = :nom, adreca = :adreca WHERE dni = :dni");
            $statement->bindParam(':dni', $dni);
            $statement->bindParam(':nom', $nom);
            $statement->bindParam(':adreca', $adreca);
            $statement->execute(); 
            taula();
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Muestra los datos de la base de datos.
     *
     * @param PDO $con La conexión a la base de datos.
     */
    function mostrar($con){
        try {
            $statement = $con->prepare("SELECT * FROM usuaris");
            $statement->execute();
            taula();
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Esta función borra el usuario con el DNI dado de la base de datos.
     * 
     * @param string $dni El DNI del usuario a eliminar.
     * @param PDO $con La conexión a la base de datos.
     */
    function esborrar($dni, $con){
        try {
            $statement = $con->prepare("DELETE FROM usuaris WHERE dni = :dni");
            $statement->bindParam(':dni', $dni);
            $statement->execute();
            taula();
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    /**
     * Esta función extrae y muestra todos los datos de los usuarios en la base de datos en forma de tabla.
     *
     * @param PDO $con La conexión a la base de datos.
     */
    function mostrarTabla($con){
        try {
            $statement = $con->prepare("SELECT * FROM usuaris");
            $statement->execute();
            $result = $statement->fetchAll();
            echo "<table>";
            echo "<tr>";
            echo "<th>DNI</th>";
            echo "<th>Nom</th>";
            echo "<th>Adreça</th>";
            echo "</tr>";
            foreach ($result as $row){
                echo "<tr>";
                echo "<td>" . $row['dni'] . "</td>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "<td>" . $row['adreca'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
    function taula(){
        header("Location: ../PRACTICA2/VISTA/vista.php");
        die();
    }
?>
