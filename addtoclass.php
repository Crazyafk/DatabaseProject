<!DOCTYPE html>
<html>
<head>
    <title>Yet another website</title>
</head>
<body>

<?php
    header('Location:pupildoessubject.php');
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    try{
        include_once('connection.php');

        session_start();  
        if (!isset($_SESSION['name'])) 
        {    
            header("Location:login.php"); 
        }
        array_map("htmlspecialchars",$_POST);

        $stmt = $conn->prepare("INSERT INTO TblPupilStudies(SubjectID,UserID,ClassPosition,ClassGrade,ExamMark,Comment)VALUES(:SubjectID,:UserID, NULL, NULL, NULL, NULL)");

        $stmt->bindParam(":SubjectID",$_POST["subject"]);
        $stmt->bindParam(":UserID",$_POST["student"]);

        $stmt->execute();
    }
    catch(PDOException $e)
    {
        echo "error".$e->getMessage();
    }
    $conn=null;
?>

</body>
</html>