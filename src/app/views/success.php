


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
</head>

<body>

<?php
session_start();

?>
<div class="success-container">
<h1>Welcome <?= $_SESSION["nickname"]?></h1>
<h3>Our DB is glad to gnom gnom your data !</h3>
<img src="img/eateateat.gif" alt="EatDatas" />

<a href=index.php?action=home&nickname=<?=$_SESSION["nickname"]?>> Return home </a></div>
<?php include 'app/views/includes/footer.php' ?>