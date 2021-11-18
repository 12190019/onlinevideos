<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Online Videos</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css?h=6f6ae34874f7fd4f5b1f8cda210c33da')}}">
    <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Bitter:400,700')}}">
    <link rel="stylesheet" href="{{asset('https://fonts.googleapis.com/css?family=Lora')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/ionicons.min.css?h=18313f04cea0e078412a028c5361bd4e')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.min.css?h=86d73d3c3f043b90c3e4584be847e487')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
</head>

<!-- Header -->
<body>
    <div>
        <div class="header-dark" style="background-image: url(&quot;assets/img/happy.jpg?h=ae4097cc6fe1ddc8911281e2f447248b&quot;);">
            <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search">
                <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="">Online Videos</a></li>
                        </ul><span class="navbar-text"></span></div>
                </div>
            </nav>
            <div class="container hero">
                <div class="row" style="background-image: url(&quot;{{asset('assets/img/happy.jpg?h=ae4097cc6fe1ddc8911281e2f447248b')}}&quot;);">
                    <div class="col-md-8 offset-md-2">
                        <h1 class="text-center">Lets Enjoying watching Videos.</h1>
                        <p class="text-center" style="color: #fff;">This website is mainly for entertaining purposes</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Body -->
    <div class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Music Videos</h2>
            </div>
            <div class="row articles">
                 @foreach($news as $news)
                    <div class="col-sm-6 col-md-4">
                    <a href="#">
                        <!-- $link = 'storage/videos/'.$news->video; -->
                        <video width="100%" height="300" controls>
                            <source src="{{URL::asset('storage/videos/'. $news->video)}}" type="video/mp4;">
                            <!-- <source src="{{URL::asset('storage/app/public/videos/'. $news->video)}}" type="video/mp4;"> -->
                            <!-- <source src="{{url('/')}}/storage/public/videos/{{$news->video}}" type='video/mp4'> -->
                            <!-- <source src="{{URL::asset($link)}}" type="video/mp4{{$news->video}}"> -->
                        </video><br> 
                    </a>
                    <h3 class="name">{{$news->title}}</h3>
                    <p class="description">{{$news->content}}</p>
                    </div>
                 @endforeach
                
                <!-- <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="{{asset('assets/img/building.jpg?h=9b053f0b7532c99abb3cc56faa191161')}}"></a>
                    <h3 class="name">Bsc-IT</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p><a class="action" href="#"></a></div>
                <div class="col-sm-6 col-md-4 item"><a href="#"><img class="img-fluid" src="{{asset('assets/img/loft.jpg?h=39ef19119b71917ee7fc370767dd6135')}}"></a>
                    <h3 class="name">BCA</h3>
                    <p class="description">Aenean tortor est, vulputate quis leo in, vehicula rhoncus lacus. Praesent aliquam in tellus eu gravida. Aliquam varius finibus est, interdum justo suscipit id.</p><a class="action" href="#"></a></div> -->
            </div>
        </div>
    </div>
    <div class="article-dual-column">
        <div class="container">
        <h2 class="text-center">Kids Movies</h2><br><br>
        <div class="row">
            @foreach($events as $event)
            <div class="col-md-4">
                  <a href="#"><img class="img-fluid" src="{{asset('storage/images/' . $event->image)}}" style="width:100%; height:300px"></a>
                  <h3 class="name">{{$event->title}}</h3>
                  <p class="description">{{$event->content}}</p>
            </div>
            @endforeach
                <!-- <div class="col-md-10 offset-md-1">
                    <div class="intro">
                        <h1 class="text-center">Latest Events</h1>
                        <p class="text-center"><span class="by">by</span> <a href="#">Author Name</a><span class="date">Sept 8th, 2016 </span></p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

<!-- Team Member -->
    <!-- <div class="team-clean">
        <div class="container">
            <div class="intro">
                <h1 class="text-center" style="margin-top: 100px;">Team Member</h1>
            </div>
            <header></header>
            <div class="row people">
                <div class="col-md-6 col-lg-3 col-xl-6 offset-xl-0 item"><img class="rounded-circle" src="{{asset('assets/img/dechen.jpg?h=4442acd266b5d8600438fe10de57d7a0')}}" style="background-image: url(&quot;assets/img/dechen.jpg?h=4442acd266b5d8600438fe10de57d7a0&quot;);">
                    <h3 class="name">Dechen Pelden</h3>
                    <p class="title">Designer</p>
                    <p class="description">Bsc. Computer Science</p>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-5 item"><img class="rounded-circle" src="{{asset('assets/img/dorji.jpg?h=d8d3961e4d5ea483db07b88be4ef2c75')}}" style="background-image: url(&quot;assets/img/dorji.jpg?h=d8d3961e4d5ea483db07b88be4ef2c75&quot;);">
                    <h3 class="name">Dorji Wangmo</h3>
                    <p class="title">Designer</p>
                    <p class="description">Bsc. Computer Science</p>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-6 offset-xl-0 item"><img class="rounded-circle" src="{{asset('assets/img/leki.jpg?h=5861a7959d7420b7039ff5b6c8c1e848')}}" style="background-image: url(&quot;assets/img/leki.jpg?h=5861a7959d7420b7039ff5b6c8c1e848&quot;);">
                    <h3 class="name">Leki Chezom</h3>
                    <p class="title">Designer</p>
                    <p class="description">Bsc.Computer Science</p>
                </div>
                <div class="col-md-6 col-lg-3 col-xl-5 offset-lg-0 offset-xl-0 item"><img class="rounded-circle" src="{{asset('assets/img/samten.jpeg?h=e5811836f81599db7c42226707bfc490')}}" style="background-image: url(&quot;assets/img/samten.jpeg?h=e5811836f81599db7c42226707bfc490&quot;);">
                    <h3 class="name">Samten Gyeltshen</h3>
                    <p class="title">designer</p>
                    <p class="description">Bsc.Computer Science</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-footer page -->
    <div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col item social"><a href="https://www.facebook.com" target="_blank"><i class="icon ion-social-facebook"></i></a><a href="https://www.google.com" target="_blank"><i class="icon ion-social-googleplus"></i></a><a href="https://www.youtube.com" target="_blank"><i class="icon ion-social-youtube"></i></a>
                        <a
                            href="https://instragram.com"><i class="icon ion-social-instagram-outline"></i></a>
                    </div> 
                </div>
                <p class="copyright">onlinemovies © 2021</p>
            </div>
        </footer>
    </div>
    <script src="{{asset('assets/js/jquery.min.js?h=83e266cb1712b47c265f77a8f9e18451')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js?h=e46528792882c54882f660b60936a0fc')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/script.min.js?h=6ca1c8bbf10723a5edab8aa895b86ee5')}}"></script>
</body>

</html>