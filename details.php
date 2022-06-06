<?php
session_start();

// On inclut la connexion à la base
require_once('connect.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = strip_tags($_GET['id']);
    // On écrit notre requête
    $sql = 'SELECT * FROM `TypeEnergie` WHERE `idEnergie`=:id';

    // On prépare la requête
    $query = $db->prepare($sql);

    // On attache les valeurs
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On stocke le résultat dans un tableau associatif
    $type = $query->fetch();

    if(!$type){
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}

require_once('close.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des types</title>

</head>
<body>
    <h1>Détails du type <?= $type['type'] ?></h1>
    <p>ID : <?= $type['idEnergie'] ?></p>
    <p>Type d'énergie : <?= $type['libEnergie'] ?></p>
    <p><a href="edit.php?id=<?= $type['idEnergie'] ?>">Modifier</a>  <a href="delete.php?id=<?= $type['idEnergie'] ?>">Supprimer</a>
    <a href="index.php">Retour</a> </p>
</body>
</html>
