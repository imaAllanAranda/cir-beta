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
		* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 47%;
  padding: 10px;
  height: 300px;
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
	margin-top: -120px;
	background-color: none;
	boder: 1px solid black;
	margin-left: 80px;
}
	
	.response{
		text-align: justify;
 	 	text-justify: inter-word;
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

<p style="font-size: 18px; margin-top: 80px; border-bottom: 1px solid #95c4e8; color:#096ab5; text-transform: uppercase"><?= ($report_details_cir['systype'] == 0)  ? 'Contractor/Employee' : " Contracted Adviser's" ?> Response</p>

<div class="response">
<label style="text-align: center;"><?= $report_details_cir['adv_response']?></label><br><br><br>

<p>DECLARATION: I declare that the information on this report is a true representation to the 
best of my recollection of the facts or events in relation to the matter being investigated. I 
understand that providing incorrect or incomplete information on this document could result 
in the review of my Contractual Agreement with Eliteinsure Limited</p><br><br>
</div>
<div class="row"><br><br><br><br>
  <div class="column">
  	<label>Signature: <span class="imgspan">________________________________<img class="signed" src="<?= $report_details_cir['adv_signature']?>"><span></label>
  </div>
  <div class="column">
    <label>Date: <span>______________________________<span ></span></label>
    <div style="margin-top: -20px; margin-left: 100px;"><?= date('d-m-Y', strtotime($report_details_cir['adv_response_date'])) ?></div>
  </div>
</div>

</body>
</html>
	