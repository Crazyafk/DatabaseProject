<!DOCTYPE html>
<html>
<head>
    <title>Yet another website</title>
</head>
<body>

<?php
    include_once("connection.php");
    array_map("htmlspecialchars",$_POST);
    $stmt = $conn->prepare("SELECT * FROM tblusers WHERE username =:username ;");
    $stmt->bindParam(":username",$_POST["Username"]);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        if(password_verify($_POST["Pword"],$row["Password"])){
            header("Location: users.php");
        }else{
            header("Location: login.php");
        }
    }
?>

</body>
</html>