<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        #first tr td{
            padding: 10px;
            border:1px solid #dddddd;
        }
        #first {
           width:100%;
        }
        
        #first  {
          border-collapse: collapse;
        }
        #first td {
          margin: 0;
          padding: 0;
          display: block;
        }
        pre {font-family: Trebuchet MS, sans-serif
        }
    </style>
</head>
<body style="font-family: Trebuchet MS, sans-serif  ">

<div style="position:absolute;top:0.26in;left:0in;width:90px;line-height:0.27in; background-color: #455a73;height:70px;">
    <span style="background-colro:red"></span>
</div>

<div style="position:absolute;top:0.18in;left:1.20in;width:4.36in;line-height:0.27in;">
  <img src="assets/admin/img/elitelogo.png" alt="eliteinsure" class="logo" width="100"/>
</div>

 <?php if($_GET['type'] == 0){?>
  


    <?php if($_GET['adviser_id'] != "all"){ ?>

    <div style="position:absolute;top:0.72in;left:2.68in;width:5.36in;line-height:0.27in;">
      <span style="font-style:normal;font-weight:bold;font-size:13pt;font-family:Calibri;color:#44546a">Contractor/Employee Investigation Report History</span>
    </div>

     <?php }else{ ?> 

    <div style="position:absolute;top:0.72in;left:3.98in;width:4.36in;line-height:0.27in;">
      <span style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Calibri;color:#44546a">Incident Investigation Register</span>
    </div>


    <?php } ?>




<?php } else { ?>


    <?php if($_GET['adviser_id'] != "all"){ ?>

    <div style="position:absolute;top:0.72in;left:2.88in;width:5.36in;line-height:0.27in;">
      <span style="font-style:normal;font-weight:bold;font-size:13pt;font-family:Calibri;color:#44546a">Adviser Compliance Investigation Report History</span>
    </div>

     <?php }else{ ?> 

    <div style="position:absolute;top:0.72in;left:3.68in;width:4.36in;line-height:0.27in;">
      <span style="font-style:normal;font-weight:bold;font-size:15pt;font-family:Calibri;color:#44546a">Compliance Investigation Register</span>
    </div>


    <?php } ?>



<?php } ?>






<div style="position:absolute;top:0.26in;left:7.4in;width:90px;line-height:0.27in; background-color: #1881c7;height:70px;">
    <span style="background-colro:red"></span><br><br><br>
</div>
<div style="margin-top: 310px;">&nbsp;</div>
<table id="first" style="position: absolute; margin-top: 100px">
  <tr>
    <?php if($_GET['adviser_id'] != "all"){ ?>
        <td width="250px"><?= ($_GET['type'] == 0)  ? "Contractor/Employee" : "Adviser" ?> Name</td>
    <?php }else{ ?> 
        <td width="250px">Eliteinsure <?= ($_GET['type'] == 0)  ? "Contractor/Employee" : "Advisers" ?></td>
    <?php } ?>

    <td><?php
            $history = "";
            $listName = array();
            if($report){  
                for($i = 0; $i < count($report); $i++){
                      array_push($listName,$report[$i]['name']);
                }
            }
            $duplicate = array_unique($listName);
            echo implode(",", $duplicate);
            // echo rtrim($history, ',');
     ?></td>
  </tr>
  <tr style="background-color: #dddddd;">
    <td width="250px">Prepared By</td>
    <td width="100%">
        <?= $user['name'] ?>
    </td>
  </tr>
  <tr>
    <?php if($_GET['adviser_id'] != "all"){ ?>
    <?php }else{ ?> 
      <td width="250px">Summary Number</td>
    <td width="100%">
      <?= ($_GET['type'] == 0)  ? "IR" .date('Ydm')  : "CIR" .date('Ydm')  ?>
    </td>
    <?php } ?>
  </tr>
    <?php if($_GET['adviser_id'] != "all"){ ?>
        <tr>
    <?php }else{ ?> 
        <tr style="background-color: #dddddd;">  
    <?php } ?>
    <td width="250px">Period Covered</td>
    <td>
        From: <?= date('d-m-Y', strtotime($_GET['date_from'])) ?> <span style="text-align: center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To: <?= date('d-m-Y', strtotime($_GET['date_to'])) ?></span>
    </td>
  </tr>
</table>

<style type="text/css">
 #table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 10px;
}

#table tr,td{
  padding: 10px;
}

#table tr,th{
  font-size: 11px;
  font-weight: bold;
}

#tale td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

#table tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<table id="table" style="position: absolute; margin-top: 50px"  class="table-head">
     <tr>
        <th><?= ($_GET['type'] == 0)  ? "IR" : "CIR" ?> Number</th>
        <th><?= ($_GET['type'] == 0)  ? "Contractor/Employee" : "Adviser" ?> Name</th>
        <th>Date Issued</th>
        <th>Date Due</th>
        <th>Status </th>
    </tr>
    <?php if($report){ ?>
        <?php foreach($report as $rep){ ?>
            <tr>
                <td><?= ($_GET['type'] == 0)  ? "IR2021" : "CIR2021" ?><?=$rep['report_numbers']?></td>  
                <td><?=$rep['name']?></td>
                <td><?= date('d-m-Y', strtotime($rep['send_date']))?></td>   
                <td><?= date('d-m-Y', strtotime($rep['due_date'])) ?></td>
                <td>
                    <?php if($rep['cir_status'] == 0){ ?>
                       Not Completed
                    <?php } else { ?>
                        Completed
                    <?php } ?> 
                </td>  
            </tr>
        <?php } ?>
    <?php }else{ ?>
    <tr>
        <td colspan="4">No data available.</td>
    </tr>
    <?php }?>    
</table>

</body>
</html>
    