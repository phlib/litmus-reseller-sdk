<?php

spl_autoload_register(function ($class) {
    if (0 === strpos(ltrim($class, '/'), 'Yzalis\Components\Litmus')) {
    	$file = __DIR__.'/..'.substr(str_replace('\\', '/', $class), strlen('Yzalis\Components\Litmus')).'.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
});