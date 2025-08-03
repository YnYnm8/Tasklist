<?php
require_once "bdd-crud.php";
session_start();
$bdd=connect_database();

$request=$bdd->prepare('SELECT * FROM comments WHERE id=?');
$request->execute([
    $_GET["id"]
]);
$response=$request->fetchall(PDO::FETCH_ASSOC);
// BONUS Afficher les détails d'une tâche spécifique en fonction de son ID passé en $_GET

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Task</title>
    <link rel="stylesheet" href="show-task.css">
</head>
<body>
    <?php foreach($response as $show_comment) : ?>
        <h2><?= $show_comment['title'] ?></h2>
        <p><?= $show_comment['comment'] ?></p>
     <?php endforeach;?> 
</body>
