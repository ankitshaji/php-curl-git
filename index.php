<?php
//composer require vlucas/phpdotenv
// require 'vendor/autoload.php';
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();
// var_dump(getenv());

//GET Request - All Repos
//Create header
$headers = [
    "User-Agent: Php Curl Git",
    "Authorization: token "
];

//Curl session - create request
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
        <h1>Repositories</h1>
        <!--show data with table element-->
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($data as $repository) : ?>
                    <tr>
                        <td>
                            <a href="show.php?full_name=<?= $repository["full_name"] ?>">
                                <?= $repository["name"] ?>
                        </td>
                        </a>
                        <td><?= htmlspecialchars($repository["description"]) ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>

        </table>
    </main>
</body>

</html>