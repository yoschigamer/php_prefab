<?php
require('actions/DataBase.php');

if (isset($_POST['submit'])) {

    if (!empty($_POST["Password"]) && !empty($_POST["Mails"])) {

        $password = htmlspecialchars($_POST['Password']); // On récupère le mot de passe
        $email = htmlspecialchars($_POST['Mails']); // On récupère l'email

        $checkIfUsersExist = $bdd->prepare("SELECT * FROM users WHERE Mails = ?"); // On vérifie si l'email existe déjà
        $checkIfUsersExist->execute(array($email)); // On execute la requête

        if ($checkIfUsersExist->rowCount() > 0) { // Si l'email existe
            $userInfos = $checkIfUsersExist->fetch(); // On récupère les infos de l'utilisateur
            if (password_verify($password, $userInfos["Password"])) {  // On vérifie si le mot de passe est correct
                $_SESSION['auth'] = true; // On définit la variable de session
                $_SESSION['id'] = $getIdOfthisUser['id']; // On stocke l'id de l'utilisateur dans la session
                $_SESSION['email'] = $email; // On enregistre les infos de l'utilisateur dans la session
                header('Location: index.php'); // On redirige l'utilisateur vers la page d'accueil // On redirige l'utilisateur vers la page d'accueil
            } // On vérifie si le mot de passe est correct
            else {
                echo "<script>alert('Le mot de passe est incorrect !')</script>"; // On affiche un message d'erreur
            }
        } else {
            echo ('<script>alert("Cet email n\'existe pas")</script>');
        }
    } else { // Si le formulaire n'est pas rempli
        echo ('<script>alert("Veuillez remplir tous les champs")</script>');
    }
}
