<?php
require_once('connect.php');
$sql = "INSERT INTO `TypeEnergie` (`idEnergie`, `libEnergie`) VALUES (:idEnergie, :libEnergie);";

$query = $db->prepare($sql);

$query->bindValue(':idEnergie', $idenergie, PDO::PARAM_INT);
$query->bindValue(':libEnergie', $libenergie, PDO::PARAM_STR);

$query->execute();
?>
<!DOCTYPE html>
<form method="post">
    <label for="idEnergie">ID</label>
    <input type="number" name="idEnergie" id="idEnergie">
    <label for="libEnergie">Type d'énergie</label>
    <input type="text" name="libEnergie" id="libEnergie">

    <button>Enregistrer</button>
</form>

<?php

if(isset($_POST)){
    if(isset($_POST['idEnergie']) && !empty($_POST['idEnergie'])
        && isset($_POST['libEnergie']) && !empty($_POST['libEnergie'])){
            $idenergie = strip_tags($_POST['idEnergie']);
            $libenergie = strip_tags($_POST['libEnergie']);
        

            $sql = "INSERT INTO `TypeEnergie` (`idEnergie`, `libEnergie`) VALUES (:idEnergie, :libEnergie);";

            $query = $db->prepare($sql);

            $query->bindValue(':idEnergie', $idenergie, PDO::PARAM_INT);
            $query->bindValue(':libEnergie', $libenergie, PDO::PARAM_STR);

            $query->execute();
            
            header('Location: index.php');
        }  
  

}

require_once('close.php');