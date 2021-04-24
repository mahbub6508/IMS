@extends('errors.error_layout')

@section('content')
<section id="wrapper" class="error-page">
    <div class="error-box">
        <div class="error-body text-center">
            <h1>404</h1>
            <h3 class="text-uppercase">Page Not Found !</h3>
            <p class="text-muted m-t-30 m-b-30">YOU SEEM TO BE TRYING TO FIND HIS WAY HOME</p>
            <p class="mt-2">
            	<h3>{{ $exception->getMessage() }}</h3>
            </p>
           <a href="{{ route('admin.dashboard') }}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</a>
           <a href="{{ route('admin.login') }}" class="btn btn-primary btn-rounded waves-effect waves-light m-b-40">Again Login</a>
        </div>
    </div>
</section>
@endsection