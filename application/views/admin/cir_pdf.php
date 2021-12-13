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

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ content ] Start -->
    <div class="authentication-wrapper authentication-2 px-4">
        <div class="authentication-inner py-5">
            
            <form class="card" action="javascript:;" method="POST">
                <div class="p-4 p-sm-5">
                    <!-- [ Logo ] Start -->
                    <div class="d-flex justify-content-center align-items-center pb-2 mb-4">
                        <div class="ui-w-60">
                            <div class="w-100 position-relative">
                                <img src="<?=base_url();?>assets/admin/img/elitelogo.png" alt="Brand Logo" class="img-fluid">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <p>Please enter your link password to access.</p>
                    <div class="form-group">
                        <input type="text" class="form-control" id="passwordADV" placeholder="Enter Link Password">
                        <input type="hidden" id="base_url" value="<?=base_url();?>">
                        <div class="clearfix"></div>
                    </div>
                    <button type="button" class="btn btn-primary btn-block" onclick="submitPassword()">Submit Password</button>
                </div>
            </form>
            <!-- [ Form ] End -->
          
        </div>
    </div>
    <input type="hidden" class="form-control" id="report_number" placeholder="Enter Link Password" value="<?= $_GET['report_number']?>">

    <!-- [ content ] End -->

    <!-- Core scripts -->
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

<!-- Created JS -->


</body>


<!-- pages_authentication_password-reset.html  13:35:20 GMT -->
</html>
