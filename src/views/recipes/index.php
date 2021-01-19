<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mon carnet de viennoiseries</title>
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
          <a href="/logout">déconnexion</a>
          <a href="/">Ajouter une recette</a>
          <?php else:?>
          <a href="/login">connection</a>
          <?php endif ?>
          <a href="#">s'inscrire</a>
        </div>
      </article>
  </div>

<a href="/">⬅️ Retour à la page d'accueil</a>

 <?php if(isset($_SESSION['checkLog'])):  ?>

  <a href="/recipes/create" role="button">➕ Nouvelle recette</a>

<?php endif ?>

<?php foreach ($recipes as $recipe): ?>
  <article class="recipe">
    <header>
      <a href="/recipes/<?= $recipe->getId(); ?>">
        <h3><?= htmlspecialchars($recipe->getTitle()); ?></h3>
      </a>
      <p><?= $recipe->getCreationDate(); ?></p>
    </header>
    <p><?= nl2br(htmlspecialchars($recipe->getContent())); ?></p>
  </article>
<?php endforeach; ?>
</body>
</html>
