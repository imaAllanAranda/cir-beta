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


<div style="position:absolute;top:0.26in;left:0in;width:90px;line-height:0.27in; background-color: #455a73;height:70px;">
    <span style="background-colro:red"></span>
</div>

<div style="position:absolute;top:0.18in;left:1.20in;width:4.36in;line-height:0.27in;">
  <img src="assets/admin/img/elitelogo.png" alt="eliteinsure" class="logo" width="100"/>
</div>

 <?php if($report_details_cir['systype'] == 0){?>
    <div style="position:absolute;top:0.72in;left:5.18in;width:4.36in;line-height:0.27in;">
          <span style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Calibri;color:#44546a">
           <span style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Calibri;color:#44546a">Incident Report (IR)
      </span>
    </div>
<?php } else { ?>
      <div style="position:absolute;top:0.72in;left:3.18in;width:4.36in;line-height:0.27in;">
         <span style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Calibri;color:#44546a">Compliance Investigation Report (CIR)</span>
      </div>
<?php } ?>

<div style="position:absolute;top:0.26in;left:7.4in;width:90px;line-height:0.27in; background-color: #1881c7;height:70px;">
    <span style="background-colro:red"></span><br><br><br>
</div>
<div style="margin-top: 310px;">&nbsp;</div>
<table style="position: absolute; margin-top: 100px">
  <tr>
    <td width="250px"><?= ($report_details_cir['systype'] == 0)  ? "Contractor/Employee" : 'Adviser' ?></td>
    <td><?= $report_details_cir['name'] ?>	</td>
  </tr>
  <tr style="background-color: #c0e1fa;">
    <td width="250px">Company Representative</td>
    <td width="100%"><?= $comp_rep['name'] ?></td>
  </tr>
  <tr>
    <td width="250px">Report Number</td>
    <td><?= ($report_details_cir['systype'] == 0)  ? 'IR2021' : 'CIR2021' ?><?= $cir_max['report_number'] ?></td>
  </tr>
  <tr style="background-color: #c0e1fa;">
    <td width="250px">Date Sent & Due</td>
    <td>
    	Sent Date: <?= date('d-m-Y', strtotime($report_details_cir['send_date']))  ?> <span style="text-align: center;">Due Date: <?= date('d-m-Y', strtotime($report_details_cir['due_date'])) ?></span>
    </td>
  </tr>
  <tr>
    <td width="150px"><?= ($report_details_cir['systype'] == 0)  ? 'Contractor/Employee IR' : "Adviser's Compliance" ?>  History</td>
    <td>
    	 <?php if($reportHistory){
            $history = "";?>
            <?php foreach($reportHistory as $rep){
                 $history .= ($report_details_cir['systype'] == 0)  ? 'IR2021'.$rep['report_number'].',' : 'CIR2021'.$rep['report_number'].','
              ?>
            <?php } ?>
        <?php } ?> 
       <label><?php 
      if($reportHistory){
          echo rtrim($history,", ") ;   
      }else{

      }
       ?></label>
    </td>
  </tr>
</table>
<p style="font-size: 18px; margin-top: 30px; border-bottom: 1px solid #95c4e8; color:#096ab5; text-transform: uppercase">Issues Identified</p>
 <?php if($report_details_identified){ $i = 0; ?>
        <?php foreach($report_details_identified as $rep){ $i++?>
                <p style="margin-bottom: -40px; font-size: 14px; margin-top: 30px;"><?= $i . '. ' . $rep['issue_identified']?></p><br>
        <?php } ?>
<?php } ?> 
<p style="font-size: 18px; margin-top: 70px; border-bottom: 1px solid #95c4e8; color:#096ab5; text-transform: uppercase">Investigation Information</p>
<div class="response">
<pre style="margin-bottom: -40px; font-size: 14px;margin-top: 30px;"><?= $report_details_cir['investigation_information'] ?></pre><br>
</div>
</body>
</html>
	








