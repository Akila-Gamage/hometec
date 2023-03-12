<?php
session_start();
include("db.php");
$pagename="Login Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//Capture the 2 inputs entered in the form (email and password) using the $_POST superglobal variable 
//Assign these values to 2 new local variables $email and $password
$email=$_POST['email'];
$password=$_POST['password'];

//Display the content of these 2 variables to ensure that the values have been posted properly
echo "<p>Email entered:".$email."</p>";
echo "<p>Password entered:".$password."</p>";

if(empty($name) or empty($password))
{
    //Display login failed message
    echo "<p><b>Login failed!</b></p>";
    echo "<p>Login form incomplete</p>";
    //Display "manadotary fields need to filled in" message
    echo "<p>Make sure you provide all the required detail.</p>";
    echo "<br>";
    //Display a link to login page
    echo "<p>Go back to: <a href='login.php'>login</a></p>";
}
else
{
    //SQL query to retrieve the record from the users table for which the email matches login email (in form)
    $SQL = "select * from Users where userEmail=".$email;
    //execute the SQL query & fetch results of the execution of the SQL query and store them in $arrayu
    $exeSQL = mysqli_query($conn, $SQL) or die (mysqli_query($conn));
    $arrayu = mysqli_fetch_array($exeSQL);
    //also capture the number of records retrieved by the SQL query using function mysqli_num_rows and store it 
    //in a variable called $nbrecs
    $nbrecs = mysqli_num_rows($exeSQL);

    if($nbrecs==0)
    {
        echo "<p><b>Login failed!</b></p>";
        echo "<p>Email not recognized</p>";
        echo "<br>";
        //Display a link to login page
        echo "<p>Go back to: <a href='login.php'>login</a></p>";
    }
    else
    {
        if()
    }
}
include("footfile.html"); //include head layout
echo "</body>";
?>

