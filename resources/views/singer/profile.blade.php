@extends('layout.main')

@section('body')
<nav class="navbar navbar-expand-lg bg-dark" id="mainNav">
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
            </ul>
        </div>
    </div>
</nav>
    <section class="h-100 gradient-custom-2 bg-dark">
        <div class="container-fluid py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-9 col-xl-7">
            <div class="card border-0 shadow-lg">
                <div class="rounded-top text-white d-flex flex-row bg-dark">
                <div class="  d-flex flex-column mx-auto" style="width: 150px;">
                    <img src="{{asset($Singer->Name .'/'. $Singer->Picture)}}"
                    alt="{{$Singer->Name}}" class="img-fluid rounded-circle mt-5"
                    >
                </div>
                
                </div>
                <div class="p-4 text-white bg-dark">
                    <h3 class="text-center text-danger text-uppercase">{{$Singer->Name}}</h3>
                <div class="d-flex justify-content-center text-center py-1">
                    <div>
                    <p class="mb-1 h5">{{sizeof($Singer->Songs)}}</p>
                    <p class="small text-muted mb-0">Songs</p>
                    </div>
                    <div class="px-3">
                    <p class="mb-1 h5">{{sizeof($Singer->Follower)}}</p>
                    <p class="small text-muted mb-0">Followers</p>
                    </div>
                    <div>
                    <p class="mb-1 h5">{{sizeof($Singer->Following)}}</p>
                    <p class="small text-muted mb-0">Following</p>
                    </div>
                </div>
                </div>
                <div class="card-body bg-dark p-4 text-black">
                <div class="mb-5">
                    <p class="lead fw-normal text-uppercase text-danger mb-1">About</p>
                    <div class="p-4 text-white">
                    <p>
                        {{$Singer->Bio}}
                    </p>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <p class="lead fw-bold text-uppercase text-danger mb-0">{{$Singer->Name }}'s Song</p>
                    
                </div>
                <div class="row ps-auto ms-2 mt-2 mb-2">
                    @foreach ($Singer->Songs as $Song)
                    <div class="col">
                        <div class="card bg-dark border-0">
                            <div class="row">
                                <div class="col">
                                    <img src="{{asset($Song->Singer->Name . '/songs/photo/' . $Song->Photo)}}" class="img-fluid rounded-start">
                                </div>
                                <div class="col">
                                    
                                    <div class="card-body">
                                            <h3 class="text-uppercase mb-0 text-white">{{$Song->Name}}</h3>
                                            
                                            <span class="text-white mt-0">By</span>
                                            
                                            <span class="mt-0 text-danger">{{$Song->Singer->Name}}</span>
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
                </div>
                
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
@endsection