<?php
     class Workers
     {
         function say()
         {
             echo "Hi, i'm a worker" . PHP_EOL;
         }
         function work_responsibilities()
         {
             echo "We are work for you";
         }
     }
     class Teacher extends Workers
     {
         function professional_duties()
         {
             echo 'I teach children'. PHP_EOL;
         }
     }
     class Policeman extends Workers
     {
         function job_duties()
         {
             echo '"I ensure law and order' . PHP_EOL;
         }
     }

$workers   = New Workers();
$teacher   = New Teacher();
$policeman = New Policeman();

$teacher-> say();





































