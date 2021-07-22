<?php

include $_SERVER['DOCUMENT_ROOT'] . './main_menu.php';

function accountExit()
{
	if (isset($_GET['log_out'])) {
		$success = false;
		session_destroy();
		$str =  "<li class='project-folders-v-active'><a href='/route/Autorization/' >Авторизация</a></li>";
		header("Refresh:0; url= /");
	}
}
function Authorization()
{
	$success = (new Authorization)->Log_in();
	if ($success) {
		$str = "<li class = 'project-folders-v-active'><a href='/?log_out'>Выход</a></li>";
	} else {
		$str =  "<li class='project-folders-v-active'><a href='/route/Autorization/' >Авторизация</a></li>";
	}
	return $str;
}
$title = 'Project - ведение списков';
$pathFile = basename(__FILE__, '.php');

accountExit();

?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link href="/styles.css" rel="stylesheet">
	<title><?= $title ?></title>
</head>

<body>

	<div class="header">
		<div class="logo"><img src="/image/logo.png" width="68" height="23" alt="Project"></div>
		<div class="clearfix"></div>
	</div>

	<div class="clear">
		<ul class="main-menu">
			<? (new NavigateMenu)->showMenu($pathFile) ?>
		</ul>
	</div>
	<?
