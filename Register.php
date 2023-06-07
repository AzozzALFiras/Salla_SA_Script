<?php
// Include config file
require_once "Config.php";

// Define variables and initialize with empty values
$username = $password = $email = $phone = $confirm_password = "";
$username_err = $password_err = $email_err = $phone_err = $confirm_password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Validate username
if(empty(trim($_POST["username"]))){
$username_err = "الرجاء كتابة اسم المستخدم";
} elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
$username_err = "لا يمكن أن يحتوي اسم المستخدم إلا على أحرف وأرقام وشرطات سفلية.";
} else{
// Prepare a select statement
$sql = "SELECT id FROM Accounts WHERE Username = ?";

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
$username_err = "أسم المستخدم مأخوذ مسبقا.";
} else{
$username = trim($_POST["username"]);
}
} else{
$login_err =  "هناك خطأ ما. الرجاء معاودة المحاولة في وقت لاحق.";
}

// Close statement
mysqli_stmt_close($stmt);
}
}


// Validate username
if(empty(trim($_POST["email"]))){
$email_err = "الرجاء كتابة البريد الالكتروني ";
} else{
// Prepare a select statement
$sql = "SELECT id FROM Accounts WHERE Email = ?";

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
$email_err = "البريد الالكتروني مآخود مسبقا.";
} else{
$email = trim($_POST["email"]);
}
} else{
$login_err =  "هناك خطأ ما. الرجاء معاودة المحاولة في وقت لاحق.";
}

// Close statement
mysqli_stmt_close($stmt);
}
}


// Validate username
if(empty(trim($_POST["phone"]))){
$phone_err = "الرجاء كتابة رقم الهاتف ";
} else{
// Prepare a select statement
$sql = "SELECT id FROM Accounts WHERE Phone = ?";

if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters
mysqli_stmt_bind_param($stmt, "s", $param_phone);

// Set parameters
$param_phone = trim($_POST["phone"]);

// Attempt to execute the prepared statement
if(mysqli_stmt_execute($stmt)){
/* store result */
mysqli_stmt_store_result($stmt);

if(mysqli_stmt_num_rows($stmt) == 1){
$phone_err = "رقم الهاتف هذا مأخوذ بالفعل.";
} else{
$email = trim($_POST["phone"]);
}
} else{
$login_err = "هناك خطأ ما. الرجاء معاودة المحاولة في وقت لاحق.";
}

// Close statement
mysqli_stmt_close($stmt);
}
}

// Validate password
if(empty(trim($_POST["password"]))){
$password_err = "الرجاء كتابة كلمة المرور";
} elseif(strlen(trim($_POST["password"])) < 8){
$password_err = "يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل.";
} else{
$password = trim($_POST["password"]);
}

// Validate confirm password
if(empty(trim($_POST["confirm_password"]))){
$confirm_password_err = "الرجاء تأكيد كلمة المرور.";
} else{
$confirm_password = trim($_POST["confirm_password"]);
if(empty($password_err) && ($password != $confirm_password)){
$confirm_password_err = "لم لا تتطابق مع كلمة المرور.";
}
}

// Check input errors before inserting in database
if(empty($username_err) && empty($password_err) && empty($email_err) && empty($phone_err) && empty($confirm_password_err)){

// Prepare an insert statement


if($stmt = mysqli_prepare($link, $sql)){
// Bind variables to the prepared statement as parameters

// Set parameters
$param_username = $username;
$param_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO Accounts (Username, Email, Phone, icon, Status, Verified, password)
VALUES ('$param_username', '$param_email', '$param_phone', '', '0', '0', '$param_password')";

if ($link->query($sql) === TRUE) {
header("location: login.php");

} else{
$login_err =  "هناك خطأ ما. الرجاء معاودة المحاولة في وقت لاحق.";
}


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
<title>انشاء حساب</title>
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

<h1 class="auth-title">انشاء حساب </h1>
<p class="auth-subtitle mb-5">اهلا وسهلا بك قم في انشاء حساب لتتمكن من متابعة طلباتك ومنتجاتك</p>
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
<label><?php echo $email_err; ?></label>
<input type="email" name="email" class="form-control form-control-xl" placeholder="الايميل ">
<div class="form-control-icon">
<i class="bi bi-person"></i>
</div>
</div>


<div class="form-group position-relative has-icon-left mb-4">
<label><?php echo $phone_err; ?></label>
<input type="number" name="phone" class="form-control form-control-xl" placeholder="رقم الهاتف ">
<div class="form-control-icon">
<i class="bi bi-person"></i>
</div>
</div>
<div class="form-group position-relative has-icon-left mb-4">
<label><?php echo $password_err; ?></label>
<input type="password" name="password" class="form-control form-control-xl" placeholder="كلمة المرور">
<div class="form-control-icon">
<i class="bi bi-shield-lock"></i>
</div>
</div>
<div class="form-group position-relative has-icon-left mb-4">
<label><?php echo $confirm_password_err; ?></label>
<input type="password" name="confirm_password" class="form-control form-control-xl" placeholder=" تاكيد كلمة المرور">
<div class="form-control-icon">
<i class="bi bi-shield-lock"></i>
</div>
</div>

<button class="btn btn-primary btn-block btn-lg shadow-lg mt-5"> انشاء حساب</button>
</form>
<div class="text-center mt-5 text-lg fs-4">
<p class="text-gray-600">لديك حساب <a href="login.php"
class="font-bold">
تسجيل الدخول </a></p>

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
