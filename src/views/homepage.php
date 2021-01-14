<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mon carnet de viennoiseries</title>
</head>
<body>
<h1>Les recettes de Tonton</h1>
<p>Dernières recettes :</p>
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
</body>
</html>
