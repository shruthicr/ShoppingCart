<?php

session_start();
?>
<html>
<head><title>Register</title>
    <style type="text/css">
        html {
            background-color:#888888;
        }
        fieldset {
            background-color:#505050;
            color:white;
        }
        a {
            color :#F00000 ;
        }
        form {
            width: 500px;
            clear: both;
        }
        input {
            width: 100%;
            clear: both;
        }
    </style>
</head>
<body>

<form method="POST" action="register.php">
    <fieldset>
        <legend><b>Register:</b></legend>
        <label><b>User Name:</b>
            <input type ="text" name="userName"/>
        </label>
        <br/>
        <label><b>Full Name:</b>
            <input type ="text" name="fullName"/>
        </label>
        <br/>
        <label><b>Email:</b>
            <input type ="text" name="email"/>
        </label>
        <br/>
        <label><b>Password:</b>
            <input type="password" name="password"/>
        </label>
        <br/>
        <br/>
        <input type="submit" value="Register" name="register"/>
    </fieldset>
</form>

<?php
error_reporting(E_ALL);
ini_set('display_errors','On');
if(isset($_POST['register'])){
    $user = $_POST['userName'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    try{
        $dsn = '';
        $username = '';
        $password = '';
        $dbh = new PDO($dsn, $username, $password);
        
        $dbh->beginTransaction();
        $dbh->exec("insert into users values('$user','$pass','$email','$fullName')")
        or die(print_r("Error! UserName already taken please select a different username", true));
        $dbh->commit();
        header("Location:login.php");
        exit;
    }catch(PDOException $e){
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
}
?>
</body>
</html>
