<?php
// Developer By : Azozz ALFiras
// 2021/10/1
include "header.php";



$Alert_Class = "";
$Show_Alert = "";
$Show_Error = "";
if((isset($_POST["Submit_Add"]))){

$Username   = $_POST["Username"];
$Email   = $_POST["Email"];
$Phone   = $_POST["Phone"];
$password   = $_POST["password"];
$User_Manager   = $_POST["User_Manager"];
$Name_Store   = $_POST["Name_Store"];

$password_Hash = password_hash($password, PASSWORD_DEFAULT);

$sql_Check = "SELECT * FROM `Users`  WHERE  `Username` = '$Username'";
$result_Check = mysqli_query($link, $sql_Check);

if (mysqli_num_rows($result_Check) > 0) {
while($row = mysqli_fetch_assoc($result_Check)) {
$code_found = $row["Username"];
}
} else {

$sql = "INSERT INTO Users (Username, Email, Phone, password, User_Manager, Name_Store, icon, Status, Sub_Time, Start_Store, End_Store, api_Token, Paypal_ClientID, Paypal_ClientSecret, Paylink_apiId, Paylink_secretKey, Style0, Style1, Style2)
VALUES ('$Username', '$Email', '$Phone', '$password_Hash', '$User_Manager', '$Name_Store', '', '1', '', '', '', '', '', '', '', '', '', '',  '')";
if ($link->query($sql) === TRUE) {
$Show_Alert = "YUP";
} else {
$Show_Error = "Error: " . $sql . "<br>" . $link->error;
}
}
}


if(!empty($Show_Alert)){
$Alert_Class = "success";
$Alert_Text  = " تم الاضافة بنجاح ...!";
} if(!empty($Show_Error)){
$Alert_Class = "danger";
$Alert_Text  = $Show_Error;
}

if(!empty($code_found)){
$Alert_Class = "danger";
$Alert_Text  = "
$code_found هناك مشكلة الكود التالي
<br>
مضاف مسبقا لديك ...!
";
}


?>

<link rel="stylesheet" href="dist/assets/vendors/choices.js/choices.min.css" />

<div id="main">

<header class="mb-3">
<a href="#" class="burger-btn d-block d-xl-none">
<i class="bi bi-justify fs-3"></i>
</a>
</header>

<div class="page-heading">
<h3>اضافة مشرف</h3>
</div>
<?php if(!empty($Alert_Class)){ ?>
<div class="alert alert-<?php echo $Alert_Class;?> alert-dismissible show fade">
<?php echo $Alert_Text; ?>
<button type="button" class="btn-close" data-bs-dismiss="alert"
aria-label="Close"></button>
</div>
<?php }?>
<div class="col-md-8 col-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">اضافة مشرف </h4>
</div>
<div class="card-content">
<div class="card-body">
<form class="form form-horizontal" method="POST">
<div class="form-body">
<div class="row">


<div class="col-md-4">
<label>اسم المشرف </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Name_Store"  class="form-control" placeholder=" اسم المشرف " id="first-name-icon">
<div class="form-control-icon">
<i class="fa fa-edit"></i>
</div>
</div>
</div>
</div>

<div class="col-md-4">
<label>اسم المستخدم </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Username"  class="form-control" placeholder=" اسم المستخدم" id="first-name-icon">
<div class="form-control-icon">
<i class="fa fa-user"></i>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<label>الايميل </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="email" name="Email"  class="form-control" placeholder=" الايميل" id="first-name-icon">
<div class="form-control-icon">
<i class="fa fa-envelope" aria-hidden="true"></i>

</div>
</div>
</div>
</div>
<div class="col-md-4">
<label>رقم الهاتف </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="number" name="Phone"  class="form-control" placeholder=" رقم الهاتف" id="first-name-icon">
<div class="form-control-icon">
<i class="fa fa-phone" aria-hidden="true"></i>
</div>
</div>
</div>
</div>

<div class="col-md-4">
<label>  كلمة السر</label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="password" name="password"  class="form-control" placeholder=" كلمة السر " id="first-name-icon">
<div class="form-control-icon">
<i class="fa fa-key" aria-hidden="true"></i>
</div>
</div>
</div>
</div>


<div class="col-md-4">
<label>صلاحية المشرف </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<select name="User_Manager" class="choices form-select">
<optgroup label="صلاحية المشرف">
<option value="1">مشرف عام</option>
<option value="2">متابعة المبيعات </option>
<option value="3">  متابعة الطلبات</option>
<option value="4">  تعديل التصميم </option>
<option value="5"> متابعة المنتجات </option>
<option value="6"> متابعة تعليقات العملاء </option>
<option value="7"> متابعة كوبونات التخفيض</option>
<option value="8">  متابعة المسوقين </option>
</optgroup>
</select>
</div>
</div>
</div>

<div class="col-12 d-flex justify-content-end">
<button type="submit" name="Submit_Add" class="btn btn-primary me-1 mb-1">اضافة</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<script src="dist/assets/vendors/choices.js/choices.min.js"></script>
<script src="dist/assets/js/pages/form-element-select.js"></script>


<?php

include "Footer.php";

?>
