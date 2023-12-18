<?php
      class Animals
      {
          function sleep()
          {
             echo "I can sleep" . PHP_EOL;
          }
      }
      class Dog extends Animals
      {
          function bark()
          {
              echo "Woof!" . PHP_EOL;
          }
          function guard()
          {
              echo "I'm guarding the house";
          }
      }
      class Lion extends Animals
      {
          function roar()
          {
              echo "Roar!" . PHP_EOL;
          }
          function hunt()
          {
              echo "I'm hunting for prey". PHP_EOL;
          }
      }
      class Fish extends Animals
      {
          function swim()
          {
              echo "I can swim" . PHP_EOL;
          }
          function breatheUnderwater()
          {
              echo "I can breathe underwater" . PHP_EOL;
          }
      }
      class Monkey extends Animals
      {
          function climb()
          {
              echo "I can climb trees" . PHP_EOL;
          }
          function Bananas()
          {
              echo "I can eat bananas" . PHP_EOL;
          }
      }
   $animals   =  New Animals();
   $dog       =  New Dog();
   $lion      =  New Lion();
   $fish      =  New Fish();
   $monkey    =  New Monkey();

   $dog-> sleep();

?>


















