<?php

session_start();

require_once('app/lib/database.php');


function successpage()
{
    require('app/views/success.php');

}

function errorpage()
{
    require('app/views/404.php');

}

function aboutpage()
{
    require('app/views/about.php');

}