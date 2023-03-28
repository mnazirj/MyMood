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



<section class="projects-section bg-dark h-100" id="artists">
    <div class="container px-4 px-lg-5">
    
        
        <form method="POST" action="{{route('search')}}">
            @csrf
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fa fa-search text-danger"></i>
                </span>
                <input type="search" name="Name" class="form-control" placeholder="Enter Singer/Song Name" style="width:500px">
                <button class="input-group-text btn btn-danger">Search</button>
            </div>
            
        </form>
        <hr class="w-50 mx-auto">
        <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
            @if(session('SingersResult') != null)
            <h2 class="text-center fw-bold text-danger mb-5 mt-5 text-uppercase">Singers</h2>
                @foreach (session('SingersResult') as $Singer)
                        <div class="col-lg-3 col-md-2 col-sm-12 shadow ps-auto ms-2 mt-2 mb-2">
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
            @endif
            @if(session('SongsResult'))
            <h2 class="text-center fw-bold text-danger mb-5 mt-5 text-uppercase">Songs</h2>
            
                @foreach (session('SongsResult') as $Song)
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
                                    
                                </div>
                                
                                
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                
                @endforeach
            @endif
        </div>
    </div>
</section>
@endsection