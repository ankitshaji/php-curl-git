<?php
//composer require vlucas/phpdotenv
// require 'vendor/autoload.php';
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();
// var_dump(getenv());

//GET Request - Single Value
//Get value from query string
$full_name = $_GET["full_name"];

//Create header
$headers = [
    "User-Agent: Php Curl Git",
    "Authorization: token "
];

//Curl session - create request
$ch = curl_init("https://api.github.com/repos/$full_name");

//Github requires valid api header - attach header to request
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

//Response will be returned as string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Send request
$response = curl_exec($ch);

//Close sessions 
curl_close($ch);

//String with json data - decoded into phpobject
//Get assosiative arrays - json_decode($response,true))
//Array with single - repository
$data = json_decode($response, true);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min.css">
    <title>PHP CURL GIT</title>
</head>

<body>
    <main>
        <h1>Repository</h1>
        <!--show data with discription list element-->
        <dl>
            <dt>Name</dt>
            <dd><?= $data["name"] ?></dd>
            <dt>Description</dt>
            <dd><?= htmlspecialchars($data["description"]) ?></dd>

        </dl>
    </main>
</body>

</html>