<?php
  switch (substr($_POST['command'], 0, 3)) {
    case 'SUM':
      $num = preg_replace( '/[^,0-9]/',' ', $_POST['command']);
      $numArray = explode(',', $num);
      foreach ($numArray as $item) {
        global $sum;
        $sum += $item;
      }
      echo $sum;
      break;
    case 'SUB':
      $num = preg_replace( '/[^,0-9]/',' ', $_POST['command']);
      $numArray = explode(',', $num);
      foreach ($numArray as $item) {
        global $sum;
        $sum = $item - $sum;
      }
      echo $sum;
      break;
    case 'MUL':
      $num = preg_replace( '/[^,0-9]/',' ', $_POST['command']);
      $numArray = explode(',', $num);
      $sum = 1;
      foreach ($numArray as $item) {
        $sum = $item * $sum;
      }
      echo $sum;
    case 'DIV':
      $num = preg_replace( '/[^,0-9]/',' ', $_POST['command']);
      $numArray = explode(',', $num);
      $sum = 1;
      foreach ($numArray as $item) {
        $sum = $item / $sum;
      }
      echo $sum;
      break;
    case 'RNU':
      $num = preg_replace( '/[^,0-9]/',' ', $_POST['command']);
      $numArray = explode(',', $num);
      foreach ($numArray as $item) {
        echo rand(0, $item) . '<br>';
      }
      break;
    case 'RWO':
      $arr_en = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
      $num = preg_replace( '/[^,0-9]/',' ', $_POST['command']);
      $numArray = explode(',', $num);
      foreach ($numArray as $item) {
        echo $arr_en[rand(0, $item)] . ' ';
      }
      break;
    case 'PAS':
      $arr_pas = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 1, 2, 3, 4, 5, 6, 7, 8, 9, 0, '!', '@', '#', '$', '%', '&', '?', '-', '+', '=', '~'];
      $num = preg_replace( '/[^,0-9]/',' ', $_POST['command']);
      $numArray = explode(',', $num);
      foreach ($numArray as $item) {
        $pas = [];
        while (count($pas) <= $item) {
          shuffle($arr_pas);
          array_push($pas, $arr_pas[rand(0, count($arr_pas))]);
        }
          echo implode('', $pas).'<br>';
      }
      break;
    default:
      echo $_POST['command'];
  }


