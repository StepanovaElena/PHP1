<?php

/*
1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения.
Затем написать скрипт, который работает по следующему принципу:
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;

Ноль можно считать положительным числом
 */

$a = rand(-10, 10);
$b = rand(-10, 10);

echo 'Первое число: ' . $a;
echo '<br>';
echo 'Второе число: ' . $b;
echo '<br>';
echo '<br>';

function mathOperationFirst($x, $y)
{
    if ($x >= 0 && $y >= 0) {
        return $x - $y . ' Числа положительные';
    } elseif ($x < 0 && $y < 0) {
        return $x * $y . ' Числа отрицательные';
    }
    return $x + $y . ' Числа имеют разные знаки';
}
echo mathOperationFirst($a, $b);
echo '<br>';
echo '<hr>';

/*
2.Присвоить переменной $а значение в промежутке [0..15].
С помощью оператора switch организовать вывод чисел от $a до 15.
*/
$a1 = rand( 0, 15);

echo 'Ваше число: ' . $a1;
echo '<br>';

switch ($a1)
{
    case 0:
        echo '0 ';

    case 1:
        echo '1 ';

    case 2:
        echo '2 ';

    case 3:
        echo '3 ';

    case 4:
        echo '4 ';

    case 5:
        echo '5 ';

    case 6:
        echo '6 ';

    case 7:
        echo '7 ';

    case 8:
        echo '8 ';

    case 9:
        echo '9 ';

    case 10:
        echo '10 ';

    case 11:
        echo '11 ';

    case 12:
        echo '12 ';

    case 13:
        echo '13 ';

    case 14:
        echo '14 ';

    case 15:
        echo '15 ';
        break;
}

echo '<br>';

if ($a1 == 0) echo '0 ';
if ($a1 <= 1) echo '1 ';
if ($a1 <= 2) echo '2 ';
if ($a1 <= 3) echo '3 ';
if ($a1 <= 4) echo '4 ';
if ($a1 <= 5) echo '5 ';
if ($a1 <= 6) echo '6 ';
if ($a1 <= 7) echo '7 ';
if ($a1 <= 8) echo '8 ';
if ($a1 <= 9) echo '9 ';
if ($a1 <= 10) echo '10 ';
if ($a1 <= 11) echo '11 ';
if ($a1 <= 12) echo '12 ';
if ($a1 <= 13) echo '13 ';
if ($a1 <= 14) echo '14 ';
if ($a1 <= 15) echo '15 ';

echo '<br>';
echo '<hr>';

/*
3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
Обязательно использовать оператор return. В делении на 0 сделайте проверку и вывод сообщения об ошибке.
*/
echo 'Первое число: ' . $a;
echo '<br>';
echo 'Второе число: ' . $b;
echo '<br>';
echo '<br>';

function sum($x, $y) {
    return $x + $y;
}
echo ' Сумма чисел равна: ' . sum($a, $b);
echo '<br>';

function sub($x, $y) {
    return $x - $y;
}
echo ' Разность чисел равна: ' . sub($a, $b);
echo '<br>';

function mult($x, $y) {
    return $x * $y;
}
echo ' Произведение чисел равно: ' . mult($a, $b);
echo '<br>';

function div($x, $y) {
    if ($y == 0) {
        return 'Error! Деление на ноль невозможно!';
    }
    return round($x / $y, 2);
}
echo ' Частное чисел равно: ' . div($a, $b);
echo '<br>';
echo '<hr>';

/*
4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
В зависимости от переданного значения операции выполнить одну из арифметических операций
(использовать функции из пункта 3) и вернуть полученное значение (использовать switch).
*/

function mathOperation($arg1, $arg2, $operation) {
    $tot = 0;
    switch ($operation) {
        case 'Сложение':
            $tot = sum($arg1, $arg2);
            break;
        case 'Вычитание':
            $tot = sub($arg1, $arg2);
            break;
        case 'Умножение':
            $tot = mult($arg1, $arg2);
            break;
        case 'Деление':
            $tot = div($arg1, $arg2);
            break;
    }
    return $tot;
}

echo 'Первое число: ' . $a;
echo '<br>';
echo 'Второе число: ' . $b;
echo '<br>';
echo '<br>';

echo ' Сумма чисел равна: ' . mathOperation($a, $b, 'Сложение');
echo '<br>';
echo ' Разность чисел равна: '. mathOperation($a, $b, 'Вычитание');
echo '<br>';
echo ' Произведение чисел равно: ' .mathOperation($a, $b, 'Умножение');
echo '<br>';
echo ' Частное чисел равно: ' . mathOperation($a, $b, 'Деление');
echo '<br>';
echo '<hr>';

/*5. ВАЖНОЕ! Написать функцию renderTemplate возвращающую шаблон в виде текста,
вынесите весь повторяющийся код из шаблона страниц (doctype, menu, header, footer) в отдельный шаблон (layout),
сделайте отдельный шаблон страницы с приветствием. Обеспечьте формирование результирующей страницы используя только
функцию renderTemplate, т.е. в layout должен вставиться подшаблончик страницы с приветствием.*/


function renderTemplate($page, $content = '') {
    ob_start();
    include $page . '.php';
    return ob_get_clean();
}

echo renderTemplate('layout', renderTemplate('site', 'Вася'));

echo '<br>';
echo '<hr>';

/*
 6.С помощью рекурсии организовать функцию возведения числа в степень.
 Формат: function power($val, $pow), где $val – заданное число, $pow – степень.
*/

$c = rand(2, 2);
$d = rand(2, 2);

echo 'Число: ' . $c;
echo '<br>';
echo 'Степень числа: ' . $d;
echo '<br>';

function power($val, $pow) {
    if ($pow == 1) {
        return $val;
    }
    $result = $val * power($val, $pow - 1);
    return $result;
}
echo '<br>';
echo 'Результат возведения в степень: ' . power($c, $d);
echo '<hr>';

/*
 7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
    22 часа 15 минут
    21 час 43 минуты
*/

function declinationHours($hour) {
    if (($hour >= 2 && $hour <= 4) || ($hour >= 22 && $hour <= 24)) {
        return 'часа';
    } elseif ($hour == 1 || $hour == 21) {
        return 'час';
    } elseif ($hour >= 5 && $hour <= 20 || $hour == 0) {
        return 'часов';
    };
}

function declinationMinutes($minute) {
    if ($minute % 10 >= 2 && $minute % 10 <= 4) {
        return 'минуты';
    } elseif ($minute % 10 === 1) {
        return 'минута';
    } elseif (($minute % 10 >= 5 && $minute % 10 <= 9) || $minute % 10 === 0 || ($minute > 10 && $minute < 20) ) {
        return 'минут';
    }
}

function today () {
    $h = date("H");
    $m  = date("i");

    return $h. ' ' . declinationHours($h) . ' ' . $m. ' ' . declinationMinutes($m);
}

echo today();