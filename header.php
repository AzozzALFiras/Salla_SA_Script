<?php

// Developer By : Azozz ALFiras
// 2021/10/1

include "Config.php";


function ArtoEnNumeric($string) {
return strtr($string, array('0'=>'۰', '1'=>'۱', '2'=>'۲', '3'=>'۳', '4'=>'۴', '5'=>'۵', '6'=>'۶', '7'=>'۷', '8'=>'۸', '9'=>'۹', ));
}

if(isset($_POST["Add-Card"])){

if(!isset($_SESSION["AzLogin"]) || $_SESSION["AzLogin"] !== true){
header("location: login.php");
exit;
} else {

$Product_Add = $_POST["Product-add"];

$sql = "INSERT INTO Order_List (Username, Product_id, Product_Once, Product_Status, Product_Type, Product_Tnx)
VALUES ('$Username_Login', '$Product_Add', '1', '0', '0', '0')";
if ($link->query($sql) === TRUE) {

$Alert_Class = "success";
$Alert_Text  = "تم الاضافة الئ المشتريات";

} else {
$Alert_Class = "danger";
$Alert_Text  = "Error: " . $sql . "<br>" . $link->error;

}
}
}


$RequestOrder = "SELECT * FROM `Order_List` WHERE `Username` = '$Username_Login' AND `Product_Status` = '0' ";

if ($ActiveRes = mysqli_query($link,$RequestOrder)){

$RowActiveRes = mysqli_num_rows($ActiveRes);

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $Username_Login;?></title>
<meta charset="utf-8">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link rel="stylesheet" href="css/owl.theme.default.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style type="text/css">
.heading-section {
font-size: 28px;
color: #000;
font-family: 'Almarai', sans-serif;
}
p {
font-family: 'Almarai';
}
body,html{
font-family: 'Almarai', sans-serif;
background: #eee;
}
.bg-light{
background:#6978c7!important;
}
.navbar-light .navbar-nav .nav-link {
color: rgb(255 255 255 / 75%);
}
.navbar-light .navbar-toggler{
color: #fff;
}
.carousel-item {
height: 75vh;
min-height: 350px;
background: no-repeat center center scroll;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}


.carousel-indicators [data-bs-target] {

background-color: #6978c7;
background-clip: padding-box;
}
.Prodcut-Image {
width: 100%;
height: 100%;
left: 0;
top: 0;
-o-object-fit: cover;
object-fit: cover;
border-radius: 10px;
}
.i3-Col{
padding: 10px 25px;
}
.section-title {
padding: .27rem 1.5rem;
color: #21409a;
font-size: 20px;
font-weight: bold;

}
.section-title span {
background-color: rgb(28,95,131);
display: inline-block;
border-radius: 25px 5px 25px 5px !important;
color: #fff;
padding: 20px 25px;
}
.products-grid.eq-height .product, .products-grid.eq-height .thumbnail, .products-listing.eq-height .product, .products-listing.eq-height .thumbnail, body.salla-default #products_div.eq-height .product, body.salla-default #products_div.eq-height .thumbnail {
display: flex;
align-items: flex-start;
justify-content: flex-start;
flex-direction: column;
height: 100%;
margin: 0;
}
.salla-theme_6 .product {
background-color: #fff;
border-radius: 3px;
}
.product {
border: #6978c7 solid 2px;
border-radius: 15px!important;
}
@media (min-width: 992px)
.product {
font-size: 16px;
}
a{
text-decoration: none;
}
a:hover {
text-decoration: none;
}

.product {
font-family: 'Almarai';
border-radius: 4px;
overflow: hidden;
font-size: 15px;
-webkit-transition: all .2s ease-out;
transition: all .2s ease-out;
}
.products-grid.eq-height .product>:first-child .img-cont, .products-grid.eq-height .thumbnail>:first-child .img-cont, .products-listing.eq-height .product>:first-child .img-cont, .products-listing.eq-height .thumbnail>:first-child .img-cont, body.salla-default #products_div.eq-height .product>:first-child .img-cont, body.salla-default #products_div.eq-height .thumbnail>:first-child .img-cont {
width: 100%;
height: 100%;
flex: 1;
position: relative;
overflow: hidden;
}
.salla-theme_6 .product>a, .salla-theme_6 .product>a .img-cont, .salla-theme_6 .product>a img {
display: block;
width: 100%;
height: auto;
}
.Product-Image {
max-width: 100%;
max-height: 100%;
border-radius: 37px;
padding: 30px;
}
.product-title {
text-align: center;
color: #6978c7;
font-family: 'Almarai';
}
.Product-price {
text-align: center;
color: #2196f3;
font-family: 'Almarai';
font-size: 20px;
padding: 10px;
}
.Product-Add {
display: block;
background: #6978c7 !important;
padding-top: 5px;
margin: auto;
margin-bottom: 10px;
font-weight: bold;
border-radius: 25px 5px 25px 5px !important;
text-align: center;
color: #eee !important;
border: #eee solid 1px;
height: 35px !important;
width: 100%;
}
.salla-theme_6 .feature-item-icon {
margin: 0 0 10px;
}
.feature-item-icon {
color: #241a5a;
}
.feature-item{
margin-top: 10px;
}
.feature-item-icon {
background: #6978c7!important; /*pr */
color: #fff;
border: none !important;
width: 100% !important;
border-radius: 8px 8px 0 0 !important;
height: 45px;
margin-bottom: 0px !important;
}
.feature-item h5, .feature-item p {
margin-top: 0px !important;
color: #fff !important;
margin-bottom: 0px !important;
font-family: 'Almarai';
}
.feature-item h5 {
background: #6978c7!important; /*pr */
font-weight: 600;
margin-bottom: 8px;
height: 35px;
font-family: 'Almarai';
}
.feature-item p {
background-color: rgb(28,95,131);

border-radius: 0 0 8px 8px !important;
padding-bottom: 12px !important;
}
.feature-item h5, .feature-item p {

margin-top: 0px !important;
color: #fff !important;
margin-bottom: 0px !important;
}
.feature-item p {
font-size: 14px;
height: auto;
}
.svg-inline--fa {
display: inline-block;
font-size: inherit;
height: 3em;
overflow: visible;
vertical-align: -.125em;
color: #333;
}
i.fa {
margin: 12px;
font-size: 25px;
}
.footer-main {
background: #6978c7!important;
}
.footer-main {
background-color: #6978c7;
}
.footer-main {
background: #6978c7!important;
background-color: rgba(0, 0, 0, 0);
border-radius: 1rem 1rem 0 0 !important;
}
.footer-main {
border-top-color: var(--main-color);
}
.footer-main {
padding: 2rem 0;
color: #fff;
background-color: #2a2a2a;
}
.salla-theme_6 footer .footer-title {
border-bottom: 1px solid hsla(0,0%,100%,.1);
}
.salla-theme_6 footer .footer-links a, .salla-theme_6 footer .footer-title, .salla-theme_6 footer .footer-title span {
color: var(--main-text-color2);
}
.footer-main * {
text-align: center !important;
}
.footer-title {
padding-bottom: 1.7rem;
}
.footer-title {
color: #eee;
border-bottom: 1px solid rgba(255,255,255,.2);
padding-bottom: .7rem;
margin-bottom: 1rem;
}
.footer-title {
font-size: 15px;
margin-bottom: 10px;
color: #eee;
font-family: 'Almarai';
}
.footer-main * {
text-align: center !important;
}
.store-contact {
margin: 10px 0 0;
border: 0;
text-align: right;
font-size: 14px;
}
footer .footer-main .store-certificate {
display: none;
border-left: none;
margin: 15px 0;
justify-content: flex-start;
}
footer .store-certificate {
display: flex;
align-items: center;
justify-content: center;
flex-direction: row;
padding-left: 10px;
margin-left: 10px;
border-left: 1px solid #eee;
}
.social-item a {
color: #eee;
}
.footer-links li a {
color: #eee;
}
.modal {
position: fixed;
top: 0;
right: 0;
bottom: 0;
left: 0;
z-index: 1050;
display: none;
overflow: hidden;
-webkit-overflow-scrolling: touch;
outline: 0;
}
.salla-theme_6 footer .footer-sub {
background: #6978c7!important;
}
.salla-theme_6 footer .footer-sub {
padding: 10px 0;
}
.footer-sub {
color: #8f8f8f;
font-size: 14px;
padding: 1.75rem 0;
background: #6978c7!important;
}

}
.salla-theme_6 footer .footer-sub .fs-cont {
display: flex;
align-items: center;
justify-content: space-between;
flex-direction: row;
padding: .5rem 0;
}
.salla-theme_6 footer .footer-sub .fs-cont>* {
flex: auto;
}
.salla-theme_6 footer .footer-sub .fs-cont>* {
flex: auto;
}
.salla-theme_6 footer .footer-sub .fs-cont .icons {
display: flex;
align-items: center;
justify-content: flex-end;
flex-direction: row;
}
footer .store-certificate {
display: flex;
align-items: center;
justify-content: center;
flex-direction: row;
padding-left: 10px;
margin-left: 10px;
border-left: 1px solid #eee;
}
.salla-theme_6 footer .footer-sub .fs-cont .fs-payment img {
width: auto;
max-width: 45px;
height: auto;
max-height: 25px;
}
footer .footer-sub .footer-wrapper img, footer .footer-sub .fs-cont img {
width: unset!important;
max-width: unset!important;
height: 25px;
background: #fff;
padding: 2px 7px !important;
border-radius: 5px 5px 5px 5px;
}
.salla-theme_6 a, .salla-theme_6 button, .salla-theme_6 img {
transition: all .35s cubic-bezier(.2,1,.3,1);
}
.fs-rights {
float: right;
}
ol, ul, li {
list-style: none;
}
p.mb-4.mb-md-0 {
color: #eee;
}
.mb-4.mb-md-0 a {
color: var(--bs-gray-500);
}
.NumberOforder{
background: #205f83;
color: #eee;
padding: 5px;
border-radius: 10px 0px;
}
}


</style>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top bg-orange">
<div class="container">
<a class="navbar-brand" href="/"><img width="50" height="50" src="<?php echo $icon_Site; ?>"></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav ">
<?php
$count = 0;
$query = mysqli_query($link,"SELECT * FROM Sections");
foreach($query as $row) {
?>
<li class="nav-item">
<a class="nav-link" href="?Page=<?php echo $row["Sections_Id"] ?>"><?php echo $row["Sections_Name"]; ?></a>
</li>
<?php } ?>

</ul>
</div>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav ms-auto">
<li class="nav-item active">
<a class="nav-link" href="#">الحساب</a>
</li>
<li class="nav-item">
<a class="nav-link" href="Orders.php"> <span class="NumberOforder"><?php echo $RowActiveRes; ?></span> سلة المشتريات</a>
</li>


</ul>
</div>
</div>
</nav>

<header>
