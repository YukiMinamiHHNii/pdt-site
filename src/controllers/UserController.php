<?php
require ('../dao/UserDAO.php');

$user= new UserDAO();

switch ($_GET['q']) {
    case 1:
      echo $user->create();
      break;
     case 2:
       echo $user->read();
       break;
     case 3:
       echo $user->update();
       break;
     case 4:
       echo $user->delete();
       break;
      case 5:
        echo $user->create_comment();
        break;
    default:
      echo 'unknown operation';
      break;
}
