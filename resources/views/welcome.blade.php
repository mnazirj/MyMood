@extends('layout.main')

@section('body')
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">MyMood</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#artists">Artists</a></li>
                        <li class="nav-item"><a class="nav-link" href="#songs">Music</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('search')}}">Search</a></li>
                    </ul>
                    
                </div>
                
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">MyMood</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">A free platform, contains all your favorite music and artists.</h2>
                        <a class="btn btn-danger" href="#about">Get Started</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section text-center" id="about">
            <div class="container">
                <div class="row gx-4 gx-lg-5 d-flex vh-100 align-items-center justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-white-50 mb-4">Who are we ?!</h2>
                        <p class="text-white-50">
                            <span class="text-danger fw-bold">MyMood</span> is a free platform created to help you find all your favorite music in one place. <br>
                            Just a four easy steps to get started.
                            <span class="text-danger">Register an account, Search your music/artist and hit play.</span>
                            
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Artists-->
        <section class="projects-section bg-dark" id="artists">
            <div class="container px-4 px-lg-5">
            
                <!-- Project One Row-->
                <h2 class="text-center fw-bold text-danger mb-5 mt-0 text-uppercase">Popular Artists</h2>
                <hr class="w-50 mx-auto">
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">

                    @foreach ($Singers as $Singer)
                    <div class="col-lg-2 col-md-2 col-sm-12 shadow ps-auto ms-2 mt-2 mb-2">
                        <img src="{{asset($Singer->Name .'/'.$Singer->Picture)}}" class="card-img-top">
                        <div class="card border-0">
                            <div class="card-body bg-dark text-center">
                                <a href="{{route('singer.view.profile',$Singer->Name)}}">
                                    <span class="text-white fw-bold an">{{$Singer->Name}}</span>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--Songs-->
        <section id="songs" class="contact-section bg-dark ">
            <div class="container px-4 px-lg-5">
                <h2 class="text-center fw-bold text-danger mb-5 mt-0 text-uppercase">Trending Songs</h2>
                <hr class="mb-5"/>
                <div class=" gx-4 gx-lg-5 justify-content-center">
                    <div class="row ps-auto ms-2 mt-2 mb-2">
                        @foreach ($Songs as $Song)
                        <div class="col-lg-5 col-md-5 col-sm-12 ms-5 mb-5">
                            <div class="card bg-dark border-0">
                                <div class="row">
                                    <div class="col">
                                        <img src="{{asset($Song->Singer->Name . '/songs/photo/' . $Song->Photo)}}" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col">
                                        
                                        <div class="card-body">
                                                <h3 class="text-uppercase mb-0 text-white">{{$Song->Name}}</h3>
                                                
                                                <span class="text-white mt-0 mb-0 float-start">By</span>
                                                <a href="{{route('singer.view.profile',$Song->Singer->Name)}}" class="nav-link float-start">
                                                    <span class="mt-0 text-danger">{{$Song->Singer->Name}}</span>
                                                </a>
                                                
                                            </p>
                                        </div>
                                            
                                        <div class="card-footer">
                                            <audio id="player-{{$loop->index}}" onloadeddata="setupTime({{$loop->index}})" ontimeupdate="changeCurrentTime({{$loop->index}})">
                                                <source src="{{asset($Song->Singer->Name . '/songs/files/' . $Song->File)}}">
                                            </audio>
                                            <div class="col"> 
                                              <button class="btn text-danger" onclick="play({{$loop->index}})">
                                                <span id="control-icon-{{$loop->index}}" class="material-symbols-outlined">
                                                    play_arrow
                                                    </span>
                                              </button> 
                                              <span id="currentTimeSong-{{$loop->index}}" class="text-white">0:00</span> / <span id="durationTimeSong-{{$loop->index}}" class="text-white">0:00</span>
                                            </div>
                                            
                                            @if (session('Id'))
                                                @foreach ($Song->Likes as $Like)
                                                    @if($Like->UserId == session('Id'))
                                                    <a href="{{route('unlike',$Like->id)}}">UnLike</a>
                                                        @break
                                                    @endif
                                                        @if($loop->last)
                                                        <a href="{{route('like',$Song->id)}}">Like</a>
                                                        @endif
                                                @endforeach
                                            @endif
                                            
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                    </div>
                    
                <div class="social d-flex justify-content-center">
                    <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
                </div>
            </div>
        </section>
        
@endsection