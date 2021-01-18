<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mon carnet de viennoiseries</title>

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
<?php if(isset($_SESSION['checkLog'])):  ?>
  <a href="/logout">Se déconnecter</a>
<?php else:?>
  <a href="/login">Se connecter</a>
<?php endif ?>
<h1>Les recettes de Tonton</h1>
<p>Dernières recettes : <a href="/recipes">👀 Voir toutes les recettes</a>
<section>
    <?php foreach ($recipes as $recipe): ?>
      <article>
        <header>
          <a href="/recipes/<?= $recipe->getId(); ?>">
            <h3><?= htmlspecialchars($recipe->getTitle()); ?></h3>
          </a>
          <p><?= $recipe->getCreationDate(); ?></p>
        </header>
        <p><?= nl2br(htmlspecialchars($recipe->getContent())); ?></p>
      </article>
    <?php endforeach; ?>
</section>
</body>
</html>
