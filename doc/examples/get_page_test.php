<?php

# include parameters an boostraping class
if (file_exists(__DIR__ . "/../../parameters.ini")) {
    $ini_array = parse_ini_file(__DIR__ . "/../../parameters.ini");
}
include dirname(dirname(__FILE__)) . '/../Tests/bootstrap.php';

# use required class
use Litmus\LitmusAPI;

# Instance a new Litmus API
$LitmusAPI = new LitmusAPI($ini_array['apiKey'], $ini_array['apiPass']);

# launch request an get the result
$PageTest = $LitmusAPI->getPageTest($ini_array['pageTestId']);

# show the result
var_dump($PageTest);