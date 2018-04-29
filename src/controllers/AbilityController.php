<?php
require ('../dao/AbilityDAO.php');

$ability= new AbilityDAO();

switch ($_GET['q']) {
    case 1:
      echo $ability->read();
      break;
    case 2:
      echo $ability->create();
      break;
    case 3:
      echo $ability->update();
      break;
    case 4:
      echo $ability->delete();
      break;
    default:
      echo 'unknown operation';
      break;
}
