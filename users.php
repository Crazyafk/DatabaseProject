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

<form action="addusers.php" method="post"> 
    First name:<input type="text" name="forename"><br> 
    Last name:<input type="text" name="surname"><br> 
    Password:<input type="password" name="passwd"><br> 
    House:<input type="text" name="house"><br> 
    Year:<input type="text" name="year"><br> 

    <!--Creates a drop down list--> 
    Gender:<select name="gender"> 
        <option value="M">Male</option> 
        <option value="F">Female</option> 
    </select> 
    <br> 

    <!--Next 3 lines create a radio button which we can use to select the user role--> 
    <input type="radio" name="role" value="Pupil" checked> Pupil<br> 
    <input type="radio" name="role" value="Teacher"> Teacher<br> 
    <input type="radio" name="role" value="Admin"> Admin<br> 
    <input type="submit" value="Add User"> 

</form> 

</body>
</html>