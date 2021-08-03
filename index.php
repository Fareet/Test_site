<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/AllClasses.php';
$content = new DataForPage($router);

$content->SelectContent(); // получение контетна для текущей страницы

$content->setTitle('MainPage', 'Main');
$content->setDescription('MainPage', 'Какое-то описание');

$page = new ExecutePage($content, $router);
$page->Execute(); // отрисовка станицы

