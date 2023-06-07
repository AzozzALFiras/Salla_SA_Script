<?php
// Developer By : Azozz ALFiras
// 2021/10/1
include "Config_3.php";


$count = 0;
$query = mysqli_query($link,"SELECT * FROM Sections");
foreach($query as $row){
$count++;
?>
<hr>
<form class="form form-horizontal" method="GET">


<p><?php echo $row["Sections_Name"]; ?></p>
<p><?php echo $row["Sections_Sale"]; ?> ريال</p>

<input type="hidden" name="ID_S" value="<?php echo $row["Sections_Id"]; ?>">
<button type="submit"  class="btn btn-primary me-1 mb-1">Sale</button>
</form>
<?php }?>
