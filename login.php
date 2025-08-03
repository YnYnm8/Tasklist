<?php
session_start();
if (isset($_SESSION["user_id"]) == true) {
    // Connecté !
    header("Location: index.php");
}

require_once "bdd-crud.php";
// TODO Connection Utilisateur via la session
$bdd=connect_database();
if(isset($_POST["username"]) && isset($_POST["password"]) ){
    $username=$_POST["username"];
    $password=$_POST["password"];
    
    $request = $bdd->prepare("SELECT * FROM users WHERE username=?");
    
    $request->execute([
        $username,    
    ]);
    $user=$request->fetch(mode: PDO::FETCH_ASSOC);
    $bddpassword_bdd=$user["password"];

    if(password_verify($password,$bddpassword_bdd)){
       $_SESSION["user_id"] = $user["id"]; 
       $_SESSION["username"] = $user["username"];
    
    echo"Connexion réussie, bienvenue !";

       header("Location: index.php");
       exit();
    }else{
        $error = "Nom d'utilisateur ou mot de passe incorrect. Veuillez réessayer.";

    }
}
?>
<?php if (!empty($error)): ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
         <link rel="stylesheet" href="login.css">
</head>
<body>
    <h1>Connexion</h1>
    <!-- TODO Formulaire de connexion -->
     <form action ="" method="post">
     <input type="text" name="username" placeholder="username">
     <input type="password" name="password" placeholder="password">
     <button>Login</button>

     </form>

    <a href="inscription.php">Pas de compte ? S'inscrire</a>
</body>
</html>