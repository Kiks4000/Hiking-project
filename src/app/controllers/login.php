<?php
// controllers/homepage.php

require_once('app/lib/database.php');
require_once('app/models/Login.php');

function viewLoginPage(){
    require('app/views/login.php');
}


function loginpage()
{
    $loginRepository = new LoginRepository();
    $loginRepository->connection = new DatabaseConnection();
    $success = $loginRepository->getLogin();

    // if (!$success) {
    //     throw new Exception('Erreur !');
    // }

    // require('app/views/login.php');
    // header('Location: index.php?action=success');
}

function logout()
{

    unset($_SESSION["loggedin"]);
    unset($_SESSION["id_user"]);
    unset($_SESSION["nickname"]);
    unset($_SESSION['admin']);

    require('app/views/logout.php');
}
