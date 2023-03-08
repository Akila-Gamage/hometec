<?php
session_start();
include("db.php");
$pagename="Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
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
    echo "<table style='width:80%'>";
    echo "<tr>";
    echo "<th>Product Name</th>";
    echo "<th>Price</th>";
    echo "<th>Quantity</th>";
    echo "<th>Subtotal</th>";
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
                echo "</tr>";
                $total = $total + $subtotal;
            }
        }
        echo "<tr>";
            echo "<td colspan='3'>";
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
    echo "basket unchanged";
    echo "<br>";
    echo "<br>";
    $total =0;
    echo "<table style='width:80%'>";
    echo "<tr>";
    echo "<th>Product Name</th>";
    echo "<th>Price</th>";
    echo "<th>Quantity</th>";
    echo "<th>Subtotal</th>";
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
                echo "</tr>";
                $total = $total + $subtotal;
            }
        }
        echo "<tr>";
            echo "<td colspan='3'>";
            echo "Total";
            echo "</td>";
            echo "<td>";
            echo $total;
            echo "</td>";
            echo "</tr>";
            
    }
    else{
        echo "<tr>";
        echo "<td colspan='3'>";
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
echo "<a href='clearbasket.php'>";
echo "<p><h5>CLEAR BASKET</h5>";
echo "</a>";
include("footfile.html"); //include head layout
echo "</body>";
?>

