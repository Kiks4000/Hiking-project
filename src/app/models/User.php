<?php

require_once('app/lib/database.php');

class User
{
    public string $firstname;
    public string $lastname;
    public string $nickname;
    public string $email;
    public string $password;
    public string $avatar;
    public string $description;
}

class UserRepository
{
    public DatabaseConnection $connection;

    public function createUser(string $firstname, string $lastname, string $nickname, string $email, string $password, string $avatar, string $description)
    {

        $statement = $this->connection->getConnection()->prepare(
            'INSERT INTO USERS(firstname, lastname,nickname,email,password,users_avatar,users_description) VALUES(?,?,?,?,?,?,?)'
        );

        function valid_donnees($donnees)
        {
            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);
            return $donnees;
        }
        
        $firstnameverif = valid_donnees($firstname);
        $lastnameverif = valid_donnees($lastname);
        $nicknameverif = valid_donnees($nickname);
        $emailverif = valid_donnees($email);
        $passwordHashed = password_hash($password, PASSWORD_BCRYPT);
        $avatarverif = valid_donnees($avatar);
        $descriptionverif = valid_donnees($description);

        $affectedLines = $statement->execute([$firstnameverif, $lastnameverif, $nicknameverif, $emailverif, $passwordHashed, $avatarverif, $descriptionverif]);
        return ($affectedLines > 0);
    }
}

class UserProfil
{
    public string $id;
    public string $firstname;
    public string $lastname;
    public string $nickname;
    public string $email;
    public string $password;
    public string $admin;
    public string $avatar;
    public string $userDescription;
}

class UserProfilRepository
{
    public DatabaseConnection $connection;

    public function getUser(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM USERS WHERE nickname = '" . $_SESSION["nickname"] . "'"
        );
        $users = [];
        while (($row = $statement->fetch())) {
            $user = new User();
            $user->id = $row['id_user'];
            $user->firstname = $row['firstname'];
            $user->lastname = $row['lastname'];
            $user->nickname = $row['nickname'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->admin = $row['is_admin'];
            $user->avatar = $row['users_avatar'];
            $user->userDescription = $row['users_description'];

            $users[] = $user;
        }
        return $users;
    }

    public function updateUser(): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE USERS SET firstname = ?, lastname = ?, nickname = ?, email = ?, password = ?, users_avatar = ?, users_description = ? WHERE nickname = ?'
        );
        function valid_Updated_datas($donnees)
        {
            $donnees = trim($donnees);
            $donnees = stripslashes($donnees);
            $donnees = htmlspecialchars($donnees);
            return $donnees;
        }
        $firstnameverif = valid_Updated_datas($_POST['firstname']);
        $lastnameverif = valid_Updated_datas($_POST['lastname']);
        $nicknameverif = valid_Updated_datas($_POST['nickname']);
        $emailverif = valid_Updated_datas($_POST['email']);
        $passwordHashed = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $avatarverif = valid_Updated_datas($_POST['users_avatar']);
        $descriptionverif = valid_Updated_datas($_POST['users_description']);

        $affectedLines = $statement->execute([$firstnameverif, $lastnameverif, $nicknameverif, $emailverif, $passwordHashed, $avatarverif, $descriptionverif, $_SESSION["nickname"]]);

        return ($affectedLines > 0);
    }
}
class UserAdminProfilRepository
{
    public DatabaseConnection $connection;

    public function getAllUsers(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM USERS "
        );
        $usersProfil = [];
        while (($row = $statement->fetch())){
            $userProfil = new User();
        
            $userProfil->id = $row['id_user'];
            $userProfil->firstname = $row['firstname'];
            $userProfil->lastname = $row['lastname'];
            $userProfil->nickname = $row['nickname'];
            $userProfil->email = $row['email'];
            $userProfil->password = $row['password'];
            $userProfil->admin = $row['is_admin'];
            $userProfil->avatar = $row['users_avatar'];
            $userProfil->userDescription = $row['users_description'];

        $usersProfil[] = $userProfil;
    }
    return $usersProfil;
    }
    public function deleteUser(): void
    {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM USERS WHERE nickname = '" . $_GET["nickname"] . "'"
        );
        $statement->execute();
        header("location: index.php?action=allUsers");
    }
}

