<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="./styles/index.css">
    <!-- <meta http-equiv="refresh" content="3" /> -->


    <script src="https://kit.fontawesome.com/d723365d85.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="logo">


            <img class="logo-img" src="https://media.tenor.com/h3fCM442dCcAAAAC/discord-logo.gif" alt="Logo de distorsion">
        </div>
        
        <nav class="menu">
            <li><a href="index.php?route=home">Chat</a></li>
            
            <li><a href="#">À propos</a></li>

            <li><a href="#">Paramètres</a></li>

            <?php if(isset($_SESSION['loggedUser'])) : ?>
            <li><a href="index.php?route=logOut">Déconnexion</a></li>
            <?php else : ?>
            <li><a href="index.php?route=login">Se connecter</a></li>
            <?php endif; ?>
        </nav>
    </header>
    
    <?php include_once $view ?>

    
</body>
</html>