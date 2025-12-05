<header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start d-md-none d-block">
		<!-- Logo -->
		<a href="index.html" class="logo">
		  <!-- logo-->

		  <div class="logo-lg">
			  <span class="light-logo"><img src="{{ asset(iconsLoad()['logo']) }}" alt="logo"></span>
		  </div>
		</a>
	</div>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div class="app-menu">
		<ul class="header-megamenu nav">
			<li class="btn-group nav-item">
				<a href="#" class="waves-effect waves-light nav-link push-btn btn-success-light" data-toggle="push-menu" role="button">
					<i class="icon-Menu"><span class="path1"></span><span class="path2"></span></i>
			    </a>
			</li>
		</ul>
	  </div>
      <div class="navbar-custom-menu r-side">
        <ul class="nav navbar-nav">
			<li class="btn-group nav-item">
				<a href="{{ route('logout') }}" class="waves-effect waves-light nav-link bg-success btn-success btn-md w-auto fs-12" title="Full Screen" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">&nbsp;<i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Se déconnecter</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
			</li>
        </ul>
      </div>
    </nav>
  </header>
