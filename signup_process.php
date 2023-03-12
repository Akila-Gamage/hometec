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

//if the mandatory fields in the form (all fields) are not empty
if(!empty($fname) or !empty($lname) or !empty($address) or !empty($postcode) or !empty($telno) or !empty($email) or !empty($password) or !empty($cpassword))
{
    //if the 2 entered passwords do not match
    if($password<>$cpassword)
    {
        //Display sign-up failed message
        echo "<p><b>Your Sign-up failed!</b></p>";
        //Display error passwords not matching message
        echo "<p>The two passwords are not matching.</p>";
        //Display a link back to register page
        echo "<p>Go back to: <a href='signup.php'>sign up</a></p>";
    }
    //else
    else
    {
        $reg = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
        //if email matches the regular expression
        if(preg_match($reg,$email))
        {
            //Write a SQL query to insert a new user into users table
            $SQL = "INSERT INTO Users (userType, userFName, userLName, userAddres, userPostCode, userTelNo, userEmail, userPassword) VALUES ('C','".$fname."','".$lname."','".$address."','".$postcode."','".$telno."','".$email."','".$password."')";
            //Execute the INSERT INTO SQL query
            mysqli_query($conn, $SQL);
            // Execute INSERT INTO SQL query, if SQL execution is correct
            if(mysqli_query($conn, $SQL))
            {
                //Display signup confirmation message
                echo "<p><b>Sign-Up Complete</b></p>";
                //Display a link to login page
                echo "<p>Go to Login Page: <a href='login.php'>Login up</a></p>";
            }
            //else, if the SQL execution is erroneous, there is a problem
            else
            {
                //Display sign-up failed message
                echo "<p><b>Your Sign-up failed!</b></p>";

                //Return the SQL execution error number using the error detector
                echo "<br><p>SQL ERR No: ".mysqli_errono($conn)."</p>";
                echo "<p>SQL Error Msg: ".mysqli_error($conn)."</p>";
                //if error detector returns number 1062 i.e. unique constraint on the email is breached
                if(mysqli_errono($conn)==1062)
                {
                    //Display email already exist error message
                    echo "<p>An account with your e-mail address is already registered.</p>";
                }
                elseif(mysqli_errono($conn)==1064)
                {
                    //Display email already exist error message
                    echo "<p>Invalid characters used</p>";
                }
                //Display a link to login page
                echo "<p>Go back to: <a href='signup.php'>sign up</a></p>";
            }
        }
        else
        {
            //Display sign-up failed message
            echo "<p><b>Your Sign-up failed!</b></p>";
            //Display "email not in the right format" message
            echo "<p>Please insert your e-mail address correctly.</p>";
            //Display a link to login page
            echo "<p>Go back to: <a href='signup.php'>sign up</a></p>";
        }
    }
}
else
{
    //Display sign-up failed message
    echo "<p><b>Your Sign-up failed!</b></p>";
    //Display "manadotary fields need to filled in" message
    echo "<p>All mandotary fields need to be filled in.</p>";
    //Display a link to login page
    echo "<p>Go back to: <a href='signup.php'>sign up</a></p>";

}

include("footfile.html"); //include head layout
echo "</body>";
?>

