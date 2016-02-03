<?php

session_start();
?>
<html>
<head><title>Online Shopping</title>
    <style type="text/css">
        table, th, td {
            border: 1.5px solid white;
            background-color: #505050;
            color: white;
            width: 800px;
        }

        html {
            background-color: #888888;
        }

        fieldset {
            background-color: #505050;
            color: white;
            width: 800px;
        }

        a {
            color: #F00000;
        }
    </style>
</head>
<body>
<form method="POST" action="board.php">
    <fieldset>
        <legend><b>Message Board:</b></legend>
        <input type="submit" value="RemoveItems" name="removeItems"/>
        <input type="submit" value="SellItems" name="sellItems"/>
        </label>
    </fieldset>
</form>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
if (isset($_POST['sellItems'])) {
    header("Location:sell.php");
    exit;
}
if (isset($_POST['removeItems'])) {
//    unset($_SESSION["userName"]);
//    session_destroy();
    header("Location:remove.php");
    exit;
}
?>
</body>
</html>
<!--require '';

use Aws\DynamoDb\DynamoDbClient;

$client = DynamoDbClient::factory(array(
    'profile' => 'default',
    'region' => '', #replace with your desired region
    'base_url' => ''
));


/*echo "# Creating table $tableName..." . PHP_EOL;

$result = $client->createTable(array(
    'TableName' => $tableName,
    'AttributeDefinitions' => array(
        array(
            'AttributeName' => 'Id',
            'AttributeType' => 'N'
        )
    ),
    'KeySchema' => array(
        array(
            'AttributeName' => 'Id',
            'KeyType' => 'HASH'
        )
    ),
    'ProvisionedThroughput' => array(
        'ReadCapacityUnits'    => 5,
        'WriteCapacityUnits' => 6
    )
));*/

print_r($result->getPath('TableDescription'));-->