<?php

session_start();

require_once('app/lib/database.php');
require_once('app/models/User.php');
require_once('app/models/Hikes.php');


function profilpage()
{
    $userProfilRepository = new UserProfilRepository();
    $userProfilRepository->connection = new DatabaseConnection();
    $users = $userProfilRepository->getUser();

    $hikeProfilUser = new HikeRepository();
    $hikeProfilUser->connection = new DatabaseConnection();
    $hikes = $hikeProfilUser->getHikesForProfil();
    
    require('app/views/profil.php');
}
