<?php
// Developer By : Azozz ALFiras
// 2021/10/1

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'sale');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$Sql_User = "SELECT * FROM Users WHERE id = '1'";
$result = $link->query($Sql_User);
if ($result->num_rows > 0) {
while($rows3 = $result->fetch_assoc()) {

$Title_Site = $rows3["Name_Store"];
$icon_Site = $rows3["icon"];
$Style0 = $rows3["Style0"];
$Style1 = $rows3["Style1"];
$Style2 = $rows3["Style2"];

}
}

session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["AzLogin"]) || $_SESSION["AzLogin"] !== true){
//header("location: login.php");
//exit;
}

$Username_Login = htmlspecialchars($_SESSION["Username"]);

?>
