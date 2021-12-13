<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">


<!-- pages_authentication_password-reset.html  13:35:20 GMT -->
<head>
    <title>Compliance Investigation Report</title>

    <link rel="stylesheet" href="<?=base_url();?>assets/admin/fonts/fontawesome.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/fonts/ionicons.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/fonts/linearicons.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/fonts/open-iconic.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/fonts/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/fonts/feather.css">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/bootstrap-material.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/shreerang-material.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/uikit.css">

    <!-- Libs -->
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/select2/select2.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/bootstrap-tagsinput/bootstrap-tagsinput.css">
    <link href="<?=base_url();?>assets/admin/css/sweetalert.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/datatables/datatables.css">
    
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/quill/typography.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/quill/editor.css">

    <!-- Page -->
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/pages/messages.css">
    <!-- Page -->
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/pages/account.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/pages/users.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/pages/chat.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/ladda/ladda.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/growl/growl.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/toastr/toastr.css">



    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/bootstrap-select/bootstrap-select.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/bootstrap-multiselect/bootstrap-multiselect.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/select2/select2.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/bootstrap-tagsinput/bootstrap-tagsinput.css">
    <link href="<?=base_url();?>assets/admin/css/buttonLoader.css" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/bootstrap-datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/timepicker/timepicker.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/minicolors/minicolors.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/pages/authentication.css">

</head>

<body class="cointainer" style="padding: 40px;">
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-white"></div>
    </div>
    <!-- [ Preloader ] End -->
        <div class="layout-content">

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                       
                 <!--        <hr class="border-light container-m--x my-0">
 -->
                        <div class="row">
                            <div class="col-lg-1 col-xl-1">
                            </div>
                            <div class="col">

                                <div class="media align-items-center my-4 h4">
                                    <div class="ion ion-md-albums ui-w-60 text-center text-large"></div>
                                    <div class="media-body ml-1">
                                        Compliance Investigation Report (CIR)
                                        <div class="text-muted text-tiny font-weight-light"></div>
                                    </div>
                                </div>

                                <div class="bg-white ui-bordered mb-2">   
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table user-view-table m-0">
                                        <tbody>
                                            <tr style="width: 500px;">
                                                <td style="font-weight: bold;">Adviser Name</td>
                                                <td><?= $report_details_cir['name']?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;">Company Representative</td>
                                                <td><?= $comp_rep['name']?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;">Report Number</td>
                                                <td>CIR20210020</td>
                                                <input type="hidden" id="report_number" value="<?= $_GET['report_number'] ?>">
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;">Date Sent & Due Date</td>
                                                <td>Sent Date: <?= date('d-m-Y', strtotime($report_details_cir['send_date'])) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Due Date: <?= date('d-m-Y', strtotime($report_details_cir['due_date'])) ?></td>
                                            </tr>
                                            <tr>
                                                <td style="font-weight: bold;">Adviser Compliance History</td>
                                                <td>    <?php if($reportHistory){ ?>
                                        <?php foreach($reportHistory as $rep){ ?>
                                    <label>CIR2021<?=  $rep['report_number'] ?></label>
                                      <?php } ?>
                                  <?php } ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                </div>

                                <hr class="my-5">
                                <div class="media align-items-center mb-4 h4">
                                    <div class="ion ion-md-document ui-w-60 text-center text-large"></div>
                                    <div class="media-body ml-1">
                                        Issue Identified
                                        <div class="text-muted text-tiny font-weight-light"></div>
                                    </div>
                                </div>
                                <div class="bg-white ui-bordered mb-2">   
                                    <div class="card-body">
                                        <?php if($report_details_identified){ $i = 0; ?>
                                            <?php foreach($report_details_identified as $rep){ $i++?>
                                                <p class="form-control-lg"><?= $i . '. ' . $rep['issue_identified']?></p>
                                            <?php } ?>
                                        <?php } ?> 
                                    </div>
                                </div>



                                <hr class="my-5">
                                <div class="media align-items-center mb-4 h4">
                                    <div class="ion ion-ios-archive ui-w-60 text-center text-large"></div>
                                    <div class="media-body ml-1">
                                        Investigation Report
                                        <div class="text-muted text-tiny font-weight-light"></div>
                                    </div>
                                </div>
                                <div class="bg-white ui-bordered mb-2">   
                                    <div class="card-body">
                                        <label class="form-control-lg"><?= $report_details_cir['investigation_information'] ?></label>
                                    </div>
                                </div>



                                <hr class="my-5">
                                <div class="media align-items-center mb-4 h4">
                                    <div class="ion ion-ios-create ui-w-60 text-center text-large"></div>
                                    <div class="media-body ml-1">
                                        Issues Addressed By Company Representative
                                        <div class="text-muted text-tiny font-weight-light"></div>
                                    </div>
                                </div>
                                <div class="bg-white ui-bordered mb-2" <?= (empty($report_details_cir['to_address'])) ? 'style="border: 1px solid #f7ada8;"' : '' ?>>   
                                    <div class="card-body">
                                    <?php if($report_details_address){ $i = 0; ?>
                                        <?php foreach($report_details_address as $rep){ $i++?>
                                            <label class="form-control-lg"><?= $i . '. ' . $rep['issue_address']?></label><br>
                                            <?php if($report_details_cir['to_address'] == 0){ ?>
                                                <input type="hidden" class="form-control form-control-lg" name="id_question[]" value="<?= $rep['id_question'] ?>" placeholder="Please enter your answer">
                                                <input type="text" class="form-control form-control-lg" name="answer_question[]" placeholder="Please enter your answer">
                                                <?php }else{ ?>
                                                <label class="ml-4 form-control-lg"><?= $rep['adviser_answer']?></label><br>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?> 
                                        <button type="submit" id="answer_submit" class="btn btn-primary mt-3" onclick="answer_submit()" <?= (empty($report_details_cir['to_address'])) ? '' : 'style="display:none;"' ?>><span class="far fa-paper-plane"></span>&nbsp;&nbsp;Submit</button>&nbsp;
                                    </div>
                                </div>

                                <div class="rep" <?= (empty($report_details_cir['to_address'])) ? 'style="display:none;"' : '' ?> >
                                <hr class="my-5">
                                <div class="media align-items-center mb-4 h4">
                                    <div class="ion ion-ios-create ui-w-60 text-center text-large"></div>
                                    <div class="media-body ml-1">
                                        Company Representative Response
                                        <div class="text-muted text-tiny font-weight-light"></div>
                                    </div>
                                </div>
                                <div class="bg-white ui-bordered mb-2" <?= (empty($report_details_cir['rep_response'])) ? 'style="border: 1px solid #f7ada8;"' : '' ?>>   
                                    <div class="card-body">
                                        <?php if($report_details_cir['rep_response'] == ""){ ?>
                                        <?php if($_GET['user_type'] == 0){ ?>
                                            <textarea class="form-control form-control-lg" placeholder="Please enter your reponse" rows="5" cols="15" id="company_response"></textarea>
                                             <button type="submit" id="copResponseSave" class="btn btn-primary mt-3" onclick="copResponseSave()"><span class="far fa-paper-plane"></span>&nbsp;&nbsp;Submit</button>&nbsp;
                                            <?php } ?>
                                            <?php }else{ ?>
                                            <p class="form-control-lg"><?= $report_details_cir['rep_response']?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                                </div>


                                <div class="rep" <?= (empty($report_details_cir['rep_response'])) ? 'style="display:none;"' : '' ?> >
                                <hr class="my-5">
                                <div class="media align-items-center mb-4 h4">
                                    <div class="ion ion-ios-create ui-w-60 text-center text-large"></div>
                                    <div class="media-body ml-1">
                                        Contracted Adviser's Response
                                        <div class="text-muted text-tiny font-weight-light"></div>
                                    </div>
                                </div>
                                <div class="bg-white ui-bordered mb-2" <?= (empty($report_details_cir['adv_response'])) ? 'style="border: 1px solid #f7ada8;"' : '' ?>>   
                                    <div class="card-body">
                                        <?php if($report_details_cir['adv_response'] == ""){ ?>
                                        <?php if($_GET['user_type'] == 1){ ?>
                                         <textarea class="form-control-lg form-control" placeholder="Please enter your response" id="adviser_response" rows="5" cols="15"></textarea>
                                         <div class="row">
                                            <div class="col-3 mt-2">
                                                <div class="wrapper">
                                                  <canvas style="border: 1px solid #ced4da;" id="signature-pad" class="signature-pad"></canvas>
                                                </div>
                                                <button type="button" id="clear">Clear</button>
                                                <label class="font-weight-normal mt-2">Add Signature</label>
                                                <input type="hidden" name="signature" id="imageUrl-adv">
                                                <input type="hidden" name="signature" id="imageUrl-rep">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-3" id="saveContacted" onclick="saveContacted()"><span class="far fa-paper-plane"></span>&nbsp;&nbsp;Submit</button>&nbsp;
                                         <?php } ?>
                                         <?php }else{ ?>
                                        <p class="lead ml-3"><?= $report_details_cir['adv_response']?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                                </div>


                                <div class="rep" <?= (empty($report_details_cir['adv_response'])) ? 'style="display:none;"' : '' ?> >
                                <hr class="my-5">
                                <div class="media align-items-center mb-4 h4">
                                    <div class="ion ion-ios-create ui-w-60 text-center text-large"></div>
                                    <div class="media-body ml-1">
                                         Action Taken By Company Representative
                                        <div class="text-muted text-tiny font-weight-light"></div>
                                    </div>
                                </div>
                                <div class="bg-white ui-bordered mb-2"  <?= (empty($report_details_cir['rep_action'])) ? 'style="border: 1px solid #f7ada8;"' : '' ?>>   
                                    <div class="card-body">
                                        <?php if($report_details_cir['rep_action'] == ""){ ?>
                                            <textarea class="form-control form-control-lg" id="action_response" placeholder="Please enter your response" rows="5" cols="15"></textarea>
                                            <label class="label-control">Has the CIR been completed satisfactorily?</label>
                                            <select class="form-select mt-2" id="satisfactorily" onchange="getval(this);">
                                              <option value="1">Yes</option>
                                              <option value="2">No</option>
                                            </select><br>
                                            <div class="ifnot">
                                                <label class="label-control-lg">If not, what outstanding action/s is required by Eliteinsure Ltd. to be followed up with the 
Company Representative? </label>
                                                <textarea class="form-control-lg form-control" placeholder="Please enter why CIR has not been completed satisfactorily" id="if_not" rows="5" cols="15"></textarea>
                                            </div><br><br>
                                        <h4 class="card-title">Finalisation</h4>
                                <div class="table-responsive">
                                    <table class="table user-view-table m-0" id="finalTable">
                                        <tbody>
                                            <tr>
                                                <td ><label class="label-control">Reviewed the Information</label><br></td>
                                                <td> <select class="form-select" name="finalisation[]" aria-label="Default select example">
                                                      <option value="1">Yes</option>
                                                      <option value="2">No</option>
                                                    </select></td>
                                            </tr>
                                            <tr style="width: 500px;">
                                                <td><label class="label-control">Appropriate Adviser Action Taken</label><br></td>
                                                <td> <select class="form-select" name="finalisation[]" aria-label="Default select example">
                                                      <option value="1">Yes</option>
                                                      <option value="2">No</option>
                                                    </select></td>
                                            </tr>
                                            <tr style="width: 500px;">
                                                <td><label class="label-control">dd to Learning Points (Complaints or Business L/P)</label><br></td>
                                                <td> <select class="form-select" name="finalisation[]" aria-label="Default select example">
                                                      <option value="1">Yes</option>
                                                      <option value="2">No</option>
                                                    </select></td>
                                            </tr>
                                            <tr style="width: 500px;">
                                                <td><label class="label-control">Requested Additional Information</label><br></td>
                                                <td> <select class="form-select" name="finalisation[]" aria-label="Default select example">
                                                      <option value="1">Yes</option>
                                                      <option value="2">No</option>
                                                    </select></td>
                                            </tr>
                                            <tr style="width: 500px;">
                                                <td><label class="label-control">Customer’s Position Rectified</label><br></td>
                                                <td> <select class="form-select" name="finalisation[]" aria-label="Default select example">
                                                      <option value="1">Yes</option>
                                                      <option value="2">No</option>
                                                    </select></td>
                                            </tr>
                                            <tr style="width: 500px;">
                                                <td><label class="label-control">Finalised the Incident Report</label><br></td>
                                                <td> <select class="form-select" name="finalisation[]" aria-label="Default select example">
                                                      <option value="1">Yes</option>
                                                      <option value="2">No</option>
                                                    </select></td>
                                            </tr>
                                            <tr style="width: 500px;">
                                                <td><label class="label-control">Notified Insurer/FMA/Regulatory Body</label></td>
                                                <td> <select class="form-select" name="finalisation[]" aria-label="Default select example">
                                                      <option value="1">Yes</option>
                                                      <option value="2">No</option>
                                                    </select></td>
                                            </tr>
                                            <tr style="width: 500px;">
                                                <td><label class="label-control">Updated Complaint Register (Where Applicable)</label></td>
                                                <td> <select class="form-select" name="finalisation[]" aria-label="Default select example">
                                                      <option value="1">Yes</option>
                                                      <option value="2">No</option>
                                                    </select></td>
                                            </tr>
                                            <tr style="width: 500px;">
                                                <td><label class="label-control">Completed other Action</label></td>
                                                <td> <select class="form-select" name="finalisation[]" aria-label="Default select example">
                                                      <option value="1">Yes</option>
                                                      <option value="2">No</option>
                                                    </select></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                    <div class="wrapper mt-2">
                                      <canvas style="border: 1px solid #ced4da;" id="signature-pad-rep" class="signature-pad"></canvas>
                                    </div>
                                    <button type="button" id="clear-rep">Clear</button>
                                    <label class="font-weight-normal mt-2">Add Signature</label><br> 
                                        <?php if($_GET['user_type'] == 0){ ?>
                                            <button type="submit" class="btn btn-primary mt-3" id="saveActionTaken" onclick="saveActionTaken()"><span class="far fa-paper-plane"></span>&nbsp;&nbsp;Submit</button>&nbsp;
                                        <?php } ?>
                                    <?php }else{ ?>
                                        <p class="lead ml-3"><?= $report_details_cir['rep_action']?></p>
                                     <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ content ] End -->
            </div>
    <!-- [ content ] Start -->
   
    <input type="hidden" id="base_url" value="<?=base_url();?>">
    <!-- [ content ] End -->

    <!-- Core scripts -->
    <script src="<?=base_url();?>assets/admin/js/pace.js"></script>
    <script src="<?=base_url();?>assets/admin/js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/popper/popper.js"></script>

    <script src="<?=base_url();?>assets/admin/js/sidenav.js"></script>
    <script src="<?=base_url();?>assets/admin/js/layout-helpers.js"></script>
    <script src="<?=base_url();?>assets/admin/js/material-ripple.js"></script>
    <script src="<?=base_url();?>assets/admin/js/jquery.core.js"></script>
    <script src="<?=base_url();?>assets/admin/js/jquery.min.js"></script>

    <!-- Libs -->
    <script src="<?=base_url();?>assets/admin/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/eve/eve.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/flot/flot.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/flot/curvedLines.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/chart-am4/core.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/chart-am4/charts.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/chart-am4/animated.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/chartjs/chartjs.js"></script>

    <!-- Demo -->
    <script src="<?=base_url();?>assets/admin/js/demo.js"></script>

    <script src="<?=base_url();?>assets/admin/js/analytics.js"></script>
    <script src="<?=base_url();?>assets/admin/js/pages/dashboards_index.js"></script>

    <!-- Library -->
    <script src="<?=base_url();?>assets/admin/libs/spin/spin.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/ladda/ladda.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/select2/select2.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/datatables/datatables.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/growl/growl.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/toastr/toastr.js"></script>
    <script src="<?=base_url();?>assets/admin/js/bootstrap.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/bootstrap-multiselect/bootstrap-multiselect.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/select2/select2.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/markdown/markdown.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/bootstrap-markdown/bootstrap-markdown.js"></script>

    <!-- Js -->
    <script src="<?=base_url();?>assets/admin/js/pages/misc_ladda.js"></script>
    <script src="<?=base_url();?>assets/admin/js/jquery.buttonLoader.min.js"></script>
    <script src="<?=base_url();?>assets/admin/js/sweetalert.min.js"></script>
    <script src="<?=base_url();?>assets/admin/js/pages/tables_datatables.js"></script>
    <script src="<?=base_url();?>assets/admin/js/pages/ui_notifications.js"></script>
    <script src="<?=base_url();?>assets/admin/js/pages/forms_selects.js"></script>
    <script src="<?=base_url();?>assets/admin/js/pages/forms_editors.js"></script>

    <script src="<?=base_url();?>assets/admin/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/moment/moment.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/bootstrap-material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/timepicker/timepicker.js"></script>
    <script src="<?=base_url();?>assets/admin/libs/minicolors/minicolors.js"></script>


    <script src="<?=base_url();?>assets/admin/js/pages/pages_chat.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

    <script type="text/javascript">
      var base_url = $('#base_url').val();

      <?php 
      if($report_details_cir['adv_response'] != ""){

          echo "var canvas = document.getElementById('signature-pad-rep');

          document.getElementById('clear-rep').addEventListener('click', function () {
          signaturePad.clear();
      });

          ";

      }else{
          echo "var canvas = document.getElementById('signature-pad');
          document.getElementById('clear').addEventListener('click', function () {
          signaturePad.clear();
      });

          ";
      }
      ?>
    
      function resizeCanvas() {
          var ratio =  Math.max(window.devicePixelRatio || 1, 1);
          canvas.width = canvas.offsetWidth * ratio;
          canvas.height = canvas.offsetHeight * ratio;
          canvas.getContext("2d").scale(ratio, ratio);
      }

      window.onresize = resizeCanvas;
      resizeCanvas();

      var signaturePad = new SignaturePad(canvas, {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)'
      });
     

          function answer_submit(){
              $("#answer_submit").buttonLoader('start');
            var id_question = $("input[name='id_question[]']").map(function(){return $(this).val();}).get();
            var answer_question = $("input[name='answer_question[]']").map(function(){return $(this).val();}).get();

            //UPDATE TO_ADDRESS IN CIR

            $.ajax({
                    url: base_url+'Admin/answer_question',
                    type: 'POST',
                    data: {
                        id_question: id_question,
                        answer_question: answer_question,
                        report_number: $("#report_number").val(),
                        token:$("#token").val()
                    },
                    success: (res) => {
                        console.log(res);
                        $("#answer_submit").buttonLoader('stop');
                        if(res==1){
                            swal({ 
                                title: "Sent", 
                                text: "Answer submitted. Wait for Company Representative response",
                                type: "success" 
                            },function(ret) {
                              location.href = 'provide_password?report_number='+$("#report_number").val()+'&user_type=1'; 
                            })
                        }else{
                            swal("Failed", "Password Invalid,Please try again!", "error");
                        }
                    }
               });
        }

        function copResponseSave(){
           $("#copResponseSave").buttonLoader('start');
            $.ajax({
                    url: base_url+'Admin/company_response',
                    type: 'POST',
                    data: {
                        company_response: $("#company_response").val(),
                        report_number: $("#report_number").val(),
                        token:$("#token").val()
                    },
                    success: (res) => {
                        $("#copResponseSave").buttonLoader('stop');
                        console.log(res);
                        if(res==1){
                            swal({ 
                                title: "Sent", 
                                text: "Your reponse successfully submitted",
                                type: "success" 
                            },function(ret) {
                              location.href = 'provide_password?report_number='+$("#report_number").val()+'&user_type=0'; 
                            })
                        }else{
                            swal("Failed", "Password Invalid,Please try again!", "error");
                        }
                    }
               });
        }

        function saveContacted(){
           var data = signaturePad.toDataURL('image/png');
           $("#saveContacted").buttonLoader('start');
           $("#imageUrl-adv").val(data);
           console.log(data);
            $.ajax({
                    url: base_url+'Admin/adviser_response',
                    type: 'POST',
                    data: {
                        adviser_response: $("#adviser_response").val(),
                        report_number: $("#report_number").val(),
                        adv_signature:  $("#imageUrl-adv").val(),
                        token:$("#token").val()
                    },
                    success: (res) => {
                        $("#saveContacted").buttonLoader('stop');
                        console.log(res);
                        if(res==1){
                            swal({ 
                                title: "Sent", 
                                text: "Your response successfully submitted",
                                type: "success" 
                            },function(ret) {
                              location.href = 'provide_password?report_number='+$("#report_number").val()+'&user_type=1'; 
                            })
                        }else{
                            swal("Failed", "Password Invalid,Please try again!", "error");
                        }
                    }
               });
        }
         function saveActionTaken(){
             var data = signaturePad.toDataURL('image/png');
              $("#saveActionTaken").buttonLoader('start');
              $("#imageUrl-rep").val(data);
              var satisfactorily = $("#satisfactorily").val()
              var if_not = $("#if_not").val();
              var finalisation = $("select[name='finalisation[]']").map(function(){return $(this).val();}).get();
              console.log(if_not);
             $.ajax({
                    url: base_url+'Admin/action_response',
                    type: 'POST',
                    data: {
                        action_response: $("#action_response").val(),
                        report_number: $("#report_number").val(),
                        satisfactorily: satisfactorily,
                        if_not: if_not,
                        finalisation: finalisation.toString(),
                        signature:data
                    },
                    success: (res) => {
                        $("#saveActionTaken").buttonLoader('stop');
                        if(res==1){
                            swal({ 
                                title: "CIR Completed", 
                                text: "Your CIR is successfully completed and already sent to managing director. Thank You!",
                                type: "success" 
                            },function(ret) {
                              //location.href = 'provide_password?report_number='+$("#report_number").val()+'&user_type=0'; 
                            })
                        }else{
                            swal("Failed", "Password Invalid,Please try again!", "error");
                        }
                    }
               });   
         }
         $(".ifnot").hide();
         function getval(id){ 
          if(id.value == 1)
            {
              $(".ifnot").hide();
            }else{
              $(".ifnot").show();
            }
         }

    </script>
</body>
</html>
