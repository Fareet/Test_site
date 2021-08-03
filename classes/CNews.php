<?php

class CNews
{
    public function GetObject()
    {
        return (new DivElement(''))
        ->addElement((new PElement('','Какой-то контент')));
    }
}