<?php

require "../LitmusAPI.class.php";

# use your own credentials
$apiKey  = "";
$apiPass = "";

$LitmusAPI = new LitmusAPI($apiKey, $apiPass);

$EmailTest = $LitmusAPI->getEmailTest(000000);

var_dump($EmailTest);

?>