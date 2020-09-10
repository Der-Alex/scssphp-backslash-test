<?php
define('ROOT_PATH', __DIR__);

require_once ROOT_PATH . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

use ScssPhp\ScssPhp\Compiler;

$scss = new Compiler();
print_r($scss->compile('@import "test.scss"'));

die;