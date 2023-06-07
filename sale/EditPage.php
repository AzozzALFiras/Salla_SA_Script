<?php
// Developer By : Azozz ALFiras
// 2021/10/1

include "header.php";

$Alert_Class = "";
$id = $_GET["id"];

if(isset($id)){
$Sql_User = "SELECT * FROM Pages WHERE id = '$id'";
$result = $link->query($Sql_User);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$Pages_Title = $row["Pages_Title"];
$Pages_Des = $row["Pages_Des"];

}
}


$Alert_Class = "";
if((isset($_POST["Submit_Update"]))){


$Pages_Title_Up   = $_POST["Pages_Title_Up"];
$Pages_Des      = $_POST["about"];


$sql = "UPDATE Pages SET Pages_Title='$Pages_Title_Up', Pages_Des='$Pages_Des' WHERE id=$id";
if ($link->query($sql) === TRUE) {
$Alert_Class = "success";
$Alert_Text  = "تم تحديث معلوماتك بنجاح ...!";
} else {
$Alert_Class = "danger";
$Alert_Text  = "هناك مشكلة في تحديث معلوماتك الرجاء المحاولة لاحقا..!";

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
<h3> تعديل الصفحة </h3>
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
<h4 class="card-title">تعديل الصفحة - <?php echo $Pages_Title; ?>
</h4>
</div>
<div class="card-content">
<div class="card-body">
<form class="form form-horizontal" method="POST">
<div class="form-body">
<div class="row">
<div class="col-md-4">
<label>عنوان الصفحة</label>
</div>


<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="position-relative">
<input type="text" name="Pages_Title_Up"  class="form-control" value="<?php echo $Pages_Title; ?>" placeholder="<?php echo $Pages_Title; ?>" id="first-name-icon">
<div class="form-control-icon">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
<path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
</svg>
</div>
</div>
</div>
</div>




<div class="col-md-4">
<label>وصف الصفحة </label>
</div>
<div class="col-md-8">
<div class="form-group has-icon-left">
<div class="row form-group">
<textarea id='about' name='about' ><?php echo $Pages_Des; ?></textarea><br>

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

<script type="text/javascript">



CKEDITOR.replace('about',{

width: "500px",
height: "200px"

});


</script>


<?php

include "Footer.php";

} else {
$home = "index.php";
header('Location: '.$home.'');

}

?>
