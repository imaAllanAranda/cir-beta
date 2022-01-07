<!DOCTYPE html>
<html>
<head>
<!-- <style type="text/css">
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
</style> -->
<style type="text/css">
		table {
	  font-family: arial, sans-serif;
	  border-collapse: collapse;
	  width: 100%;

	}

	th{
		width: 20%;
		font-size: 12px;
		background-color: #1A4789;
		color: white;
		padding: 8px;
		text-align: center;
	}

	td{
	  font-size: 12px;
	}

	td {
	  /*border: 1px solid #1A4789;*/
	  padding: 8px;
	  text-align: left;
	}

	tr:nth-child(even) {
	  /*background-color: #ededed;*/
	}
    @page{
      margin-left: 50px;
      margin-right: 50px;
    }
    .response{
    text-align: justify;
    text-justify: inter-word;
  }
	</style>
</head>
<body style="font-family: Trebuchet MS, sans-serif	">

<div style="position:absolute;top:0.26in;left:0in;width:90px;line-height:0.27in; background-color: #1A4789;height:70px;">
    <span style="background-colro:red"></span>
</div>

  <div style="position:absolute;top:0.72in;left:5.31in;width:4.36in;line-height:0.27in;">
          <span style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Calibri;color:#44546a">
           <span style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Calibri;color:#44546a">Product Quotation
      </span>
    </div>

<div style="position:absolute;top:0.18in;left:1.10in;width:4.36in;line-height:0.27in;">
  <img src="https://cdn.shopify.com/s/files/1/0550/5050/2192/files/New_NZOIA_Logo_-_Official_253x.png?v=1637875015" alt="eliteinsure" class="logo" width="85"/>
</div>
<div style="position:absolute;top:0.26in;left:7.4in;width:90px;line-height:0.27in; background-color: #B21500;height:70px;">
    <span style="background-colro:red"></span><br><br><br>
</div>

<div style="position:absolute;top:1.1in;left:.5in;width:4.36in;line-height:0.22in; font-size: 12px;">
	<br>
	<p>97, Kirinyaga Road, Nairobi Kenya</p>
	<p>customersupport@nzoiaautospares.com</p>
	<p>(+254)-722-770-213 / (+254)-737-475-390</p>
</div>


<div style="position:absolute;top:1.19in;left:5.9in;width:4.36in;line-height:0.22in;font-size: 12px;">
	<br>
  	<p>Issue Date: <?= date("d/m/Y")?></p>
  	<p>Expiry Date: <?= date("d/m/Y",strtotime('+15 days')) ?></p>
</div>

<div style="position:absolute;top:2.38in;left:.5in;line-height:0.22in;font-size: 12px;">
	<h5>To:</h5>
	<p>Name: <?= $name ?></p>
	<p>Email: <?= $email ?></p>
	<p>Contact Number: <?= $contact ?></p>
</div>

<div style="position:absolute;top:3.78in; left: .45in;width: 83%;">
	<table>
  <tr >
    <th >Item</th>
    <th>Quantity</th>
    <th>Price</th>
  </tr>
    <?php $Armaterial = explode(",", $type); 
     	  $Arprice = explode(",", $price);
     	  $Arqty = explode(",", $qty); 
		 for ($i = 0; $i < count($Armaterial); $i++) {
		 	echo '<tr style="border: 1px solid #1A4789;"><td style="border: 1px solid #1A4789;">'.$Armaterial[$i].'</td><td style="border: 1px solid #1A4789;">'.$Arqty[$i].'</td><td>KSh'.number_format($Arprice[$i], 2, '.', '').'</td></tr>';
		 }
	?>
  <tr style="boder:none;">
  	<td colspan="2" style="text-align: right;font-weight: bold;"><br>Subtotal:</td>
  	<td><br>KSH<?php 
	  	$Arprice = explode(",", $price);
	  	echo number_format(array_sum($Arprice), 2, '.', ''); 
  	?>
  	</td>
  </tr>
  <tr>
  	<td colspan="2" style="text-align: right;font-weight: bold;">Tax:</td>
  	<td>16.00%</td>
  	<hr style="color:#1A4789">
  </tr>
  <tr>
  	<td colspan="2" style="text-align: right;font-weight: bold;">TOTAL:</td>
  	<td style="font-weight: bold; color:#1A4789; text-decoration: underline;">KSH<?php 
		  	$Arprice = explode(",", $price);
		  	$total = array_sum($Arprice)*16/100+array_sum($Arprice); 
		  	echo $total;
  		?>
  	</td>
  </tr>
</table>
<br>
<p style="font-size: 12px;">Note:<?= $note ?></p>
<br><br>
<p style="font-weight: bold;font-style: italic; color:#44546a;">Terms and Condition:</p>
<hr style="color:#44546a">
<div style="font-style: italic; font-size: 12px;">
<p>1. All prices are valid until 15 days from the date of the stated on the quotation</p>
<p>2. Payment will be accepted at MPESA TIL #: 128391237128398</p>
</div>
<br><br><br><br>
<!-- <h5 style="text-align: center;">Thank You for your Business</h5>
<p style="text-align: center;">If you have question concerning this quote,contact: customersupport@nzoiaautospares.com</p> -->
</div>

<!-- 
<p><?= $email ?></p><br><br>
<p><?= $body ?></p><br><br>
 -->
</div>


</body>
</html>