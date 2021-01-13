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
<?php
while ($recipe = $request->fetch()) {
    ?>
    <article>
        <header>
            <h3><?= htmlspecialchars($recipe['title']); ?></h3>
            <p><?= $recipe['creation_date']; ?></p>
        </header>
        <p><?= nl2br(htmlspecialchars($recipe['content'])); ?></p>
    </article>
    <?php
}
$request->closeCursor();
?>
</body>
</html>
