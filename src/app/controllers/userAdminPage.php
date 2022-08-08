<?php
// controllers/homepage.php
session_start();

require_once('app/lib/database.php');
require_once('app/models/User.php');
require_once('app/models/Hikes.php');



function userAdminPage()
{
    $userAdminProfilRepository = new UserAdminProfilRepository();
    $userAdminProfilRepository->connection = new DatabaseConnection();
    $usersProfil = $userAdminProfilRepository->getAllUsers();

    $hikeRepository = new HikeRepository();
    $hikeRepository->connection = new DatabaseConnection();
    $hikes = $hikeRepository->getHikesForAdmin();

    require('app/views/userAdminPage.php');
}
function deleteSingleUser()
{
    $userAdminProfilRepository = new UserAdminProfilRepository();
    $userAdminProfilRepository->connection = new DatabaseConnection();
    $userAdminProfilRepository->deleteUser();

    require('app/views/userAdminPage.php');
}

function deleteSingleAdminHike()
{
    $hikeRepository = new HikeRepository();
    $hikeRepository->connection = new DatabaseConnection();
    $hikeRepository->deleteHikeAdmin();

    require('app/views/userAdminPage.php');
}