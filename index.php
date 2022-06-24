<?php
//GET Request - All Repos

//Creating sessions
$ch = require "init_curl.php";
//set url as option
curl_setopt($ch, CURLOPT_URL, "https://api.github.com/user/repos");

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
<?php require "header.html"; ?>
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
<a href="form.php">Create New</a>
<?php require "footer.html"; ?>