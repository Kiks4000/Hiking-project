<?php

session_start();

require_once('app/lib/database.php');
require_once('app/models/User.php');

function getViewUpdateUser()
{   
    $userProfilRepository = new UserProfilRepository();
    $userProfilRepository->connection = new DatabaseConnection();
    $users = $userProfilRepository->getUser();

    require('app/views/updateUser.php');
}

function updateProfilUser()
{
    
    $updateUserRepository = new UserProfilRepository();
    $updateUserRepository->connection = new DatabaseConnection();
    $success = $updateUserRepository->updateUser();

    if (!$success) {
        throw new Exception('Erreur !');
    }
    header('Location: index.php?action=profil&iduser=' . $_SESSION["id_user"]);
}