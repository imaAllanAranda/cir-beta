 <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white">
                <!-- Brand demo (see assets/css/demo/demo.css) -->
                <div class="app-brand demo">
                    <span class="app-brand-logo demo">
                        <img src="<?=base_url();?>assets/admin/img/logo.png" height="150" width="150" alt="Brand Logo" class="img-fluid">
                    </span>
                    <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                        <i class="ion ion-md-menu align-middle"></i>
                    </a>
                </div>
                <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
                <ul class="sidenav-inner py-1">
                   <li class="sidenav-item">
                    <?php if($_GET['type'] == 1){?>
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-plus-square"></i>
                            <div>CIR</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <a href="<?=base_url();?>admin/cir_list?token=<?= $_GET['token'] ?>&type=<?= $_GET['type'] ?>" class="sidenav-link">
                                    <div>List of CIR</div>
                                </a>
                            </li>
                             <li class="sidenav-item">
                                <a href="<?=base_url();?>admin/create_cir?token=<?= $_GET['token'] ?>&type=<?= $_GET['type'] ?>" class="sidenav-link">
                                    <div>Create CIR</div>
                                </a>
                            </li>
                        </ul>
                    <?php } else { ?>
                        <a href="javascript:" class="sidenav-link sidenav-toggle">
                            <i class="sidenav-icon feather icon-plus-square"></i>
                            <div>Incident Report</div>
                        </a>
                         <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <a href="<?=base_url();?>admin/cir_list?token=<?= $_GET['token'] ?>&type=<?= $_GET['type'] ?>" class="sidenav-link">
                                    <div>List of IR</div>
                                </a>
                            </li>
                             <li class="sidenav-item">
                                <a href="<?=base_url();?>admin/create_cir?token=<?= $_GET['token'] ?>&type=<?= $_GET['type'] ?>" class="sidenav-link">
                                    <div>Create IR</div>
                                </a>
                            </li>
                        </ul>
                    <?php } ?>
                       
                    </li>
                </ul>
            </div>