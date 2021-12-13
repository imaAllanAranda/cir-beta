<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 28.33%;
  padding: 10px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

img {
  display: block;
}

.rep_signa{
	margin-top: -108px;
	margin-left: 325px;
	height: 150px;
	width: 150px;
}

.column2 {
  	float: left;
	width: 47%;
	padding: 10px;
	margin-left: -9px;
}

.row2:after {
  content: "";
  display: table;
  clear: both;
}
#chcbox{
	margin-left: 120px;
	text-align: left;
}

</style>
</head>
<body style="font-family: Trebuchet MS, sans-serif	">


<div style="position:absolute;top:0.26in;left:0in;width:90px;line-height:0.27in; background-color: #455a73;height:70px;">
    <span style="background-colro:red"></span>
</div>

<div style="position:absolute;top:0.18in;left:1.20in;width:4.36in;line-height:0.27in;">
  <img src="assets/admin/img/elitelogo.png" alt="eliteinsure" class="logo" width="100"/>
</div>

<div style="position:absolute;top:0.72in;left:3.18in;width:4.36in;line-height:0.27in;">
  <span style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Calibri;color:#44546a"></span>
</div>

<div style="position:absolute;top:0.26in;left:7.4in;width:90px;line-height:0.27in; background-color: #1881c7;height:70px;">
    <span style="background-colro:red"></span><br><br><br>
</div>
<div style="margin-top: 310px;">&nbsp;</div>

<p style="font-size: 18px; margin-top: 80px; border-bottom: 1px solid #95c4e8; color:#096ab5;text-transform: uppercase">Finalisation</p>
<?php if( $report_details_cir['systype'] == 1){?>
<div class="row2" style=" font-size: 13px; margin-bottom: 30px;">
  <div class="column2"> 
  	<label>Reviewed the Information</label> <br><br><br>
  	<label>Appropriate <?= ($report_details_cir['systype'] == 0)  ? 'contractor/employee' : 'Adviser' ?> Action Taken</label> <br><br><br>
  	<label>Customer’s Position Rectified</label><br><br><br>
	<label>Add to Learning Points (Complaints or Business L/P)</label><br><br><br>
	<label>Requested Additional Information</label><br><br><br>
	<label>Finalised the Incident Report</label><br><br><br>
	<label>Notified Insurer/FMA/Regulatory Body</label><br><br><br>
	<label>Updated Complaint Register (Where Applicable)</label><br><br><br>
	<label>Completed other Action</label><br><br><br>
  </div>

  <div class="column2" id="chcbox">

	<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['finalisation']['0'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes&nbsp;&nbsp;
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['0'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>

	</span>&nbsp;No<br><br><br>

	<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['finalisation']['2'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes&nbsp;&nbsp;
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['2'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;No<br><br><br>

	<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['finalisation']['4'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes&nbsp;&nbsp;
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['4'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;No<br><br><br>

	<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['finalisation']['6'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes&nbsp;&nbsp;
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['6'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;No<br><br><br>

	<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['finalisation']['8'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes&nbsp;&nbsp;
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['8'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;No<br><br><br>

	<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['finalisation']['10'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes&nbsp;&nbsp;
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['10'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;No<br><br><br>

	<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['finalisation']['12'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes&nbsp;&nbsp;
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['12'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;No<br><br><br>

	<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['finalisation']['14'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes&nbsp;&nbsp;
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['14'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;No<br><br><br>

	<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['finalisation']['16'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes&nbsp;&nbsp;
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['16'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>

	</span>&nbsp;No

	
  </div>
   <?php } else { ?>
   	<div class="row2" style=" font-size: 13px; margin-bottom: 30px;">
  <div class="column2"> 
  	<label>Is the report completed? </label> <br><br>
  	<label>Is contractor/employee liable?</label><br><br>
	<label>Were appropriate actions taken by the company towards employee/contractor?</label><br><br>
	<label>Were errors/damages remediated/rectified?</label><br><br>
	<label>Has client/insurer/FMA/Regulatory Body been notified?</label><br><br>
  </div>

  <div class="column2" id="chcbox">

	<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['finalisation']['0'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes&nbsp;&nbsp;
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['0'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>

	</span>&nbsp;No<br><br>

	<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['finalisation']['2'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes&nbsp;&nbsp;
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['2'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;No<br><br>

	<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['finalisation']['4'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes&nbsp;&nbsp;
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['4'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;No&nbsp;&nbsp;

	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['4'] == 3){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;NA<br><br><br>

	<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['finalisation']['6'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes&nbsp;&nbsp;
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['6'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;No&nbsp;&nbsp;

	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['6'] == 3){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;NA<br><br>


	<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['finalisation']['8'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes&nbsp;&nbsp;
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['8'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;No&nbsp;&nbsp;

	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['finalisation']['8'] == 3){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;NA<br><br>


  </div>

	<?php } ?>
</div><br><br><br><br><br><br><br><br><br><br><br><br><br>	
<label>Finalised by: _______________________</label>
<label>Signature:________________________</label>
<label>Date:____________________</label>
<div style="margin-top: -20px; margin-left: 520px;" ><?= date('d-m-Y', strtotime($report_details_cir['rep_response_date']))?></div>
<img class="rep_signa" src="<?= $report_details_cir['rep_signature']?>">
<div style="margin-top: -62px; margin-left: 90px;"><?= $comp_rep['name'] ?></div>
</body>
</html>
	