<?php

function autoloader($className)
{
    $array_paths = [
        '/models/',
        '/components/',
        '/config/'
    ];

    foreach ($array_paths as  $path) {
        $file_path = ROOT . $path . $className . '.php';
        if (is_file($file_path))
            include_once $file_path;
    }
}


spl_autoload_register('autoloader');
