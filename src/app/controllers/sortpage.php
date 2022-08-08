<?php
session_start();

require_once('app/lib/database.php');
require_once('app/models/Hikes.php');
require_once('app/models/Tags.php');

function sortPage()
{
    $hikeRepository = new HikeRepository();
    $hikeRepository->connection = new DatabaseConnection();
    $hikes = $hikeRepository->getHikeTag();

    $tagRepository = new TagRepository();
    $tagRepository->connection = new DatabaseConnection();
    $tags = $tagRepository->getTags();

    require('app/views/sortpage.php');
}