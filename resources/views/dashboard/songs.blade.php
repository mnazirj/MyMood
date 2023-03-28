@extends('layout.dashboard')
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


         <!-- Sidebar Start -->
         <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="/" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary mx-auto">
                        {{env('APP_NAME')}}
                    </h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('assets/img/avicci.jpg')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{route('dashboard.home')}}" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{route('dashboard.ListSinger')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Artists</a>
                    <a href="{{route('song.list')}}" class="nav-item nav-link active"><i class="fa fa-keyboard me-2"></i>Songs</a>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Users</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Profile</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">John Doe</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Songs List</h6>
                            <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#create-new-song">Create new song</button>
                            <table class="table table-hover table-borderless">
                                <thead>
                                    <tr class="text-white fw-bold">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Singer</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Player</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Songs as $Song)
                                    <tr>
                                        <th scope="row">
                                            <img src="{{asset($Song->Singer->Name .'/songs/photo/'.$Song->Photo)}}" alt="{{$Song->Name}}" class="rounded img-fluid" width="100">
                                        </th>
                                        <td>{{$Song->Name}}</td>
                                        <td>{{$Song->Singer->Name}}</td>
                                        <td class="col-6">{{date_format($Song->created_at, 'Y-m-d h:i a')}}</td>
                                        <td>
                                            <audio controls>
                                                <source src="{{asset($Song->Singer->Name .'/songs/files/'.$Song->File)}}">
                                            </audio>
                                        </td>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#edit-singer-{{$Song->id}}" class="text-success ms-5 me-2"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('song.delete',$Song->id)}}"><i class="fa fa-trash"></i></a>
                                        </td>
                                        
                                        
                                    </tr>
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Table End -->

            @foreach ($Songs as $Song)
            <div class="modal fade" id="edit-singer-{{$Song->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content bg-secondary">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Edit Song {{$Song->Name}}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form class="form" method="post" action="{{route('song.edit',$Song->id)}}">
                        @csrf
                        <label class="form-label text-white fw-bold">Song Name</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Singer Name" name="Name" value="{{$Song->Name}}">
                          </div>
                        <label class="form-label text-white fw-bold">Singer</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            <select name="ArtistId" class="form-control">
                                @foreach ($Singers as $Singer)
                                    <option value="{{$Singer->id}}">{{$Singer->Name}}</option>
                                @endforeach
                            </select>
                          </div>
                        <button type="submit" class="btn btn-primary w-100">Save changes</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            


              <!-- New Song Modal -->
                <div class="modal fade" id="create-new-song" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content bg-secondary">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create new song</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form class="form" method="post" action="{{route('song.create')}}" enctype="multipart/form-data">
                            @csrf
                            <label class="form-label text-white fw-bold">Song Name</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" placeholder="Singer Name" name="Name">
                            </div>
                            <label class="form-label text-white fw-bold">Singer</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                <select name="ArtistId" class="form-control">
                                    @foreach ($Singers as $Singer)
                                        <option value="{{$Singer->id}}">{{$Singer->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="form-label text-white fw-bold">Song Photo</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                <input type="file" class="form-control" name="Photo">
                            </div>
                            <label class="form-label text-white fw-bold">Song File</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                <input type="file" class="form-control" name="SongFile">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Save changes</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
              <!-- End -->

        </div>
        <!-- Content End -->


    </div>

    