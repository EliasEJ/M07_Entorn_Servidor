<?php
// Elyass Jerari
require_once 'env.php';

/**
 * Funció per connectar-se amb la base de dades
 */
function con()
{
    try {
        $pdo = new PDO ("mysql:host=" . HOST . ";dbname=" . DB . ";charset=utf8", USER, PASS);        
        return $pdo;
    } catch (PDOException $e) {
        die('Error : ' . $e->getMessage());
    } finally {
        $pdo = null;
    }
}

/**
 * Funció per comprovar si l'usuari existeix
 * @param string $username - Nom d'usuari
 */
function usuariExisteix($username)
{
    // Comprovar si l'usuari ja existeix
    try {
        $pdo = con();
        $stmt = $pdo->prepare("SELECT * FROM usuaris WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}

/**
 * Funció per fer el login
 * @param string $username - Nom d'usuari
 * @param string $password - Contrasenya
 */
function login($username, $password){
    try {
        $pdo = con();
        $stmt = $pdo->prepare("SELECT * FROM usuaris WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // S'ha trobat un usuari amb el nom d'usuari proporcionat.
            // Verificar la contrasenya.
            if (password_verify($password, $user['password'])) {
                // La contrasenya és correcta.
                $_SESSION['user'] = $user;
                //echo "Login correcte";
                header('Location: ../index.php');
            } else {
                // La contrasenya és incorrecta.
                echo "Contrasenya incorrecta.";
            }
        } else {
            // No s'ha trobat cap usuari amb el nom d'usuari proporcionat.
            echo "Usuari no trobat.";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
}


/**
 * Funció per registrar un usuari
 * @param string $username - Nom d'usuari
 * @param string $password - Contrasenya
 */
function registre($username, $password){
    //Obtenir connexió
    $pdo = con();

    //Insertar usuari a la base de dades
    try {
        $stmt = $pdo->prepare("INSERT INTO usuaris (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        echo "Usuari registrat correctament";
    } catch (PDOException $e) {
        echo "Error en la consulta SQL: " . $e->getMessage();
    }
}
/**
 * Funció per obtenir els articles de la pàgina actual
 * @param int $offset - Valor a partir del qual es comença a mostrar els articles
 * @param int $articlesPagina - Número d'articles per pàgina
 * @param PDO $pdo - Connexió a la base de dades
 */
function obtenirArticles($offset, $articlesPagina, $pdo)
{
    // Executa la consulta SQL per obtenir els articles de la pàgina actual
    $stmt = $pdo->prepare("SELECT * FROM articles LIMIT :offset, :articlesPagina");
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':articlesPagina', $articlesPagina, PDO::PARAM_INT);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Funció per obtenir el número total d'articles
 * @param PDO $pdo - Connexió a la base de dades
 */
function numTotalArticles($pdo)
{
    // Executa la consulta SQL per obtenir el número total d'articles
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM articles");

    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

/**
 * Funció per inserir un article
 * @param string $article - Article
 */
function inserir($article){
    $con = con();
    try {
        $statement = $con->prepare("INSERT INTO articles (article) VALUES (:article)");
        $statement->bindParam(':article', $article);

        $statement->execute();
        header('Location: index.php');
    } catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

/**
 * Funció per modificar un article
 * @param int $id - Id de l'article
 */
function modificar($id, $article){
    $con = con();
    try {
        $statement = $con->prepare("UPDATE articles SET article = :article WHERE id = :id");
        $statement->bindParam(':id', $id);
        $statement->bindParam(':article', $article);

        $statement->execute();
        header('Location: index.php');
    } catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

/**
 * Funció per esborrar un article
 * @param int $id - Id de l'article
 */
function esborrar($id){
    $con = con();
    try {
        $statement = $con->prepare("DELETE FROM articles WHERE id = :id");
        $statement->bindParam(':id', $id);

        $statement->execute();
        header('Location: index.php');
    } catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }
}

$pdo = con();

?>