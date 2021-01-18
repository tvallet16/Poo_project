<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <h1>Ce connecter au panneau administrateur</h1>
    <form action="/log" method="POST">
    <label>
      Username
      <input name="username" type="text">
    </label>
    <label>
      password
      <input name="psw" type="password">
    </label>
    <input type="submit" value="valider">
    </form>
</body>
</html>