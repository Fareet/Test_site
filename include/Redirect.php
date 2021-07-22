<?php

include $_SERVER['DOCUMENT_ROOT'] . '/include/success.php';

class Redirect
{
    public function LocationOnMainPage($bool)
    {
        if ($bool == true) {
            header('Location: /');
        }
    }
}

(new Redirect)->LocationOnMainPage((new Authorization)->Log_in());
