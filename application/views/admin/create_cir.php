<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">


<?php $this->load->view('admin/common/css');?>


<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] Ebd -->

    <!-- [ Layout wrapper ] Start -->
      <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <?php $this->load->view('admin/common/leftnav');?>
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->
                <?php $this->load->view('admin/common/topbar');?>
                <!-- [ Layout navbar ( Header ) ] End -->

                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                      <div class="layout-content">

                    <!-- [ content ] Start -->
                     <div class="container-fluid flex-grow-1 container-p-y">
                       
                        <div class="nav-tabs-top">
                            <ul class="nav nav-tabs">
                            <?php if($_GET['type'] == 1){?>
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#user-edit-account">Compliance Incident Report</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#user-edit-account">Incident Report</a>
                                </li>
                            <?php } ?>
                            </ul>
                            <form class="form-horizontal" style="background-color: white;" action="javascript:;" method="POST" id="saveCIRForm">
                            <div class="tab-content">   
                                <div class="tab-pane fade show active" id="user-edit-account">
                                    <div class="card-body pb-2">
                                <?php if($_GET['type'] == 1){?>
                                         <div class="form-group">
                                            <label class="form-label-lg mb-2" style="font-weight: bold;">Select Adviser</label>
                                            <select id="adviser_id" class="js-select" style="width: 100%" onchange="getHistory(this)">
                                                <?php if($adviser_list){ ?>
                                                    <?php foreach($adviser_list as $adv){ ?>
                                                        <option value="<?=$adv['id'] ?>"><?=$adv['name']?></option>
                                                    <?php } ?>
                                                <?php } ?>   
                                            </select>
                                        </div> 

                                        <div class="form-group">
                                            <label class="form-label-lg mb-2" style="font-weight: bold;">Report Number</label><br>
                                            <label class="form-label-lg" style="font-size: 15px">CIR2021<?=$report_number['report_number'] ?></label>
                                            <input type="hidden" id="report_number" class="form-control" value="CIR2021<?=$report_number['report_number'] ?>">
                                        </div> 
                                <?php } else { ?>
                                        <div class="form-group">
                                            <label class="form-label-lg mb-2" style="font-weight: bold;">Select Employee/Contractor</label>
                                            <select id="adviser_id" class="js-select" style="width: 100%" onchange="getHistory(this)">
                                                <?php if($admin_adviser){ ?>
                                                    <?php foreach($admin_adviser as $adm){ ?>
                                                        <option value="<?=$adm['id'] ?>"><?=$adm['name']?></option>
                                                    <?php } ?>
                                                <?php } ?>   
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label-lg mb-2" style="font-weight: bold;">Report Number</label><br>
                                            <label class="form-label-lg" style="font-size: 15px">IR2021<?=$report_number['report_number'] ?></label>
                                            <input type="hidden" id="report_number" class="form-control" value="IR2021<?=$report_number['report_number'] ?>">
                                        </div> 
                                <?php } ?>

                                        
                                        <div class="form-group">
                                            <label class="form-label-lg mb-2" style="font-weight: bold;">Send Date</label>
                                            <input type="text" id="b-m-dtp-date" class="form-control" placeholder="Sent Date" data-dtp="dtp_BUxli">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label-lg mb-2"style="font-weight: bold;" >Due Date</label>
                                            <input type="text" id="b-m-dtp-date2" class="form-control" placeholder="Due Date" data-dtp="dtp_BUxli">
                                        </div>
                                        <div class="form-group">
                                             <div class="row">
                                                   <div class="col-lg-12">
                                                    <div class="input-group input-group-md">
                                                         <label class="form-label-lg mb-2" style="font-weight: bold;"><?= ($_GET['type'] == 0)  ? 'Issue(s) Identified' : "Issue to be address" ?></label>
                                                      <span class="input-group-btn">
                                                        <a href="javascript:;"  onclick="addIdentified()" title="Add issue Identified"><i class="feather icon-plus ml-2 " style="font-size: 19px; color:#00a323;"></i></a>
                                                      </span>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="Identified">
                                                    <input type="text" class="form-control form-control-lg col-md-3" name="issue_identified[]" placeholder="1. Issue">
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label-lg mb-2" style="font-weight: bold;"><?= ($_GET['type'] == 0)  ? 'Incident Details' : "Investigation Information" ?> </label>
                                            <textarea class="form-control form-control-lg" placeholder="Investigation information" id="investigation_information" rows="10" cols="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                                <div class="row">
                                                   <div class="col-lg-12">
                                                    <div class="input-group input-group-md">
                                                        <label class="form-label-lg mb-2" style="font-weight: bold;"><?= ($_GET['type'] == 0)  ? 'Issue(s) to be address' : "Issue to be address" ?></label>
                                                      <span class="input-group-btn">
                                                        <a href="javascript:;" onclick="addIssueAddress()" title="Add question"><i class="feather icon-plus ml-2 " style="font-size: 19px; color:#00a323;"></i></a>
                                                      </span>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="addIssueAddress">
                                                    <input type="text" class="form-control form-control-lg col-md-3" name="issue_address[]" placeholder="1. Issue to be address">
                                                </div>
                                        </div>
                                <?php if($_GET['type'] == 1){?>
                                         <div class="form-group">
                                            <label class="form-label-lg mb-2" style="font-weight: bold;">Adviser Compliance History</label>
                                            <div class="history"></div>
                                        </div>
                                 <?php } else { ?>
                                        <div class="form-group">
                                            <label class="form-label-lg mb-2" style="font-weight: bold;">Contractor/Employee Incident History</label>
                                            <div class="history"></div>
                                        </div>
                                <?php } ?>
                                    </div>
                             
                                    <hr class="border-light m-0">
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <button type="submit" id="save_cir" class="btn btn-primary" onclick="save()">Submit</button>&nbsp;
                            <input type="hidden" id="token" name="token" value="<?=  $_GET['token']; ?>">
                            <input type="hidden" id="user_id" name="user_id" value="<?=  $user_details['id'] ?>">
                        </div>
                        <input type="hidden" id="numberChk" value="1"> 
                        <input type="hidden" id="numberChk2" value="1"> 
                        <input type="hidden" id="type" value="<?= $_GET['type'] ?>"> 
                    </form> 
                </div>
                    <!-- [ content ] End -->

                    <!-- [ Layout footer ] Start -->
                    <?php $this->load->view('admin/common/footer');?>
                    <!-- [ Layout footer ] End -->
                </div>
                <!-- [ Layout content ] Start -->
            </div>
            <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper ] end -->

    <!-- Core scripts -->
    <?php $this->load->view('admin/common/js');?>
    <script src="<?=base_url();?>assets/admin/js/pages/forms_pickers.js"></script>
    <script type="text/javascript">

            


            var base_url = $('#base_url').val();
            function addIdentified(){
                var ctr = parseInt($('#numberChk').val()) + 1;
                var new_input = '<input type="text" class="form-control form-control-lg col-md-3" name="issue_identified[]" placeholder="'+ctr+'. Issue">';
                $('.Identified').append(new_input);
                $('#numberChk').val(ctr);
            }
            function addIssueAddress(){
                var ctr = parseInt($('#numberChk2').val()) + 1;
                var new_input = '<input type="text" class="form-control form-control-lg col-md-3" name="issue_address[]" placeholder="'+ctr+'. Issue to be address">';
                $('.addIssueAddress').append(new_input);
                $('#numberChk2').val(ctr);
            }

            function save(){
                var issue_identified = $("input[name='issue_identified[]']").map(function(){return $(this).val();}).get();
                var issue_address= $("input[name='issue_address[]']").map(function(){return $(this).val();}).get();
                $("#save_cir").buttonLoader('start');
                $.ajax({
                    url: base_url+'Admin/add_cir',
                    type: 'POST',
                    data: {
                        adviser_id: $("#adviser_id").val(),
                        report_number: $("#report_number").val(),
                        send_date: $("#b-m-dtp-date").val(),
                        due_date: $("#b-m-dtp-date2").val(),
                        issue_identified: issue_identified,
                        investigation_information: $("#investigation_information").val(),
                        issue_address: issue_address,
                        token: $("#token").val(),
                        type: $("#type").val(),
                        representative_id: $("#user_id").val() //TO DO GET SESSION OR PARAMT
                    },
                    success: (res) => {
                        var text = "";
                        if($("#type").val() == 1){
                            text = "CIR submitted and emailed to adviser!";
                        }else{
                            text = "IR submitted and emailed!";
                        }
                        if(res==1){
                            $("#save_cir").buttonLoader('stop');
                            swal({ 
                                title: "Sent", 
                                text: text,
                                type: "success" 
                            },function(ret) {
                                window.location.reload();
                            })
                        }else{
                            $("#save_cir").buttonLoader('stop');
                            swal("Failed", "Something went wrong,Please try again!", "error");
                        }
                    }
               });
            }

            $(document).ready(function() {
                
                var text = "";
                if($("#type").val() == 1){
                    text = "Select Adviser";
                }else{
                    text = "Select Contractor/Employee";
                }

                $('.js-select').append('<option selected></option>').select2({
                        placeholder: text,
                        allowClear: true
                });
            });

            function getHistory(id){
                $.ajax({
                    url: base_url+'Admin/getHistory',
                    type: 'POST',
                    data: {
                        adviser_id:id.value,
                        token:$("#token").val(),
                        type:$("#type").val()
                    },
                    success: (res) => {

                        $(".history").html('');
                        var obj = jQuery.parseJSON(res.toString())
                        
                        if($("#type").val() == 1){
                        text = "CIR2021";
                        }else{
                            text = "IR2021";
                        }

                        for(var i=0; i < obj.length; i++){
                            $(".history").append('<label style="margin-right: 5px;">'+text+obj[i]['report_number']+'</label>')
                        }
                    }
               });   
            }
    </script>
</body>
</html>












