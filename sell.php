<?php

session_start();
require 'aws/aws-autoloader.php';
use Aws\DynamoDb\DynamoDbClient;

?>
<html>
<head><title>Sell Item</title>
    <style type="text/css">
        html {
            background-color: #888888;
        }

        fieldset {
            background-color: #505050;
            color: white;
        }

        a {
            color: #F00000;
        }
    </style>
</head>
<body>
<form method="POST" action="sell.php">
    <fieldset>
        <legend><b>Sell Your Items Here:</b></legend>
           <TEXTAREA NAME="description"
                     ROWS="4" COLS="50">
           </TEXTAREA>
        <br/>
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
        Image:<input name="image" type="file"/><br/>
        <input type="submit" value="Post" name="post"/>
    </fieldset>
</form>

<?php
if (isset($_POST['post'])) {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');

    $client = DynamoDbClient::factory(array(
        'credentials' => array('aws_access_key_id' => '',
            'aws_secret_access_key' => ''),
            'region' => ''  // replace with your desired region
        ));

    $description = $_POST['description'];
    $user = $_SESSION["userName"];

    $response = $client->putItem(array(
        'TableName' => 'items',
        'Item' => array(
            'user' => array('S' => 'test'), // Primary Key
            'description' => array('S' => $description),
//        'image' => array('S' => ),
        )
    ));
}
?>
</body>
</html>
