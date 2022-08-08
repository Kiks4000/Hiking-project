<?php
// controllers/homepage.php
session_start();

require_once('app/lib/database.php');
require_once('app/models/Hikes.php');
require_once('app/models/Tags.php');


function singleHike()
{
    $hikeRepository = new HikeRepository();
    $hikeRepository->connection = new DatabaseConnection();
    $hike = $hikeRepository->getSingleHike();

    $tagRepository = new TagRepository();
    $tagRepository->connection = new DatabaseConnection();
    $tags = $tagRepository->getTagsForSingleHike();

    require('app/views/singleHike.php');
}


function deleteSingleHike()
{
    $hikeRepository = new HikeRepository();
    $hikeRepository->connection = new DatabaseConnection();
    $hikeRepository->deleteHike();

    require('app/views/singleHike.php');
}