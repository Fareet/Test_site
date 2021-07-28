<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/include/success.php';

class Redirect
{
    public function LocationOnMainPage($bool)
    {
        if ($bool == true) {
            header('Location: /');
        }
    }
}
