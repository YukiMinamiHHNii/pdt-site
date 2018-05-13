<?php
	session_start();
	$route=(isset($_GET['q']))?$_GET['q']:'index';
	$session=(isset($_SESSION['logged']))?$_SESSION['logged']:false;

	switch ($route) {

		case 'index':
			if($session){
				$_GET['module']='webapp/modules/admin/index.php';
			}else{
				$_GET['module']='webapp/modules/dashboard/anon.php';
			}
			break;

		case 'comments':
			$_GET['module']='webapp/modules/dashboard/comments.php';
			break;

		case 'register':
			$_GET['module']='webapp/modules/dashboard/register.php';
			break;

		case 'login':
			$_GET['module']='webapp/modules/dashboard/login.php';
			break;

		case 'logout':
			session_destroy();
			$session=false;
			$_GET['module']='webapp/modules/dashboard/anon.php';
			break;

		case 'pokedex':
			$_GET['module']='webapp/modules/pokedex/search.php';
			break;

		case 'single':
			$_GET['module']='webapp/modules/pokedex/single.php';
			break;

		case 'movedex':
			$_GET['module']='webapp/modules/movedex/search.php';
			break;

		case 'abilitydex':
			$_GET['module']='webapp/modules/abilitydex/search.php';
			break;

		case 'formatdex':
			$_GET['module']='webapp/modules/formatdex/search.php';
			break;

		case 'admin':
			if($session){
				$_GET['module']='webapp/modules/admin/index.php';
			}else{
				$_GET['module']='webapp/modules/dashboard/anon.php';
			}
			break;

		case 'admin-pokemon':
			if($session){
				$_GET['module']='webapp/modules/admin/pokemon/index.php';
			}else{
				$_GET['module']='webapp/modules/dashboard/anon.php';
			}
			break;

		case 'admin-moves':
			if($session){
				$_GET['module']='webapp/modules/admin/moves/index.php';
			}else{
				$_GET['module']='webapp/modules/dashboard/anon.php';
			}
			break;

		case 'admin-abilities':
			if($session){
				$_GET['module']='webapp/modules/admin/abilities/index.php';
			}else{
				$_GET['module']='webapp/modules/dashboard/anon.php';
			}
			break;

		case 'admin-formats':
			if($session){
				$_GET['module']='webapp/modules/admin/formats/index.php';
			}else{
				$_GET['module']='webapp/modules/dashboard/anon.php';
			}
			break;

		case 'admin-typing':
			if($session){
				$_GET['module']='webapp/modules/admin/typing/index.php';
			}else{
				$_GET['module']='webapp/modules/dashboard/anon.php';
			}
			break;

		default:
			$_GET['module']='webapp/modules/dashboard/404.php';
			break;

	}
