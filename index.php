<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/AllClasses.php';

//Router::SetTitle('MainPage', 'Новый заголовок'); //изменение заголовка страницы
Router::SetDescription('MainPage', 'Какое-то описание'); //изменение описания страницы

$content = new ContentForPage();

ContentForPage::AddContent('MainPage', (new PElement('', "Что-то"))); //добавление нового элемента на страницу

$content->SelectContent(); // получение контетна для текущей страницы

$page = new ExecutePage();

$page->Execute($content); // отрисовка станицы
