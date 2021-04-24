@extends('errors.eroor_layout')
@section('comntent')
	<section id="wrapper" class="error-page">
	    <div class="error-box">
	        <div class="error-body text-center">
	            <h1>503</h1>
	            <h3 class="text-uppercase">This site is getting up in few minutes. </h3>
	            <p class="text-muted m-t-30 m-b-30">Please try after some time</p>
	            <p class="mt-2">
		        	<h3>{{ $exception->getMessage() }}</h3>
		    	</p>
	            <a href="{{ route('admin.dashboard')}}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Back to home</a>
	            <a href="{{ route('admin.login')}}" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Login Again</a> 
	        </div>
	    </div>
	</section>
@endsection