<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Un chef à la maison</title>
    <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
  <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
</head>
<body>
<?php include_once './src/templates/header.php'?>
    <div class="container">
    <div class="connexion">
<h1>S'inscrire au panneau administrateur</h1>
    <form action="/signup" method="POST">
    <label>
      Username
      <input name="username" class="text" type="text">
    </label>
    <label>
      mdp
      <input name="psw" class="text" type="password">
    </label>
    <label>
      verifcation du mdp
      <input name="vPsw" class="text" type="password">
    </label>
    <input type="submit" class="submit" value="valider">
    </form>
    </div>
  </div>
</body>
</html>