<?php
require_once './model/AbstractModel.php';
require_once './model/CategoryModel.php';
require_once './model/RoomModel.php';
require_once './model/MessageModel.php';
require_once './model/SessionModel.php';


require_once './controller/AbstractController.php';
require_once './controller/MainController.php';
require_once './controller/FormController.php';
require_once './controller/SessionController.php';




session_start();


if ( array_key_exists( 'route' , $_GET) )
{
    switch( $_GET['route'] )
    {

        //  ACCUEIL //

        case 'home':
            // On instancie le controller qui gère cette route
            $controller = new MainController();
            // On execute la méthode du controlleur permettant d'afficher la page spécifique
            $controller->showHome();

        break;

        case 'sendMessage':
            // On instancie le controller qui gère cette route
            $controller = new MainController();
            // On execute la méthode du controlleur permettant d'afficher la page spécifique
            $controller->sendMessage();
        break;

        // AJOUTE CATEGORIES / SALONS //

        case 'form':
            // On instancie le controller qui gère cette route
            $controller = new FormController();
            // On execute la méthode du controlleur permettant d'afficher la page spécifique
            $controller->showForm();
        break;

        case 'addCategory':
            $controller = new FormController();
            // On execute la méthode du controlleur permettant d'afficher la page spécifique
            $controller->addCategory();
        break;

        case 'addRoom':
            $controller = new FormController();
            // On execute la méthode du controlleur permettant d'afficher la page spécifique
            $controller->addRoom();
        break;


        // SESSION //

        case 'login':
            $controller = new SessionController();
            // On execute la méthode du controlleur permettant d'afficher la page spécifique
            $controller->showLogin();
        break;

        case 'register':
            $controller = new SessionController();
            // On execute la méthode du controlleur permettant d'afficher la page spécifique
            $controller->showRegister();
        break;

        case 'checkUser':
            $controller = new SessionController();
            // On execute la méthode du controlleur permettant d'afficher la page spécifique
            $controller->handleLog();
        break;

        case 'addUser':
            $controller = new SessionController();
            // On execute la méthode du controlleur permettant d'afficher la page spécifique
            $controller->addUser();
        break;

        case 'logOut':
            $controller = new SessionController();
            // On execute la méthode du controlleur permettant d'afficher la page spécifique
            $controller->logOut();
        break;

        case 'checkRegex':
            $controller = new SessionController();
            // On execute la méthode du controlleur permettant d'afficher la page spécifique
            $controller->checkRegex();
        break;


        // OTHERS //

        default:
            header( 'Location: index.php?route=home ' );
            exit();
        break;
    }
}
else
{
    header( 'Location: index.php?route=home' );
    exit();
}
