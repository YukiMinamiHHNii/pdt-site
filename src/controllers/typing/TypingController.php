<?php
  require ('../../dao/TypingDAO.php');

  $typing= new TypingDAO();

  switch ($_GET['q']) {
    case 1:
      echo $typing->read();
      break;
    case 2:
      echo $typing->create();
      break;
    case 3:
      echo $typing->update();
      break;
    case 4:
      echo $typing->delete();
      break;
    default:
      echo 'unknown operation';
      break;
  }
