<?php
// TODO Destruction de la session pour déconnecter l'utilisateur et redirection vers la page de connexion
session_start();
if(isset($_SESSION["user_id"])){
    session_destroy();
    header("Location:index.php");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disconnect</title>
</head>
<body>
    
</body>
</html>