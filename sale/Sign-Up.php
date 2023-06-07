
<?php
// Developer By : Azozz ALFiras
// 2021/10/1


// Include config file
require_once "Config_3.php";

$rand = 'AS34ZXCVBNMKLDJHRUEOJ6679292UCTXRSQXQIDO2G9739D7GDOIWBDOVCUIWFI';
$api_Token = substr(str_shuffle($rand),1,35);

// Define variables and initialize with empty values
$username = $email = $api_Token = $password = $confirm_password = "";
$username_err = $email_err = $api_Token_err =  $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validate username

if(empty(trim($_POST["username"]))){


$username_err = "Please enter a username. <br>";
} elseif(strlen(trim($_POST["username"])) < 8){
$username_err = "Username must have atleast 8 characters. <br>";
}  else{
// Prepare a select statement
$sql = "SELECT id FROM Users WHERE Username = ?";

if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_username);

// Set parameters
$param_username = trim($_POST["username"]);





// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
/* store result */
mysqli_stmt_store_result($stmt);

if(mysqli_stmt_num_rows($stmt) == 1){
$username_err = "This username is already taken.";
} else{
$username = trim($_POST["username"]);
}
} else{
echo "Oops! Something went wrong. Please try again later.";
}


// Close statement
mysqli_stmt_close($stmt);
}
}



// Validate license
if(empty(trim($api_Token))){
$api_Token_err = "Please enter a api Token. <br>";
} else{
// Prepare a select statement
$sql = "SELECT id FROM Users WHERE api_Token = ?";

if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_api_Token);

// Set parameters
$param_api_Token = trim($api_Token);

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
/* store result */
mysqli_stmt_store_result($stmt);

if(mysqli_stmt_num_rows($stmt) == 1){
$api_Token_err = "This api_Token is already taken. <br>";
} else{
$api_Token = trim($api_Token);
}
} else{
echo "Oops! Something went wrong. Please try again later.";
}

// Close statement
mysqli_stmt_close($stmt);
}
}

// Validate email
if(empty(trim($_POST["email"]))){
$email_err = "الرجاد تعبة الايميل بشكل صحيح";
} else{
// Prepare a select statement
$sql = "SELECT id FROM Users WHERE Email = ?";

if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_email);

// Set parameters
$param_email = trim($_POST["email"]);

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
/* store result */
mysqli_stmt_store_result($stmt);

if(mysqli_stmt_num_rows($stmt) == 1){
$email_err = "الايميل مستخدم من قبل";
} else{
$email = trim($_POST["email"]);
}
} else{
echo "هناك مشكلة في تسجيل الدخول . <br>";
}

// Close statement
mysqli_stmt_close($stmt);
}
}






// Validate password
if(empty(trim($_POST["password"]))){
$password_err = "Please enter a password. <br>";
} elseif(strlen(trim($_POST["password"])) < 8){
$password_err = "Password must have atleast 8 characters. <br>";
} else{
$password = trim($_POST["password"]);
}

// Validate confirm password
if(empty(trim($_POST["confirm_password"]))){
$confirm_password_err = "Please confirm password. <br>";
} else{
$confirm_password = trim($_POST["confirm_password"]);
if(empty($password_err) && ($password != $confirm_password)){
$confirm_password_err = "Password did not match.";
}
}

// Check input errors before inserting in database
if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){

// Prepare an insert statement

if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters

// Set parameters
$param_username = $username;
$param_api_Token = $api_Token;
$param_email    = $email;

$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash





$sql = "INSERT INTO Users (Username, password, Phone, Name_Store, icon, Email, Status, Sub_Time, Start_Store, End_Store, api_Token)
VALUES ('$param_username', '$param_password', '', '', '', '$param_email', '', '', '',   '',  '$param_api_Token')";

if ($link->query($sql) === TRUE) {


header('Location: login.php');


} else {
echo "Error: " . $sql . "<br>" . $link->error;

}

// Close statement
mysqli_stmt_close($stmt);

}

// Close connection
mysqli_close($link);
}
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ibda3 - آنشاء متجر</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
<link rel="stylesheet" href="assets/css/app.css">
<link rel="stylesheet" href="assets/css/pages/auth.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
</head>

<body>
<div id="auth">

<div class="row h-100">
<div class="col-lg-5 col-12">
<div id="auth-left">
<div class="auth-logo">
<a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
</div>
<h1 class="auth-title"> آنشاء متجر</h1>
<p class="auth-subtitle mb-5">اهلا وسهلا بك يرجئ من حضرتك تسجيل معلومات متجرك بشكل الصحيح</p>

<form method="POST">
<div class="form-group position-relative has-icon-left mb-4">
<table><?php echo $email_err; ?></table>
<input type="text" name="email" class="form-control form-control-xl" placeholder="الايميل">
<div class="form-control-icon">
<i class="bi bi-envelope"></i>
</div>
</div>
<div class="form-group position-relative has-icon-left mb-4">
<table><?php echo $username_err; ?></table>
<input type="text" name="username" class="form-control form-control-xl" placeholder="اسم المستخدم">
<div class="form-control-icon">
<i class="bi bi-person"></i>
</div>
</div>
<div class="form-group position-relative has-icon-left mb-4">
<table><?php echo $password_err; ?></table>
<input type="password" name="password" class="form-control form-control-xl" placeholder="الباسورد">
<div class="form-control-icon">
<i class="bi bi-shield-lock"></i>
</div>
</div>
<div class="form-group position-relative has-icon-left mb-4">
<table><?php echo $confirm_password_err; ?></table>
<input type="password" name="confirm_password" class="form-control form-control-xl" placeholder="تاكيد الباسورد ">
<div class="form-control-icon">
<i class="bi bi-shield-lock"></i>
</div>
</div>
<button name="Submit" type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5"> آنشاء متجر</button>
</form>
<div class="text-center mt-5 text-lg fs-4">
<p class='text-gray-600'>هل لديك متجر من قبل <a href="Login.php"
class="font-bold">
تسجيل الدخول</a>.</p>
</div>
</div>
</div>
<div class="col-lg-7 d-none d-lg-block">
<div id="auth-right">

</div>
</div>
</div>

</div>
</body>

</html>
