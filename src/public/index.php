<?php
require_once('app/controllers/homepage.php');
require_once('app/controllers/subscription.php');
require_once('app/controllers/login.php');
require_once('app/controllers/createHikes.php');
require_once('app/controllers/success.php');
require_once('app/controllers/userProfil.php');
require_once('app/controllers/tags.php');
require_once('app/controllers/singleHike.php');
require_once('app/controllers/sortpage.php');
require_once('app/controllers/updateHike.php');
require_once('app/controllers/userAdminPage.php');
require_once('app/controllers/updateUser.php');

require_once 'core/Request.php';
require_once 'core/Router.php';
require_once 'app/routes.php';   

switch ($_GET['action']) {
    case 'register':
        if ($_POST) {
            addUser($_POST);
        } getViewSubscribe();
        break;
    case 'login':
        if($_POST){
            loginpage($_POST);
        }
        viewLoginPage();
        break;
    case 'createhikes':
        if ($_POST) {
            addHikes($_POST);
        } 
        fetchTags();
        break;
    case 'success':
        successpage();
        break;
    case 'allUsers':
        userAdminPage();
        break;
    case 'profil':
        profilpage();
        break;
    case 'logout':
        logout();
        break;
    case 'deleteHike':
        deleteSingleHike();
        break;
    case 'delete':
        deleteSingleAdminHike();
        break;
    case 'deleteUser':
        deleteSingleUser();
        break;
    case 'updateUser':
        if($_POST){
            updateProfilUser();
        }
        getViewUpdateUser();
        break;
    case 'hike':
        singleHike();
        break;
    case 'about':
        aboutpage();
        break;
    case 'sort':
        sortPage();
        break;
    case 'home':
        homepage();
        break;
    case 'editHike':
        if($_POST){
            updateHikes($_POST);
        }
        updateSingleHike();
        break;
    default:
        if ($_GET['action'] === '') {
            errorpage();
        } else {
            homepage();
        }
        break;
}


// $uri = Request::uri();
// $method = Request::method();

// $router = new Router();
// $router->register($routes);
// $router->direct($uri, $method);

//On utilise les méthodes statiques de la classe Request (pas besoin de l'instancier)
// $uri = Request::uri();
// $method = Request::method();

// // On instancie l'object $router
// $router = new Router();

// // On utilise la méthode register() pour stocker les routes du fichier routes.php dans
// // la propriété $routes du routeur.
// $router->register($routes);

// // On fait le routing en tant que tel : sur base de l'uri et de la méthode, on va
// // require le bon fichier.
// $router->direct($uri, $method);

// try {
    
//     if (isset($_GET['action']) && $_GET['action'] !== '') {
//         if ($_GET['action'] === 'register') {
//             if ($_POST) {
//                 addUser($_POST);
//             } getViewSubscribe();
//         } elseif ($_GET['action'] === 'login') {
//             if($_POST){
//                 loginpage($_POST);
//             }
//             viewLoginPage();
//         } elseif ($_GET['action'] === 'createhikes') {
//             if ($_POST) {
//                 addHikes($_POST);
//             } 
//             fetchTags();
//         } elseif ($_GET['action'] === 'success') {
//             successpage();
//         } elseif ($_GET['action'] === 'allUsers') {
//             userAdminPage();
//         } elseif ($_GET['action'] === 'profil') {
//             profilpage();
//         } elseif ($_GET['action'] === 'logout') {
//             logout();
//         } elseif ($_GET['action'] === 'deleteHike') {
//             deleteSingleHike();
//         } elseif ($_GET['action'] === 'delete') {
//             deleteSingleAdminHike();
//         }elseif ($_GET['action'] === 'deleteUser') {
//             deleteSingleUser();
//         } elseif ($_GET['action'] === 'updateUser') {
//             if($_POST){
//                 updateProfilUser();
//             }
//             getViewUpdateUser();
//         } elseif ($_GET['action'] === 'hike') {
//             singleHike();
//         } elseif ($_GET['action'] === 'sort') {
//             sortPage();
//         } elseif ($_GET['action'] === 'home') {
//             homepage();
//         } elseif ($_GET['action'] === 'editHike') {
//             if($_POST){
//                 updateHikes($_POST);
//             }
//             updateSingleHike();
//         } else {
//             throw new Exception('Aucun identifiant ');
//         }
//     } else {
//         errorpage();
//     }
// } catch (Exception $e) {
//     echo 'Erreur : ' . $e->getMessage();
// }