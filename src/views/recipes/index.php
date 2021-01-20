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
</head>
<body>
<?php include_once './src/templates/header.php'?>

<div class="all">
  <a class="all" href="/">⬅️ Retour à la page d'accueil</a>
</div>

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
