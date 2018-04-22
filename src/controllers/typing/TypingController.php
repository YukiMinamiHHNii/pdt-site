<?php
  require ('../../dao/TypingDAO.php');

  $typing= new TypingDAO();

  switch ($_GET['q']) {
    case 1:
      echo $typing->read();
      break;
    default:
      echo 'unknown operation';
      break;
  }
