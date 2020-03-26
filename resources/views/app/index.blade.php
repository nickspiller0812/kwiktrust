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
                    @if(!$nots->isEmpty())
                        <a class="py-2 nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="badge badge-danger ml-2 mr-1">{{$nots->count()}}</span>
                            <i style="font-size:24px; color: #aaca41;" class="icon-bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary" aria-labelledby="navbarDropdownMenuLink-5">
                                @foreach($nots as $not)
                                    <a class="dropdown-item waves-effect waves-light" href="#">{{$not->content}} </a>
                                @endforeach
                            {{--<a class="dropdown-item waves-effect waves-light" href="#">Another action <span class="badge badge-danger ml-2">1</span></a>--}}
                            {{--<a class="dropdown-item waves-effect waves-light" href="#">Something else here <span class="badge badge-danger ml-2">4</span></a>--}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="align-content-center">

        <div class="row">
            <div class="col-md-12 my-4">
                <div class="">
                    <div class="float-left">
                        <img src="/racket.png">
                    </div>
                    <div class="float-left p-1">
                        <h4 style="font-weight:300 !important;">
                            Your Projects
                        </h4>
                        <h6>
                            Company name
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="card p-4 text-center">
                    <div class="card-title" style="font-weight:700; color:#b1b7bc;">
                        Add New Project
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <img style="width:inherit;" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/14179/circle.png">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="font-weight: 900;">
                                <input id="addProj" type="text" name="name" class="form-control" aria-label="Sizing example input" placeholder="Add name" aria-describedby="inputGroupMaterial-sizing-default">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="font-weight:700; color:#b1b7bc;">
                                {{ auth()->user()->email }}
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-default login-green text-white m-auto text-decoration-none" type="button" data-toggle="modal" data-target="#projectCreateModal">
                        Add
                    </button>
                </div>
            </div>

            @foreach($projects as $project)

                <div class="col-md-3">
                    <div class="card p-4 text-center">
                        <div class="card-title" style="font-weight:700; color:#b1b7bc;">
                            &nbsp;
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-12" >
                                    <img style="width:inherit;" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/14179/circle.png">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="font-weight: 900;">
                                    {{$project->name}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="font-weight:700; color:#b1b7bc;">
                                    {{ $project->user->email }}
                                </div>
                            </div>
                        </div>
                        <a href="/projects/{{$project->id}}" class="btn btn-default login-green text-white m-auto">
                            View
                        </a>
                    </div>
                </div>
            @endforeach




            <div class="modal fade" id="projectCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" style="color:#aaca41 !important;" id="exampleModalLabel">New Project</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="/project/store" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body project px-5">

                                <div class="row mt-4">
                                    <input id="targetProj" type="text" name="name" class="form-control" aria-label="Sizing example input" placeholder="Project name example" aria-describedby="inputGroupMaterial-sizing-default">
                                </div>

                                <div class="row mt-4">
                                    <select class="custom-select" name="supplier_id" id="supplier">
                                        @foreach(App\Supplier::all() as $supplier)
                                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-left" style="font-size: 10px;">
                                        Can't find your Supplier? <a href="#" data-toggle="modal" data-target="#projectSupplierModal">Add Supplier</a>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <select class="custom-select" name="category_id" id="category">
                                        @foreach(App\Category::all() as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        {{--<option value="Insurance">Insurance</option>--}}
                                        {{--<option value="Qualifications">Qualifications</option>--}}
                                        {{--<option value="Health & Safety">Health & Safety</option>--}}
                                        {{--<option value="Qualifications">Qualifications</option>--}}
                                        {{--<option value="References">References</option>--}}
                                    </select>
                                    <div class="text-left" style="font-size: 10px;">
                                        Can't find your Category? <a href="#" data-toggle="modal" data-target="#projectCategoryModal">Add Category</a>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-default login-green mr-4">Create Project</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="projectSupplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" style="color:#aaca41 !important;" id="exampleModalLabel">New Supplier</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="/supplier/create" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="modal-body project px-5">

                                <div class="row mt-4">
                                    <input type="text" name="name" class="form-control" aria-label="Sizing example input" placeholder="Name" aria-describedby="inputGroupMaterial-sizing-default">
                                </div>

                                <div class="row mt-4">
                                    <input type="text" name="description" class="form-control" aria-label="Sizing example input" placeholder="Description" aria-describedby="inputGroupMaterial-sizing-default">
                                </div>

                                <div class="row mt-4">
                                    <input type="text" name="vat_number" class="form-control" aria-label="Sizing example input" placeholder="VAT Number" aria-describedby="inputGroupMaterial-sizing-default">
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-default login-green mr-4">Create Supplier</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="projectCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" style="color:#aaca41 !important;" id="exampleModalLabel">New Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form method="POST" action="/category/create" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="modal-body project px-5">

                                <div class="row mt-4">
                                    <input type="text" name="name" class="form-control" aria-label="Sizing example input" placeholder="Name" aria-describedby="inputGroupMaterial-sizing-default">
                                </div>

                                <div class="row mt-4">
                                    <input type="text" name="description" class="form-control" aria-label="Sizing example input" placeholder="Description" aria-describedby="inputGroupMaterial-sizing-default">
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Discard</button>
                                <button type="submit" class="btn btn-default login-green mr-4">Create Category</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

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

                        <form class="file-upload" method="POST" action="/file/upload" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body px-5">
                                <div class="row mt-4">
                                    <input type="text" name="name" class="form-control" aria-label="Sizing example input" placeholder="Name" aria-describedby="inputGroupMaterial-sizing-default">
                                </div>

                                <div class="row mt-4">
                                    <textarea type="text" name="description" class="form-control" aria-label="Sizing example input" placeholder="Description" aria-describedby="inputGroupMaterial-sizing-default"></textarea>
                                </div>

                                <div class="row mt-4">
                                    <input type="text" name="release_date" class="form-control" placeholder="Release date" aria-describedby="inputGroupMaterial-sizing-default">
                                </div>

                                <div class="row mt-4">
                                    <input type="text" name="expiration_date" class="form-control" placeholder="Expiration date" aria-describedby="inputGroupMaterial-sizing-default">
                                </div>

                                <div class="row mt-4">
                                    <input type="file" name="file" class="form-control">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button id="btn-upload" class="btn btn-default login-green mr-4">Save changes</button>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
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
