<?php
// Developer By : Azozz ALFiras
// 2021/10/1

include "header.php";


function SupervisorsRow($String){
if($String == 1){
return "مشرف عام";
} else if($String == 2){
return "متابعة المبيعات ";
} else if($String == 3){
return "متابعة الطلبات";
} else if($String == 4){
return "تعديل التصميم ";
} else if($String == 5){
return "متابعة المنتجات ";
} else if($String == 6){
return "متابعة تعليقات العملاء";
} else if($String == 7){
return "متابعة كوبونات التخفيض";
} else if($String == 8){
return "متابعة المسوقين";
} else{
return "Unknow";
}
}


if(isset($_POST["Delete"])){
$id = $_POST["Delete"];

if($id == 1){
$Alert_Class = "danger";
$Alert_Text  = "لايمكنك حذف المشرف الاساسي ...!";
} else {
$sql = "DELETE FROM Features WHERE id=$id";

if ($link->query($sql) === TRUE) {

$Alert_Class = "success";
$Alert_Text  = " تم حذف المشرف  ...!";

} else {
$Alert_Class = "danger";
$Alert_Text  = "هناك مشكلة في حذف المشرف الرجاء المحاولة لاحقا...!";
}
}


}



?>

<div id="main">
<header class="mb-3">
<a href="#" class="burger-btn d-block d-xl-none">
<i class="bi bi-justify fs-3"></i>
</a>
</header>
<?php if($Status_Logged == 1){ ?>
<?php if((!empty($Phone_Logged) || (!empty($icon_Logged)))){?>
<div class="page-heading">
<h3>المشرفين</h3>
</div>
<div class="page-content">
<?php if(!empty($Alert_Class)){ ?>
<div class="alert alert-<?php echo $Alert_Class;?> alert-dismissible show fade">
<?php echo $Alert_Text; ?>
<button type="button" class="btn-close" data-bs-dismiss="alert"
aria-label="Close"></button>
</div>
<?php }?>

<section class="section">
<div class="card">
<div class="card-header">
المشرفين
</div>
<div class="card-body">
<table class="table table-striped" id="table1">
<thead>
<tr>
<th>id</th>
<th> اسم المستخدم </th>
<th>اسم المشرف </th>
<th>الايميل  </th>
<th> رقم الهاتف </th>
<th> صلاحية المشرف  </th>
<th>اكثر </th>
</tr>
</thead>
<tbody>

<?php
$count = 0;
$query = mysqli_query($link,"SELECT * FROM Users");
foreach($query as $row){
$count++;
?>
<tr>
<td><?php echo $row["id"]; ?></td>
<td><?php echo $row["Username"]; ?></td>
<td><?php echo $row["Name_Store"]; ?></td>
<td><?php echo $row["Email"]; ?></td>
<td><?php echo $row["Phone"]; ?></td>
<td><?php echo SupervisorsRow($row["User_Manager"]); ?></td>
<td><?php echo $row["created_at"]; ?></td>


<td>
<div class="btn-group mb-1">
<div class="dropdown">
<button class="btn btn-primary  me-1" type="button"
id="dropdownMenuButtonIcon" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg>
</button>


<div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIcon">

<button class="btn dropdown-item" >
<a <?php if($row["id"] == 1){ ?> onclick="AlertSuperV()" <?php } else { ?> href="EditSupervisor.php?id=<?php echo $row["id"]; ?>" <?php } ?>>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
تعديل المشرف
</a>
</button>

<form method="POST">

<button value="<?php echo $row["id"]; ?>" name="Delete" type="submit" class="btn dropdown-item" href="#">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
حذف المشرف
</button>

</form>
</div>
</div>
</div>
</td>
</th>
</tr>
<?php } ?>


</tbody>
</table>
</div>
</div>

</section>

</div>
<?php } else {?>

<div class="page-heading">
<h3><?php echo $Username_Logged; ?>  مرحبا يا   </h3>
<p>
يجب عليك اكمل ملعومات متجرك مثلا رقم هاتفك وايقونة متجرك للاستمرار
</p>
</div>
<div class="page-content">
<section class="row">
<div class="col-6 col-lg-4 col-md-6">
<div class="card">
<div class="card-body px-3 py-4-5">
<div class="row">
<div class="col-md-4">
<div class="stats-icon red " style="color:#fff;" >
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-gear-wide-connected" viewBox="0 0 16 16">
<path d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646.087.065-.087-.065z"/>
</svg>
</div>
</div>
<div class="col-md-8">
<h6 class="text-muted font-semibold"> اكمل بيانات المتجر </h6>
<h6 class="font-extrabold mb-0"><a href="Settings.php"> اضغط هنا </a> </h6>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
<?php }} else { ?>
<div class="page-heading">
<h3><?php echo $Username_Logged; ?>  مرحبا يا   </h3>
<p>
حسابك غير مفعل
يجب عليك دفع تكاليف الاشتراك للاستمرار في خدماتنا </p>
</div>
<div class="page-content">
<section class="row">
<div class="col-6 col-lg-4 col-md-6">
<div class="card">
<div class="card-body px-3 py-4-5">
<div class="row">
<div class="col-md-4">
<div class="stats-icon red " style="color:#fff;" >
<svg class="iconly-bold" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
<path d="M0 5a5.002 5.002 0 0 0 4.027 4.905 6.46 6.46 0 0 1 .544-2.073C3.695 7.536 3.132 6.864 3 5.91h-.5v-.426h.466V5.05c0-.046 0-.093.004-.135H2.5v-.427h.511C3.236 3.24 4.213 2.5 5.681 2.5c.316 0 .59.031.819.085v.733a3.46 3.46 0 0 0-.815-.082c-.919 0-1.538.466-1.734 1.252h1.917v.427h-1.98c-.003.046-.003.097-.003.147v.422h1.983v.427H3.93c.118.602.468 1.03 1.005 1.229a6.5 6.5 0 0 1 4.97-3.113A5.002 5.002 0 0 0 0 5zm16 5.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0zm-7.75 1.322c.069.835.746 1.485 1.964 1.562V14h.54v-.62c1.259-.086 1.996-.74 1.996-1.69 0-.865-.563-1.31-1.57-1.54l-.426-.1V8.374c.54.06.884.347.966.745h.948c-.07-.804-.779-1.433-1.914-1.502V7h-.54v.629c-1.076.103-1.808.732-1.808 1.622 0 .787.544 1.288 1.45 1.493l.358.085v1.78c-.554-.08-.92-.376-1.003-.787H8.25zm1.96-1.895c-.532-.12-.82-.364-.82-.732 0-.41.311-.719.824-.809v1.54h-.005zm.622 1.044c.645.145.943.38.943.796 0 .474-.37.8-1.02.86v-1.674l.077.018z"/>
</svg>
</div>
</div>
<div class="col-md-8">
<h6 class="text-muted font-semibold"> حسابك غير مفعل  </h6>
<h6 class="font-extrabold mb-0"><a href=""> اشتراك </a> </h6>
</div>
</div>
</div>
</div>
</div>
</section>
</div>

<?php } ?>
<script>
function AlertSuperV() {
  alert("لايمكنك التعديل علئ المشرف الاساسي");
}
</script>
<?php

include "Footer.php";

?>
