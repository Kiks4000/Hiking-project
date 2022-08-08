<?php
// controllers/homepage.php
session_start();

require_once('app/lib/database.php');
require_once('app/models/Tags.php');

function fetchTags()
{
    $tagRepository = new TagRepository();
    $tagRepository->connection = new DatabaseConnection();
    $tags = $tagRepository->getTags();
    require('app/views/createHikes.php');

}

function fetchUpdateTags()
{
    $tagRepository = new TagRepository();
    $tagRepository->connection = new DatabaseConnection();
    $tags = $tagRepository->getTags();

    require('app/views/updateHike.php');

}