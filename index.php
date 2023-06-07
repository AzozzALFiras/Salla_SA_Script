<?php
// Developer By : Azozz ALFiras
// 2021/10/1

include "header.php"; ?>

<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="2500">
<div class="carousel-indicators">
<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 1"></button>
<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 2"></button>


</div>
<div class="carousel-inner">
<div class="carousel-item active" style="background-image: url('<?php echo $Style0; ?>')"></div>
<div class="carousel-item" style="background-image: url('<?php echo $Style1; ?>')"></div>
<div class="carousel-item" style="background-image: url('<?php echo $Style2; ?>')"></div>

</div>

</div>
</header>
<?php if(!empty($Alert_Class)){ ?>
<div class="alert alert-<?php echo $Alert_Class;?> alert-dismissible show fade">
<?php echo $Alert_Text; ?>
<button type="button" class="btn-close" data-bs-dismiss="alert"
aria-label="Close"></button>
</div>
<?php }?>
<!-- Prodcut -->
<section class="py-5">
<div class="container">
<h2 class="section-title">
<span> مع ابداع الافضل لك </span>
</h2>
<div class="row">
<?php
$count = 0;
$query = mysqli_query($link,"SELECT * FROM Sections");
foreach($query as $index => $row) {
$count++;
?>
<div class="col-12 col-md-4 i3-Col">
<a href="#">
<img class="Prodcut-Image" src="<?php echo $row["Sections_Icon"]; ?>">
</a>
</div>
<?php }?>

</div>
</div>
</section>


<!-- Prodcut -->
<section class="py-5">
<div class="container">
<h2 class="section-title">
<span> شاهد منتجاتنا </span>
</h2>
<div class="row">
<?php
$count = 0;
$query = mysqli_query($link,"SELECT * FROM Sections");
foreach($query as $index => $row) {
$count++;
?>
<div class="col-12 col-md-4 i3-Col">
<div class="product contain">
<a href="https://zmcods.com/شحن-24300-شدة/p1032842820" rel="canonical">

<img class="Product-Image" data-src="<?php echo $row["Sections_Icon"]; ?>" alt="24300 UC" src="<?php echo $row["Sections_Icon"]; ?>" >

<h5 class="product-title">
<?php echo $row["Sections_Name"]; ?>
</h5>
<p class="Product-price">
<span class="Product-price" dir="ltr"> <b style="color:#eee"> ع</b> <?php echo ArtoEnNumeric($row["Sections_Sale"]); ?>  ر.س</span>
</p>
</a>
<div class="product-footer">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<input type="hidden" name="Product-add" value="<?php echo $row["Sections_Id"]; ?>">
<button type="submit" name="Add-Card" class="Product-Add" data-product-id="<?php echo $row["Sections_Id"]; ?>" data-price="<?php echo $row["Sections_Sale"]; ?>" data-currency="SAR">
<span class="sicon-cart"></span>
<span>إضافة للسلة</span>
</button>
</form>
</div>
</div>
</div>
<?php }?>

</div>
</div>
</section>
<section class="u-light py-5 text-center">
<div class="container">
<div class="section-title">
<span>مزايا المتجر</span>
</div>

<div class="row">
<div class="col-12 col-md-4 feature-item">
<?php
$count = 0;
$query = mysqli_query($link,"SELECT * FROM Features");
foreach($query as $index => $row) {
$count++;
?>
<div class="feature-item-icon">
<i class="fa fa-<?php echo $row["Features_icon"]; ?>"></i>
</div>
<h5> <?php echo $row["Features_Title"]; ?> </h5>
<p> <?php echo $row["Features_Des"]; ?> </p>
</div>
<?php } ?>
</div>
</div>
</section>
<section class="ftco-section">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="heading-section mb-5">افضل التعاليق</h2>
</div>
<div class="col-md-12" >
<div class="featured-carousel owl-carousel">
<div class="item">
<div class="testimony-wrap d-flex">
<div class="user-img" style="background-image: url(images/person_1.jpg)">
</div>
<div class="text pl-4">
<span class="quote d-flex align-items-center justify-content-center">
<i class="ion-ios-quote"></i>
</span>
<p>من افضل المتاجر للبيع الاكواد بكل صراحة</p>
<p class="name">احمد المقدم</p>
<span class="position">مشتري</span>
</div>
</div>
</div>



</div>
</div>
</div>
</div>
</section>
<?php
include "footer.php";
?>
