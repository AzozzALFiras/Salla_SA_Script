<?php
// Developer By : Azozz ALFiras
// 2021/10/1

include "header.php";



$Alert_Class = "";
$Show_Alert = "";
$Show_Error = "";

if((isset($_POST["Submit_Coup"]))){


$Coupons_Code =  $_POST["Coupons_Code"];
$Coupons_Sections =  $_POST["Coupons_Sections"];
$Coupons_EndTime =  $_POST["Coupons_EndTime"];
$Coupons_Try =  $_POST["Coupons_Try"];
$Coupons_Use =  $_POST["Coupons_Use"];
$Coupons_Model =  $_POST["Coupons_Model"];
$Coupons_Number =  $_POST["Coupons_Number"];

if((empty($Coupons_Code)) || (empty($Coupons_Sections))
|| (empty($Coupons_EndTime)) || (empty($Coupons_Try))){

$Alert_Class = "danger";
$Alert_Text  = "يجب عليك ملء الحقول لتتمكن من اضافةالكوبن...!";

} else {
if($Coupons_Model == 0){
$Coupons_Sale = $Coupons_Number;
$Coupons_Percent = 0;
} else if($Coupons_Model == 1){
$Coupons_Sale = 0;
$Coupons_Percent = $Coupons_Number;
} else{

}

$items = array();
foreach($Coupons_Sections as $i => $Coupons_S3z) {
$items[] = $Coupons_S3z;
}

$AllItems  = implode("-",$items);

$time3 = "";
$time3 = str_replace("T"," ",$Coupons_EndTime);

$TimeNow = date("Y-m-d");
$sql_Check = "SELECT * FROM `Coupons_List`  WHERE  `Coupons_Code` = '$Coupons_Code'";
$result_Check = mysqli_query($link, $sql_Check);
if (mysqli_num_rows($result_Check) > 0) {
while($row = mysqli_fetch_assoc($result_Check)) {
$Alert_Class = "danger";
$Alert_Text  = "الكوبن مضاف سابقا لايمكنك اضافته من جديد...!";
}
} else {
$sql = "INSERT INTO Coupons_List (Coupons_Code, Coupons_CreateTime, Coupons_Sale, Coupons_Percent, Coupons_EndTime, Coupons_Try, Coupons_Sections, Coupons_Use)
VALUES ('$Coupons_Code', '$TimeNow', '$Coupons_Sale', '$Coupons_Percent', '$time3' , '$Coupons_Try' , '$AllItems', '$Coupons_Use')";
if ($link->query($sql) === TRUE) {

$Alert_Class = "success";
$Alert_Text  = " تم الاضافة بنجاح ...!";

} else{


$Alert_Class = "danger";
$Alert_Text  = "Error: " . $sql . "<br>" . $link->error;

}
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
<h3>اضافة كوبانات</h3>
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
<h4 class="card-title"> اضافة كوبانات  </h4>
</div>
<div class="card-content">
<div class="card-body">
<form class="form form-horizontal" method="POST">
<div class="form-body">
<div class="row">

<div class="col-md-4">
<label>الكوبن </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input  name="Coupons_Code" type="text"  class="form-control"
placeholder=" كود الكوبن ">
<div class="form-control-icon">

</div>
</div>
</div>
</div>

<div class="col-md-4">
<label> المنتجات </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<div class="form-group">
<select id="userRequest_activity" name="Coupons_Sections[]" class="choices form-select multiple-remove" multiple="multiple">
<optgroup label="المنتجات التي لايعمل معها الكوبن" >
<?php
$count = 0;
$query = mysqli_query($link,"SELECT * FROM Sections");
foreach($query as $row){
$count++;?>
<option value="<?php echo $row["Sections_Id"]; ?>"><?php echo $row["Sections_Name"]; ?></option>
<?php } ?>
</optgroup>
<optgroup label="سيعمل الكوبن مع جميع المنتجات" >
<option value="All">الجميع</option>
</optgroup>
</select>
</div>
</div>
<div class="form-control-icon">

</div>
</div>
</div>

<div class="col-md-4">
<label> تاريخ انتهاء الكوبن </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">

<div class="position-relative">
<input name="Coupons_EndTime" type="datetime-local"  class="form-control"  >
</div>
<div class="form-control-icon">

</div>
</div>
</div>
<div class="col-md-4">
<label> عدد الاشخاص المسموح    </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">

<div class="position-relative">
<input name="Coupons_Try" type="number"  class="form-control"  >
</div>
<div class="form-control-icon">
</div>
</div>
</div>

<div class="col-md-4">
<label> عدد الاستخدام الشخصي   </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">

<div class="position-relative">
<input name="Coupons_Use" type="number"  class="form-control"  >
</div>
<div class="form-control-icon">

</div>
</div>
</div>

<div class="col-md-4">
<label>نوع الخصم </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">

<div class="position-relative">
<select name="Coupons_Model" class="choices form-select">
<optgroup label="الخصم">
<option value="0">مبلغ معين</option>
<option value="1">نسبة مئوية </option>
</optgroup>
</select></div>
<div class="form-control-icon">

</div>
</div>
</div>

<div class="col-md-4">
<label>رقم الخصم   </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">

<div class="position-relative">
<input name="Coupons_Number" type="number"  class="form-control"  >
</div>
<div class="form-control-icon">

</div>
</div>
</div>

<div class="col-12 d-flex justify-content-end">
<button type="submit" name="Submit_Coup" class="btn btn-primary me-1 mb-1">اضافة</button>
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
