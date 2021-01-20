<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>s'inscrire au panneau administrateur</h1>
    <form action="/signup" method="POST">
    <label>
      Username
      <input name="username" type="text">
    </label>
    <label>
      mdp
      <input name="psw" type="password">
    </label>
    <label>
      verifcation du mdp
      <input name="vPsw" type="password">
    </label>
    <input type="submit" value="valider">
    </form>
</body>
</html>