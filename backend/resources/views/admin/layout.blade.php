<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin | @yield('title')</title>
	
	@yield('css')
	<!-- Toastr -->
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css') }}">
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}"> 
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
	<!-- summernote -->
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.css') }}">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
</head>
<body class="layout-fixed sidebar-mini layout-navbar-fixed">
<style>
	.select2.select2-container{width: 100% !important;}
	.sorting_disabled::before,.sorting_disabled::after{content: none !important;}
	body .custom-file-label::after{content: "Выбрать";}
	#subjects-table_wrapper .dataTables_filter{margin-right:8px;}
	.user-panel img{max-width: inherit;}
</style>
<div class="wrapper">

	<!-- Preloader -->
	<div class="preloader flex-column justify-content-center align-items-center">
		<img class="animation__shake" src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
	</div>

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="javascript:;" role="button"><i class="fas fa-bars"></i></a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="/" class="nav-link" target="_blank">Перейти на сайт</a>
			</li> 
		</ul>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">	
			<li class="nav-item">
				<a class="nav-link" data-widget="fullscreen" href="javascript:;" role="button">
					<i class="fas fa-expand-arrows-alt"></i>
				</a>
			</li> 
		</ul>
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="/admin" class="brand-link">
			<img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
			<span class="brand-text font-weight-light">Главная</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="javascript:;" class="d-block">{{ auth("web")->user()->name }} {{ auth("web")->user()->surname }}</a>
				</div>
			</div>

			<?//if(Request()->route()->getName()=='admin_menu_main'){ echo 'active'; }?>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<li class="nav-item <?if(Request()->route()->getPrefix()=='admin/menu'){ echo 'menu-is-opening menu-open'; }?>">
						<a href="javascript:;" class="nav-link <?if(Request()->route()->getPrefix()=='admin/menu'){ echo 'active'; }?>">
							<i class="nav-icon fas fa-th"></i>
							<p>
								Меню
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{route('admin_menu', ['type'=>'main'])}}" class="nav-link <?if(Route::current()->type=='main'){ echo 'active'; }?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Главное</p>
								</a>
							</li>
						</ul>
					</li> 
					<li class="nav-item <?if(Request()->route()->getPrefix()=='admin/posts'){ echo 'menu-is-opening menu-open'; }?>">
						<a href="javascript:;" class="nav-link <?if(Request()->route()->getPrefix()=='admin/posts'){ echo 'active'; }?>">
							<i class="nav-icon fas fa-edit"></i>
							<p>
								Блог
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{route('admin_posts')}}" class="nav-link <?if(Route::current()->getName()=='admin_posts'){ echo 'active'; }?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Все записи</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('admin_posts_new')}}" class="nav-link <?if(Route::current()->getName()=='admin_posts_new'){ echo 'active'; }?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Добавить</p>
								</a>
							</li>
						</ul>
					</li> 
					<li class="nav-item <?if(Request()->route()->getPrefix()=='admin/pages'){ echo 'menu-is-opening menu-open'; }?>">
						<a href="javascript:;" class="nav-link <?if(Request()->route()->getPrefix()=='admin/pages'){ echo 'active'; }?>">
							<i class="nav-icon fas fa-book"></i>
							<p>
								Страницы
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{route('admin_pages')}}" class="nav-link <?if(Route::current()->getName()=='admin_pages'){ echo 'active'; }?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Все страницы</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('admin_pages_new')}}" class="nav-link <?if(Route::current()->getName()=='admin_pages_new'){ echo 'active'; }?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Добавить</p>
								</a>
							</li>
						</ul>
					</li> 
					<li class="nav-item <?if(Request()->route()->getPrefix()=='admin/vacancies'){ echo 'menu-is-opening menu-open'; }?>">
						<a href="javascript:;" class="nav-link <?if(Request()->route()->getPrefix()=='admin/vacancies'){ echo 'active'; }?>">
							<i class="nav-icon fas fa-file"></i>
							<p>
								Вакансии
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{route('admin_vacancies')}}" class="nav-link <?if(Route::current()->getName()=='admin_vacancies'){ echo 'active'; }?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Все</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('admin_vacancies_new')}}" class="nav-link <?if(Route::current()->getName()=='admin_vacancies_new'){ echo 'active'; }?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Добавить</p>
								</a>
							</li>
						</ul>
					</li> 
					<li class="nav-item <?if(Request()->route()->getPrefix()=='admin/team'){ echo 'menu-is-opening menu-open'; }?>">
						<a href="javascript:;" class="nav-link <?if(Request()->route()->getPrefix()=='admin/team'){ echo 'active'; }?>">
							<i class="nav-icon fas fa-user"></i>
							<p>
								Наша команда
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{route('admin_team')}}" class="nav-link <?if(Route::current()->getName()=='admin_team'){ echo 'active'; }?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Все</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{route('admin_team_new')}}" class="nav-link <?if(Route::current()->getName()=='admin_team_new'){ echo 'active'; }?>">
									<i class="far fa-circle nav-icon"></i>
									<p>Добавить</p>
								</a>
							</li>
						</ul>
					</li> 
					<li class="nav-item">
						<a href="{{ route('upload') }}" class="nav-link <?if(Route::current()->getName()=='upload'){ echo 'active'; }?>">
							<i class="nav-icon far fa-image"></i>
							<p>
								Медиабиблиотека
							</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="{{ route('orders') }}" class="nav-link <?if(Route::current()->getName()=='orders'){ echo 'active'; }?>">
							<i class="nav-icon fas fa-exclamation"></i>
							<p>
								Заявки
								<span class="badge badge-info right"><?=\App\Models\Order::count()?></span>
							</p>
						</a>
					</li>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0">@yield('title')</h1>
					</div> 
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				@yield('content')	
							
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		© ИРС <?=date('Y')?>
		<div class="float-right d-none d-sm-inline-block">
			<b>Версия</b> 1.0
		</div>
	</footer>

 
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
<!-- daterangepicker -->
<script src="{{ asset('adminlte/plugins/moment/moment.min.js') }}"></script>   
<script src="{{ asset('adminlte/plugins/moment/locale/ru.js') }}"></script>  
<script src="{{ asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/summernote/summernote-ru-RU.js') }}"></script>   
<!-- overlayScrollbars -->
<script src="{{ asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js') }}"></script> 
<!-- SweetAlert2 -->
<script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
@yield('scripts')
<script> 
	$(function () { 
        @if(session()->get('mess'))
	        var Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
			});
			toastr.success('{{session()->get('mess')}}')
		@endif
	});
</script>
</body>
</html>
