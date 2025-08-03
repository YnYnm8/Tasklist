<?php
session_start();
require_once "bdd-crud.php";


$bdd = connect_database();
if (isset($_POST["title"]) && isset($_POST["comment"])) {
    $title = $_POST["title"];
    $comment = $_POST["comment"];


    $request = $bdd->prepare("INSERT INTO comments(title, comment, user_id)VALUES(?, ?, ?)");
    $request->execute([
        $title,
        $comment,
        $_SESSION["user_id"]
    ]);

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="add-task.css">
</head>

<body>

    <form action="" method="POST">

        <label for="title">Title</label><br>
        <input type="text" name="title" placeholder="Title"><br>
        <label for="comment">Comment</label><br>
        <textarea id="comment" name="comment" placeholder="Laissez un commentaire"></textarea><br>
        <button type="submit">Envoyer</button>
        
            <a href="index.php">Home</a>
    </form>

</body>

</html>