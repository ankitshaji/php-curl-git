<?php
//GET Request - Single Value

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
<h1>Repository</h1>
<!--show data with discription list element-->
<dl>
    <dt>Name</dt>
    <dd><?= $data["name"] ?></dd>
    <dt>Description</dt>
    <dd><?= htmlspecialchars($data["description"]) ?></dd>

</dl>
<a href="edit.php?full_name=<?= $data["full_name"] ?>">Edit</a>

<!--full_name of current repo sent to delete.php -->
<form method="post" action="delete.php">
    <input type="hidden" name="full_name" value="<?= $data["full_name"]?>">
    <button>Delete</button>

</form>
<?php require "footer.html"; ?>