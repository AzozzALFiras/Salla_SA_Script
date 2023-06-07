<?php
// Developer By : Azozz ALFiras
// 2021/10/1

include "header.php";

?>

<div id="main">
<header class="mb-3">
<a href="#" class="burger-btn d-block d-xl-none">
<i class="bi bi-justify fs-3"></i>
</a>
</header>




<?php if( (empty($Paypal_ClientID)) && (empty($Paypal_ClientSecret)) && (empty($Paylink_apiId)) && (empty($Paylink_secretKey))){ ?>
<div class="alert alert-danger alert-dismissible show fade">
<?php echo $Name_Store_Logged ?> مرحبا يا
<p>
انت لم تضيف اي بوابة دفع لذا لايمكن عرض سعلك الرقمية يجب عليك اضافة بوابة واحدة علئ الاقل
</p>

<button type="button" class="btn-close" data-bs-dismiss="alert"
aria-label="Close"></button>
</div>
<?php } ?>
<?php if($Status_Logged == 1){ ?>
<?php if((!empty($Phone_Logged) || (!empty($icon_Logged)))){?>
<div class="page-heading">
<h3>الاحصائيات</h3>
</div>
<div class="page-content">
<section class="row">
<div class="col-12 col-lg-12">
<div class="row">
<div class="col-6 col-lg-4 col-md-6">
<div class="card">
<div class="card-body px-3 py-4-5">
<div class="row">
<div class="col-md-4">
<div class="stats-icon purple">
<i class="iconly-boldShow"></i>
</div>
</div>
<div class="col-md-8">
<h6 class="text-muted font-semibold">مشاهدات الموقع  </h6>
<h6 class="font-extrabold mb-0">112.000</h6>
</div>
</div>
</div>
</div>
</div>
<div class="col-6 col-lg-4 col-md-6">
<div class="card">
<div class="card-body px-3 py-4-5">
<div class="row">
<div class="col-md-4">
<div class="stats-icon blue" style="color:#fff;">
<svg class="iconly-bold"  xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
<path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
</div>
</div>
<div class="col-md-8">
<h6 class="text-muted font-semibold">الاقسام </h6>
<h6 class="font-extrabold mb-0">18</h6>
</div>
</div>
</div>
</div>
</div>


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
<h6 class="text-muted font-semibold">السلع الرقمية </h6>
<h6 class="font-extrabold mb-0">802</h6>
</div>
</div>
</div>
</div>
</div>


<div class="col-6 col-lg-4 col-md-6">
<div class="card">
<div class="card-body px-3 py-4-5">
<div class="row">
<div class="col-md-4">
<div class="stats-icon secondary " style="color:#fff;" >
<svg class="iconly-bold" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-dash-fill" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z"/>
</svg>
</div>
</div>
<div class="col-md-8">
<h6 class="text-muted font-semibold">المبيعات الكلية </h6>
<h6 class="font-extrabold mb-0">80</h6>
</div>
</div>
</div>
</div>
</div>

<div class="col-6 col-lg-4 col-md-6">
<div class="card">
<div class="card-body px-3 py-4-5">
<div class="row">
<div class="col-md-4">
<div class="stats-icon secondary " style="color:#fff; background-color: #201ea0;" >
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
<path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
</svg>
</div>
</div>
<div class="col-md-8">
<h6 class="text-muted font-semibold">الكوبنات الكلية  </h6>
<h6 class="font-extrabold mb-0">100</h6>
</div>
</div>
</div>
</div>
</div>

<div class="col-6 col-lg-4 col-md-6">
<div class="card">
<div class="card-body px-3 py-4-5">
<div class="row">
<div class="col-md-4">
<div class="stats-icon secondary " style="color:#fff;background-color: #0b8cbd;" >
<svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
<path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
<path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
</svg>


</div>
</div>
<div class="col-md-8">
<h6 class="text-muted font-semibold" style="font-size: 15px;">الكوبنات المستخدمة  </h6>
<h6 class="font-extrabold mb-0">80</h6>
</div>
</div>
</div>
</div>
</div>

<div class="col-6 col-lg-4 col-md-6">
<div class="card">
<div class="card-body px-3 py-4-5">
<div class="row">
<div class="col-md-4">
<div class="stats-icon secondary " style="color:#fff;background-color: #212d42;" >
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg>
</div>
</div>
<div class="col-md-8">
<h6 class="text-muted font-semibold" style="font-size: 13px;">الكوبنات الغير مستخدمة  </h6>
<h6 class="font-extrabold mb-0">80</h6>
</div>
</div>
</div>
</div>
</div>
</div>

</div>

</section>

<section class="section">
<div class="card">
<div class="card-header">
السلع الرقمية
</div>
<div class="card-body">
<table class="table table-striped" id="table1">
<thead>
<tr>
<th>رقم الطلب</th>
<th> اسم السلعة</th>
<th>الكود</th>
<th>معلومات المشتري</th>
<th>تاريخ الاضافة </th>
<th>الحالة</th>
<th>اكثر </th>
</tr>
</thead>
<tbody>
<?php



$count = 0;
$query = mysqli_query($link,"SELECT * FROM Keys_List");
foreach($query as $row){
$count++;
?>

<tr>
<td>#<?php echo $row["Keys_id"]; ?> </td>
<td><?php

$Keys_Sections_id = $row["Keys_Sections_id"];
$sql_Check = "SELECT * FROM `Sections`  WHERE  `Sections_Id` = '$Keys_Sections_id'";
$result_Check = mysqli_query($link, $sql_Check);
if (mysqli_num_rows($result_Check) > 0) {
while($rowid = mysqli_fetch_assoc($result_Check)) {
echo $rowid["Sections_Name"];


}
}
?>
</td>
<td>
<?php
$codeList = $row["Keys_Code"];

?>
<button class="btn"  onclick="CopyJS('<?php echo $codeList; ?>')">
<?php echo $row["Keys_Code"]; ?>
</button>
<script type="text/javascript">

function CopyJS(TextToCopy) {
var TempText = document.createElement("input");
TempText.value = TextToCopy;
document.body.appendChild(TempText);
TempText.select();

document.execCommand("copy");
document.body.removeChild(TempText);

alert("تم نسخ الكود التالي " + TempText.value);
}
</script>
</td>
<td>
<?php if(!empty($row["Status"])){ ?>
<button type="button" class="btn btn-outline-success"
data-bs-toggle="modal" data-bs-target="#success<?php echo $row["Keys_id"];?>">
مشاهدة
</button>
<?php } else { ?>
<span class="badge bg-danger">
غير مباع
</span>
<?php } ?>



<div class="modal fade text-left" id="success<?php echo $row["Keys_id"];?>" tabindex="-1"
role="dialog" aria-labelledby="myModalLabel110"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
role="document">
<div class="modal-content">
<div class="modal-header bg-success">
<h5 class="modal-title white" id="myModalLabel110">
<?php echo $row["Keys_Code"]; ?> -
تفاصيل مشتري الكود التالي
</h5>
<button style="color: #fff;" type="button" class="close"
data-bs-dismiss="modal" aria-label="Close">
<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-down-right" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M8.636 12.5a.5.5 0 0 1-.5.5H1.5A1.5 1.5 0 0 1 0 11.5v-10A1.5 1.5 0 0 1 1.5 0h10A1.5 1.5 0 0 1 13 1.5v6.636a.5.5 0 0 1-1 0V1.5a.5.5 0 0 0-.5-.5h-10a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h6.636a.5.5 0 0 1 .5.5z"/>
<path fill-rule="evenodd" d="M16 15.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L6.146 6.854a.5.5 0 1 1 .708-.708L15 14.293V10.5a.5.5 0 0 1 1 0v5z"/>
</svg>
</button>
</div>
<div class="modal-body">
<p>#<?php echo $row["Keys_id"]; ?> </p>

<?php

$User_Sale = $row["User_Sale"];
$sql_User_Sale = "SELECT * FROM `Users`  WHERE  `Username` = '$User_Sale'";
$result_User_Sale = mysqli_query($link, $sql_User_Sale);

if (mysqli_num_rows($result_User_Sale) > 0) {
while($rowSale = mysqli_fetch_assoc($result_User_Sale)) {

$Username__ = $rowSale["Username"];
$Email__ = $rowSale["Email"];
$Phone__ = $rowSale["Phone"];
}
}
$CopyJS = "$Username__ \n
$Email__
";
?>

<p> <?php echo $Username__;  ?> </p>
<p> <?php echo $Email__; ?> </p>
<p> <?php echo $Phone__; ?> </p>
<p>  <?php echo $row["Date_Sale"]; ?> </p>
<p> <?php echo $row["Methed_Sale"]; ?> </p>
<p>
<?php if($row["Methed_Sale"] == "PayPal"){  ?>
<?php echo $row["Thx_Sale"]; ?>
<?php } else { ?>
<a target="_blank" href="<?php echo $row["Thx_Sale"]; ?>">
رابط الفاتورة
</a>
<?php }?>
</p>


</div>
<div class="modal-footer">

<a href="https://api.whatsapp.com/send/?phone=<?php echo $Phone__; ?>&text=<?php


$id_request = $row["Keys_id"];
$key_request = $row["Keys_Code"];

echo "
مرحبا $Username__ -

تم شراء منتج التالي  : $Sections_Name -

رقم الطلب : $id_request -

الكود : $key_request - موقع ابداع

";
?>" target="_blank" class="btn btn-success ml-1">
<i class="bx bx-check d-block d-sm-none"></i>
<span class="d-none d-sm-block">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
<path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
</svg>
تواصل مع المشتري</span>
</a>

<?php
$codeList = $row["Keys_Code"];

?>

<button  type="button" onclick="CopyMe('<?php echo $codeList; ?>')" class="btn btn-dark ml-1" data-bs-dismiss="modal">
<i class="bx bx-check d-block d-sm-none"></i>
<span class="d-none d-sm-block CopyJS">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
</svg>

نسخ</span>
</button>




<button type="button"
class="btn btn-light-secondary"
data-bs-dismiss="modal">
<i class="bx bx-x d-block d-sm-none"></i>
<span class="d-none d-sm-block">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-down-right" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M8.636 12.5a.5.5 0 0 1-.5.5H1.5A1.5 1.5 0 0 1 0 11.5v-10A1.5 1.5 0 0 1 1.5 0h10A1.5 1.5 0 0 1 13 1.5v6.636a.5.5 0 0 1-1 0V1.5a.5.5 0 0 0-.5-.5h-10a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h6.636a.5.5 0 0 1 .5.5z"/>
<path fill-rule="evenodd" d="M16 15.5a.5.5 0 0 1-.5.5h-5a.5.5 0 0 1 0-1h3.793L6.146 6.854a.5.5 0 1 1 .708-.708L15 14.293V10.5a.5.5 0 0 1 1 0v5z"/>
</svg>
آغلاق</span>
</button>
</div>
</div>
</div>
</div>


</td>
<td><?php echo $row["Keys_time"]; ?></td>

<?php if(!empty($row["Status"])){
$Clas_Css = "success";
$Class_Text = "مباع";
} else {
$Clas_Css = "danger";
$Class_Text = "غير مباع";
}?>

<td><span class="badge bg-<?php echo $Clas_Css; ?>">
<?php echo $Class_Text; ?>
</span></td>
<td>
<div class="btn-group mb-1">
<div class="dropdown">
<button class="btn btn-primary  me-1" type="button"
id="dropdownMenuButtonIcon" data-bs-toggle="dropdown"
aria-haspopup="true" aria-expanded="false">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg>
</button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIcon">
<button class="btn dropdown-item" onclick="<?php echo $row["Keys_Code"]; ?>()">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
</svg>
نسخ الكود

<script type="text/javascript">
function <?php echo $row["Keys_Code"]; ?>(){
navigator.clipboard.writeText('<?php echo $row["Keys_Code"]; ?>');
alert("تم نسخ الكود التالي :  <?php echo $row['Keys_Code']; ?>" );

}
</script>
</button>
<button class="btn dropdown-item" href="#">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
حذف الكود
</button>


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

<?php

include "Footer.php";

?>
