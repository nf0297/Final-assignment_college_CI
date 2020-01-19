
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PT Galih Ayom Paramesti</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?=base_url()?>assets/AdminLTE-2.0.5/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="<?=base_url()?>assets/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Data Table -->
        <link href="<?=base_url()?>assets/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?=base_url()?>assets/ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?=base_url()?>assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?=base_url()?>assets/AdminLTE-2.0.5/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="skin-yellow">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <?php if ($this->session->userdata('level') == 3) {?>
            <a href="<?=site_url('Dashboard')?>" class="logo">
                <span class="logo-mini"><b>G</b>AP</span>
                <span class="logo-lg"><b>Engineer</b></span></a>
            <?php }?>
            <?php if ($this->session->userdata('level') == 2) {?>
            <a href="<?=site_url('Dashboard')?>" class="logo">
                <span class="logo-mini"><b>G</b>AP</span>
                <span class="logo-lg"><b>Manager</b></span></a>
            <?php }?>
            <?php if ($this->session->userdata('level') == 1) {?>
            <a href="<?=site_url('Dashboard')?>" class="logo">
                <span class="logo-mini"><b>G</b>AP</span>
                <span class="logo-lg"><b>Admin</b></span></a>
            <?php }?>
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?=base_url()?>assets/AdminLTE-2.0.5/dist/img/userimg.jpg" class="user-image" alt="User Image"/>
                                <span class="hidden-xs"><?=$this->fungsi->user_login()->nama_lengkap?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?=base_url()?>assets/AdminLTE-2.0.5/dist/img/userimg.jpg" class="img-circle" alt="User Image" />
                                    <p><?=$this->fungsi->user_login()->nama_lengkap?>
                                        
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?=site_url('Authentication/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>




        <!-- =============================================== --><!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=base_url()?>assets/AdminLTE-2.0.5/dist/img/userimg.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?=ucfirst($this->fungsi->user_login()->nama_lengkap)?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?=site_url('Dashboard')?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <?php if ($this->session->userdata('level') != 3) {?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Schedulling</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('jadwal')?>"><i class="fa fa-circle-o"></i> Active Schedule</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('hasil')?>"><i class="fa fa-circle-o"></i> Result Schedule</a></li>
                </ul>
            </li>  
            <?php }?> 
            <?php if ($this->session->userdata('level') != 3) {?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> 
                    <span>Product Managing</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('sproduk')?>"><i class="fa fa-circle-o"></i> Products</a></li>
                    <li><a href="<?=site_url('dproduk')?>"><i class="fa fa-circle-o"></i> Product Detail</a></li>
                      
                
                </ul>
            </li>    
            <?php }?>  
            <?php if ($this->session->userdata('level') != 2) {?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i> 
                    <span>Machining</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?=site_url('mesin')?>"><i class="fa fa-circle-o"></i> Machines</a></li>
                </ul>
            </li>
            <?php }?>
            <li>
            	<a href="#">
            		<i class="fa fa-book"></i> 
            		<span>Log</span>
            	</a>
        	</li>
            <?php if ($this->session->userdata('level') == 1) {?>
            <li class="header">SETTINGS</li>
            <li>
            	<a href="<?=site_url('user')?>">
            		<i class="fa fa-user"></i> 
            		<span>User</span>
            	</a>
            </li>
        <?php } ?>
        </ul>
    </section>
</aside>

<!-- Content Wrapper -->
<div class="content-wrapper">
	<?php echo $contents ?>
</div>
   
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong> Nurul Fikri &copy; 2019</strong> <a href="http://www.stmi.ac.id">Politeknik STMI Jakarta</a>.
    
</footer>
</div><!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/AdminLTE-2.0.5/plugins/jQuery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?=base_url()?>assets/AdminLTE-2.0.5/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/AdminLTE-2.0.5/plugins/slimScroll/jquery.slimScroll.min.js" type="text/javascript"></script>
<!-- DataTables -->
<script src="<?=base_url()?>assets/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src='<?=base_url()?>assets/AdminLTE-2.0.5/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/AdminLTE-2.0.5/dist/js/app.min.js" type="text/javascript"></script><!--tambahkan custom js disini-->
 <script>
  $(document).ready(function() {
    $('#style1').DataTable()
    })
 </script>
</body>
</html>