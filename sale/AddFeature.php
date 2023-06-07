<?php
// Developer By : Azozz ALFiras
// 2021/10/1
include "header.php";


$Alert_Class = "";
if((isset($_POST["Submit_Add"]))){

$Features_Title   = $_POST["Features_Title"];
$Features_Des      = $_POST["Features_Des"];
$Features_icon      = $_POST["Features_icon"];


$sql = "INSERT INTO Features (Features_Title, Features_Des, Features_icon)
VALUES ('$Features_Title', '$Features_Des', '$Features_icon')";
if ($link->query($sql) === TRUE) {

$Alert_Class = "success";
$Alert_Text  = " تم الاضافة بنجاح ...!";

} else{


$Alert_Class = "danger";
$Alert_Text  = "Error: " . $sql . "<br>" . $link->error;

}

}




?>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<div id="main">

<header class="mb-3">
<a href="#" class="burger-btn d-block d-xl-none">
<i class="bi bi-justify fs-3"></i>
</a>
</header>

<div class="page-heading">
<h3> اضافة ميزة</h3>
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
<h4 class="card-title"> اضافة ميزة </h4>
</div>
<div class="card-content">
<div class="card-body">
<form class="form form-horizontal" method="POST">
<div class="form-body">
<div class="row">
<div class="col-md-4">
<label>العنوان </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Features_Title"  class="form-control" placeholder=" العنوان" id="first-name-icon">
<div class="form-control-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
<path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
</svg>
</div>
</div>
</div>
</div>






<div class="col-md-4">
<label> الوصف </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Features_Des"  class="form-control"
placeholder="الوصف  " id="first-name-icon">
<div class="form-control-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-back" viewBox="0 0 16 16">
<path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H2z"/>
</svg>
</div>
</div>
</div>
</div>

<div class="col-md-4">
<label> الايقونة </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<p>ملاحظة يجب وضع فقط عنوان الايقونة</p>
<div class="position-relative">
<input type="text" name="Features_icon"  class="form-control"
placeholder="الايقونة" id="first-name-icon">
<div class="form-control-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
<path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
<path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
</svg>
</div>
</div>
</div>
<p> يمكنك جلب الايقونات من الموقع التالي</p> <a target="_blank" href="https://fontawesome.com/v4.7/icons/"> fontawesome.com </a>
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




<?php

include "Footer.php";

?>
