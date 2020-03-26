@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card m-5" style="width: 35rem;">
                <div class="card-body text-center p-5">

                    <h4 class="card-title">Sign Up to Kwiktrust</h4>
                    <h5>Create your account by filling the form below</h5>
                    @if(isset($warn))
                        <div class="alert alert-danger" role="alert">
                            {{$warn}}
                        </div>
                    @endif
                    <form action="/auth/register" method="post">
                    {{ csrf_field() }}
                    <div class="px-5 my-5">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" aria-describedby="inputGroupMaterial-sizing-sm">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form input-group input-group-sm mb-3">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" aria-describedby="inputGroupMaterial-sizing-sm">
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="md-form input-group mb-3 col-md-12">
                                <input type="text" class="form-control" name="email" placeholder="Email" aria-describedby="inputGroupMaterial-sizing-default">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="md-form input-group mb-3 col-md-12">
                                <input type="password" class="form-control" name="password" placeholder="Password" aria-describedby="inputGroupMaterial-sizing-default">
                            </div>
                        </div>
                    </div>

                        <button type="submit" class="btn btn-default btn-main">Sign up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
