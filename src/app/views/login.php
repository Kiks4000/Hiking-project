<?php include "includes/header.php"; ?>

<div class="loginGlobalContainer">

    <div class="loginTitle">
        <h2>Login and start your journey on <em>HIKING THE WORLD</em></h2>
    </div>

    <form class="loginForm" action="" method="post">

        <div class="loginForm__nicknameContainer">
            <label>Nickname</label>
            <input type="text" name="nickname" <?= (!empty($nickname_err)) ? 'is-invalid' : ''; ?> value="<?= $nickname; ?>">
            <span><?= $nickname_err; ?></span>
        </div>

        <div class="loginForm__passwordContainer">
            <label>Password</label>
            <input type="password" name="password" <?= (!empty($password_err)) ? 'is-invalid' : ''; ?>>
            <span><?= $password_err; ?></span>
        </div>

        <div class="loginForm__SubBtnContainer">
            <input type="submit" value="Login">
        </div>

    </form>

    <div class="loginSubNowContainer">
            <p>Don't have an account?
            <a href="index.php?action=register">Sign up now</a> !</p>
        </div>

    <?php
    if (!empty($login_err)) {
        echo '<div>' . $login_err . '</div>';
    }
    ?>

</div>

<?php
include "includes/footer.php";
?>