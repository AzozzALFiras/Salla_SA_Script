<?php include "header.php";

if(isset($_POST["Product_Payment"])){
$Product_Payment = $_POST["Product_Payment"];


}



 ?>
<br>
<br>
<section class="u-light py-5 text-center">
<div class="container">
<div class="section-title">
<span>الدفع  </span>
</div>



<!-- Prodcut -->
<section class="py-5">
<div class="container">
<div class="row">
<?php
$counts = 0;
$querys = mysqli_query($link,"SELECT * FROM `Sections` WHERE `Sections_Id` = '$Product_Payment'");
foreach($querys as $rows) {
$counts++;


?>
<div class="col-12 col-md-4 i3-Col">
<div class="product contain">
<a href="" rel="canonical">

<img class="Product-Image" data-src="<?php echo $rows["Sections_Icon"]; ?>" alt="24300 UC" src="<?php echo $rows["Sections_Icon"]; ?>" >

<h5 class="product-title">
<?php echo $rows["Sections_Name"]; ?>
</h5>
<p class="Product-price">
<span class="Product-price" dir="ltr"> <b style="color:#eee"> ع</b> <?php echo ArtoEnNumeric($rows["Sections_Sale"]); ?>  ر.س</span>
</p>
</a>
<div class="product-footer">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>/Payments.php" method="post">
<input type="hidden" name="Product-add" value="<?php echo $row["Product_id"]; ?>">
<button type="submit" name="Add-Card" class="Product-Add" data-product-id="<?php echo $row["Product_id"]; ?>" data-price="<?php echo $rows["Sections_Sale"]; ?>" data-currency="SAR">
<span class="sicon-cart"></span>
<span>اكمل عملية الشراء </span>
</button>
</form>
</div>
</div>
</div>
<?php }?>

</div>
</div>
</section>
</div>
</section>
<?php include "footer.php"; ?>
