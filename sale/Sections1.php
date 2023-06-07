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
<?php if($Status_Logged == 1){ ?>
<?php if((!empty($Phone_Logged) || (!empty($icon_Logged)))){?>
<div class="page-heading">
<h3>الاقسام</h3>
</div>



<div class="card-header">
الاقسام
</div>

<section id="content-types">
<div class="row">


  <?php
  $count = 0;
  $query = mysqli_query($link,"SELECT * FROM Sections");
  foreach($query as $row){
  $count++;
  ?>
  <div class="col-md-6 col-sm-12">
  <div class="card">
  <div class="card-content">
  <img class="card-img-top img-fluid" src="<?php echo $row["Sections_Icon"]; ?>"
  alt="Card image cap" style="height: 20rem" />
  <div class="card-body">
  <h4 class="card-title"><?php echo $row["Sections_Name"]; ?></h4>
  <p class="card-text">
  <?php echo $row["Sections_Des"]; ?>
  </p>
  <p class="card-text">
  <?php echo $row["Sections_Sale"]; ?> ||  <?php echo $row["Sections_CreateTime"]; ?>
  </p>
  <button class="btn btn-primary block">Update now</button>
  </div>
  </div>
  </div>
  </div>
<?php } ?>
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
