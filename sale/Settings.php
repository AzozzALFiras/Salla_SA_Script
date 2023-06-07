<?php

// Developer By : Azozz ALFiras
// 2021/10/1

include "header.php";


$Alert_Class = "";
if((isset($_POST["Submit_Update"]))){

$Name_Store = $_POST["Name_Store"];
$Username   = $_POST["Username"];
$Email      = $_POST["Email"];
$Phone      = $_POST["Phone"];
$password   = $_POST["password"];



if(!empty($password)){

$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
$sql = "UPDATE Users SET Name_Store='$Name_Store', Username='$Username', Email='$Email', Phone='$Phone', password='$param_password'  WHERE id=$id_Logged";
if ($link->query($sql) === TRUE) {
$Alert_Class = "success";
$Alert_Text  = "تم تحديث معلوماتك بنجاح ...!";



$msg = "مرحبا عزيزي $Name_Store تم تحديث معلوماتك الشخصية في موقع سلة ابداع ";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,100);

// send email
mail($Email,"ابداع سلة",$msg);


} else {
$Alert_Class = "danger";
$Alert_Text  = "هناك مشكلة في تحديث معلوماتك الرجاء المحاولة لاحقا..!";

}

} else {
$sql = "UPDATE Users SET Name_Store='$Name_Store', Username='$Username', Email='$Email', Phone='$Phone'  WHERE id=$id_Logged";
if ($link->query($sql) === TRUE) {


$subject = "My subject";
$txt = "Hello world!";
$headers = "From: admin@ibda3.com" . "\r\n" .
"CC: admin@ibda3.com";

if(mail($Email,$Name_Store,$txt,$headers)){
$Alert_Class = "success";
$Alert_Text  = "تم تحديث معلوماتك بنجاح ...!";
}
} else{

$Alert_Class = "danger";
$Alert_Text  = "هناك مشكلة في تحديث معلوماتك الرجاء المحاولة لاحقا..!";

}

}
}



?>
<javascript>
<
<div id="main">

<header class="mb-3">
<a href="#" class="burger-btn d-block d-xl-none">
<i class="bi bi-justify fs-3"></i>
</a>
</header>

<div class="page-heading">
<h3>الاعدادات</h3>
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
<h4 class="card-title">اعدادات المتجر</h4>
</div>
<div class="card-content">
<div class="card-body">
<form class="form form-horizontal" method="POST">
<div class="form-body">
<div class="row">
<div class="col-md-4">
<label>الاسم</label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Name_Store" value="<?php echo $Name_Store_Logged; ?>" class="form-control" placeholder="Name" id="first-name-icon">
<div class="form-control-icon">
<i class="bi bi-person"></i>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<label>اسم المستخدم</label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Username" value="<?php echo $Username_Logged; ?>" class="form-control"
placeholder="اسم المسخدم" id="first-name-icon">
<div class="form-control-icon">
<i class="bi bi-person"></i>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<label>الايميل</label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="email" name="Email" value="<?php echo $Email_Logged; ?>" class="form-control"
placeholder="Email" id="first-name-icon">
<div class="form-control-icon">
<i class="bi bi-envelope"></i>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<label>رقم الهاتف</label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="number" name="Phone" value="<?php echo $Phone_Logged; ?>" class="form-control"
placeholder="Mobile">
<div class="form-control-icon">
<i class="bi bi-phone"></i>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<label>الباسورد</label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="password" name="password" class="form-control"
placeholder="اذا كنت لاتريد تغير كلمة السر اترك الحقل فارغ">
<div class="form-control-icon">
<i class="bi bi-lock"></i>
</div>
</div>
</div>
</div>

<div class="col-12 d-flex justify-content-end">
<button type="submit" name="Submit_Update" class="btn btn-primary me-1 mb-1">تحديث</button>

</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>


<?php

include "Footer.php";

?>
