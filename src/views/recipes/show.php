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
<a href="/recipes">⬅️ Retour aux recettes</a>
<h1>Les recettes de Tonton</h1>
<article>
  <header>
    <h3><?= htmlspecialchars($recipe->getTitle()); ?></h3>
    <p><?= $recipe->getCreationDate(); ?></p>
  </header>
  <p><?=nl2br(htmlspecialchars($recipe->getContent())); ?></p>
</article>
</body>
</html>
