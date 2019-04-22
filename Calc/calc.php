<?

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    if (($_GET['x1'] === '') || ($_GET['x2'] === '')) {
        return $result = 'Аргументы не переданы';
    }

    if (empty($_GET['operation'])) {
        return $result = 'Не передана операция';
    }

    $arg1 = (int)$_GET['arg1'];
    $arg2 = (int)$_GET['arg2'];
    $operation = $_GET['operation'];

    switch ($operation) {

        case '+':
            $result = $arg1 + $arg2;
            break;

        case '-':
            $result = $arg1 - $arg2;
            break;

        case '*':
            $result = $arg1 * $arg2;
            break;

        case '/':
            $result = $arg2 != 0 ? ($arg1 / $arg2) : $result = 'На ноль делить нельзя';
            break;
        default:
            return $result = 'Операция не поддерживается';
    }
    return $result;
}

?>
