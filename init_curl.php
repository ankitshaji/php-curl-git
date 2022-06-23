<?php
//COMMON - Create session code

//composer require vlucas/phpdotenv
// require 'vendor/autoload.php';
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();
// var_dump(getenv());

//Create header
$headers = [
    "User-Agent: Php Curl Git",
    "Authorization: token "
];

//Curl session - create request
$ch = curl_init();

//Github requires valid api header - attach header to request
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

//Response will be returned as string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

return $ch;