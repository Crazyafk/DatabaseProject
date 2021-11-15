<!DOCTYPE html>
<html>
<head>
    <title>Yet another website</title>
</head>
<body>

<?php 
    session_start();  
    if (!isset($_SESSION['name'])) 
    {   
        $_SESSION['backURL'] = $_SERVER['REQUEST_URI']; 
        header("Location:login.php"); 
    }
    
    include_once("connection.php");
?>

<form action="showoptions.php" method = "post">

    <!--Creates a drop down list-->
    Student:<select name="Name">
    <?php
        $stmt = $conn->prepare("SELECT * FROM TblUsers WHERE role=0 ORDER BY Surname ASC");
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo('<option value = '.$row["UserID"].'> '.$row["Forename"]." 
            ".$row["Surname"]."</option>");
        }
    ?>
    </select>

    <input type="submit" value="View options">
</form>


</body>
</html>