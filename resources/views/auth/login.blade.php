@extends('layouts.plantilla')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{route('user.login')}}" method="POST" class="card card-body shadow">
                @csrf

                <div class="form-group">
                    Soy Cliente
                    <input type="checkbox" name="is_customer">
                </div>

                <div class="form-group">
                    name/email
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    password
                    <input type="password" name="password" class="form-control">

                </div>
                <input type="submit" value="Login" class="btn btn-success">

            </form>
        </div>
    </div>
</div>


@endsection
