<?php
require_once $_SERVER['DOCUMENT_ROOT'] . './classes/LoadPageClass.php';

$Page = new LoadPage();

$Page->AddContent('MainPage',new PElement('','Какой-то дополнительный элемент'));

$Page->Render();
