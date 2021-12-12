<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Argon Dashboard') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
</head>
<body class="clickup-chrome-ext_installed">
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>




@include('layouts.navbars.sidebar')
<div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">Dashboard</a>
            <!-- Form -->
            <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" placeholder="Search" type="text">
                    </div>
                </div>
            </form>
            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                    </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">Admin Admin</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome!</h6>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Settings</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Activity</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>Support</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>


    {{--Modal para crear estudiantes--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{route('estudiantes.store')}}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input name="nombre" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Matricula</label>
                            <input name="matricula" type="text" class="form-control" id="exampleInputPassword1" placeholder="Matricula">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Apellido Materno</label>
                            <input name="apellido_materno" type="text" class="form-control" id="exampleCheck1">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Apellido Paterno</label>
                            <input name="apellido_paterno" type="text" class="form-control" id="exampleCheck1">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Salones</label>
                            <select   name="salon_id" class="custom-select" id="inputGroupSelect01">
                                @foreach($salones as $salon)
                                    <option value="{{$salon->id}}">{{$salon->nombre}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Materia</label>
                            <select  name="materias_id" class="custom-select" id="inputGroupSelect01">
                                @foreach($materias as $materia)
                                    <option name="materias" value="{{$materia->id}}">{{$materia->nombre}}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="Submit" class="btn btn-primary">Añadir EStudiante</button>

                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Estudiantes</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Agregar Estudiantes</a>
                            </div>
                        </div>

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    <strong>Danger!</strong> {{$error}}
                                </div>
                            @endforeach
                        @endif
                        @if (session('añadido'))
                            <div class="alert alert-success" role="alert">
                                <strong>Exitoso</strong> {{ session('añadido')}}
                            </div>
                        @endif
                        @if (session('eliminado'))
                            <div class="alert alert-warning" role="alert">
                                <strong>Eliminado</strong> {{ session('eliminado')}}
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Matricula</th>
                                <th scope="col">Apellido Materno</th>
                                <th scope="col">Apellido Paterno</th>
                                <th scope="col">Salon Id</th>
                                <th scope="col">Materias Id</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($estudiantes as $estudiante)
                                <tr>
                                    <td>{{$estudiante->nombre}}</td>
                                    <td>
                                        <a href="mailto:admin@argon.com">{{$estudiante->matricula}}</a>
                                    </td>
                                    <td>{{$estudiante->apellido_materno}}</td>
                                    <td>{{$estudiante->apellido_paterno}}</td>
                                    <td>{{$estudiante->salon_id}}</td>
                                    <td>{{$estudiante->materias_id}}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                <a class="dropdown-item"  data-toggle="modal" data-target="#edit-modal-{{$estudiante->id}}">Editar</a>
                                                <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="dropdown-item" href="">Eliminar</button>
                                                </form>


                                            </div>

                                        </div>
                                    </td>
                                </tr>


                            {{--modal para editar--}}

                                <div class="modal fade" id="edit-modal-{{$estudiante->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar estudiante</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="POST" action="{{route('estudiantes.update', $estudiante->id)}}">
                                                {{ csrf_field() }}
                                                @method('put')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Nombre</label>
                                                        <input value="{{$estudiante->nombre}}" name="nombre" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nombre">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Matricula</label>
                                                        <input value="{{$estudiante->matricula}}" name="matricula" type="text" class="form-control" id="exampleInputPassword1" placeholder="Matricula">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Apellido Materno</label>
                                                        <input value="{{$estudiante->apellido_materno}}" name="apellido_materno" type="text" class="form-control" id="exampleCheck1">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Apellido Paterno</label>
                                                        <input value="{{$estudiante->apellido_paterno}}" name="apellido_paterno" type="text" class="form-control" id="exampleCheck1">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Salones</label>
                                                        <select   name="salon_id" class="custom-select" id="inputGroupSelect01">
                                                            @foreach($salones as $salon)

                                                                <option value="{{$salon->id}}" {{$estudiante->salon_id == $salon->id ? 'selected' : '' }} >{{$salon->nombre}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">Materia</label>
                                                        <select  name="materias_id" class="custom-select" id="inputGroupSelect01">
                                                            @foreach($materias as $materia)
                                                                <option name="materias" value="{{$materia->id}}">{{$materia->nombre}}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="Submit" class="btn btn-primary">Editar Estudiante</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                {{$estudiantes->links()}}
                            </ul>
                        </nav>

                    </div>


            </div>
        </div>
    </div>
        @include('layouts.footers.auth')

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>


        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>

</body>
</html>
