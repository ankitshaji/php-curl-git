<?php
//composer require vlucas/phpdotenv
// require 'vendor/autoload.php';
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();
// var_dump(getenv());

//GET Request 
//Create header
$headers = [
    "User-Agent: Php Curl Git",
    "Authorization: TOKEN MISSING"
];

//Curl session
$ch = curl_init("https://api.github.com/user/repos");

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
$data = json_decode($response, true);

//Outputs -structured info on diffrent variable - type,value
//var_dump($data)

//Loop through array of results
// foreach($data as $repository){
//     echo $repository["full_name"]," ",
//         $repository["description"],"<br>";
// };

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PHP CURL GIT</title>
</head>

<body>
    <h1>Repositories</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        
        <tbody>
            <?php foreach($data as $repository):?>
                <tr>
                    <td><?= $repository["name"]?></td>
                    <td><?= htmlspecialchars($repository["description"])?></td>
                </tr>
                <?php endforeach;?>

        </tbody>

    </table>
</body>

</html>