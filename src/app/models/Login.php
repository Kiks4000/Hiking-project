<?php

require_once('app/lib/database.php');

class Login
{
    public  $nickname;
    public  $password;
}

class LoginRepository
{
    public DatabaseConnection $connection;
    public function getLogin()
    {
        
        $login_err = "Invalid nickname or password.";
        $nickname_err = "Please enter nickname.";
        $password_err = "Please enter your password.";
        
        $nickname = $password = "";
        $nickname_err = $password_err = $login_err = "";

        // Processing form data when form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Check if nickname is empty
            if (empty(trim($_POST["nickname"]))) {
                $nickname_err = "Please enter nickname.";
            } else {
                $nickname = trim($_POST["nickname"]);
            }

            // Check if password is empty
            if (empty(trim($_POST["password"]))) {
                $password_err = "Please enter your password.";
            } else {
                $password = trim($_POST["password"]);
            }

            // Validate credentials
            if (empty($nickname_err) && empty($password_err)) {
                // Prepare a select statement
                $sql = "SELECT id_user, nickname, password, is_admin FROM USERS WHERE nickname = :nickname";

                if ($stmt = $this->connection->getConnection()->prepare($sql)) {
                    // Bind variables to the prepared statement as parameters
                    $stmt->bindParam(":nickname", $param_nickname, PDO::PARAM_STR);

                    // Set parameters
                    $param_nickname = trim($_POST["nickname"]);

                    // Attempt to execute the prepared statement
                    if ($stmt->execute()) {
                        // Check if nickname exists, if yes then verify password
                        if ($stmt->rowCount() == 1) {
                            if ($row = $stmt->fetch()) {
                                $id = $row["id_user"];
                                $nickname = $row["nickname"];
                                $hashed_password = $row["password"];
                                $admin = $row["is_admin"];
                                if (password_verify($password, $hashed_password)) {
                                    // Password is correct, so start a new session

                                    session_start();

                                    // Store data in session variables

                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["id_user"] = $id;
                                    $_SESSION["nickname"] = $nickname;
                                    $_SESSION['admin'] = $admin;

                                    // Redirect user to the homepage.php page with the message ""
                                    header("location: index.php?action=success");
                                } else {
                                    // Password is not valid, display a generic error message
                                    $login_err = "Invalid nickname or password.";
                                }
                            }
                        } else {
                            // nickname doesn't exist, display a generic error message
                            $login_err = "Invalid nickname or password.";
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }

                    // Close statement
                    unset($stmt);
                }
            }

            // Close connection
            unset($pdo);
        }
    }
}