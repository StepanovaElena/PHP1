<?php
/* 1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.*/
$a = 1;

while ($a < 100) {
    if ($a % 3 == 0) echo $a++ . ' ';
    $a++;
}
echo '<hr>';
echo '<br>';

/* 2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
0 – это ноль.
1 – нечетное число.
2 – четное число.
3 – нечетное число.
…
10 – четное число.*/

$b = 0;
do {
    if ($b == 0) {
        echo $b . ' – это ноль.' . '<br>';
        $b++;
    } elseif ($b % 2 != 0) {
        echo $b . ' – нечетное число.' . '<br>';
        $b++;
    } else {
        echo $b . ' – четное число.' . '<br>';
        $b++;
    }
} while ($b < 11);

echo '<hr>';
echo '<br>';

/* 3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений –
 массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
Московская область:
Москва, Зеленоград, Клин
Ленинградская область:
Санкт-Петербург, Всеволожск, Павловск, Кронштадт
Рязанская область … (названия городов можно найти на maps.yandex.ru)*/

$area = [
    'Московская область:' => ['Москва', 'Зеленоград', 'Клин'],
    'Ленинградская область:' => ['Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'],
    'Рязанская область:' => ['Касимов', 'Кораблино', 'Ряжск', 'Рязань']
];

function showCity($arr)
{
    foreach ($arr as $key => $value) {
        echo $key. '<br>';
        foreach ($value as $val) {
            if ($val == end($value)) {
                echo $val . '<br>';
            } else {
                echo $val . ', ';
            }
        }
    }
}
showCity($area);

echo '<hr>';
echo '<br>';

/* 4. ВАЖНОЕ1. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие
латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
Написать функцию транслитерации строк.*/

function transliteration ($string)
{
    $lettersArr = [
        "а"=>"a", "б"=>"b", "в"=>"v",
        "г"=>"g", "д"=>"d", "е"=>"e", "ё"=>"e", "ж"=>"j",
        "з"=>"z", "и"=>"i", "й"=>"y", "к"=>"k", "л"=>"l",
        "м"=>"m", "н"=>"n", "о"=>"o", "п"=>"p", "р"=>"r",
        "с"=>"s", "т"=>"t", "у"=>"u", "ф"=>"f", "х"=>"h",
        "ц"=>"ts","ч"=>"ch","ш"=>"sh","щ"=>"sch","ъ"=>"'",
        "ы"=>"yi","ь"=>"'", "э"=>"e", "ю"=>"yu", "я"=>"ya",

        " -"=> "", ","=> " ", " "=> "-", "."=> ".", "/"=> "_", "-"=> "", " "=> " "
    ];

    $stringArr = preg_split('//u', $string, 0, PREG_SPLIT_NO_EMPTY);

    $resultArr = [];

    for ($i = 0; $i < count($stringArr); $i++) {
        foreach ($lettersArr as $key => $value) {
            if (mb_strtoupper($stringArr[$i], 'utf-8') == $stringArr[$i]) {

                if (mb_strtolower($stringArr[$i]) == $key)
                array_push($resultArr, strtoupper($value));

            } elseif ($stringArr[$i] == $key) {
                array_push($resultArr, $value);
            }
        }
    }
    return implode($resultArr);
}
echo transliteration('Объявить Массив, индексами которого являются буквы русского языка');

echo '<br>';
echo '<br>';



/* 5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.*/

function replace($string) {
    return preg_replace('/\s/', '_', $string);
}

echo replace('Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.');

echo '<hr>';
echo '<br>';

/*6. ВАЖНОЕ2.В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP.
Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню
с вложенными подменю? Попробовать его реализовать, при желании на движке 3.
*/

$menu = [
    'Home',
    'Work' => ['Subitem 1', 'Subitem 2', 'Subitem 3'],
    'About' => ['Subitem 1',
                'Subitem 2' => ['Subsubitem 1', 'Subsubitem 2']
    ],
    'Blog',
    'Contacts'
];


function menuRender($arr) {

    $menuArr[] = '<ul>';

    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            $menuArr[] = '<li><a href="#">' . $key . menuRender($value) . '</a></li>';
        } else {
            $menuArr[] = '<li><a href="#">' . $value . '</a></li>';
        }
    }

    $menuArr[] = '</ul>';

    return implode($menuArr);
}
echo menuRender($menu);

echo '<hr>';
echo '<br>';


/*7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. Выглядеть должно так:
for (…){ // здесь пусто} */

for ($i = 0; $i < 10; print $i++ . '<br>') {};

echo '<hr>';
echo '<br>';

/*8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».
*/



function showCityByLetter($arr) {

    foreach ($arr as $key => $value) {
        echo $key. ' ';
        $resultArr = [];
        foreach ($value as $val) {
            if (mb_substr($val, 0, 1, "UTF-8") == "К") {
                array_push($resultArr, $val);
            }
        }
        foreach ($resultArr as $res) {
            if ($res == end($resultArr)) {
                echo $res . ' ';
            } else {
                echo $res . ', ';
            }
        }
        echo '<br>';
    }
}

showCityByLetter($area);

echo '<hr>';
echo '<br>';

/*9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке,
производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании
url-адресов на основе названия статьи в блогах).
*/

function connectedReplace($str){
    $translited = transliteration($str);
    $translited = replace($translited);
    return $translited;
}

echo connectedReplace('Объединить две Ранее написанные функции в одну, Которая получает строку на русском языке,
производит транслитерацию и замену пробелов на подчеркивания.');

echo '<hr>';
echo '<br>';

/*10. *Заполните массив в 100 элементов случайными значениями от 1 до 200, которые не должны повторяться.
Задача на бесконечный цикл While(true)
*/

$arr = [];

function randomElem() {
    return rand(1, 200);
}

while ($i < 100) {
    $a = randomElem();
    if(!in_array($a, $arr)) {
        array_push($arr, $a);
        $i++;
    }
   }

var_dump($arr);

/*
11. *Дан массив, в 10 элементов, в котором заполнены первые 5 какими-то значениями,
например $A = [1, 2, 3, 4, 5, 0, 0, 0, 0, 0], написать программу,
которая эти 5 значений распределит по всему массиву по такому принципу $A = [1, 1, 2, 2, 3, 3, 4, 4, 5, 5],
т.е. продублирует и заполнит весь массив в 10 элементов, без промежуточного массива пожалуйста сделайте.
*/