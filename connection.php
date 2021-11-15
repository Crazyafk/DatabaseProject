<!DOCTYPE html>
<html>
<head>
    <title>Yet another website</title>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "options";

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully";
}
catch(PDOException $e){
    if($e->getMessage() == "SQLSTATE[HY000] [1049] Unknown database 'options'")
    {
        //--------------Create New Database---------------
        echo "create new db";

        //Create Connection
        $conn = new mysqli($servername, $username, $password);
        //Check Connection
        if($conn->connect_error){
            die("Connection failed: ".$conn->connect_error);
        }

        //Create Database
        $sql = "CREATE DATABASE options";
        if($conn->query($sql) === TRUE){
            echo "Database created successfully";
        }else{
            echo "Error creating database: ".$conn->error;
        }
    }
    else{echo "Connection failed: ".$e->getMessage();}
}
?>

</body>
</html>