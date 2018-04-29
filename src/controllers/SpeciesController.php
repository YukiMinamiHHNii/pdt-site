<?php
  require ('../dao/SpeciesDAO.php');

  $species= new speciesDAO();

  switch ($_GET['q']) {
    case 1:
      echo $species->read();
      break;
    case 2:
      echo $species->create();
      break;
    case 3:
      echo $species->update();
      break;
    case 4:
      echo $species->delete();
      break;
    default:
      echo 'unknown operation';
      break;
  }
