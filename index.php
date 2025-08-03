<?php

session_start();
require_once "bdd-crud.php";
$bdd=connect_database();

// ここに、このコードがあることでログイン状態が保たれていると考える。  
if(isset($_SESSION['user_id'])){
// 　テーブルにあるIDの中で希望するIDをすべて取り出してくださいという指示
 $request=$bdd->prepare("SELECT * FROM comments WHERE user_id=?") ;
 $request->execute([
$_SESSION["user_id"]
 ]);
$comment_info= $request->fetchall(PDO::FETCH_ASSOC) ;

}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voir les taches</title>
     <link rel="stylesheet" href="index.css">
</head>

<nav>
      <a href="login.php">Login</a>
      <a href="logout.php">Logout</a>
    </nav>
    <div class="profile">
      👤 Connecté en tant que :
      <strong><?= htmlspecialchars($_SESSION['username']) ?></strong>
    </div>
  </header>

  <!-- 紹介＋練習案内 -->
  <section class="intro-card">
    <div class="exprication">
      <h1>Bienvenue Tout Le Monde!</h1>
      <p>Ce site vise à aider tout le monde à s'améliorer en pratiquant les compétences d'escalader avec Amaory.</p>
      <p>Si vous souhaitez nous rejoindre pour vous entraîner, veuillez vous inscrire en tant que membre !</p>
      <a href="inscription.php">Se créer un compte</a>
    </div>

    <div class="practice-wrapper">
      <div class="practice-time">
        <h3>📅 Horaire</h3>
        <p>Lundi au Vendredi 17h30 - 19h</p>
      </div>
      <div class="map">
        <iframe
          src="https://www.google.com/maps/embed?pb=http://localhost:8000/index.php"
          allowfullscreen=""
          loading="lazy">
        </iframe>
      </div>
      <div class="coach-profile">
      <!-- ※写真ファイルを images/amaury.jpg として置いてください -->
      <img src="photo.jpg" alt="Amaury">
      <h3>Amaury</h3>
      <p>Je m’appelle <strong>Amaury</strong>.</p>
      <p>Je pratique l’escalade depuis le lycée.</p>
      <p>C’est un sport que j’adore.</p>
      <p>Je suis né au Vietnam et j’aime les chats.</p>
    </div>
    </div>
  </section>

  <!-- タスク一覧 -->
  <h1 class="task-title">To Do List</h1>
<p class="comment">Ajoutez-le à votre liste pour vous améliorer à Escalado !</p>
  <a href="add-task.php" class="comment-button">Add Tasks</a>

  <div class="tasks">
    <?php foreach($comment_info as $comment): ?>
    <h2>
      <?=$comment['title']?>
      <span>
        <a href="show-task.php?id=<?=$comment['id']?>" class="detail-link">Show details</a>
        <a href="delete-task.php?id=<?=$comment['id']?>" class="delete-link">Delete</a>
      </span>
    </h2>
    <?php endforeach;?>
  </div>

</body>
</html>



