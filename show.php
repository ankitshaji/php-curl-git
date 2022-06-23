<?php
//GET Request - Single Value

//Get value from query string
$full_name = $_GET["full_name"];

//Creating sessions
$ch = require("init_curl.php");
//set url as option
curl_setopt($ch,CURLOPT_URL,"https://api.github.com/repos/$full_name");

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