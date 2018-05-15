<?php
require ('../dao/FormatDAO.php');

$format= new FormatDAO();

switch ($_GET['q']) {
    case 1:
      echo $format->read();
      break;
    case 2:
      echo $format->create();
      break;
    case 3:
      echo $format->update();
      break;
    case 4:
      echo $format->delete();
      break;
    default:
      echo 'unknown operation';
      break;
}
