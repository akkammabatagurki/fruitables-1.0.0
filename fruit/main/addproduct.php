<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveproduct.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Product</h4></center>
<hr>
<div id="ac">


<span>Brand Name : </span>
<select name="code"  style="width:265px; height:30px; margin-left:-5px;" >
<option></option>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM supliers"); // fix spelling if needed
	$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['note']; ?></option>
	<?php
	}
	?>
</select><br>
<span>Generic Name : </span><input type="text" style="width:265px; height:30px;" name="gen" Required/><br>
<span>Category / Description : </span><textarea style="width:265px; height:50px;" name="name"> </textarea><br>
<span>Date Arrival: </span><input type="date" style="width:265px; height:30px;" name="date_arrival" /><br>
<span>Expiry Date : </span><input type="date" value="<?php echo date ('Y-m-d'); ?>" style="width:265px; height:30px;" name="exdate" /><br>
<span>Selling Price : </span><input type="text" id="txt1" style="width:265px; height:30px;" name="price" onkeyup="sum();" Required><br>
<span>Original Price : </span><input type="text" id="txt2" style="width:265px; height:30px;" name="o_price" onkeyup="sum();" Required><br>
<span>Profit : </span><input type="text" id="txt3" style="width:265px; height:30px;" name="profit" readonly><br>
<span>Supplier : </span>
<select name="supplier"  style="width:265px; height:30px; margin-left:-5px;" >
<option></option>
	<?php
	$result = $db->prepare("SELECT * FROM supliers"); // fix spelling if needed
	$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['suplier_name']; ?> </option>
	<?php
	}
	?>
</select><br>
<span>Quantity : </span><input type="number" style="width:265px; height:30px;" min="0" id="txt11" onkeyup="sum();" name="qty" Required ><br>
<span></span><input type="hidden" style="width:265px; height:30px;" id="txt22" name="qty_sold" Required ><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>
