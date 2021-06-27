<?php
require "db.php";
$pdo = creerPDO();

$username = $_POST['login'];
$pword = $_POST['pword'];

$pdo_statement = $pdo->prepare("SELECT * FROM Personne where Identifiant = :le_id");
$pdo_statement->execute(['le_id' => $username]);
$personne=$pdo_statement->fetch();

session_start();
session_regenerate_id();
if ($personne && password_verify($pword, $personne['MotDePasse'])) {
    $_SESSION['login'] = $personne['Identifiant'];
    $_SESSION['type'] = 'utilisateur';
}
else
{
    $_SESSION['erreur'] = 'true'; //bonus
}
header('Location: index.php');


