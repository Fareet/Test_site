<?php
$title = 'Project - ведение списков';
$pathFile = basename(__FILE__, '.php');
$menu = new NavigateMenu;
$menu->setRouter($router);

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
			<?$menu->showMenu('header')?>
		</ul>
	</div>
	<?
