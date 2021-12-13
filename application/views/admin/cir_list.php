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
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#user-edit-account"><?= ($_GET['type'] == 0)  ? "Incident List" : "Compliance Incident List" ?></a>
                                </li>
                            </ul>
                            <div class="card spaced-card">
                                    <div class="card-header card-header-flex">
                                        <div>
                                            <div class="flex-right-button">
                                                <a href="<?=base_url();?>admin/create_cir?token=<?= $access_token ?>&type=<?= $_GET['type']?>  " class="btn btn-success btn-md"><i class="ion ion-ios-add-circle text-white"></i> Create <?= ($_GET['type'] == 0)  ? "IR" : "CIR" ?></a>

                                                <a data-toggle="modal" data-target="#modals-top" href="javascript:;" class="btn btn-info btn-md waves-effect"><i class="ion ion-md-archive text-white"></i> Generate Report</a>
                                            </div>
                                        </div>
                                    </div> 
                                    <input type="hidden" id="token" value="<?= $access_token ?>">
                                    <input type="hidden" id="type" value="<?= $_GET['type'] ?>">
                                    <div class="card-datatable table-responsive">
                                        <table class="datatables-demo table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Report Number</th>
                                                    <th><?= ($_GET['type'] == 0)  ? "Contractor/Employee" : "Adviser" ?></th>
                                                    <th>Company Representative</th>
                                                    <th>Sent Date</th>
                                                    <th>Due Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if($cir_list){ ?>
                                            <?php foreach($cir_list as $cir){ ?>
                                            <tr>
                                                <td>
                                                <?= ($_GET['type'] == 0)  ? "IR2021" : "CIR2021" ?><?=$cir['report_number'] ?> 
                                                </td>
                                                <td>
                                                    <?=$cir['adv_name'] ?> 
                                                </td>
                                                <td>
                                                    <?=$cir['name'] ?> 
                                                </td>
                                                 <td>
                                                    <?=  date('d-m-Y', strtotime($cir['send_date'])) ?> 
                                                </td>
                                                <td>
                                                    <?= date('d-m-Y', strtotime($cir['due_date'])) ?> 
                                                </td>
                                                <td>
                                                    <?php if($cir['status'] == 0){ ?>
                                                    <span class="badge badge-warning ml-1">Not Completed</span>
                                                    <?php } else { ?>
                                                    <span class="badge badge-success ml-1">Completed</span>
                                                    <?php } ?>          
                                                </td>
                                                
                                                <td>
                                                    <a href="<?=base_url()?>admin/Compliance_Report?report_number=<?=$cir['report_number'] ?>&type=<?= $_GET['type']?>" class="btn icon-btn btn-sm btn-outline-primary" title="View PDF" >
                                                        <span class="feather icon-eye"></span>
                                                    </a>
                                                    <a style="color:green;" href="<?=base_url()?>admin/Compliance_Report?report_number=<?=$cir['report_number'] ?>&download=1" class="btn icon-btn btn-sm btn-outline-primary" title="Download PDF" >
                                                        <span class="feather icon-download"></span>
                                                    </a>
                                                    <a style="color:red;" href="javascript:;" onclick="delete_cir(this)" id="<?=$cir['report_number'] ?>" class="btn icon-btn btn-sm btn-outline-primary" title="Delete Report" >
                                                        <span class="feather icon-trash"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        <?php } ?>                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>  
                            </div> 
                    </div>
                    <input type="hidden" id="base_url" value="<?=base_url();?>">

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


<div class="modal modal-top fade" id="modals-top" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Report</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col">
                        <label class="form-label">Select <?= ($_GET['type'] == 0)  ? "Contactor/Employee" : "Adviser" ?></label>
                        <select id="adviser_id" class="select2-demo form-control select2-hidden-accessible" style="width: 100%" data-select2-id="31" tabindex="-1" aria-hidden="true" multiple="multiple" name="adviser_list[]">
                                <?php if($_GET['type'] == 1){?>
                                   
                                    <option value="all">ALL</option>
                                    <?php if($adviser_list){ ?>
                                        <?php foreach($adviser_list as $adv){ ?>
                                            <option value="<?=$adv['id'] ?>"><?=$adv['name']?></option>
                                        <?php } ?>
                                    <?php } ?>   

                                <?php } else { ?>

                                     <option value="all">ALL</option>
                                    <?php if($admin_adviser){ ?>
                                        <?php foreach($admin_adviser as $adm){ ?>
                                            <option value="<?=$adm['id'] ?>"><?=$adm['name']?></option>
                                        <?php } ?>
                                    <?php } ?>   


                                <?php } ?>
                        </select>
                        <span class="required" style="color:red; font-size: 10px; display: none; font-style: italic;">This field is required</span>
                        <div class="clearfix"></div>
                    </div>
                </div>
                 <div class="row">
                    <div class="form-group col mb-0">
                        <label class="form-label"><?= ($_GET['type'] == 0)  ? "IR" : "CIR" ?> Status</label>
                        <select id="status" class="select2-demo form-control select2-hidden-accessible" style="width: 100%">
                            <option value="all">ALL</option>
                            <option value="1">Completed</option>
                            <option value="0">Not Completed</option>                            
                        </select>
                        <div class="clearfix"></div>
                    </div>
                </div><br>
                <div class="form-row">
                    <div class="form-group col mb-0">
                        <label class="form-label">Date From</label>
                        <input type="text" id="b-m-dtp-date" class="form-control date-from" placeholder="From" data-dtp="dtp_BUxli">
                        <span class="required" style="color:red; font-size: 10px; display: none; font-style: italic;">This field is required</span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group col mb-0">
                        <label class="form-label">Date To</label>
                        <input type="text" id="b-m-dtp-date2" class="form-control date-to" placeholder="To" data-dtp="dtp_BUxli">
                        <span class="required" style="color:red; font-size: 10px; display: none; font-style: italic;">This field is required</span>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="generate()">Submit</button>
            </div>
        </form>
    </div>
</div>

    <!-- Core scripts -->
    <?php $this->load->view('admin/common/js');?>
    <script src="<?=base_url();?>assets/admin/js/pages/forms_pickers.js"></script>
    <script type="text/javascript">
        function delete_cir(id){
            swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            },function(ret) {
                if(ret == true){
                 var base_url = $('#base_url').val();
                        $.ajax({
                                url: base_url+'Admin/delete_cir',
                                type: 'POST',
                                data: {
                                    report_number:id.id
                                },
                                success: (res) => {
                                   location.reload();
                                }
                            });
                    }else{

                    }
                })

        }

        function generate(){
            var base_url = $('#base_url').val();
            var token = $("#token").val();
            $("#adviser_id").attr("style","0px solid rgba(24, 28, 33, 0.1)");
            $(".date-to").attr("style","0px solid rgba(24, 28, 33, 0.1)");
            $(".date-from").attr("style","0px solid rgba(24, 28, 33, 0.1)");
            if($("#adviser_id").val() === null){
                $("#adviser_id").attr("style","border-bottom:1px solid #ff6b81;")
            }else if(  $(".date-from").val() === ""){
                $(".date-from").attr("style","border-bottom:1px solid #ff6b81;")
            }else if(  $(".date-to").val() === ""){
                $(".date-to").attr("style","border-bottom:1px solid #ff6b81;")
            }else{
                 window.location.href(base_url+'Admin/report_history?token='+token+'&adviser_id='+$("#adviser_id").val()+'&date_from='+$(".date-from").val()+'&date_to='+$(".date-to").val()+'&status='+$("#status").val()+'&type='+$("#type").val(), "_newtab");    
            }
            
        }
    </script>
</body>
</html>












