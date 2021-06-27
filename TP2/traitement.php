<?php
session_start();
session_regenerate_id();
if (isset($_GET['text']) && $_SESSION['type']==='utilisateur') {
    require "db.php";
    $pdo = creerPDO();
    $text = $_GET['text'];
    $pdo_statement =$pdo->prepare("UPDATE Article SET Contenu= :le_texte WHERE Id=1");
    $pdo_statement->execute(['le_texte' =>$text]);
}
header('Location: index.php');