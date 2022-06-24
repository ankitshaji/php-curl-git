<?php
//PUT Request - Single Repo

//Creating sessions
$ch = require "init_curl.php";
//Set url as option - get the full_name sent from edit.php form action
curl_setopt($ch, CURLOPT_URL, "https://api.github.com/repos/{$_POST["full_name"]}");
//Setting to PATCH ie PUT request
curl_setopt($ch,CURLOPT_CUSTOMREQUEST,"PATCH");

//Getting form data from edit.php -> convert to json
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));

//Send request
$response = curl_exec($ch);

//response code
$status_code = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

//Close sessions 
curl_close($ch);

//String with json data - decoded into phpobject
//Get assosiative arrays - json_decode($response,true))
$data = json_decode($response, true);
if ($status_code === 422) {
    echo "Invalid data: ";
    print_r($data["errors"]);
    exit;
}
if ($status_code != 200) {
    echo "Unexpected status code: $status_code";
    var_dump($data);
    exit;
}
?>
<!--Else status code is 200 - Repository was updated successfully-->
<?php require "header.html" ?>
<h1>Edit Repository</h1>
<p>Repository updated successfully.
    <a href="show.php?full_name=<?= $data["full_name"] ?>">Show</a>
</p>
<?php require "footer.html" ?>