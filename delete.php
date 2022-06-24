<?php
//DELETE Request - Single Repo

//Creating sessions
$ch = require "init_curl.php";
//Set url as option - get the full_name sent from edit.php form action
curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/{$_POST["full_name"]}");
//Setting to DELETE request
curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"DELETE");

//Not sending data in body

//Send request
$response = curl_exec($ch);

//response code
$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

//Close sessions 
curl_close($ch);

//String with json data - decoded into phpobject
//Get assosiative arrays - json_decode($response,true))
$data = json_decode($response, true);

if ($status_code != 204) {
    echo "Unexpected status code: $status_code";
    var_dump($data);
    exit;
}
?>
<!--Else status code is 204 - Repository was deleted successfully-->
<?php require "header.html" ?>
<h1>Delete Repository</h1>
<p>Repository deleted successfully.
    <a href="index.php">Index</a>
</p>
<?php require "footer.html" ?>