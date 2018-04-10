<?php
	$route=(isset($_GET['q']))?$_GET['q']:'anon';
	
	switch ($route) {
		
		case 'anon':
			$_GET['module']='webapp/modules/dashboard/anon.php';
			break;

		case 'pokedex':
			$_GET['module']='webapp/modules/pokedex/search.php';
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
		
		default:
			$_GET['module']='webapp/modules/dashboard/404.php';
			break;

	}