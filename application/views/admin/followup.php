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

.signed{
	margin-top: -148px;
	background-color: none;
	boder: 1px solid black;
	margin-left: 305px;
}

.column2 {
  	float: left;
	width: 47%;
	padding: 10px;
}

.row2:after {
  content: "";
  display: table;
  clear: both;
}
#chcbox{

	text-align: center;
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

<p style="font-size: 18px; margin-top: 80px; border-bottom: 1px solid #95c4e8; color:#096ab5;text-transform: uppercase">Follow Up AND Finalisation</p>


<span>Has the <?= ($report_details_cir['systype'] == 0)  ? 'IR' : 'CIR' ?> been completed satisfactorily?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<span style="border: 1px solid black;">

	<?php 

	if($report_details_cir['satisfactory'] == 1){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	</span>&nbsp;Yes
	
	<span style="border: 1px solid black;">
	
	<?php
	
	if($report_details_cir['satisfactory'] == 2){
		echo "&nbsp;&#10003;";
	}else{
		echo "&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	?>
	
	</span>&nbsp;No<br><br>

<div class="response">
<p>If not, what outstanding action/s is required by Eliteinsure Ltd. to be followed up with the 
Company Representative? </p>
</div>
<div class="response">
<label><?= $report_details_cir['if_not']?></label>
</div>

</body>
</html>
	