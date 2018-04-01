<div class="navbar" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.html#"><img src="assets/img/logo.png">Share Foods</a>
        </div>
		<ul class="nav navbar-nav navbar-actions navbar-left">
			<li><a href="index.html#" id="main-menu-toggle"><i class="fa fa-bars"></i></a></li>
		</ul>
        <ul class="nav navbar-nav navbar-right">
			{{-- <li><a href="index.html#"><i class="fa fa-cog"></i></a></li> --}}
			<li><a href="{{ route('sharefood.auth.logout') }}"><i class="fa fa-power-off"></i></a></li>
		</ul>
	</div>
</div>
