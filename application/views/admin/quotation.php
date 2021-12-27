<!DOCTYPE html>
<html>
<head>
<style type="text/css">
	table {
	  font-family: arial, sans-serif;
	  border-collapse: collapse;
	  width: 100%;

	}

	th{
		width: 20%;
		font-size: 12px;
	}

	td{
	  font-size: 10px;
	}

	td, th {
	  border: 1px solid black;
	  text-align: left;
	  padding: 8px;
	  text-align: center;
	}

	tr:nth-child(even) {
	  background-color: #71cdd9;
	}
	pre {font-family: Trebuchet MS, sans-serif
	}
	* {
		box-sizing: border-box;
	}
	p{
		font-size: 11px;
	}
</style>
</head>
<body style="font-family: Trebuchet MS, sans-serif	">

<div style="position:absolute;top:.38in;left:.5in;width:4.36in;line-height:0.27in;">
	<img src="https://cdn.shopify.com/s/files/1/0550/5050/2192/files/New_NZOIA_Logo_-_Official_253x.png?v=1637875015" alt="eliteinsure" class="logo" width="75"/>
	<h4 style="position:absolute;top:.38in;left:.5in;width:4.36in;line-height:0.27in;">NZOIA Auto Spares Ltd.</h4>
	<p>97, Kirinyaga Road, Nairobi Kenya</p>
	<p>customersupport@nzoiaautospares.com</p>
	<p>(+254)-722-770-213 / (+254)-737-475-390</p>
</div>

<div style="position:absolute;top:.38in;left:5.9in;width:4.36in;line-height:0.27in;">
	<h2 style="color: #878787; font-size: 25px;">Quotation</h2>
</div>

<div style="position:absolute;top:1.19in;left:5.9in;width:4.36in;line-height:0.27in;">
  	<p>Issue Date: <?= date("d/m/Y")?></p>
  	<p>Expiry Date: <?= date("d/m/Y",strtotime('+15 days')) ?></p>
</div>

<div style="position:absolute;top:2.38in;left:.5in;line-height:0.27in;">
	<h5>To:</h5>
	<p>Name: <?= $name ?></p>
	<p>Email: <?= $email ?></p>
	<p>Contact Number: <?= $contact ?></p>

</div>

<div style="position:absolute;top:3.78in; left: .45in;width: 83%;">
	<table>
  <tr>
    <th>Item</th>
    <th>Quantity</th>
    <th>Price</th>
  </tr>
    <?php $Armaterial = explode(",", $type); 
     	  $Arprice = explode(",", $price);
     	  $Arqty = explode(",", $price); 
		 for ($i = 0; $i < count($Armaterial); $i++) {
		 	echo '<tr><td>'.$Armaterial[$i].'</td><td>'.$Arqty[$i].'</td><td>KSh'.number_format($Arprice[$i], 2, '.', '').'</td></tr>';
		 }
	?>
  <tr>
  	<td colspan="2" style="text-align: right;font-weight: bold;">Subtotal</td>
  	<td>KSH<?php 
	  	$Arprice = explode(",", $price);
	  	echo number_format(array_sum($Arprice), 2, '.', ''); 
  	?>
  	</td>
  </tr>
  <tr>
  	<td colspan="2" style="text-align: right;font-weight: bold;">Tax</td>
  	<td>16.00%</td>
  </tr>
  <tr>
  	<td colspan="2" style="text-align: right;font-weight: bold;">Total</td>
  	<td>KSH<?php 
		  	$Arprice = explode(",", $price);
		  	$total = array_sum($Arprice)*16/100+array_sum($Arprice); 
		  	echo $total;
  		?>
  	</td>
  </tr>
</table>
<br><br>
<p>Note:<?= $note ?></p>
<br>
<p>Terms and Condition:</p>
<p>1. All prices are valid until 15 days from the date of the stated on the quotation</p>
<p>2. Payment will be accepted at MPESA TIL #: 128391237128398</p>
<p>3. Simply dummy text of the printing and typesetting industry. </p>
<br><br><br><br>
<h5 style="text-align: center;">Thank You for your Business</h5>
<p style="text-align: center;">If you have question concerning this quote,contact: customersupport@nzoiaautospares.com</p>
</div>

<!-- 
<p><?= $email ?></p><br><br>
<p><?= $body ?></p><br><br>
 -->
</div>


</body>
</html>