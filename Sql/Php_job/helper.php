<?php

function flashMessage($name, $message): void
{
    if (isset($_SESSION[FLASH][$name])) {
        unset($_SESSION[FLASH][$name]);
    }

    $_SESSION[FLASH][$name] = ['message' => $message];
}

function displayFlashMessage($name): void
{

    if (!isset($_SESSION[FLASH][$name])) return;

    $flashMessage = sprintf("<div class='alert alert-warning'>%s</div>", $_SESSION[FLASH][$name]['message']);;

    unset($_SESSION[FLASH][$name]);

    echo $flashMessage;
}