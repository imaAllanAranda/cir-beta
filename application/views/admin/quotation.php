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
		width: 25%;
		font-size: 12px;
		background-color: #1A4789;
		color: white;
		padding: 8px;
		text-align: center;
		height: 20px;
		line-height: 2px;
	}

	td{
	  font-size: 12px;
	}

	td {
	  /*border: 1px solid #1A4789;*/
	  padding: 8px;
	  text-align: left;
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
  	<?php if ($invoice == 1){ ?>
	<span style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Calibri;color:#44546a">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tax Invoice
  	</span>
    <?php }else{?>
    <span style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Calibri;color:#44546a">Product Quotation
  	</span>
  <?php }?>
</div>

<div style="position:absolute;top:0.18in;left:1.10in;width:4.36in;line-height:0.27in;">
  <img src="https://cdn.shopify.com/s/files/1/0550/5050/2192/files/New_NZOIA_Logo_-_Official_253x.png?v=1637875015" alt="eliteinsure" class="logo" width="85"/>
</div>
<div style="position:absolute;top:0.26in;left:7.4in;width:90px;line-height:0.27in; background-color: #B21500;height:70px;">
    <span style="background-colro:red"></span><br><br><br>
</div>


<div style="position:absolute;top:11.18in;left:0in;width:100%;line-height:0.27in; background-color: #1A4789;height:70px; z-index: -1;
">
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
	<?php if ($invoice != 1){ ?>
  	<p>Issue Date: <?= date("d-m-Y")?></p>
  	<p>Expiry Date: <?= date("d-m-Y",strtotime('+15 days')) ?></p>
  	<?php }?>
</div>
<?php if ($invoice == 1){ ?>
<div style="position:absolute;top:2.18in;left:.5in;line-height:0.22in;font-size: 12px;">
	<p style="font-weight: bold; font-size: 15px;"><span style="font-weight: bold;">Tax Invoice</span><br></p>
</div>
 <?php }?>
<div style="position:absolute;top:2.38in;left:.5in;line-height:0.22in;font-size: 12px;">
	<br>
	<p style="font-weight: bold; font-size: 13px;"><span style="font-weight: bold;">To:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $name ?></p>
	<p style="font-weight: bold; font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $email ?></p>
	<p style="font-weight: bold; font-size: 13px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $contact ?></p>
</div>
<?php if ($invoice == 1){ ?>
<div style="position:absolute;top:2.38in;left:4.5in;line-height:0.22in;font-size: 12px;">
	<br>
	<p style="font-size: 13px;"><span style="font-weight: bold;">Invoice Date</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= date("d-m-Y")?></p>
	<p style="font-size: 13px;"><span style="font-weight: bold;">Invoice Number</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NAS202200<?=$invoice_number?></p>
</div>
<?php }?>

<div style="position:absolute;top:3.78in; left: .45in;width: 83%;">
	<table>
  <tr>
    <th>Item</th>
    <?php if ($quoteType != 1){ ?>
    	<th>Quantity</th>
    <?php }else{ ?>
    	<th>Description</th>
    <?php }?>
    <th>Price</th>
  </tr>
    <?php $Armaterial = explode(",", $type); 
     	  $Arprice = explode(",", $price);
     	  $Arqty = explode(",", $qty); 
     	  $subTotal = 0;
		 for ($i = 0; $i < count($Armaterial); $i++) {
		 	$subTotal += $Arprice[$i] * $Arqty[$i];
		 	if($quoteType != 1){
		 		echo '<tr style="border: 1px solid #1A4789;"><td style="border: 1px solid #1A4789;">'.$Armaterial[$i].'</td><td style="border: 1px solid #1A4789;">'.$Arqty[$i].'</td><td>KSh'.number_format($Arprice[$i], 2, '.', '') * $Arqty[$i] .'</td></tr>';
		 	}else{
		 		echo '<tr style="border: 1px solid #1A4789;"><td style="border: 1px solid #1A4789;">'.$Armaterial[$i].'</td><td style="border: 1px solid #1A4789;">Used Car</td><td>KSh'.number_format($Arprice[$i], 2, '.', '').'</td></tr>';
		 	}
		 	
		 }
	?>
  <tr style="boder:none;">
  	<td colspan="2" style="text-align: right;font-weight: bold;"><br>Subtotal:</td>
  	<td><br>KSH<?php 
	  	$Arprice = explode(",", $price);
	  	if($quoteType == 1){
	  		echo number_format($price,2);
	  	}else{
	  		echo $subTotal;
	  	}
	  	 
  	?>
  	</td>
  </tr>
  <tr>
  	<td colspan="2" style="text-align: right;font-weight: bold;">Tax:</td>
  	<td><br>16.00%</td>
  	<hr style="color:#1A4789">
  </tr>
  <tr>
  	<td colspan="2" style="text-align: right;font-weight: bold;">TOTAL:</td>
  	<td style="font-weight: bold; color:#1A4789; text-decoration: underline;">KSH<?php 
		  	$Arprice = explode(",", $price);
		  	$total = array_sum($Arprice)*16/100+array_sum($Arprice); 
		  	echo number_format($total,2);
  		?>
  	</td>
  </tr>
</table>
<br>
<p style="font-size: 12px;">Note: <?= $note ?></p>
<br><br>
<?php if ($invoice == 1){ ?>
<p style="font-weight: bold;font-style: italic; color:#44546a;">Payment Advice:</p>
<?php }else{?>
<p style="font-weight: bold;font-style: italic; color:#44546a;">Terms and Condition:</p>
<?php }?>





<hr style="color:#44546a">
<div style="font-style: italic; font-size: 12px;">
<?php if ($invoice != 1){ ?>
<p>1. All prices are valid until 15 days from the date of the stated on the quotation</p>
<p>2. Payment will be accepted at MPESA TIL #: 618-067</p>
<?php }else{?>
<p>You can pay through the following payment method:</p><br>
<p>1. MPESA Til Number: 618-067</p>
<p>2. Direct Bank Transfer: Nzoia Auto Spares Ltd.  
A/cno 95860200001731
Bank of Baroda (K ) Ltd.
Sarit Centre Branch. NAIROBI Kenya. User your invoice # as reference.</p>
<?php }?>
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