@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!--Card-->
            <div class="card m-5" style="width: 35rem;">

                <div class="card-body text-center p-5">
                    <!--Title-->

                    <form action="/auth/login" method="post">
                        {{ csrf_field() }}
                        <h4 class="card-title">Log in to Kwiktrust</h4>

                        <div class="px-5 my-5">

                            <div class="row mt-3">
                                <div class="md-form input-group mb-3 col-md-12">
                                    <input type="text" class="form-control" name="email" aria-label="Sizing example input" placeholder="Email" aria-describedby="inputGroupMaterial-sizing-default">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="md-form input-group mb-3 col-md-12">
                                    <input type="password" class="form-control" name="password" aria-label="Sizing example input" placeholder="Password" aria-describedby="inputGroupMaterial-sizing-default">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn-main">Log in</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
