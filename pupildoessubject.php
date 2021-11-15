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
?> 

<form action="addtoclass.php" method="post">
    <select name = "student">
    <?php
        include_once("connection.php");
        $stmt = $conn->prepare("SELECT * FROM TblUsers WHERE Role = 0 ORDER BY Surname ASC");
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo("<option value=".$row["UserID"].">".$row["Surname"].",".$row["Forename"]."</option>");
        }
    ?>
    </select>

    <select name = "subject">
    <?php
        include_once("connection.php");
        $stmt = $conn->prepare("SELECT * FROM TblSubjects ORDER BY Subjectname ASC");
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo("<option value=".$row["SubjectID"].">".$row["Subjectname"].",".$row["Teacher"]."</option>");
        }
    ?>
    </select>

    <input type="submit" value="Add to Class">
</form>

</body>
</html>