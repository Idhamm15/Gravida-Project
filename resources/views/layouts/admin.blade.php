<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />	



    {{-- Title --}}
    <title>@yield('title')</title>

    <!-- Style -->
    @stack('prepend-style')    
	@include('component.admin.styles.css')
    @stack('addon-style')

	@stack('prepend-script')
		<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['{{url ('assets_dashboard/assets/css/fonts.min.css')}}']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
		</script>
	@stack('addon-script')

  </head>

  <body>

	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="/admin" style="margin: -30px; padding-top: 10px"> 
					<img src="{{url ('img/gravida_icons.png')}}" alt="navbar brand" class="navbar-brand" style="width: 150px; height: 120px;">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			@include('component.admin.navbar')
		</div>

		<!-- Sidebar -->
		@include('component.admin.sidebar')

		<div class="main-panel">
			<div class="content">
				@yield('content')
			</div>


			<!-- Footer -->
			@include('component.admin.footer')
		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<div class="custom-template">
			<div class="title">Settings</div>
			<div class="custom-content">
				<div class="switcher">
					<div class="switch-block">
						<h4>Logo Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeLogoHeaderColor" data-color="dark"></button>
							<button type="button" class="selected changeLogoHeaderColor" data-color="blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeLogoHeaderColor" data-color="dark2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="purple2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="light-blue2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="green2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="orange2"></button>
							<button type="button" class="changeLogoHeaderColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Navbar Header</h4>
						<div class="btnSwitch">
							<button type="button" class="changeTopBarColor" data-color="dark"></button>
							<button type="button" class="changeTopBarColor" data-color="blue"></button>
							<button type="button" class="changeTopBarColor" data-color="purple"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue"></button>
							<button type="button" class="changeTopBarColor" data-color="green"></button>
							<button type="button" class="changeTopBarColor" data-color="orange"></button>
							<button type="button" class="changeTopBarColor" data-color="red"></button>
							<button type="button" class="changeTopBarColor" data-color="white"></button>
							<br/>
							<button type="button" class="changeTopBarColor" data-color="dark2"></button>
							<button type="button" class="selected changeTopBarColor" data-color="blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="purple2"></button>
							<button type="button" class="changeTopBarColor" data-color="light-blue2"></button>
							<button type="button" class="changeTopBarColor" data-color="green2"></button>
							<button type="button" class="changeTopBarColor" data-color="orange2"></button>
							<button type="button" class="changeTopBarColor" data-color="red2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Sidebar</h4>
						<div class="btnSwitch">
							<button type="button" class="selected changeSideBarColor" data-color="white"></button>
							<button type="button" class="changeSideBarColor" data-color="dark"></button>
							<button type="button" class="changeSideBarColor" data-color="dark2"></button>
						</div>
					</div>
					<div class="switch-block">
						<h4>Background</h4>
						<div class="btnSwitch">
							<button type="button" class="changeBackgroundColor" data-color="bg2"></button>
							<button type="button" class="changeBackgroundColor selected" data-color="bg1"></button>
							<button type="button" class="changeBackgroundColor" data-color="bg3"></button>
							<button type="button" class="changeBackgroundColor" data-color="dark"></button>
						</div>
					</div>
				</div>
			</div>
			<div class="custom-toggle">
				<i class="flaticon-settings"></i>
			</div>
		</div>
		<!-- End Custom template -->
	</div>

	@stack('prepend-script')
	<script>
			Circles.create({
				id:'circles-1',
				radius:45,
				value:60,
				maxValue:100,
				width:7,
				text: 5,
				colors:['#f1f1f1', '#FF9E27'],
				duration:400,
				wrpClass:'circles-wrp',
				textClass:'circles-text',
				styleWrapper:true,
				styleText:true
			})

			Circles.create({
				id:'circles-2',
				radius:45,
				value:70,
				maxValue:100,
				width:7,
				text: 36,
				colors:['#f1f1f1', '#2BB930'],
				duration:400,
				wrpClass:'circles-wrp',
				textClass:'circles-text',
				styleWrapper:true,
				styleText:true
			})

			Circles.create({
				id:'circles-3',
				radius:45,
				value:40,
				maxValue:100,
				width:7,
				text: 12,
				colors:['#f1f1f1', '#F25961'],
				duration:400,
				wrpClass:'circles-wrp',
				textClass:'circles-text',
				styleWrapper:true,
				styleText:true
			})

			var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

			var mytotalIncomeChart = new Chart(totalIncomeChart, {
				type: 'bar',
				data: {
					labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
					datasets : [{
						label: "Total Income",
						backgroundColor: '#ff9e27',
						borderColor: 'rgb(23, 125, 255)',
						data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
					}],
				},
				options: {
					responsive: true,
					maintainAspectRatio: false,
					legend: {
						display: false,
					},
					scales: {
						yAxes: [{
							ticks: {
								display: false //this will remove only the label
							},
							gridLines : {
								drawBorder: false,
								display : false
							}
						}],
						xAxes : [ {
							gridLines : {
								drawBorder: false,
								display : false
							}
						}]
					},
				}
			});

			$('#lineChart').sparkline([105,103,123,100,95,105,115], {
				type: 'line',
				height: '70',
				width: '100%',
				lineWidth: '2',
				lineColor: '#ffa534',
				fillColor: 'rgba(255, 165, 52, .14)'
			});
		</script>
	@stack('addon-script')

	<!-- Script -->
	@stack('prepend-script')
	@include('component.admin.styles.script')
	@stack('addon-script')

	{{-- alert from session --}}
	@if (session()->has('success'))
	<script>
		Swal.fire({
		icon: 'success',
		title: 'Success',
		text: "{{ session('success') }}",
		});
	</script>
	@endif
	@if (session()->has('failed'))
	<script>
		Swal.fire({
		icon: 'error',
		title: 'Failed',
		text: "{{ session('failed') }}",
		});
	</script>
	@endif
	@if (isset($errors) && $errors->has('oldPassword') || $errors->has('password'))
	<script>
		const myModal = document.getElementById('modalUbahPassword');
		const modal = bootstrap.Modal.getOrCreateInstance(myModal);
		modal.show();
	</script>
	@endif

  </body>
</html>
