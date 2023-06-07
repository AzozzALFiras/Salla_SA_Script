
<footer>
<div class="footer-main">
<div class="container">
<div class="row">
<div class="col-md-4">
<h2 class="footer-title">
<span>من نحن</span>
</h2>
<p>متجر يوفر لك كل الاكواد الرقمية التي تحتاجها بكل سهولة وامان وسلسة </p>

<div class="store-contact">
</div>
<div class="store-certificate">
<a href="https://maroof.sa/194352" target="_blank" rel="noopener noreferrer">
<img src="https://assets.salla.cloud/themes/default/assets/images/maroof.png?v=v1.4.272" alt=" ">
</a>
</div>
<div class="modal fade" >
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header no-border">
</div>
<div class="modal-body text-center">
</div>
</div>
</div>
</div> </div>
<div class="col-md-4 mb-3 mb-md-0">
<h2 class="footer-title"><span>روابط مهمة</span></h2>
<ul class="footer-links">
<?php
$count = 0;
$query = mysqli_query($link,"SELECT * FROM Pages");
foreach($query as $row){
$count++;
?>
<li><a href="Page?id=<?php echo $row["id"]; ?>">
<?php echo $row["Pages_Title"]; ?> </a></li>
<?php } ?>
</ul>
</div>
<div class="col-md-4">
<h2 class="footer-title">
<span>تواصل معنا</span>
</h2>
<ul class="social clearfix">
<li class="social-item">
<a href="https://www.instagram.com/zmcods" target="_blank">
<span class="fa fa-instagram"></span>
</a>
</li>
<li class="social-item">
<a href="https://twitter.com/izamilll" target="_blank">
<span class="fa fa-twitter"></span>
</a>
</li>
<li class="social-item">
<a href="https://www.snapchat.com/add/zamil_hamd" target="_blank">
<span class="fa fa-snapchat"></span>
</a>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="footer-sub">
<div class="container">
<div class="fs-cont">
<div class="fs-rights">
<p class="mb-4 mb-md-0">
© 2021 - <?php echo $Title_Site; ?>
جميع الحقوق محفوظة لمتجر
</p>
</div>
<div class="fs-payment">
<div class="icons">

<div class="modal fade" >
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header no-border">
</div>
<div class="modal-body text-center">
</div>
</div>
</div>
</div> <div>
<img src="https://assets.salla.cloud/themes/default/assets/images/mada.png?v=v1.4.272" alt=" ">
<img src="https://assets.salla.cloud/themes/default/assets/images/cc.png?v=v1.4.272" alt=" ">
<img src="https://assets.salla.cloud/themes/default/assets/images/bank.png?v=v1.4.272" alt=" ">
<img src="https://assets.salla.cloud/themes/default/assets/images/applepay.svg?v=v1.4.272" alt=" ">
</div>
</div>
</div>
</div>
</div>
</div>
</footer>


<script src="https://use.fontawesome.com/293c1440da.js"></script>
<script src="js/bootstrap3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
