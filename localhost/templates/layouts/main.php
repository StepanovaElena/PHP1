<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/css/stylecss.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>

<div class="main-container">

    <div class="main">

        <header class="header">
            <?=$header?>
        </header>

        <nav class="one">
            <?= $menu?>
        </nav>

        <div class="content container">

            <div class="content-block">
                <?=$content?>
            </div>

            <div class="auth-block">
                <?=$auth?>
            </div>

        </div>
    </div>
</div>

<footer class="footer"> <?= date(Y)?> </footer>



</body>
</html>