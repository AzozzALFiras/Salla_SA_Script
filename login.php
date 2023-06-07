<?php
session_start();
if(isset($_SESSION["AzLogin"]) && $_SESSION["AzLogin"] === true){
header("location: index.php");
exit;
}

// Include config file
require_once "Config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Check if username is empty
if(empty(trim($_POST["username"]))){
$username_err = "الرجاء كتابة اسم المستخدم..";
} else{
$username = trim($_POST["username"]);
}

// Check if password is empty
if(empty(trim($_POST["password"]))){
$password_err = "الرجاء كتابة الباسورد";
} else{
$password = trim($_POST["password"]);
}

// Validate credentials
if(empty($username_err) && empty($password_err)){
// Prepare a select statement
$sql = "SELECT id, Username, password FROM Accounts WHERE Username = ?";

if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_username);

// Set parameters
$param_username = $username;

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
// Store result
mysqli_stmt_store_result($stmt);

// Check if username exists, if yes then verify password
if(mysqli_stmt_num_rows($stmt) == 1){
// Bind result variables
mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
if(mysqli_stmt_fetch($stmt)){
if(password_verify($password, $hashed_password)){
// Password is correct, so start a new session
session_start();

$_SESSION["AzLogin"] = true;
$_SESSION["id"] = $id;
$_SESSION["Username"] = $username;

header("location: index.php");
} else{
// Password is not valid, display a generic error message
$login_err = "خطأ في اسم المستخدم أو كلمة مرور..";
}
}
} else{
// Username doesn't exist, display a generic error message
$login_err = "خطأ في اسم المستخدم أو كلمة مرور.";
}
} else{
echo "هناك مشكلة في تسجيل الدخول الرجاء المحاولة لاحقا";
}

// Close statement
mysqli_stmt_close($stmt);
}
}

// Close connection
mysqli_close($link);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>تسجيل الدخول</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/bootstrap.css">
<link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
<link rel="stylesheet" href="assets/css/app.css">
<link rel="stylesheet" href="assets/css/pages/auth.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
<style>
body {
background-color: #eee;
}
.form-group[class*=has-icon-] .form-control-icon {
padding: 0 .6rem;
position: absolute;
top: 60%;
transform: translateY(-50%);
}
.Copyright{
  color:#eee;
  padding: 10px;
}
</style>
</head>

<body>
<div id="auth">

<div class="row h-100">
<div class="col-lg-12 col-12">
<div class="container">
<div id="auth-left">

<h1 class="auth-title">تسجيل الدخول</h1>
<p class="auth-subtitle mb-5">اهلا وسهلا بك قم في تسجيل الدخول لتتمكن من متابعة طلباتك ومنتجاتك</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group position-relative has-icon-left mb-4">
<label><?php echo $login_err; ?></label>
<label><?php echo $username_err; ?></label>

<input type="text" name="username" class="form-control form-control-xl" placeholder="اسم المستخدم">
<div class="form-control-icon">
<i class="bi bi-person"></i>
</div>
</div>
<div class="form-group position-relative has-icon-left mb-4">
<label><?php echo $password_err; ?></label>
<input type="password" name="password" class="form-control form-control-xl" placeholder="الباسورد">
<div class="form-control-icon">
<i class="bi bi-shield-lock"></i>
</div>
</div>

<button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">تسجيل الدخول</button>
</form>
<div class="text-center mt-5 text-lg fs-4">
<p class="text-gray-600">ليس لديك حساب <a href="Register.php"
class="font-bold">
انشاء حساب</a></p>

</div>
</div>
</div>
<div class="col-lg-12 d-none d-lg-block">
<div class="Copyright" id="auth-right">
<center>
<p class="mb-4 mb-md-0">
© 2021 -  <?php echo $Title_Site; ?>
 جميع الحقوق محفوظة لمتجر
</p>
</center>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
