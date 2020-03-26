<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>gamerhash.io</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">--}}
    {{--<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">--}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap DatePicker</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    {{--<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />--}}

    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">

    <script src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>

<body data-gr-c-s-loaded="true">

<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header w-100">
            <div class="row">
                <div class="col-md-6 text-left">
                    <a href="/"><img height="38px" src="/logo.png"></a>
                </div>
                <div class="col-md-6 text-right">
                    <div class="float-right">
                        <a href="/auth/logout" class="btn btn-default login-green">LOG OUT</a>
                    </div>
                    {{--<div class="float-right pt-1 pr-3">--}}
                    {{--<a data-toggle="dropdown" aria-haspopup="true" id="navbarDropdownMenuLink-5" aria-expanded="true" href="#" style="font-size:30px; color: #aaca41;" class="icon-bell dropdown-toggle"></a>--}}
                    {{--</div>--}}
                    <a class="py-2 nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <span class="badge badge-danger ml-2 mr-1">{{$nots->count()}}</span>
                        <i style="font-size:24px; color: #aaca41;" class="icon-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                        @foreach($nots as $not)
                            <a class="dropdown-item waves-effect waves-light" href="#">{{$not->content}} </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="row px-5 pt-3" style="">
    <button id="go-back" class="btn btn-default back-green px-3">
        ◄
    </button>
    <a href="/" id="go-back" class="btn btn-default back-green px-3">
        Dashboard
    </a>
    <a href="/projects/{{$folder->project->id}}" id="go-back" class="btn btn-default back-green px-3">
        {{$folder->project->name}}
    </a>
</div>
<div class="align-content-center p-5">

    <div class="row">
        <div>
            <h4 style="font-weight:700;" >
                Folder
            </h4>
            <h3 style="font-weight:900;" class="float-left">
                {{$folder->name}}
            </h3>
        </div>
    </div>

    <div class="row">

        @foreach($files as $file)
            <div class="card col-md-2 p-0 m-4">

                <div class="view overlay">
                    <img class="card-img-top" src="/ext/{{explode('.', $file->file_name)[1]}}.png" alt="Card image cap">
                </div>



            <!-- Button -->
                <a class="btn-floating btn-action ml-auto mr-4 mdb-color lighten-3"><i class="fas fa-chevron-right pl-1"></i></a>

                <!-- Card content -->
                <div class="card-body">

                    <!-- Title -->
                    <h4 class="card-title">{{$file->name}}</h4>
                    <hr>
                    <!-- Text -->
                    <p class="card-text">{{$file->description}}</p>

                </div>

                <!-- Card footer -->
                <div class="rounded-bottom mdb-color lighten-3 text-center pt-3">


                    <ul class="list-unstyled list-inline font-small">
                        <span class="btn-group-sm">
                          <button type="button" class="btn btn-success bmd-btn-fab">
                            <i class="material-icons glyphicon glyphicon-alert"></i>
                          </button>
                        </span>
                        <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1"></i>{{$file->release_time}}</li>
                        <li class="list-inline-item pr-2 white-text"><i class="far fa-clock pr-1"></i>{{$file->expiration_time}}</li>
                        <li class="list-inline-item pr-2"></li>
                    </ul>
                </div>

            </div>
        @endforeach

        <button type="button" class="btn btn-primary m-4" data-toggle="modal" style="color:#aaca41 !important;" data-target="#basicExampleModal">
            Add another file
        </button>

        <div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add file</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form class="file-upload" method="POST" action="/file/upload/folder" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body px-5">
                            <input type="hidden" name="folder_id"  value="{{$folder->id}}">
                            <input type="hidden" name="project_id" value="{{$folder->project->id}}">
                            <input type="hidden" id="hash" name="hash">

                            <div class="row mt-4">
                                <input type="text" id="fileName" name="name" class="form-control" aria-label="Sizing example input" placeholder="Name" aria-describedby="inputGroupMaterial-sizing-default">
                            </div>

                            <div class="row mt-4">
                                <textarea type="text" id="fileDescription" name="description" class="form-control" aria-label="Sizing example input" placeholder="Description" aria-describedby="inputGroupMaterial-sizing-default"></textarea>
                            </div>

                            <div class="row mt-4">
                                <input type="text" id="fileReleaseDate" name="release_date" class="form-control" placeholder="Release date" aria-describedby="inputGroupMaterial-sizing-default">
                            </div>

                            <div class="row mt-4">
                                <input type="text" id="fileExpirationDate" name="expiration_date" class="form-control" placeholder="Expiration date" aria-describedby="inputGroupMaterial-sizing-default">
                            </div>

                            <div class="row mt-4">
                                <input type="file" id="fileContent" name="file" class="form-control">
                            </div>
                        </div>
                        <div id="loading" style="display: none;">
                            <img id="loading-image" src="/loader_gif.gif"  alt="Loading..." />
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="btn-upload"  class="btn btn-default login-green mr-4">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<footer class="footer fixed-bottom">
    <div class="container">
        <div class="text-center p-4">
            <b class="pr-3">Terms & Conditions </b> <b>Privacy Policy</b>
        </div>
    </div>
</footer>

<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<script>
    $(document).ready(function () {

        $('#addProj').keyup(function () {

            $('#targetProj').val($(this).val());

        });

    });
</script>

<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>


</body></html>
