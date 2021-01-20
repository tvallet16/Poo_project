<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
  <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
</head>
<body>
  <div class="header">
        <article>
          <img src="img/toc.png" alt="">
          <h1>Un chef à la maison</h1>
          <div>
            <?php if(isset($_SESSION['checkLog'])):  ?>
            <a href="/logout">Déconnexion</a>
            <a href="/recipes/create" class="recipeB">Ajouter une recette</a>
            <?php else:?>
            <a href="/login">Connection</a>
            <a href="#">S'inscrire</a>
            <?php endif ?>
          </div>
        </article>
      </div>
  <div class="container">
    <div class="connexion">
      <h1>Ce connecter au panneau administrateur</h1>
      <form action="/log" method="POST">
      <label>
        Username
        <input name="username" class="text" type="text">
      </label>
      <label>
        password
        <input name="psw" class="text" type="password">
      </label>
      <input type="submit" class="submit" value="Connection">
      </form>
    </div>
  </div>
</body>
</html>