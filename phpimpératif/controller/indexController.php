<?php

function index() 
{
    $vars = [
        'title' => 'bienvenue',
        'content' => 'Bienvenue sur mon site',
    ];
    createView($vars);
}