<?php
require ('../dao/MoveDAO.php');

$move= new MoveDAO();

switch ($_GET['q']) {
    case 1:
      echo $move->read();
      break;
    case 2:
      echo $move->create();
      break;
    case 3:
      echo $move->update();
      break;
    case 4:
      echo $move->delete();
      break;
    case 5:
      echo $move->read_move_species($_GET['p']);
      break;
    default:
      echo 'unknown operation';
      break;
}
