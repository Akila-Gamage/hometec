<?php
session_start();
$pagename="homteq: cloud controlled tech for your home"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text
echo "
<p class='updateInfo'> homteq is a highly-specialised online retailer that offers a wide range of devices at the most competitive prices
to make your home and your life super SMART.</p>

<p class='updateInfo'> <b> SMART SECURITY </b> </p>
<p class='updateInfo'>Smart-home monitoring products mean you can set up cameras to check on your home, even if you’re in another country.
You can either watch a live stream through your phone or tablet, or just get alerts when the motion sensor is
triggered.</p>

<p class='updateInfo'><b> SMART ENERGY </b></p>
<p class='updateInfo'>Smart thermostat systems let you turn it off instantly from your phone – no matter where you are – or you can tell
them
when you’re heading home to switch it back on, so it’s warm when you get in.
They can figure out your routine and customise your heating and hot water so it’s on when you need it and off when
you don’t,
helping to reduce your energy bills.

<p class='updateInfo'><b>SMART SPEAKERS</b></p>
<p class='updateInfo'>We’ve all got too much to do.
Being able to command a virtual assistant to do something for you saves time, and it also means you can multitask
more effectively.
If your hands are covered in flour but you need a two-minute timer, you can set it by voice without even having to
stop kneading.
Because virtual assistants live in a speaker with a microphone, they’re present in your home whenever you need them.</p>
<p class='updateInfo'>Whatever smart tech you are after, homteq has it on offer!</p>";
include("footfile.html"); //include head layout
echo "</body>";
?>