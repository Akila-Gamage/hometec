<?php
$pagename="Sign Up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
echo "<div  class='formStyle'>";
echo "<form action=signup_process.php method=post id='signupform'>";
echo "<div class='element'>";
echo "<label for=fname>First Name: </label>";
echo "<input type=text name=fname size=18 >";
echo "</div>";

echo "<div class='element'>";
echo "<label for=lname>Last Name: </label>";
echo "<input type=text name=lname size=18 >";
echo "</div>";

echo "<div class='element'>";
echo "<label for=address>Address: </label>";
echo "<input type=text name=address size=18 >";
echo "</div>";

echo "<div class='element'>";
echo "<label for=postcode>Postcode: </label>";
echo "<input type=text name=postcode size=18 >";
echo "</div>";

echo "<div class='element'>";
echo "<label for=telno>Tel No: </label>";
echo "<input type=text name=telno size=18 >";
echo "</div>";

echo "<div class='element'>";
echo "<label for=email>Email Address: </label>";
echo "<input type=email name=email size=18 >";
echo "</div>";

echo "<div class='element'>";
echo "<label for=password>Password: </label>";
echo "<input type=password name=password size=18 >";
echo "</div>";

echo "<div class='element'>";
echo "<label for=cpassword>Confirm Password: </label>";
echo "<input type=password name=cpassword size=18 >";
echo "</div>";

echo "<div class='element'>";
echo "<input type=submit value='sign up' class='btn'>";
echo "<input type=submit value='clear form' class='btn'>";
echo "</div>";

echo "</form>";
echo "</div>";
include("footfile.html"); //include head layout
echo "</body>";
?>

