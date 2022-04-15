<?php require('actions/Users/LoginAction.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST">
        <section>
            <input id="mail" type="text" placeholder="Exemple@mail.com" name="Mails" onfocusout=check_mail()>
            <input id="mdp" type="Password" placeholder="Mots de passe" name="Password" onfocusout=check_mdp()>
        </section>
        <button name="submit" id="submit" onclick="animation()">Login</button>
        <a href="./register.php" style="margin: 10px; color: rgb(0, 128, 255); text-decoration: none;">créer un compte ?</a>
    </form>

</body>

</html>