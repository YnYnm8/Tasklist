<?php
session_start();
require_once "bdd-crud.php";
$bdd=connect_database();

echo '<pre>';
print_r($_GET);
echo '</pre>';
$request=$bdd->prepare("DELETE FROM comments WHERE id=?");
$request->execute([
    $_GET["id"],
]);

header("Location: index.php");

// TODO Suppréssion d'une tâche en fonction de son ID passé en $_GET


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une tache</title>
</head>
<body>
   
</body>
</html>