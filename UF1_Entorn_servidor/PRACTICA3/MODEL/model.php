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

$pdo = con();
?>