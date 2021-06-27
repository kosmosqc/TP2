<?php
function creerPDO() : PDO
{
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=tp2db", "root", "");
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $une_exception) {
        echo "Erreur de connexion avec la base de données : " . $une_exception->getMessage();
        die();
    }
}
