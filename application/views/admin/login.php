<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">


<!-- pages_authentication_login-v1.html  13:35:20 GMT -->
<head>
    <title>CIR</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="" />
    <link rel="icon" type="image/x-icon" href="">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/fonts/fontawesome.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/fonts/ionicons.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/fonts/linearicons.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/fonts/open-iconic.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/fonts/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/fonts/feather.css">
    <link href="<?=base_url();?>assets/admin/css/sweetalert.min.css" rel="stylesheet" type="text/css" />

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/bootstrap-material.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/shreerang-material.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/uikit.css">

    <!-- Libs -->
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/libs/perfect-scrollbar/perfect-scrollbar.css">
    <!-- Page -->
    <link rel="stylesheet" href="<?=base_url();?>assets/admin/css/pages/authentication.css">
    <input type="hidden" id="base_url" value="<?=base_url();?>">

</head>

<body>
     

    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Content ] Start -->
    <div class="authentication-wrapper authentication-2 ui-bg-cover ui-bg-overlay-container px-4" style="background-color: #fff">
        <div class="ui-bg-overlay "></div>

        <div class="authentication-inner py-5">

            <div class="card">
                <div class="p-4 p-sm-5 authentication-container">
                    <!-- [ Logo ] Start -->
                    <div class="d-flex justify-content-center align-items-center pb-2 mb-4 mr-5">
                        <div class="ui-w-100">
                            <div class="w-100 position-relative">
                               <!--  <img style="height: 150px; width: 150px;" src="https://res.cloudinary.com/dhlxqi37n/image/upload/v1624590206/logo.png" alt="Brand Logo"> -->
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- [ Logo ] End -->

                    <!-- <h5 class="text-center text-muted font-weight-normal mb-4">Online Insurance Payroll Software</h5> -->

                    <!-- Form -->
                    <form>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" name="login_email" id="login_email" class="form-control">
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label d-flex justify-content-between align-items-end">
                                <span>Password</span>
                                </label>
                            <input type="password" name="login_password" id="login_password" class="form-control">
                            <div class="clearfix"></div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center m-0">
                            <label class="custom-control custom-checkbox m-0">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-label">Remember me</span>
                            </label>
                            <button type="button" class="btn btn-primary" onclick="signIn()">Sign In</button>
                        </div>
                    </form>
                    <!-- [ Form ] End -->

                </div>
                
            </div>

        </div>
    </div>
    <!-- / Content -->

    <!-- Core scripts -->
    <?php $this->load->view('admin/common/js');?>

</body>


<!-- pages_authentication_login-v1.html  13:35:20 GMT -->
</html>
