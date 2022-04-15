<?php
require('actions/DataBase.php');
if (isset($_POST['submit'])) {

    if (!empty($_POST["Username"]) && !empty($_POST["Password"]) && !empty($_POST["Mails"])) {

        $username = htmlspecialchars($_POST['Username']); // On récupère le nom d'utilisateur
        $password = password_hash($_POST['Password'], PASSWORD_DEFAULT); // On récupère le mot de passe
        $email = htmlspecialchars($_POST['Mails']); // On récupère l'email

        $checkIfUserExist = $bdd->prepare("SELECT Username FROM users WHERE Username = ?"); // On vérifie si le nom d'utilisateur existe déjà
        $checkIfMailExist = $bdd->prepare("SELECT Mails FROM users WHERE Mails = ?"); // On vérifie si l'email existe déjà
        $checkIfUserExist->execute(array($username)); // On execute la requête
        $checkIfMailExist->execute(array($email)); // On execute la requête

        if ($checkIfUserExist->rowCount() == 0 && $checkIfMailExist->rowCount() == 0) { // Si le nom d'utilisateur et l'email n'existent pas déjà
            $insertUser = $bdd->prepare("INSERT INTO users(Username, Password, Mails) VALUES(?, ?, ?)"); // On insère le nom d'utilisateur, le mot de passe et l'email dans la base de données
            $insertUser->execute(array($username, $password, $email)); // On execute la requête

            $getIdOfthisUserReq = $bdd->prepare("SELECT id FROM users WHERE Username = ? and Mails = ?"); // On récupère les infos de l'utilisateur
            $getIdOfthisUserReq->execute(array($username, $email)); // On execute la requête
            $getIdOfthisUser = $getIdOfthisUserReq->fetch(); // On récupère les infos de l'utilisateur              
            echo "alert('Votre compte a bien été créé !')"; // On affiche un message de succès

            $_SESSION['auth'] = true; // On définit la variable de session
            $_SESSION['id'] = $getIdOfthisUser['id']; // On stocke l'id de l'utilisateur dans la session
            $_SESSION['username'] = $username; // On enregistre le nom d'utilisateur en tant que variable de session
            $_SESSION['email'] = $email; // On enregistre les infos de l'utilisateur dans la session
            header('Location: index.php'); // On redirige l'utilisateur vers la page d'accueil

        } else {
            echo "alert('Ce nom d'utilisateur ou cet email existe déjà !')"; // On affiche un message d'erreur
        }
    } else { // Si le formulaire n'est pas rempli
        echo ('<script>alert("Veuillez remplir tous les champs")</script>');
    }
}
