<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com"> 
  <link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/tailwindcss@%5E2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<?php include_once './src/templates/header.php'?>

  <div class="container">
    <div class="connexion">
      <h1>Ce connecter au panneau administrateur</h1>
      <form action="/log" method="POST">
      <label>
        Username
        <input name="username" class="text" type="text">
      </label>
      <label>
        password
        <input name="psw" class="text" type="password">
      </label>
      <input type="submit" class="submit" value="Connection">
      </form>
    </div>
  </div>
  <?php include_once './src/templates/footer.php'?>

</body>
</html>