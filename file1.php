<?php
  function addToFile($data)
  {
      $file = 'data.txt';
      $existingData = [];
      if (file_exists($file)) {
          $existingData = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      }
      $existingData [] = json_encode($data);
      file_put_contents($file, implode(PHP_EOL, $existingData));
      return $existingData;
  }
  function deleteByEmail($email){
      $file = 'data.txt';
      $existingData = [];
      if(file_exists($file)){
          $existingData = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
      }
      $updatedData = [];
      foreach ($existingData as $entry){
      $decodedEntry = json_decode($entry, true);
      if($decodedEntry && isset($decodedEntry['email']) && $decodedEntry['email'] !== $email){
      $updatedData [] = $entry;
          }
      }
      file_put_contents($file, implode(PHP_EOL, $updatedData));
  }
  if(!empty($_POST['email']) && !empty($_POST['password'])){
      $userData = [
          'email' => $_POST['email'],
          'password' => $_POST['password'],
      ];
      $updatedData = addToFile($userData);
  }
  $emailToDelete = 'wwwl@gmail.com';
  deleteByEmail($emailToDelete);
  ?>





