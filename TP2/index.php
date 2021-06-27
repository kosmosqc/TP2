<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<section>
    <?php

    require "db.php";
    $pdo = creerPDO();
    $sql = "SELECT Entete, Contenu, Pied FROM Article WHERE Id=1";

    $pdo_statement = $pdo->prepare($sql);
    $pdo_statement->execute([]);
    $ligne=$pdo_statement->fetch();


    session_start();
    session_regenerate_id();
    if (isset($_SESSION['login'], $_SESSION['type']) && $_SESSION['type']==='utilisateur') :
        echo "<section>";
        echo "<article>";
        echo "<header>" . $ligne["Entete"] . "</header>";
        echo "<form method='GET' action='traitement.php'>";
        echo "<textarea class='mod' name='text'>". htmlspecialchars($ligne["Contenu"]);
        echo "</textarea>";
        echo "<input type='submit'value='Soumetre les modifications' />";
        echo "</form>";
        echo "<footer>" . $ligne["Pied"] . "</footer>";
        echo "</article>";

        echo "<form class='login' method='post' action='logout.php'>";
        echo " <p><label for='idlogin'>".'Bonjour ' . $_SESSION["login"] . " </label></p>";
        echo "<p><input type='submit'value='Déconnexion' /></p>";
        echo " </form>";
        echo "</section>";

    elseif (isset($_SESSION['erreur'])) :      //bonus

        echo "<article >";
        echo "<header>" . $ligne["Entete"] . "</header>";
        echo "<p>" . htmlspecialchars($ligne["Contenu"]) . "</p>";
        echo "<footer>" . $ligne["Pied"] . "</footer>";
        echo "</article>";

        echo "<form  class='login' method='post' action='login.php'  >";
        echo " <p><label class='erreur' for='err' id='err'>Erreur ! </label></p>";
        echo " <p><label for='idlogin'>Identifiant : </label><input  type='text' name='login' /></p>";
        echo " <p> <label for='idpword'>Mot de passe :</label><input  type='password' name='pword' /></p>";
        echo "<p ><input type='submit' value='Connexion'  /></p>";
        echo " </form>";

    else :

        echo "<article >";
        echo "<header>" . $ligne["Entete"] . "</header>";
        echo "<p>" . htmlspecialchars($ligne["Contenu"]) . "</p>";
        echo "<footer>" . $ligne["Pied"] . "</footer>";
        echo "</article>";

        echo "<form  class='login' method='post' action='login.php'  >";
        echo " <p><label for='idlogin'>Identifiant : </label><input  type='text' name='login' /></p>";
        echo " <p> <label for='idpword'>Mot de passe :</label><input type='password' name='pword' /></p>";
        echo "<p ><input type='submit' value='Connexion'  /></p>";
        echo " </form>";

    endif;
    ?>

</section>
</body>
</html>
