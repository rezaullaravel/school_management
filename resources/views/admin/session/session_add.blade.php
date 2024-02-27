@extends('admin.admin_master')

@section('title')
    Add Session
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Session.
                            <a href="{{ route('admin.all.session') }}" class="btn btn-primary" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.store.session') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Academic Session<span class="text-danger">*</span></label>
                                <input type="text" name="session_year" id="session_year" class="form-control" placeholder="2015-16">
                                @error('session_year')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit"  class="btn btn-success" value="Submit" style="float: right;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>

@endsection
