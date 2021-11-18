<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<meta http-equiv="refresh" content="1">-->
    <title>Online Videos</title>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
   
    <!-- <link rel="stylesheet" href=" https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css"> -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

   <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="escript.js"></script> 
    <!--<script
		  src="https://code.jquery.com/jquery-3.4.1.js">
		  	
	</script> -->
    <script>
		$(document).ready(function(){
			$(".menu_bar").click(function(){
				$("#container1").toggleClass("active");
			});
		});
	</script>
</head>

<body>
	<a href=""></a>
<div id="container1">
	   <div class="header1">
	   	<div class="logo">
	   		<!-- <img src="{{asset('storage/images/logo.gcit.jpg')}}" style="height:90px"> -->
	   	</div>
	   	<h1>Online Videos</h1>
	   </div>  

	   <div class="menu1">
	   	<a href="#"><span><i class="fa fa-bars"></span></i></a>
	   </div>
	   <div class="sidebar1">
		   	<nav>
		   		<ul>
		   			<li>
		   				<a href="#" class="active">
		   				<span><i class="fa fa-user"></i></span>
		   				<span class="lists"> Admin</span>
		   			</a>
		   			</li>
		   			<li>
		   				<a href="{{url('dashboard')}}" class="non_active">
		   				<span><i class="fa fa-home"></i></span>
		   				<span class="lists"> Home</span>
		   			</a>
		   			</li>
                       <li>
		   				<a href="{{route('postevent.index')}}" class="non_active">
		   				<span><i class="fa fa-calendar-o"></i></span>
		   				<span class="lists">Kids Videos</span>
		   			</a>
		   			</li>

		   			<li>
		   				<a href="{{route('postevent.create')}}" class="non_active">
		   				<span><i class="fa fa-calendar"></i></span>
		   				<span class="lists">Post Kvideos</span>
		   			</a>
		   			</li>
                    <li>
		   				<a href="{{route('postnews.index')}}" class="non_active">
		   				<span><i class="fa fa-newspaper-o"></i></span>
		   				<span class="lists">Music Videos</span>
		   			</a>
		   			</li>
		   			<li>
		   				<a href="{{route('postnews.create')}}" class="non_active">
		   				<span><i class="fa fa-newspaper-o"></i></span>
		   				<span class="lists">Post MVideos</span>
		   			</a>
		   			</li>
					   
		   			<li>
                                <a class="non_active" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <span><i class="fa fa-sign-out"></i></span>
                                                <span class="lists">Log-out</span>
                                    
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
		   			</li>
		   		</ul>
		   	</nav>
	   </div> 

	   <div class="main_content">
		   <div class="menu_bar">
				<div class="inner_menu">
					<a href="#">
						<span class="bars">
							<i class="fa fa-bars"></i>
						</span>
					</a>
				</div>
		   </div>

		   <div class="content1">
                 @yield('content')
		   </div>

	  </div>
</div>
</body>
</html>

