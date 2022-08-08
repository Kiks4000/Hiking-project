<?php
// controllers/homepage.php
session_start();

require_once('app/lib/database.php');
require_once('app/models/Hikes.php');
require_once('app/models/Tags.php');


function homepage()
{
    $hikeRepository = new HikeRepository();
    $hikeRepository->connection = new DatabaseConnection();
    $hikes = $hikeRepository->getHikes();

    $tagRepository = new TagRepository();
    $tagRepository->connection = new DatabaseConnection();
    $tags = $tagRepository->getTags();

    require('app/views/homepage.php');
}