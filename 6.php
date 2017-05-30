<!DOCTYPE html>
<?php
setcookie("user", "Alex Porter", time()+3600);
?>
<br>
<?php
session_start();
$_SESSION['views']=1;
?>
<html>
<head>
<script src="selected.js"></script>
<script src="clienthint.js"></script>
<script src="selectuser.js"></script>
<title>Good job</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
body {
font-family: Georgia, "Times New Roman",
          Times, serif;
color: red;
background-color: #eee;
}
.header {
height: 400px;
width: 600px;
  background--image: -webkit-linear-gradient(#FFD194, #BC1324);
}
.nav {
list-style-type: none;
margin: 0;
padding: 20px 0;
}
.nav li {
color: #fff;
display: inline;
font-family: 'Abel', sans-serif;
font-size: 30px;
margin-right: 25px;
}
.content-box {
background: rbga(255,155,155,0.9);
height: 500px;
width: 80%;
overflow: scroll;
}
h1 {
color: #FFF;
font-size: 90px;
font-family: 'Amatic SC', cursive;
font-weight: 500;
text-align: center;
background-color: #DBE9EE;
box-sizing: border-box;
}
h2 {
color: #D7263D;
font-family: 'Raleway', sans-serif;
font-size: 28px;
text-align: right;
background-color: #fff;
box-sizing: border-box;
}
p {
  color: #333;
  font-family: 'Raleway', sans-serif;
  font-size: 16px;
  font-weight: 300;
}

table {
  height: 40%;
  left: 10%;
  margin: 20px auto;
  overflow-y: scroll;
  position: static;
  width: 80%;
}
thead th {
  background: #88CCF1;
  color: #FFF;
  font-family: 'Lato', sans-serif;
  font-size: 16px;
  font-weight: 100;
  letter-spacing: 2px;
  text-transform: uppercase;
}

</style>
<script type="text/javascript" defer="defer" src="666.js">
</script>
</head>
<body>
<form>
Selecte a CD:
<select name="cds" onchange="showCD(this.value)">
<option value="Bob Df">Bob Df</option>
<option value="Bee GH">Bee GH</option>
<option value="Cad Ser">Cad Ser</option>
</select>
</form>

<p>
<div id="txtHint"><b>CD info will be listed here.</b></div>
</p>
<br>
<?php
$int = 123;

if(!filter_var($int, FILTER_VALIDATE_INT))
{
	echo("Integer is not valid");
}
else
{
	echo("Integer is valid");
}
?>
<br>
<?php
$var=300;

$int_options = array(
"options"=>array
(
"min_range"=>0,
"max_range"=>256
)
);

if(!filter_var($var, FILTER_VALIDATE_INT, $int_options))
{
	echo("Integer is not valid");
	}
	else
	{
		echo("Integer is valid");
	}
?>
<br>
<?php
if(!filter_has_var(INPUT_GET, "email"))
{
	echo("Input type does not exists");
}
else
{
	if(!filter_input(INPUT_GET, "email", FILTER_VALIDATE_EMAIL))
	{
		echo "E-Mail is not valid";
	}
	else
	{
		echo "E-Mail is valid";
	}
}
?>
<br>
<?php
$age = 16;

$filters = array
 (
 "name" => array
  (
  "filter"=>FILTER_SANITIZE_STRING
  ),
 "age" => array
  (
  "filter"=>FILTER_VALIDATE_INT,
  "options"=>array
   (
   "min_range"=>1,
   "max_range"=>120
   )
  ),
 "email"=> FILTER_VALIDATE_EMAIL,
 );

$result = filter_input_array(INPUT_GET, $filters);

if (!$result["age"])
 {
 echo("Age must be a number between 1 and 120.<br />");
 }
elseif(!$result["email"])
 {
 echo("E-Mail is not valid.<br />");
 }
else
 {
 echo("User input is valid");
 }
?>
<br>
<?php
function convertSpace($string)
{
	return str_replace("_", " ", $string);
}
$string = "Peter_is_a_great_guy!";
echo filter_var($string, FILTER_CALLBACK, array("options"=>"convertSpace"));
?>
<br>
<br><?php

//Initialize the XML parser
$parser=xml_parser_create();

//Function to use at the start of an element
function start($parser,$element_name,$element_attrs)
  {
  switch($element_name)
    {
    case "NOTE":
    echo "-- Note --<br />";
    break; 
    case "TO":
    echo "To: ";
    break; 
    case "FROM":
    echo "From: ";
    break; 
    case "HEADING":
    echo "Heading: ";
    break; 
    case "BODY":
    echo "Message: ";
    }
  }

//Function to use at the end of an element
function stop($parser,$element_name)
  {
  echo "<br />";
  }

//Function to use when finding character data
function char($parser,$data)
  {
  echo $data;
  }

//Specify element handler
xml_set_element_handler($parser,"start","stop");

//Specify data handler
xml_set_character_data_handler($parser,"char");

//Open XML file
$fp=fopen("test.xml","r");

//Read data
while ($data=fread($fp,4096))
  {
  xml_parse($parser,$data,feof($fp)) or 
  die (sprintf("XML Error: %s at line %d", 
  xml_error_string(xml_get_error_code($parser)),
  xml_get_current_line_number($parser)));
  }

//Free the XML parser
xml_parser_free($parser);
?>
<br>
<br><?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("test.xml");

print $xmlDoc->saveXML();
?>
<br>
<br><?php
$xmlDoc = new DOMDocument();
$xmlDoc->load("test.xml");

$x = $xmlDoc->documentElement;
foreach ($x->childNodes AS $item)
{
	print $item->nodeName . " = " . $item->nodeValue . "<br />";
}
?>
<br>
<br><?php
$xml = simplexml_load_file("test.xml");

echo $xml->getName() . "<br />";

foreach($xml->children() as $child)
{
	echo $child->getName() . ":" . $child . "<br />";
}
?>
<br>
<form>
First Name:
<input type="text" id="txt1"
onkeyup="showHint(this.value)">
</form>

<p>Suggestions: <span id="txtHint"></span></p>
<br>
<form>
Select a User:
<select name="users" onchange="showUser(this.value)">
<option value="1">Peter Griffin</option>
<option value="2">Lois Griffin</option>
<option value="3">Glenn Quagmire</option>
<option value="4">Joseph Swanson</option>
</select>
</form>

<p>
<div id="txtHint"><b>User info will be listed here.</b></div>
</p>
<table>
<tbody>
<thead>
<tr>
<td>14</td>
<td>package items</td>
</tr>
</thead>
<tr>
<div class="header">
<div class="container">
<ul class="nav">
<li>about</li>
<li>work</li>
<li>team</li>
<li>contact</li>
</ul>
</tr>
</div>
</div>
<div class="welcome">
<h1>The Door</h1>
<p>biubiibiubi</p>
</div>
<!-- hello -->
<h2>You is a good men</h2>
<p>Have a look</p>
<a href="https://en.wikipedia.org/wiki/Brown_bear"target="_blank">Learn php</a>
<ul>
<li><a href="666.html">yoooo</a></li>
<li>address</li>
</ul>
<p>Maybe you will lose something<br />in your 
room:</p>
<p>There are...</p>
<ol>
<li>Russia</li>
<li>United States</li>
<li>Canada</li>
<ol>
<a href="#" target="_blank">
<img src="https://s3.amazonaws.com/codecademy-content/courses/web-101/web101-image_brownbear.jpg" />
</a>
<div class="search">Search the table</div>
</tbody>
</table>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Name: <input type="text" name="fname">
<input type="submit">
</form>

<?php 
$name = $_REQUEST['fname']; 
echo $name; 
?>
<br>
<br>
<?php
echo "Hello World!";
?>
<?php
$color = "red";
echo "My car is " . $color ."<br>";
?>
<?php
$x=5;
$y=6;
$z=$x+$y;
echo $z;
?>
<br><?php
$x=5;
$y=10;

function myTest() {
	global $x,$y;
	$y=$x+$y;
}
myTest();
echo $y;
?>
<br><?php
$x = -362;
var_dump($x);
echo "<br>";
$x = 10.36;
var_dump($x);
?>
<br><?php
echo strlen("Hello world!");
?>
<br><?php
echo strpos("Hello world!","world");
?>
<br><?php
$a = "hello";
$b =$a . "world!";
echo $b;

$x="hello";
$x .="world";
echo $x;
?>
<br><?php
$x =10;
echo ++$x;
echo "<br>";
$y =5;
echo --$y;
?>
<br><?php
$x=100;
$y="100";
var_dump($x ==$y);
echo "666";
$a=50;
$b=60;
echo"<br>";
var_dump($a > $b);
echo"11111";
?>
<br><?php
$t=date("H");
if ($t<"20") {
	echo "good job!";
} else {
	echo "bad";
}
?>
<br><?php
$favcolor="red";

switch ($favcolor) {
	case "red":
	echo "your favorite is red";
	break;
	case "blue":
	echo "your favorite is blue";
	default:
	echo "your favorite is...";
}
?>
<br>
<br><?php
$x=1;
while($x<=5){
	echo "the number is:$x<br>";
	$x++;
}
?>
<br><?php
for ($x=0;$x<=10;$x++){
	echo"the number:$x <br>";
}
?>
<br><?php
$colors = array("red","green");
foreach ($colors as $value) {
	echo "$value <br>";
}
?>
<br><?php
function setheight($minheight=50){
	echo"the height is :$minheight<br>";
}
setheight(250);
setheight();
?>
<br><?php
function sum($x,$y){
	$z=$x+$y;
	return $z;
}
echo"5+10=".sum(5,10)."<br>";
?>
<br><?php
$cars=array("volo","bum");
echo"i like" . $cars[0] . ", " . $cars[1].".";
?>
<br>
<br><?php
$cars=array("as","sd","ss");
echo count($cars);
?>
<br>
<br><?php
$cars=array("Volov","Bwe","Assd");
sort($cars);

$clength=count($cars);
for($x=0;$x<$clength;$x++)
{
	echo $cars[$x];
	echo "<br>";
}
?>
<br>
<br><?php
$age=array("bill"=>"35","steve"=>"37","peter"=>"45");
asort($age);

foreach($age as $x=>$x_value)
{
	echo "key=".$x.", value=".$x_value;
	echo "<br>";
}
?>
<br>
<?php 
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
?>
<br>
<br>
<a href="test_get.php?subject=PHP&web=W3school.com.cn">Test $Get</a>
<br>
<br>
<form action="welcome.php" method="post">
Name: <input type="text" name="name"><br>
<br>
E-mail: <input type="text" name="email"><br>
<input type="submit">
</form>
<br>
<br>
<?php
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
   }
     
   if (empty($_POST["website"])) {
     $website = "";
   } else {
     $website = test_input($_POST["website"]);
   }

   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }

   if (empty($_POST["gender"])) {
     $genderErr = "Sex is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>PHP Verify the instance</h2>
<p><span class="error">* Required fields</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Name：<input type="text" name="name" value="<?php echo $name;?>">
   <span class="error">* <?php echo $nameErr;?></span>
   <br><br>
   Email：<input type="text" name="email" value="<?php echo $email;?>">
   <span class="error">* <?php echo $emailErr;?></span>
   <br><br>
   Website：<input type="text" name="website" value="<?php echo $website;?>">
   <span class="error"><?php echo $websiteErr;?></span>
   <br><br>
   Comment：<textarea name="comment" rows="5" cols="40" value="<?php echo $comment;?>"></textarea>
   <br><br>
   Gender：
   <input type="radio" name="gender"
   <?php if (isset($gender) && $gender=="female") echo "checked";?>
   value="female">Female
   <input type="radio" name="gender"
   <?php if (isset($gender) && $gender=="male") echo "checked";?>
   value="male">Male
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="submit"> 
</form>

<?php
echo "<h2>Your input：</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
<br>
<br>
<br><?php echo date("y-m-d")?>
<br>
<br><?php
echo "now is " . date("h:i:sa");
?>
<br>
<br><?php 
date_default_timezone_set("Asia/Taipei");
echo "the time is" . date("h:i:sa");
?>
<br>
<br>
<?php
$d=strtotime("10:38pm April 15 2015");
echo "the  " . date("Y-m-d h:i:sa", $d);
?>
<br>
<br><?php
$startdate=strtotime("Saturday");
$enddate=strtotime("+6 weeks",$startdate);

while ($startdate < $enddate) {
	echo date("M d", $startdate),"<br>";
	$startdate = strtotime("+1 week", $startdate);
}
?>
<br>
<br><?php
$d1=strtotime("December 31");
$d2=ceil(($d1-time())/60/60/24);
echo "oh: " . $d2 ."day.";
?>
<br>
<br><?php include 'footer.php';?>
<br>
<br>
<div class="menu">
<?php include 'menu.php';?>
</div>
<br>
<br><?php
echo readfile("webdictionary.txt");
?>
<br>
<br><?php
$myfile = fopen("666.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("666.txt"));
fclose($myfile);
?>
<br>
<br><form action="upload_file.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file" />
<br />
<input type="submit" name="submit" value="Submit" />
</form>
<br>
<br>
<?php
echo $_COOKIE["user"];

print_r($_COOKIE);
?>
<br>
<br><?php
if (isset($_COOIKE["user"]))
	echo "Welcome " . $_COOKIE["user"] ."!<br />";
else
	echo "Welcome guest!<br />";
?>
<br>
<br><?php
echo "Pageviews=".$_SESSION['views'];
?>
<br>
<br><?php

if(isset($_SESSION['views']))
	$_SESSION['views']=$_SESSION['views']+1;

else
	$_SESSION['views']=1;
echo "Views=". $_SESSION['views'];
?>
<br>
<br><?php
function spamcheck($field)
{
	$field=filter_var($field, FILTER_SANITIZE_EMAIL);
	
	if(filter_var($field, FILTER_VALIDATE_EMAIL))
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
	}

if (isset($_REQUEST['email']))
  {

  $mailcheck = spamcheck($_REQUEST['email']);
  if ($mailcheck==FALSE)
    {
    echo "Invalid input";
    }
  else
    {
    $email = $_REQUEST['email'] ; 
    $subject = $_REQUEST['subject'] ;
    $message = $_REQUEST['message'] ;
    mail("someone@example.com", "Subject: $subject",
    $message, "From: $email" );
    echo "Thank you for using our mail form";
    }
  }
else
{
	echo "<form method='post' action='mailform.php'>
	Email: <input name='email' type='text' /><br />
	Subject: <input name='subject' type='text' /><br />
	Message:<br />
	<textarea name='message' rows='15' cols='40'>
	</textarea><br />
	<input type='submit' />
	</form>";
}
?>
<br>
<br><?php
if(!file_exists("75757.txt"))
{
	die("File not found");
}
else
{
	$file=fopen("75757.txt","r");
}
?>
<br>
<br>
<br><?php
function customError($errno, $errstr)
{
	echo "<b>Error:</b> [$errno] $errstr<br />";
	echo "Webmaster ....";
	error_log("Error: [$errno] $errstr",1,
	"159357ailei@gmail.com","From: Webmaster@example.com");
	}
	
	set_error_handler("customError",E_USER_WARNING);

$test=2;
if ($test>1)
 {
 trigger_error("Value must be 1 or below",E_USER_WARNING);
 }
?>
<br>
<br><?php
function checkNum($number)
 {
 if($number>1)
  {
  throw new Exception("Value must be 1 or below");
  }
 return true;
 }

try
 {
 checkNum(2);
 echo 'If you see this, the number is 1 or below';
 }

catch(Exception $e)
 {
 echo 'Message: ' .$e->getMessage();
 }
?>
<br>
<br>
</body>
</html>