<?php
session_start();
include("db.php");
$pagename="Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
if(isset($_POST['del_prodid'])){
    //capture the posted product id and assign it to a local variable $delprodid
    $delprodid=$_POST['del_prodid'];
    //unset the cell of the session for this posted product id variable
    unset($_SESSION['basket'][$delprodid]);
    //display a "1 item removed from the basket" message
    echo "<p>1 item removed from the basket";
}
if(isset($_POST['h_prodid'])){
    //capture the ID of selected product using the POST method and the $_POST superglobal variable 
    //and store it in a new local variable called $newprodid
    $newprodid=$_POST['h_prodid'];

    //capture the required quantity of selected product using the POST method and $_POST superglobal variable 
    //and store it in a new local variable called $reququantity
    $reququantity=$_POST['p_quantity'];

    //Display id of selected product 
    // echo "<p>ID of selected product: ".$newprodid;
    //Display quantity of selected product
    // echo "<p>Quantity of selected product: ".$reququantity;
    //create a new cell in the basket session array. Index this cell with the new product id. 
    //Inside the cell store the required product quantity 
    $_SESSION['basket'][$newprodid]=$reququantity;
    echo "<p>1 item added";

    echo "<br>";
    echo "<br>";
    $total =0;
    echo "<table style='width:80%' id='baskettable'>";
    echo "<tr>";
    echo "<th>Product Name</th>";
    echo "<th>Price</th>";
    echo "<th>Quantity</th>";
    echo "<th>Subtotal</th>";
    echo "<th>Remove Product</th>";
    echo "</tr>";
    

    if(isset($_SESSION['basket'])){
        // echo "session is created";
        foreach($_SESSION['basket'] as $index => $value){
            //create a $sql varialble and populate it with a SQL statement that retrieves product details
            $SQL = "select * from Product WHERE prodId=".$index;
            //run SQL query for connected DB or exit and display error message 
            $exeSQL= mysqli_query($conn, $SQL) or die (mysqli_error($conn));
            while ($arrayp=mysqli_fetch_array($exeSQL)){
                echo "<tr>";
                echo "<td>";
                echo $arrayp['prodName']; //display product name as contained in the array
                echo "</td>";
                echo "<td>";
                echo $arrayp['prodPrice']; 
                echo "</td>";
                echo "<td>";
                echo $value;
                echo "</td>";
                $subtotal = $arrayp['prodPrice']*$value;
                echo "<td>";
                echo $subtotal;
                echo "</td>";
                echo "<form action=basket.php method=post>";
                echo "<td>";
                echo "<input type=submit value='remove' class='btn'>";
                echo "</td>";
                echo "<input type=hidden name='del_prodid' value=".$prodinbasketarray['prodId'].">";
                echo "</form>";
                echo "</tr>";
                $total = $total + $subtotal;
            }
        }
        echo "<tr>";
            echo "<td colspan='4'>";
            echo "Total";
            echo "</td>";
            echo "<td>";
            echo $total;
            echo "</td>";
            echo "</tr>";
            
    }
    else{
        echo "Empty Basket";
    }
    echo "</table>";
}
else{
    echo "<br>";
    echo "<br>";
    $total =0;
    echo "<table style='width:80%' id='baskettable'>";
    echo "<tr>";
    echo "<th>Product Name</th>";
    echo "<th>Price</th>";
    echo "<th>Quantity</th>";
    echo "<th>Subtotal</th>";
    echo "<th>Remove Product</th>";
    echo "</tr>";
    

    if(isset($_SESSION['basket'])){
        // echo "session is created";
        foreach($_SESSION['basket'] as $index => $value){
            //create a $sql varialble and populate it with a SQL statement that retrieves product details
            $SQL = "select * from Product WHERE prodId=".$index;
            //run SQL query for connected DB or exit and display error message 
            $exeSQL= mysqli_query($conn, $SQL) or die (mysqli_error($conn));
            while ($arrayp=mysqli_fetch_array($exeSQL)){
                echo "<tr>";
                echo "<td>";
                echo $arrayp['prodName']; //display product name as contained in the array
                echo "</td>";
                echo "<td>";
                echo $arrayp['prodPrice']; 
                echo "</td>";
                echo "<td>";
                echo $value;
                echo "</td>";
                $subtotal = $arrayp['prodPrice']*$value;
                echo "<td>";
                echo $subtotal;
                echo "</td>";
                echo "<form action=basket.php method=post>";
                echo "<td>";
                echo "<input type=submit value='remove' class='btn'>";
                echo "</td>";
                echo "<input type=hidden name='del_prodid' value=".$prodinbasketarray['prodId'].">";
                echo "</form>";
                echo "</tr>";
                $total = $total + $subtotal;
            }
        }
        echo "<tr>";
            echo "<td colspan='4'>";
            echo "Total";
            echo "</td>";
            echo "<td>";
            echo $total;
            echo "</td>";
            echo "</tr>";
            
    }
    else{
        echo "<tr>";
        echo "<td colspan='4'>";
        echo "Total";
        echo "</td>";
        echo "<td>";
        echo $total;
        echo "</td>";
        echo "</tr>";
        echo "Empty Basket";
    }
    echo "</table>";
}
echo "<br>";
//clear basket anchor tag
echo "<p class='updateInfo'>";
echo "<a href='clearbasket.php'>";
echo "<h5>CLEAR BASKET</h5>";
echo "</a></p>";
echo "<br>";
//Signup link
echo "<p class='updateInfo'>New hometeq customers: ";
echo "<a href='signup.php'>";
echo "Sign Up";
echo "</a></p>";
echo "<br>";
//login link
echo "<p class='updateInfo'>Returning hometeq customers: ";
echo "<a href='login.php'>";
echo "Log In";
echo "</a></p>";
include("footfile.html"); //include head layout
echo "</body>";
?>

