<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Un chef à la maison</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
  <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
  <style>
    section {
        display: grid;
        flex-wrap: wrap;
    }
    section > article {
        flex: 1 1 33%;
    }
  </style>
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
            <a href="/signup">S'inscrire</a>
          <?php endif ?>
        </div>
      </article>
    </div>

  <div class="all">
    <p >Mes 3 dernières recettes : <a  href="/recipes">👀 Voir toutes les recettes</a>
  </div>
<section>
    <?php foreach ($recipes as $recipe): ?>
      <article class="recipe">
        <header>
          <a href="/recipes/<?= $recipe->getId(); ?>">
            <h3><?= htmlspecialchars($recipe->getTitle()); ?></h3>
          </a>
          <p class="date"><?= $recipe->getCreationDate(); ?></p>
        </header>
        <p><?= nl2br(htmlspecialchars($recipe->getContent())); ?></p>
      </article>
    <?php endforeach; ?>
</section>

<footer>
      <p>Copyright© 2021 Un chef à la maison 🍳</p>
</footer>

</body>
</html>



