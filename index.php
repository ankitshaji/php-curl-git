<?php
//composer require vlucas/phpdotenv
// require 'vendor/autoload.php';
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();
// var_dump(getenv());

//GET Request 
//create header
$headers = [
    "User-Agent: Php Curl Git",
    "Authorization: TOKEN MISSING"
];

//curl session
$ch = curl_init("https://api.github.com/user/repos");

//github requires valid api header - attach header to request
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

//response will be returned as string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//send request
$response = curl_exec($ch);

//close sessions 
curl_close($ch);

//String with json data - decoded into phpobject
//get assosiative arrays - json_decode($response,true))
$data = json_decode($response, true);

//output -structured info on diffrent variable - type,value
//var_dump($data)

//loop through array of results
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