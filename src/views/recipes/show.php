<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Un chef à la maison</title>
  <link rel="stylesheet" href="/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
  <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
</head>
<body>
  <div class="all">
    <a href="/recipes">⬅️ Retour aux recettes</a>
  </div>
<h1>Un chef à la maison</h1>
<article>
  <header>
    <h3><?= htmlspecialchars($recipe->getTitle()); ?></h3>
    <p><?= $recipe->getCreationDate(); ?></p>
  </header>
  <p><?=nl2br(htmlspecialchars($recipe->getContent())); ?></p>
</article>
</body>
</html>
