<?php
// Developer By : Azozz ALFiras
// 2021/10/1

include "header.php";


$Alert_Class = "";

if(isset($_POST["Myfatoorah_Update"])){

$Myfatoorah_token_Up = $_POST["Myfatoorah_token"];

$sql = "UPDATE Users SET Myfatoorah_token='$Myfatoorah_token_Up'  WHERE id=$id_Logged";
if ($link->query($sql) === TRUE) {

$Alert_Class = "success";
$Alert_Text  = "تم تحديث معلوماتك بنجاح ...!";

} else{

$Alert_Class = "danger";
$Alert_Text  = "هناك مشكلة في تحديث معلوماتك الرجاء المحاولة لاحقا..!";

}

}
if((isset($_POST["PayLink_Update"]))){


$Paylink_apiId_Up = $_POST["Paylink_apiId"];
$Paylink_secretKey_Up   = $_POST["Paylink_secretKey"];

$sql = "UPDATE Users SET Paylink_apiId='$Paylink_apiId_Up', Paylink_secretKey='$Paylink_secretKey_Up'  WHERE id=$id_Logged";
if ($link->query($sql) === TRUE) {

$Alert_Class = "success";
$Alert_Text  = "تم تحديث معلوماتك بنجاح ...!";

} else{

$Alert_Class = "danger";
$Alert_Text  = "هناك مشكلة في تحديث معلوماتك الرجاء المحاولة لاحقا..!";

}

}

if((isset($_POST["Paypal_Update"]))){


$Paypal_ClientID_Up = $_POST["Paypal_ClientID"];
$Paypal_ClientSecret_Up   = $_POST["Paypal_ClientSecret"];

$sql = "UPDATE Users SET Paypal_ClientSecret='$Paypal_ClientSecret_Up', Paypal_ClientID='$Paypal_ClientID_Up'  WHERE id=$id_Logged";
if ($link->query($sql) === TRUE) {

$Alert_Class = "success";
$Alert_Text  = "تم تحديث معلوماتك بنجاح ...!";

} else{

$Alert_Class = "danger";
$Alert_Text  = "هناك مشكلة في تحديث معلوماتك الرجاء المحاولة لاحقا..!";

}

}




?>

<div id="main">
<header class="mb-3">
<a href="#" class="burger-btn d-block d-xl-none">
<i class="bi bi-justify fs-3"></i>
</a>
</header>
<div class="row">
<div class="page-heading">
<h3>اعدادات بوابة الدفع</h3>
</div>
<?php if(empty($Paypal_ClientID)){ ?>
<div class="alert alert-danger alert-dismissible show fade">
ملاحظة : لايمكنك تفعيل بوابة الدفع عبر البايبال الا اذا كان حسابك تجاري فقط...!
<button type="button" class="btn-close" data-bs-dismiss="alert"
aria-label="Close"></button>
</div>
<?php }?>
<?php if(!empty($Alert_Class)){ ?>
<div class="alert alert-<?php echo $Alert_Class;?> alert-dismissible show fade">
<?php echo $Alert_Text; ?>
<button type="button" class="btn-close" data-bs-dismiss="alert"
aria-label="Close"></button>
</div>
<?php }?>
<div class="col-md-6 col-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">PayLink -
<button type="button" class="btn btn-outline" data-bs-toggle="modal"
data-bs-target="#ShowInfoPayLink">
الحصول علئ البياناتا
</button>
</h4>
</div>
<div class="card-content">
<div class="card-body">
<form class="form form-horizontal" method="POST">
<div class="form-body">
<div class="row">
<div class="col-md-4">
<label>ApiId</label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Paylink_apiId" value="<?php echo $Paylink_apiId; ?>" class="form-control" placeholder="ApiId" id="first-name-icon">
<div class="form-control-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
<path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
<path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
</svg>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<label>SecretKey</label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Paylink_secretKey" value="<?php echo $Paylink_secretKey; ?>" class="form-control"
placeholder="SecretKey" id="first-name-icon">
<div class="form-control-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
<path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
<path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
</svg>
</div>
</div>
</div>
</div>



<div class="col-12 d-flex justify-content-end">
<button type="submit" name="PayLink_Update" class="btn btn-success me-1 mb-1">تحديث</button>

</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>


<div class="col-md-6 col-12">
<div class="card">
<div class="card-header">

<h4 class="card-title">Paypal - <a target="_blank" href="https://developer.paypal.com/webapps/developer/applications/myapps"> الحصول علئ معلوماتك من هنا</a>  </h4>
</div>
<div class="card-content">
<div class="card-body">
<form class="form form-horizontal" method="POST">
<div class="form-body">
<div class="row">
<div class="col-md-4">
<label>ClientID</label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Paypal_ClientID" value="<?php echo $Paypal_ClientID; ?>" class="form-control" placeholder="ClientID" id="first-name-icon">
<div class="form-control-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
<path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
<path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
</svg>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<label>ClientSecret</label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Paypal_ClientSecret" value="<?php echo $Paypal_ClientSecret; ?>" class="form-control"
placeholder="ClientSecret" id="first-name-icon">
<div class="form-control-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
<path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
<path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
</svg>
</div>
</div>
</div>
</div>



<div class="col-12 d-flex justify-content-end">
<button type="submit" name="Paypal_Update" class="btn btn-success me-1 mb-1">

تحديث

</button>

</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>





<div class="col-md-6 col-12">
<div class="card">
<div class="card-header">

<h4 class="card-title"> MyFatoorah </h4>
</div>
<div class="card-content">
<div class="card-body">
<form class="form form-horizontal" method="POST">
<div class="form-body">
<div class="row">
<div class="col-md-4">
<label>Token Api</label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Myfatoorah_token" value="<?php echo $Myfatoorah_token; ?>" class="form-control" placeholder="Token Api" id="first-name-icon">
<div class="form-control-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-check" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
<path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
<path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
</svg>
</div>
</div>
</div>
</div>

<div class="col-12 d-flex justify-content-end">
<button type="submit" name="Myfatoorah_Update" class="btn btn-success me-1 mb-1">

تحديث

</button>

</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="ShowInfoPayLink" tabindex="-1" role="dialog"
aria-labelledby="ShowInfoPayLinkTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="ShowInfoPayLinkTitle">
افتح حسابك ثم الاعدادات كما موضح في الصورة
</h5>
<button type="button" class="close" data-bs-dismiss="modal"
aria-label="Close">
<i data-feather="x"></i>
</button>
</div>
<div class="modal-body">
<img class="card-img-top img-fluid" src="https://developer.paylink.sa/assets/img/API%20Settings.png">

</div>
<div class="modal-footer">
<a href="https://my.paylink.sa/" target="_blank"  class="btn btn-dark ml-1">
<i class="bx bx-check d-block d-sm-none"></i>
<span class="d-none d-sm-block">فتح الموقع</span>
</a>
<button type="button" class="btn btn-primary ml-1"
data-bs-dismiss="modal">
<i class="bx bx-check d-block d-sm-none"></i>
<span class="d-none d-sm-block">اغلاق</span>
</button>
</div>
</div>
</div>
</div>

<?php

include "Footer.php";

?>
