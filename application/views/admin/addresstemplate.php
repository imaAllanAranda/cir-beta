<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		tr td{
			padding: 10px;
			border:1px solid #0564ab;
		}
		table {
 		   width:100%;
		}
		
		table {
		  border-collapse: collapse;
		}
		table td {
		  margin: 0;
		  padding: 0;
		  display: block;
		}
		pre {font-family: Trebuchet MS, sans-serif
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


<p style="font-size: 18px; margin-top: 80px; border-bottom: 1px solid #95c4e8; color:#096ab5; text-transform: uppercase">Issues to be addressed by the Company Representative</p>

<p style="font-size: 13px; margin-top: 10px;">Please note that depending on the answers provided, Compliance may seek further clarifications 
and further actions may be taken.</p><br>
 <?php if($report_details_address){ $i = 0; ?>
    <?php foreach($report_details_address as $rep){ $i++?>
        <p style="font-size: 14px;"><?= $i . '. ' . $rep['issue_address']?></p>
        <div class="response">
        <p style="font-size: 14px; color:#1881c7 "><?= $rep['adviser_answer']?></p>
    	</div>
  <?php } ?>
<?php } ?> 
</body>
</html>
	