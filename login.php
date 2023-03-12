<?php
session_start();
$pagename="login"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
echo "<div class='formstyle'>";
echo "<form name='form' action='login_process.php' action='post' id=signupform>";
echo "<div class='element'>";
echo "<label for=email>Email Address: </label>";
echo "<input type=email name=email size=18 >";
echo "</div>";

echo "<div class='element'>";
echo "<label for=password>Password: </label>";
echo "<input type=password name=password size=18 >";
echo "</div>";

echo "<div class='element'>";
echo "<input type=submit value='Clear Form' class='btn'>";
echo "<input type=submit value='Log In' class='btn'>";
echo "</div>";
echo "</form>";
echo "</div>";

include("footfile.html"); //include head layout
echo "</body>";
?>

