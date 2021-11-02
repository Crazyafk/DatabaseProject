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
    header("Location:login.php"); 
} 
?> 

</body>
</html>