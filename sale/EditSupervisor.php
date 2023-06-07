<?php
// Developer By : Azozz ALFiras
// 2021/10/1

include "header.php";


$getid = $_GET["id"];

if(isset($getid)){
$sql_Check = "SELECT * FROM `Users`  WHERE  `id` = '$getid'";
$result_Check = mysqli_query($link, $sql_Check);

if (mysqli_num_rows($result_Check) > 0) {
while($row = mysqli_fetch_assoc($result_Check)) {

$Username   = $row["Username"];
$Email   = $row["Email"];
$Phone   = $row["Phone"];
$User_Manager   = $row["User_Manager"];
$Name_Store   = $row["Name_Store"];

}
}
}

$Alert_Class = "";
$Show_Alert = "";
$Show_Error = "";
if((isset($_POST["Submit_Update"]))){

$Username_Up   = $_POST["Username"];
$Email_Up   = $_POST["Email"];
$Phone_Up   = $_POST["Phone"];
$password_Up   = $_POST["password"];
$User_Manager_Up   = $_POST["User_Manager"];
$Name_Store_Up   = $_POST["Name_Store"];

if(!empty($password_Up)){
$password_Hash = password_hash($password_Up, PASSWORD_DEFAULT);

$sql = "UPDATE Users SET Username='$Username_Up', Email='$Email_Up' , User_Manager='$User_Manager_Up' , Phone='$Phone_Up' , password='$password_Hash' , Name_Store='$Name_Store_Up' WHERE id=$getid";
if ($link->query($sql) === TRUE) {
$Alert_Class = "success";
$Alert_Text  = "تم تحديث معلوماتك بنجاح ...!";
} else {
$Alert_Class = "danger";
$Alert_Text  = "هناك مشكلة في تحديث معلوماتك الرجاء المحاولة لاحقا..!";

}

} else {

$sql = "UPDATE Users SET Username='$Username_Up', Email='$Email_Up' , User_Manager='$User_Manager_Up' , Phone='$Phone_Up', Name_Store='$Name_Store_Up' WHERE id=$getid";
if ($link->query($sql) === TRUE) {
$Alert_Class = "success";
$Alert_Text  = "تم تحديث معلوماتك بنجاح ...!";
} else {
$Alert_Class = "danger";
$Alert_Text  = "هناك مشكلة في تحديث معلوماتك الرجاء المحاولة لاحقا..!";

}

}

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
<h3>تعديل المشرف </h3>
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
<h4 class="card-title">تعديل المشرف - <?php echo $Name_Store; ?>  </h4>
</div>
<div class="card-content">
<div class="card-body">
<form class="form form-horizontal" method="POST">
<div class="form-body">
<div class="row">


<div class="col-md-4">
<label>اسم المشرف   </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Name_Store" value="<?php echo $Name_Store; ?>"  class="form-control" placeholder="<?php echo $Name_Store; ?> " id="first-name-icon">
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
<input type="text" name="Username"  value="<?php echo $Username; ?>" class="form-control" placeholder="<?php echo $Username; ?>" id="first-name-icon">
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
<input type="email" name="Email" value="<?php echo $Email; ?>" class="form-control" placeholder=" <?php echo $Email; ?>" id="first-name-icon">
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
<input type="number" name="Phone"  class="form-control" value="<?php echo $Phone; ?>" placeholder="<?php echo $Phone; ?>" id="first-name-icon">
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
<input type="password" name="password"  class="form-control" placeholder=" اذا كنت لاتريد تغير كلمة السر اترك الحقل فارغ " id="first-name-icon">
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

<?php if($User_Manager ==1){ ?>

<option value="1">مشرف عام</option>
<option value="2">متابعة المبيعات </option>
<option value="3">  متابعة الطلبات</option>
<option value="4">  تعديل التصميم </option>
<option value="5"> متابعة المنتجات </option>
<option value="6"> متابعة تعليقات العملاء </option>
<option value="7"> متابعة كوبونات التخفيض</option>
<option value="8">  متابعة المسوقين </option>

<?php } else if($User_Manager ==2){?>

<option value="2">متابعة المبيعات </option>
<option value="1">مشرف عام</option>
<option value="3">  متابعة الطلبات</option>
<option value="4">  تعديل التصميم </option>
<option value="5"> متابعة المنتجات </option>
<option value="6"> متابعة تعليقات العملاء </option>
<option value="7"> متابعة كوبونات التخفيض</option>
<option value="8">  متابعة المسوقين </option>
<?php } else if($User_Manager ==3){?>
<option value="3">  متابعة الطلبات</option>
<option value="1">مشرف عام</option>
<option value="2">متابعة المبيعات </option>
<option value="4">  تعديل التصميم </option>
<option value="5"> متابعة المنتجات </option>
<option value="6"> متابعة تعليقات العملاء </option>
<option value="7"> متابعة كوبونات التخفيض</option>
<option value="8">  متابعة المسوقين </option>
<?php } else if($User_Manager ==4){?>
<option value="4">  تعديل التصميم </option>
<option value="1">مشرف عام</option>
<option value="2">متابعة المبيعات </option>
<option value="3">  متابعة الطلبات</option>
<option value="5"> متابعة المنتجات </option>
<option value="6"> متابعة تعليقات العملاء </option>
<option value="7"> متابعة كوبونات التخفيض</option>
<option value="8">  متابعة المسوقين </option>
<?php } else if($User_Manager ==5){?>
<option value="5"> متابعة المنتجات </option>
<option value="1">مشرف عام</option>
<option value="2">متابعة المبيعات </option>
<option value="3">  متابعة الطلبات</option>
<option value="4">  تعديل التصميم </option>
<option value="6"> متابعة تعليقات العملاء </option>
<option value="7"> متابعة كوبونات التخفيض</option>
<option value="8">  متابعة المسوقين </option>
<?php } else if($User_Manager ==6){?>
<option value="6"> متابعة تعليقات العملاء </option>
<option value="1">مشرف عام</option>
<option value="2">متابعة المبيعات </option>
<option value="3">  متابعة الطلبات</option>
<option value="4">  تعديل التصميم </option>
<option value="5"> متابعة المنتجات </option>
<option value="7"> متابعة كوبونات التخفيض</option>
<option value="8">  متابعة المسوقين </option>
<?php } else if($User_Manager ==7){?>
<option value="7"> متابعة كوبونات التخفيض</option>
<option value="1">مشرف عام</option>
<option value="2">متابعة المبيعات </option>
<option value="3">  متابعة الطلبات</option>
<option value="4">  تعديل التصميم </option>
<option value="5"> متابعة المنتجات </option>
<option value="6"> متابعة تعليقات العملاء </option>
<option value="8">  متابعة المسوقين </option>
<?php } else if($User_Manager ==8){?>
<option value="8">  متابعة المسوقين </option>
<option value="1">مشرف عام</option>
<option value="2">متابعة المبيعات </option>
<option value="3">  متابعة الطلبات</option>
<option value="4">  تعديل التصميم </option>
<option value="5"> متابعة المنتجات </option>
<option value="6"> متابعة تعليقات العملاء </option>
<option value="7"> متابعة كوبونات التخفيض</option>
<?php } else {?>
<option value="1">مشرف عام</option>
<option value="2">متابعة المبيعات </option>
<option value="3">  متابعة الطلبات</option>
<option value="4">  تعديل التصميم </option>
<option value="5"> متابعة المنتجات </option>
<option value="6"> متابعة تعليقات العملاء </option>
<option value="7"> متابعة كوبونات التخفيض</option>
<option value="8">  متابعة المسوقين </option>
<?php }?>
</optgroup>
</select>
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

<script src="dist/assets/vendors/choices.js/choices.min.js"></script>
<script src="dist/assets/js/pages/form-element-select.js"></script>


<?php

include "Footer.php";

?>
