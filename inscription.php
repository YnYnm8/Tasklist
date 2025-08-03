<?php
session_start();
require_once "bdd-crud.php";
if (isset($_SESSION["user_id"]) == true) {
    // Connecté !
    header("Location: index.php");
}


$bdd=connect_database();
if(isset($_POST["username"]) && isset($_POST["password"]) ){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $request = $bdd->prepare("INSERT INTO users (username,password) VALUES (?,?)");
    $request->execute([
        $username,
        $hashed_password
        // header("Location: index.php");

    ]);
   
    
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
     <link rel="stylesheet" href="inscription.css">
</head>

<body> 
<!-- TODO Formulaire pour s'inscrire (créer un utilisateur) -->
<form action=""     method="POST">
    
<div class="form-container">
    <img src="photo.jpg" alt="プロフィール画像" class="form-image"></div>
   <h1>アモリの部屋へようこそ！</h1> 
<input type="text" name="username" placeholder="username">
<input type="password" name="password" placeholder="password">
<button>Inscription</button>
<a class="amaury" href="index.php">🏠 Home page 🏠</a>
</form>

</body>

</html>