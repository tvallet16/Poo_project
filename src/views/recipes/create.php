<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Un chef à la masion</title>
  <link rel="stylesheet" href="/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
  <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
</head>
<body>
<?php include_once './src/templates/header.php'?>
  <div class="all">
    <a href="/recipes">⬅️ Retour aux recettes</a>
  </div>
<article class="container">
  <div class="connexion">
    <h1>Un chef à la maison</h1>
    <h3>Nouvelle recette</h3>
    <form action="/recipes" method="POST">
      <div>
        <input class="text" name="title" type="text" placeholder="Nom de la recette">
      </div>
      <div>

      <textarea placeholder="Description recette" name="content" id="" cols="30" rows="10"></textarea>

      </div>
      <input class="submit" type="submit" value="Valider">
    </form>

  </div>

</article>
</body>
</html>
