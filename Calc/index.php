<?php

require __DIR__ . '/calc.php';

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Calculator</title>
</head>

<body>

<h4>Калькулятор</h4>

<form action="">
    <label for="arg1">
    <input name="arg1" type="text" value="<?= $arg1 ?>"> <br><br>
    </label>
    <label for="arg2">
    <input name="arg2" type="text" value="<?= $arg2 ?>"> <br><br>
    </label>
    <label for="result">
    <input name="result" type="text" value="<?= $result ?>" disabled/> <br><br>
    </label>

    <select name="operation">
        <option value="">Выберите операцию</option>
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>

    <input name="submit" value="=" type="submit"/><br>

    <div>
        <input name="operation" value="+" type="submit">
        <input name="operation" value="-" type="submit">
        <input name="operation" value="*" type="submit">
        <input name="operation" value="/" type="submit">
    </div>
</form>

</body>
</html>