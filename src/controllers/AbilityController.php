<?php
require ('../dao/AbilityDAO.php');

$ability= new AbilityDAO();

switch ($_GET['q']) {
  case 1:
    echo $ability->read();
    break;
  default:
    echo 'unknown operation';
    break;
}
