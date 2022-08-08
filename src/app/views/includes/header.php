<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <title>HIKING THE WORLD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="style/js/main.js" defer></script>
    <!-- <script src="https://kit.fontawesome.com/e8976fc927.js" crossorigin="anonymous"></script> -->
</head>

<body>
    <header>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>
    <div class="snow"></div>

        <section class="header_section">

            <span class="border_logo_top"></span>
            <div class="logo_block">

                <a href="index.php?action=home&nickname=<?= $_SESSION["nickname"] ?>"><img src="img/banniere.png" alt="logo-hiking-the-world"></a>
            </div>
            <nav class="navDesktop">
                <ul>
                    <li>
                        <a href="index.php?action=home&nickname=<?= $_SESSION["nickname"] ?>">Home</a>
                    </li>
                    <?php
                    if (isset($_SESSION["nickname"])) { ?>
                        <li><a href="index.php?action=profil&iduser=<?= $_SESSION["id_user"] ?>">Profil</a></li><?php
                    } else {
                        echo '<li><a href="index.php?action=register">Subscription</a></li>';
                    } 
                    ?>
                    <?php
                    if (isset($_SESSION["nickname"])) {
                        echo '<li><a href="index.php?action=logout">Logout</a></li>';
                    } else {
                        echo '<li><a href="index.php?action=login">Login</a></li>';
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["nickname"])) {
                        echo '<li><a href="index.php?action=createhikes">Create</a></li>';
                    }
                    ?>
                    <?php
                    if ($_SESSION["admin"] == "true") {
                        echo '<li><a href="index.php?action=allUsers">Admin</a></li>';
                    }
                    ?>
                </ul>
            </nav>
            <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            <nav class="navMobile">
                <ul>
                    <li>
                        <a href="index.php?action=home&nickname=<?= $_SESSION["nickname"] ?>">Home</a>
                    </li>
                    <?php
                    if (isset($_SESSION["nickname"])) { ?>
                        <li><a href="index.php?action=profil&iduser=<?= $_SESSION["id_user"] ?>">Profil</a></li><?php
                    } else {
                        echo '<li><a href="index.php?action=register">Subscription</a></li>';
                    }                                                                                       ?>
                    <?php
                    if (isset($_SESSION["nickname"])) {
                        echo '<li><a href="index.php?action=logout">Logout</a></li>';
                    } else {
                        echo '<li><a href="index.php?action=login">Login</a></li>';
                    }
                    ?>
                    <?php
                    if (isset($_SESSION["nickname"])) {
                        echo '<li><a href="index.php?action=createhikes">Create hikes</a></li>';
                    }
                    ?>
                </ul>
            </nav>
            <span class="border_logo_bottom"></span>
        </section>
    </header>