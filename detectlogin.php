if(isset($_SESSION('userId')))
{
    //display first name and surname on the right hand-side, right under the navigation bar
    echo $fname." ".$lname; 
}