<?php
session_start();
include("db.php");
mysqli_report(MYSQLI_REPORT_OFF);
$pagename="Sign Up Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

//Capture the 7 inputs entered in the 7 fields of the form using the $_POST superglobal variable 
//Store these details into a set of 7 new local variables
$fname=trim($_POST['fname']);
$lname=trim($_POST['lname']);
$address=trim($_POST['address']);
$postcode=trim($_POST['postcode']);
$telno=trim($_POST['telno']);
$email=trim($_POST['email']);
$password=trim($_POST['password']);
$cpassword=trim($_POST['cpassword']);

//Write a SQL query to insert a new user into users table
$SQL = "INSERT INTO Users (userType, userFName, userLName, userAddres, userPostCode, userTelNo, userEmail, userPassword) VALUES ('C','".$fname."','".$lname."','".$address."','".$postcode."','".$telno."','".$email."','".$password."')";
//Execute the INSERT INTO SQL query
mysqli_query($conn, $SQL);
include("footfile.html"); //include head layout
echo "</body>";
?>

