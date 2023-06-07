<?php
// Developer By : Azozz ALFiras
// 2021/10/1
include "header.php";

function transpose_matrix($result1) {
$transpose = array(); //
foreach ($result1 as $key => $sub) {
foreach ($sub as $subkey => $subvalue) {
$transpose[$subkey][$key] = $subvalue;
}
}
return $transpose;
}


$Alert_Class = "";
$Show_Alert = "";
$Show_Error = "";
if((isset($_POST["Submit_Add"]))){

$TimeNow = date("Y-m-d");
$Sections   = $_POST["Sections"];
$Keys      = $_POST["Keys"];

$result1[0] = explode('
', $Keys);


foreach($result1 as $key=>$value){
foreach($value as $v){


$sql_Check = "SELECT * FROM `Keys_List`  WHERE  `Keys_Code` = '$v'";
$result_Check = mysqli_query($link, $sql_Check);

if (mysqli_num_rows($result_Check) > 0) {
while($row = mysqli_fetch_assoc($result_Check)) {
$code_found = $row["Keys_Code"];
}
} else {
$sql = "INSERT INTO Keys_List (Keys_time, Keys_Sections_id, Keys_Code)
VALUES ('$TimeNow', '$Sections', '$v')";
if ($link->query($sql) === TRUE) {
$Show_Alert = "YUP";
} else {
$Show_Error = "Error: " . $sql . "<br>" . $link->error;
}
}
}

}
}

if(!empty($Show_Alert)){
$Alert_Class = "success";
$Alert_Text  = " تم الاضافة بنجاح ...!";
} if(!empty($Show_Error)){
$Alert_Class = "danger";
$Alert_Text  = "هناك مشكلة في الاضافة الاكواد يرجئ التاكد منها بشكل جيد";
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
<h3>اضافة اكواد السلع</h3>
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
<h4 class="card-title">اضافة اكواد السلع  </h4>
</div>
<div class="card-content">
<div class="card-body">
<form class="form form-horizontal" method="POST">
<div class="form-body">
<div class="row">





<div class="col-md-4">
<label> المنتج </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<select name="Sections" class="choices form-select">
<optgroup label="المنتجات">
<?php
$count = 0;
$query = mysqli_query($link,"SELECT * FROM Sections");
foreach($query as $row){
$count++;?>
<option value="<?php echo $row["Sections_Id"]; ?>"><?php echo $row["Sections_Name"]; ?></option>
<?php } ?>
</optgroup>
</select>
</div>
<div class="form-control-icon">

</div>
</div>
</div>

<div class="col-md-4">
<label>الاكواد </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<textarea row="3" name="Keys" type="text" name="Sections_Icon" class="form-control"
placeholder="اضف اكوادك هنا" id="first-name-icon">
</textarea>

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
