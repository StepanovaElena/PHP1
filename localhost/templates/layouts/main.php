<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="../css/stylecss.css">

</head>
<body>

<div class="main-container">

    <div class="main">

        <header class="header">
            <?=$auth?>
            <nav class="one">
                <?= $menu?>
            </nav>

        </header>

        <div class="content container">
            <?=$content?>
        </div>
    </div>
</div>

<footer class="footer"> <?= date(Y)?> </footer>



</body>
</html>