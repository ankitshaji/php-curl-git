<?php
//POST Request - Single Repo

//Creating sessions
$ch = require "init_curl.php";
//Set url as option
curl_setopt($ch, CURLOPT_URL, "https://api.github.com/user/repos");
//Setting to post
curl_setopt($ch, CURLOPT_POST, true);
//Getting data from form.php convert to json
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
if ($status_code != 201) {
    echo "Unexpected status code: $status_code";
    var_dump($data);
    exit;
}
?>
<!--Else status code is 201 - Repository was created successfully-->
<?php require "header.html" ?>
<h1>New Repository</h1>
<p>Repository created successfully.
    <a href="show.php?full_name=<?= $data["full_name"] ?>">Show</a>
</p>
<?php require "footer.html" ?>