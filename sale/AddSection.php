<?php
// Developer By : Azozz ALFiras
// 2021/10/1
include "header.php";


$Alert_Class = "";
if((isset($_POST["Submit_Add"]))){

$Sections_CreateTime = date("Y-m-d");
$Sections_Name   = $_POST["Sections_Name"];
$Sections_Des      = $_POST["about"];
$Sections_Icon      = $_POST["Sections_Icon"];
$Sections_Sale   = $_POST["Sections_Sale"];




$sql = "INSERT INTO Sections (Sections_CreateTime, Sections_Name, Sections_Des, Sections_Icon, Sections_Sale)
VALUES ('$Sections_CreateTime', '$Sections_Name', '$Sections_Des', '$Sections_Icon', '$Sections_Sale')";
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
<h3>اضافة منتج</h3>
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
<h4 class="card-title">اضافة منتج </h4>
</div>
<div class="card-content">
<div class="card-body">
<form class="form form-horizontal" method="POST">
<div class="form-body">
<div class="row">
<div class="col-md-4">
<label>اسم المنتج</label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Sections_Name"  class="form-control" placeholder="اسم المنتج" id="first-name-icon">
<div class="form-control-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
<path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
</svg>
</div>
</div>
</div>
</div>




<div class="col-md-4">
<label> سعر الكود</label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Sections_Sale"  class="form-control"
placeholder="سعر الكود " id="first-name-icon">
<div class="form-control-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-dollar" viewBox="0 0 16 16">
<path d="M4 10.781c.148 1.667 1.513 2.85 3.591 3.003V15h1.043v-1.216c2.27-.179 3.678-1.438 3.678-3.3 0-1.59-.947-2.51-2.956-3.028l-.722-.187V3.467c1.122.11 1.879.714 2.07 1.616h1.47c-.166-1.6-1.54-2.748-3.54-2.875V1H7.591v1.233c-1.939.23-3.27 1.472-3.27 3.156 0 1.454.966 2.483 2.661 2.917l.61.162v4.031c-1.149-.17-1.94-.8-2.131-1.718H4zm3.391-3.836c-1.043-.263-1.6-.825-1.6-1.616 0-.944.704-1.641 1.8-1.828v3.495l-.2-.05zm1.591 1.872c1.287.323 1.852.859 1.852 1.769 0 1.097-.826 1.828-2.2 1.939V8.73l.348.086z"/>
</svg>
</div>
</div>
</div>
</div>

<div class="col-md-4">
<label>وصف المنتج </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="row form-group">
  <textarea id='about' name='about' ></textarea><br>

</div>
</div>
</div>
<div class="col-md-4">
<label>ايقونة المنتج</label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Sections_Icon" class="form-control"
placeholder="ايقونة المنتج" id="first-name-icon">
<div class="form-control-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-image" viewBox="0 0 16 16">
<path d="M8.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
<path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v8l-2.083-2.083a.5.5 0 0 0-.76.063L8 11 5.835 9.7a.5.5 0 0 0-.611.076L3 12V2z"/>
</svg>
</div>
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

<script type="text/javascript">



CKEDITOR.replace('about',{

width: "500px",
height: "200px"

});


</script>


<?php

include "Footer.php";

?>
