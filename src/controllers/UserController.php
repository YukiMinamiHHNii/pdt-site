<?php
require ('../dao/UserDAO.php');

$user= new UserDAO();

switch ($_GET['q']) {
    case 1:
      echo $user->create();
      break;
     case 2:
       $data= $user->read();
       session_start();
       if($data['result']){
         $_SESSION['logged']=true;
       }else{
         $_SESSION['logged']=false;
       }
       echo json_encode($data);
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
