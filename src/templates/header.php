<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
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
</html>