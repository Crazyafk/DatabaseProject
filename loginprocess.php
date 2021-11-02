<!DOCTYPE html>
<html>
<head>
    <title>Yet another website</title>
</head>
<body>

<?php
    session_start();
    include_once("connection.php");
    array_map("htmlspecialchars",$_POST);
    $stmt = $conn->prepare("SELECT * FROM tblusers WHERE username =:username ;");
    $stmt->bindParam(":username",$_POST["Username"]);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        if(password_verify($_POST["Pword"],$row["Password"])){
            $_SESSION['name']=$row["Username"];
            echo($_SESSION['name']);
            
            //Redirect
            if(!isset($_SESSION['backURL'])
            {
                $backurl = "/"; //default
            }else{
                $backurl = $_SESSION['backURL'];
            }
            unset($_SESSION['backURL']);
            header('Location '.$backurl);
        }else{
            header("Location: login.php");
        }
    }
?>

</body>
</html>