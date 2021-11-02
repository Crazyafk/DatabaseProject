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

<p>Hello Admin</p>

<a href="users.php">Add Users</a><br>
<a href="subjects.php">Add Subjects</a><br>
<a href="pupildoessubject.php">Signup Pupils to Subjects</a><br>
<br><br>
<a href=http://localhost/phpmyadmin/index.php?route=/database/structure&server=1&db=options>Manage Database (only works on local xammpp host)</a>
<br><br><br><br>

<a href="install.php">Reset Database with test data</a><br>

<a href="logout.php">Logout</a>
</body>
</html>