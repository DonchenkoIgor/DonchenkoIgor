<?php
// function fibonacci($num){
//
//
// $n = 0;
// $n1 = 1;
// $n2 = 0;
// for($i = 1; $i<=$num; $i++){
//     echo $n. ' ';
//     $n= $n1+$n2;
//     $n1 = $n2;
//     $n2 = $n;
//
//     }
//}
//fibonacci(10);

    function fibonacciSum($n){
          $a = 0;
          $b = 1;
          $sum = 0;

        for($i= 0; $i<$n; $i++){
          $sum += $a;
          $r = $a + $b;
          $a = $b;
          $b = $r;
        }
        return $sum;
    }
        echo fibonacciSum(10);
    ?>





























































































