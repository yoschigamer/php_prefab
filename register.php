<?php require('./actions/Users/RegisterAction.php') ?>

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
            <input id="username" type="text" placeholder="Username" name="Username" onfocusout=check_username()>
            <input id="mdp" type="Password" placeholder="Mots de passe" name="Password" onfocusout=check_mdp()>
            <input id="mail" type="text" placeholder="Exemple@mail.com" name="Mails" onfocusout=check_mail()>
        </section>
        <button name="submit" id="submit" onclick="animation()">REGISTER</button>
        <a href="./login.php" style="margin: 10px; color: rgb(0, 128, 255); text-decoration: none;">Se connecter ?</a>

    </form>

</body>

<script>
    /*
    
    */
</script>

</html>