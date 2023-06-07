<?php 
// Developer By : Azozz ALFiras
// 2021/10/1

include "header.php";

if(isset($_POST["remove"])){
$id_0x3 = $_POST["remove"];

$sql = "DELETE FROM Order_List WHERE id=$id_0x3";

if ($link->query($sql) === TRUE) {
} else{

}

}
// Mokeadem


$PriceCoupone = "";
$error_notfound = "";
if(isset($_POST["Coupon_Submit"])){

$Coupons_Code = $_POST["Coupons_Code"];
$TotalPrice = $_POST["PriceCoupone"];
$PriceKeys = $_POST["PriceKeys"];

$result1[0] = explode('-', $PriceKeys);



foreach($result1 as $key=>$value){
foreach($value as $v){


$sql_Check = "SELECT * FROM `Sections`  WHERE  `Sections_Id` = '$v'";
$result_Check = mysqli_query($link, $sql_Check);
if (mysqli_num_rows($result_Check) > 0) {
while($rows = mysqli_fetch_assoc($result_Check)) {


$sql = "SELECT * FROM `Coupons_List`  WHERE  `Coupons_Code` = '$Coupons_Code'";
$result = $link->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

$Coupons_Sale = $row["Coupons_Sale"];
$Coupons_Percent = $row["Coupons_Percent"];

}
}

}
}
}
}


}

/*



$sql = "SELECT * FROM `Coupons_List`  WHERE  `Coupons_Code` = '$Coupons_Code'";
$result = $link->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {

$Coupons_Sale = $row["Coupons_Sale"];
$Coupons_Percent = $row["Coupons_Percent"];

$result1[0] = explode('-', $PriceKeys);

foreach($result1 as $key=>$value){
foreach($value as $v){


$sql_Check = "SELECT * FROM `Sections`  WHERE  `Sections_Id` = '$v'";
$result_Check = mysqli_query($link, $sql_Check);

if (mysqli_num_rows($result_Check) > 0) {
while($rows = mysqli_fetch_assoc($result_Check)) {
if($Coupons_Sale != 0){

$PriceCoupone = $TotalPrice - $Coupons_Sale;

}else if($Coupons_Percent != 0){


$PriceCoupone = $TotalPrice * ((100-$Coupons_Percent) / 100);

}

}
} else {
$error_notfound = "yup";
}
}
}

*/










if(isset($_POST["plus_button"])){

$Once = $_POST["Once"];
$Price_id = $_POST["Price_id"];

$added = $Once + 1;

$sql = "UPDATE Order_List SET Product_Once='$added'  WHERE id=$Price_id";
if ($link->query($sql) === TRUE) {
} else{

}



}

if(isset($_POST["minus_button"])){
$Once = $_POST["Once"];
$Price_id = $_POST["Price_id"];

if($Once == 1){

} else {
$added = $Once - 1;

$sql = "UPDATE Order_List SET Product_Once='$added'  WHERE id=$Price_id";
if ($link->query($sql) === TRUE) {
} else{

}
}

}


?>
<br>
<br>
<?php if(!empty($yes)){?>
<div class="alert alert-danger alert-dismissible show fade">
الكوبن لايعمل مع هذا المنتج
<button type="button" class="btn-close" data-bs-dismiss="alert"
aria-label="Close"></button>
</div>
<?php  }?>
<script src="https://code.jquery.com/jquery-2.2.4.js" charset="utf-8"></script>
<style>

* {
box-sizing: border-box;
}


.shopping-cart {

background: #FFFFFF;
box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.10);
border-radius: 6px;
display: flex;
flex-direction: column;
}

.title {
height: 60px;
border-bottom: 1px solid #E1E8EE;
padding: 20px 30px;
color: #5E6977;
font-size: 18px;
font-weight: 400;
}

.item {
padding: 20px 30px;
height: 120px;
display: flex;
}

.item:nth-child(3) {
border-top:  1px solid #E1E8EE;
border-bottom:  1px solid #E1E8EE;
}

/* Buttons -  Delete and Like */
.buttons {
position: relative;
padding-top: 30px;
margin-right: 10px;
}

.delete-btn {
display: inline-block;
cursor: pointer;
width: 18px;
height: 17px;
background: url("images/delete-icn.svg") no-repeat center;
margin-right: 20px;
}



.is-active {
animation-name: animate;
animation-duration: .8s;
animation-iteration-count: 1;
animation-timing-function: steps(28);
animation-fill-mode: forwards;
}

@keyframes animate {
0%   { background-position: left;  }
50%  { background-position: right; }
100% { background-position: right; }
}

/* Product Image */
.image {
margin-right: 50px;
}

/* Product Description */
.description {
padding-top: 10px;
margin-right: 60px;
width: 115px;
}

.description span {
display: block;
font-size: 14px;
color: #43484D;
font-weight: 400;
}

.description span:first-child {
margin-bottom: 5px;
}
.description span:last-child {

font-weight: bold;
margin-top: 15px;
color: #6978c7;
font-size: 20px;
}

/* Product Quantity */
.quantity {
padding-top: 20px;
margin-right: 60px;
}
.quantity input {
-webkit-appearance: none;
border: none;
text-align: center;
width: 32px;
font-size: 16px;
color: #43484D;
font-weight: 300;
}

button[class*=btn] {
width: 30px;
height: 30px;
background-color: #E1E8EE;
border-radius: 6px;
border: none;
cursor: pointer;
}
.minus-btn img {
margin-bottom: 3px;
}
.plus-btn img {
margin-top: 2px;
}
button:focus,
input:focus {
outline:0;
}

/* Total Price */
.total-price {
width: 83px;
padding-top: 27px;
text-align: center;
font-size: 16px;
color: #43484D;
font-weight: 300;
}

/* Responsive */
@media (max-width: 800px) {
.shopping-cart {
overflow: hidden;
}
.item {
height: auto;
flex-wrap: wrap;
justify-content: center;
}
.image img {
width: 50%;
}
.image,
.quantity,
.description {
width: 100%;
text-align: center;
margin: 6px 0;
}
.buttons {
margin-right: 20px;
}
}
.Coupon_Button {
display: inline-block;
font-weight: 400;
line-height: 1.5;
color: #fff;
text-align: center;
text-decoration: none;
vertical-align: middle;
cursor: pointer;
-webkit-user-select: none;
-moz-user-select: none;
user-select: none;
background-color: #6978c7;
border: 1px solid #6978c7;
padding: 0.375 rem 0.75rem;
font-size: 1rem;
border-radius: 0.25rem;
transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>
<br>
<br>



<section class="py-5">
<div class="container">
<div class="row">

<div class="col-12 col-md-8">
<div class="shopping-cart">
<div class="title">
سلة المشتريات
</div>
<?php



$count = 0;
$query = mysqli_query($link,"SELECT * FROM `Order_List` WHERE `Username` = '$Username_Login' AND `Product_Status` = '0'");
foreach($query as $row) {
$count++;

$D0x3_id = $row["id"];
$Product_id = $row["Product_id"];
$counts = 0;
$querys = mysqli_query($link,"SELECT * FROM `Sections` WHERE `Sections_Id` = '$Product_id'");
foreach($querys as $rows) {
$counts++;



?>


<div class="item">
<div class="buttons">
<form method="post">
<button type="submit" name="remove" class="delete-btn" value="<?php echo $D0x3_id; ?>">
</button>

</form>

</div>

<div class="image">
<img class="image-card" style="width: 100%;height: 100%;border-radius: 10px;" src="<?php echo $rows["Sections_Icon"]; ?>" alt="<?php echo $rows["Sections_Icon"]; ?>" />
</div>

<div class="description">
<span><?php echo $rows["Sections_Name"]; ?></span>
</div>

<div class="quantity">
<form  method="post">
<input type="hidden" name="Price_id" value="<?php echo $D0x3_id; ?>">
<button class="plus-btn" type="submit" name="plus_button">
<img src="images/plus.svg" alt="" />
</button>
<input type="text" name="Once" value="<?php echo $row["Product_Once"]; ?>">
<button class="minus-btn" type="submit" name="minus_button">
<img src="images/minus.svg" alt="" />
</button>
</form>

</div>

<div class="total-price">

<b style="color:#fff"> ع</b> <b id="x"><?php

echo $rows["Sections_Sale"] * $row["Product_Once"];

?></b>
ر.س
<b style="color:#fff" id="y"><?php echo $rows["Sections_Sale"]; ?></b>
</div>
</div>





<?php  }}?>
</div>
</div>
<?php
$count = 0;

$grand_total = 0;
$ItemsPrice = array();
$AllPrice = "";

$query = mysqli_query($link,"SELECT * FROM `Order_List` WHERE `Username` = '$Username_Login' AND `Product_Status` = '0'");
foreach($query as $row) {
$count++;

$D0x3_id = $row["id"];
$Product_id = $row["Product_id"];


$counts = 0;

$querys = mysqli_query($link,"SELECT * FROM `Sections` WHERE `Sections_Id` = '$Product_id'");
foreach($querys as $rows) {
$counts++;

$grand_total = $grand_total + $rows["Sections_Sale"] * $row["Product_Once"];
$ItemsPrice[] = $rows["Sections_Id"];


}
}
$AllPrice = implode("-",$ItemsPrice);

?>

<aside class="col-12 col-md-4">
<div class="card mb-3">
<div class="card-body">
<form method="POST">
<div class="form-group"> <label>هل لديك كوبن ؟</label>
<div class="input-group">
<input type="text" class="form-control coupon" name="Coupons_Code" placeholder="اكتب الكوبن هنا">
<input name="PriceCoupone" value="<?php echo $grand_total; ?>" type="hidden">
<input name="PriceKeys" value="<?php echo $AllPrice; ?>" type="hidden">
<span class="input-group-append">
<button name="Coupon_Submit" type="submit" class="Coupon_Button">تطبيق</button>
</span>
</div>
</div>
</form>
</div>
</div>
<div class="card">
<div class="card-body">
<dl class="dlist-align">
<dt>السعر الكامل</dt>


<dd class="text-right text-dark b ml-3"> <b style="color:#fff;font-size: 0px;">ع</b> <strong>
<?php
if(!empty($PriceCoupone)){
echo $PriceCoupone;

} else {
echo $grand_total;
}
?>
</strong> ريال</dd>

</dl>
<?php if(!empty($PriceCoupone)){ ?>
<dl class="dlist-align">
<dt>الخصم</dt>
<dd class="text-right text-danger ml-3"><?php


if(!empty($Coupons_Sale)){
echo $Coupons_Sale;
}
if(!empty($Coupons_Percent)){
echo $Coupons_Percent."%";
}
?></dd>
</dl>
<?php } ?>
<dl class="dlist-align">
<dt>المجموع الكامل:</dt>
<dd class="text-right text-dark b ml-3"> <b style="color:#fff;font-size: 0px;">ع</b> <strong><?php
if(!empty($PriceCoupone)){
echo $PriceCoupone;

} else {
echo $grand_total;
}
?></strong> ريال</dd>

</dl>
<hr> <a href="#" class="btn btn-out btn-primary btn-square btn-main" data-abc="true"> اكمل عملية الدفع </a> <a href="#" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">الاستمرار لبوابة الدفع</a>
</div>
</div>
</aside>
</div>
</div>
</section>



<?php include "footer.php"; ?>
