<?php

$path = file_exists(__DIR__ . '/public/' . $_SERVER['REQUEST_URI']);
if ($path)
{
    return false;
}
else {
    include 'public/index.php';
}


