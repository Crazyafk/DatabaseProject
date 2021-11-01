<!DOCTYPE html>
<html>
<head>
    <title>Yet another website</title>
</head>
<body>

<?php
include_once("connection.php");

//Create Tables
$stmt = $conn->prepare("DROP TABLE IF EXISTS TblUsers; CREATE TABLE TblUsers(
    UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(20) NOT NULL,
    Gender VARCHAR(1) NOT NULL,
    Surname VARCHAR(20) NOT NULL,
    Forename VARCHAR(20) NOT NULL,
    Password VARCHAR(20) NOT NULL,
    House VARCHAR(20) NOT NULL,
    Year INT(2) NOT NULL,
    Role TINYINT(1)
    );");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblSubjects; CREATE TABLE TblSubjects(
    SubjectID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Subjectname VARCHAR(20) NOT NULL,
    Teacher VARCHAR(20) NOT NULL
    );");
$stmt->execute();
$stmt->closeCursor();

$stmt = $conn->prepare("DROP TABLE IF EXISTS TblPupilStudies; CREATE TABLE TblPupilStudies(
    SubjectID INT(4) UNSIGNED,
    UserID INT(4) UNSIGNED,
    Classposition INT(2),
    Classgrade VARCHAR(2),
    Exammark INT(2),
    Comment VARCHAR(500)
    )");
$stmt->execute();
$stmt->closeCursor();

//Create Test Data
function newUser($conn,$username,$gender,$surname,$forename,$password,$house,$year,$role)
{
    $stmt = $conn->prepare("INSERT INTO TblUsers(UserID,Username,Gender,Surname,Forename,Password,House,Year,Role)
    VALUES(null,:username,:gender,:surname,:forename,:password,:house,:year,:role)");

    $stmt->bindParam(':username',$username);
    $stmt->bindParam(':forename',$forename);
    $stmt->bindParam(':surname',$surname);
    $stmt->bindParam(':house',$house);
    $stmt->bindParam(':year',$year);
    $stmt->bindParam(':password',$password);
    $stmt->bindParam(':gender',$gender);
    $stmt->bindParam(':role',$role);

    $stmt->execute();
    $stmt->closeCursor();
}

newUser($conn,"superadmin","M","Mama","Joe","password","Fuxx",420,2);
newUser($conn,"pupil.learny","F","Pupil","Learny","password2","Textbook",4,0);
newUser($conn,"pupil.void","M","Pupil","VOID","3password","DEATH",-1,0);
newUser($conn,"pupil.dumbass","M","Pupil","Dumbass","password2","Textbook",9,0);
newUser($conn,"pupil.pupil","F","Pupil","Pupil","passw0_rd","Fuxx",13,0);
newUser($conn,"vanker.boring","M","Vanker","Boring","physicsisfun","DEATH",4,1);
newUser($conn,"boring.similarli","F","Boring","Similarli","englishisfun","Textbook",3,1);

function newSubject($conn,$subjectname,$teacher)
{
    $stmt = $conn->prepare("INSERT INTO TblSubjects(SubjectID,Subjectname,Teacher)VALUES(NULL,:subjectname,:teacher)");

    $stmt->bindParam(":subjectname",$subjectname);
    $stmt->bindParam(":teacher",$teacher);

    $stmt->execute();
    $stmt->closeCursor();
}

newSubject($conn,"Physics","Mr Boring Vanker");
newSubject($conn,"English","Similarli Boring");

function newPupilStudy($conn,$subjectid, $userid)
{
    $stmt = $conn->prepare("INSERT INTO TblPupilStudies(SubjectID,UserID,ClassPosition,ClassGrade,ExamMark,Comment)VALUES(:SubjectID,:UserID, NULL, NULL, NULL, NULL)");

    $stmt->bindParam(":SubjectID",$subjectid);
    $stmt->bindParam(":UserID",$userid);

    $stmt->execute();
    $stmt->closeCursor();
}

newPupilStudy($conn,2,1);
newPupilStudy($conn,3,2);
newPupilStudy($conn,4,1);
newPupilStudy($conn,5,2);
?>

</body>
</html>