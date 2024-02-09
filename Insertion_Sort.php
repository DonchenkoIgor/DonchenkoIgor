<?php

$numbers = [788, 896, 14, 852, 123, 47, 44, 13, 10, 96];

function ShowArray(array $arr)
{
    echo  "Массив: " . implode(", ", $arr) . "<br>";
}

function insertingSort($arr)
{
    $n = count($arr);
    for ($i = 1; $i < $n; $i++){
        $key = $arr[$i];
        $j = $i - 1;

        while ($j >= 0 && $arr[$j] > $key){
            $arr[$j + 1] = $arr[$j];
            $j --;
        }

        $arr[$j+1] = $key;
    }
    return $arr;
}

ShowArray($numbers);

$sorted = insertingSort($numbers);

ShowArray($sorted);

echo "Наименшее число массива: " . $sorted[0];




