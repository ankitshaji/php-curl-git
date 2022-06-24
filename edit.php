<?php
//GET Request - Single Repo -> PUT Request
//Add info to Form - Edit info

//Get value from query string
$full_name = $_GET["full_name"];

//Creating sessions
$ch = require("init_curl.php");
//set url as option
curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/$full_name");

//Send request
$response = curl_exec($ch);
//Close sessions 
curl_close($ch);

//String with json data - decoded into phpobject
//Get assosiative arrays - json_decode($response,true))
//Array with single - repository
$data = json_decode($response, true);

?>

<?php require "header.html"; ?>
<h1>Edit Repository</h1>
<!--show + edit data in form -->
<!--Send form to update.php -->
<form method="post" action="update.php">
    <input type="hidden" name="full_name" value="<?= $data["full_name"] ?>">

    <label for="name">Name</label>
    <input type="text" name="name" id="name" value="<?= $data["name"]; ?>">

    <label for="description">Description</label>
    <textarea name="description" id="description">
    <?= htmlspecialchars($data["description"]) ?>
    </textarea>
    
    <button>Submit</button>
</form>
<?php require "footer.html"; ?>