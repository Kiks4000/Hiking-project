<?php
// src/controllers/add_comment.php
require_once('app/lib/database.php');
require_once('app/models/User.php');

function getViewSubscribe()
{
    require('app/views/subscription.php');
}

function addUser(array $input)
{
    $firstname = null;
    $lastname = null;
    $nickname = null;
    $email = null;
    $password = null;
    $avatar = null;
    $description = null;

    if (
        !empty($input['firstname']) && !empty($input['lastname']) && !empty($input['nickname']) && !empty($input['email'])
        && filter_var($input['email'], FILTER_VALIDATE_EMAIL) && !empty($input['password']) && !empty($input['users_description']) && !empty($input['users_avatar'])
    ) {
        $firstname = $input['firstname'];
        $lastname = $input['lastname'];
        $nickname = $input['nickname'];
        $email = $input['email'];
        $password = $input['password'];
        $description = $input['users_description']; 
        $avatar = $input['users_avatar'];
    } else {
        throw new Exception('Les données du formulaire sont invalides.');
    }

    $userRepository = new UserRepository();
    $userRepository->connection = new DatabaseConnection();
    $success = $userRepository->createUser($firstname, $lastname, $nickname, $email, $password, $avatar,$description);
    if (!$success) {
        throw new Exception('Erreur !');
    }
    
    header('location: index.php?action=success');

}
