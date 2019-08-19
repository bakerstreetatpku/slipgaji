<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD-->
<head>
   
     <meta charset="UTF-8" />
    <title><?= "$judul [$subjudul] | bandingin.com";?></title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
     <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <!-- GLOBAL STYLES -->
    <!-- GLOBAL STYLES -->
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
	<!-- Custom Checkbox -->
    <link rel="stylesheet" href="assets/css/rch.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome-min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/css/ionicons-min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/plugins/datatables/buttons.dataTables.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap.css">
    <!-- Daterange picker --
    <link rel="stylesheet" href="assets/plugins/datatables/jquery.dataTables.css">
    <!--END GLOBAL STYLES -->
    <!-- PAGE LEVEL STYLES -->
    <!-- jQuery 2.1.4 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/app.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/rch.js"></script>
    <!-- AdminLTE for demo purposes --
    <script src="assets/dist/js/demo.js"></script>
    <!-- END PAGE LEVEL  STYLES -->
       <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
    <!-- END  HEAD-->
    <!-- BEGIN BODY-->
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="assets/dist/img/logo.png" class="logo-atas"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SI-PENTAJA</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">	
          </a>
		  <a href="#" class="" style="margin-left:10px;background-width:10%;"></a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
			
              <li class="">
				<a  href=""><i class="glyphicon glyphicon-refresh"></i> </a>
			  </li>
            
              
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
          <!-- sidebar menu: : style can be found in sidebar.less -->
            <li class="header">HOME</li>
			<li class="active"><a href="{{ base_url("dashboard");}}"><i class="fa fa-home"></i> <span>Home</span></a></li>
			
            <li class="header">MENU UTAMA</li>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <!-- hide menu -->
			<li class="treeview" nm="Data Master">
              <a href="#">
                <i class="fa fa-th"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
					<li><a href="pegawai"><i class="fa fa-angle-double-right"></i> <span>Pegawai</span></a></li>
					<li><a href="periodeabsen"><i class="fa fa-angle-double-right"></i> <span>Periode Absen</span></a></li>
					<li><a href="absen"><i class="fa fa-angle-double-right"></i> <span>Periode Absen</span></a></li>
              </ul>
            </li>
		 
          <!-- sidebar menu: : style can be found in sidebar.less -->
            <li class="header">LINK TERKAIT</li>
            <li><a href="http://bandingin.com" target="_blank"><i class="fa fa-angle-right text-aqua"></i> <span>Bandingin.com</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <label id="jdl"><?= $judul; ?></label>
            <small id="submn"><?= $subjudul; ?></small>
          </h1>
		  <div class="col-md-12">
		  <ol class="breadcrumb">
            <li style="width:100%;"><a href="#">
				<marquee style="background:white;border-radius:5px; color:black; "scrolldelay="1" scrollamount="3" direction="left">Sistem Penggajian <b>bandingin.com</b> [copyright &copy; 2019] </marquee>
			</a></li>
          </ol>
		  </div>
        </section>
		

	<!-- Modal Informasi Tutup -->
		<div class="modal fade" id="info_tutup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-info-circle"></i> Informasi</h4>
			  </div>
			  <div class="modal-body" id="pesan_info_tutup">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" id="tutup_info_tutup">Tutup <b style="font-size:18px;">(غطاء)</b></button>
			  </div>
			</div>
		  </div>
		</div>
		
		
	<!-- Modal Informasi OK -->
		<div class="modal fade" id="info_ok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title" id="myModalLabel"><i class="fa fa-info-circle"></i> Informasi</h4>
			  </div>
			  <div class="modal-body" id="pesan_info_ok">
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" id="ok_info_ok">OK <b style="font-size:18px;">(حسناً)</b></button>
			  </div>
			</div>
		  </div>
		</div>
		
		

	<!-- Bootstrap modal -->
	<div class="modal fade" id="konfirm_logout" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title"><i class="glyphicon glyphicon-info"></i> Konfirmasi Logout</h3>
				</div>
				<div class="modal-body form">
					<form action="#" id="form" class="form-horizontal">
						<div class="form-body">
							Yakin ingin logout sistem ?
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<a type="button" href="{{ base_url("login/logout");}}" class="btn btn-primary">Ya</a>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
		<!-- Modal Konfirmasi Ya Tidak -->	
	<div class="modal fade" id="frmKonfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title" id="jdlKonfirm">Konfirmasi Pembatalan Verifikasi</h4>
		  </div>
		  <div class="modal-body">
			<div id="isiKonfirm"></div>
			<input type="hidden" name="idSts" id="idSts">
			<input type="hidden" name="hapusfoto" id="hapusfoto">
			<input type="hidden" name="modeKonfirm" id="modeKonfirm">
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn utama btn-primary" data-dismiss="modal" id="yaKonfirm">Ya <b style="font-size:18px;">(نعم)</b></button>
			<button type="button" class="btn utama btn-danger" data-dismiss="modal" id="tidakKonfirm">Tidak <b style="font-size:18px;">(لا)</b></button>
			<a href="" class="btn btn-success cadangan" id="okKonfirm" style="display:none;">OK <b style="font-size:18px;">(حسناً)</b></a>
		  </div>
		</div>
	  </div>
	</div>
	
	<!-- Modal Konfirmasi Ya Tidak -->	
	<div class="modal fade" id="frmKonfirm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h4 class="modal-title" id="jdlKonfirm2">Konfirmasi Pembatalan Verifikasi</h4>
		  </div>
		  <div class="modal-body">
			<div id="isiKonfirm2"></div>
			<input type="hidden" name="idSts" id="idSts">
			<input type="hidden" name="modeKonfirm2" id="modeKonfirm2">
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn utama btn-primary" data-dismiss="modal" id="yaKonfirm2">Ya <b style="font-size:18px;">(نعم)</b></button>
			<a href="" class="btn utama btn-danger" id="tidakKonfirm2">Tidak <b style="font-size:18px;">(لا)</b></a>
		  </div>
		</div>
	  </div>
	</div>

	<!-- Modal Informasi OK -->
		<div class="modal fade" id="frmOK" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h4 class="modal-title" id="jdlOK">Hasil Hapus Data</h4>
			  </div>
			  <div class="modal-body" id="isiOK">
			  </div>
			  <div class="modal-footer">
				<a href="" class="btn btn-default" id="okOK">OK <b style="font-size:18px;">(حسناً)</b></a>
			  </div>
			</div>
		  </div>
		</div>
		
	<script src="assets/js/ubah_pass.js"></script>