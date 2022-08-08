<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="/subscription">Register</a></li>
                <li><a href="#">Create hikes</a></li>
            </ul>
        </nav>
    </header>
    <?= $content ?>
</body>

</html>