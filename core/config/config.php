<?php

	// ************************** //
	//    zainicjowanie sesji     //
	// ************************** //

	session_start();

	// ************************** //
	//       zmienne define       //
	// ************************** //

	define('ROOT_FOLDER_PATH','http://'.$_SERVER['SERVER_NAME'].rtrim($_SERVER['PHP_SELF'],'index.php'));

	define('CORE_FOLDER','core/');
	define('APP_FOLDER', 'app/');
	define('ADMIN_FOLDER', APP_FOLDER.'admin/');

	// ************************** //
	//   dołączane pliki główne   //
	// ************************** //

	require_once(CORE_FOLDER.'Model.php');
	require_once(CORE_FOLDER.'View.php');
	require_once(CORE_FOLDER.'Controller.php');

	require_once(CORE_FOLDER.'Router.php');
	require_once(CORE_FOLDER.'Errors.php');