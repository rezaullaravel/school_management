@extends('frontend.frontend_master')

@section('title')
    Student login
@endsection


@section('content')
<div class="main-body">
	<div class="container">
       <div class="row">
         <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4>Hello Student!!!</h4>
                    <a href="{{ route('student.logout') }}" class="btn btn-danger">Logout</a>
                </div>
            </div>

         </div>
       </div>
    </div>{{-- container --}}
</div>
@endsection
