<!DOCTYPE html>

<html lang="en" class="material-style layout-fixed">


<?php $this->load->view('admin/common/css');?>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

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
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <h4 class="font-weight-bold py-3 mb-0">Dashboard</h4>
                        
                        
                        <div class="row">
                           <!--  <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                       <h3><span class="feather icon-phone-incoming" style="margin-right: 15px"></span>Contact us Inquiry</h3>
                                    </div>
                                    <div class="card-body">
                                      
                                    </div>
                                </div>
                            </div> -->
                        </div>
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

    <?php $this->load->view('admin/common/js');?>
    <style type="text/css">
        canvas{
            width: 100%;
        }
        .card-header h3{
            margin-bottom: 0
        }
    </style>
    <script>
      function resize(){    
        $("canvas").outerHeight($(window).height()-$("canvas").offset().top- Math.abs($("#canvas").outerHeight(true) - $("canvas").outerHeight()));
      }
      $(document).ready(function(){
        resize();
        $(window).on("resize", function(){                      
            resize();
        });
      });
      </script>
      <script src="<?=base_url();?>assets/admin/js/pages/charts_chartjs.js"></script>
</body>

</html>
