<?php

class SessionController extends AbstractController
{

    public function showRegister()
    {
        $this->render('./views/register.phtml');

    }

    public function showLogin()
    {
        // affiche la page login
        $this->render('./views/login.phtml');
    }

    public function addUser()
    {
        $user = new SessionModel();

        $user->createUser($_GET['username'], $_GET["password"]);

        header('Location: index.php?route=login');
        exit();
    }

    public function logOut()
    {
        session_start();

        session_destroy();
        header('Location: index.php?route=home');
        exit(); 
    }

    public function checkRegex()
    {

        if (isset($_POST['username']) && !empty($_POST['username']) &&
            isset($_POST["password"]) && !empty($_POST["password"]))
        {

            // Commençant par une lettre suivie de 7 à 14 caractères alphanumériques (sans underscores ni caractères spéciaux).
            $regexUsername = '/^[a-z][^\W_]{7,14}$/i';

            // Ce regex valide un mot de passe de 5 à 20 caractères contenant au moins une lettre minuscule et un chiffre, sans caractères : & . ~ ou espaces.
            $regexPassword = '/^(?=[^a-z]*[a-z])(?=\D*\d)[^:&.~\s]{5,20}$/';

            if(preg_match($regexUsername, $_POST['username']) && preg_match($regexPassword,$_POST['password']))
            {
                
                // redirect 
                header('Location: index.php?route=addUser&username=' . $_POST['username'] . '&password=' . $_POST['password']);
                exit();
            
            } else if (!preg_match($regexUsername, $_POST['username'])){
                $_SESSION['status'] = "Votre nom d'utilisateur ne respecte pas le bon format.";
                header('Location: index.php?route=register');
                exit();
            } else {
                $_SESSION['status'] = "Votre mot de passe ne respecte pas le bon format.";
                header('Location: index.php?route=register');
                exit();
            }
            


                
        } else
        {
            $_SESSION['status'] = "Vous ne pouvez pas entrez des champs vides.";
            header('Location: index.php?route=register');
            exit(); 
        }
        
    }

    public function handleLog()
    {
        // on lance la session pour avoir accès à la super globale SESSION

        // Instancier le model session
        if (isset($_POST['username']) && !empty($_POST['username']) &&
            isset($_POST["password"]) && !empty($_POST["password"]))
        {

           
            $sessionModel = new SessionModel();

            // stocker dans une variable le result de l'instance qui recup l'user en fcnt de l'username
            $username = $sessionModel->getUser($_POST['username']);

            // verif du nom d'utilisateur
            if ($username)
            {

                // Vérification du mot de passe
                if (password_verify($_POST['password'], $username['password']))
                {
                    

                    $_SESSION['loggedUser'] = $username;
                    header('Location: index.php?route=home');
                    exit();

                } else
                {
                    var_dump($_POST['password']);

                    var_dump($username['password']);

                    var_dump('Mauvais mot de passe');

                }

            } else
            {
                var_dump('Pas de username à ce nom');
            }


        } else
        {
            header('Location: index.php?route=login');
            exit(); 
        }
        
        
    }
}