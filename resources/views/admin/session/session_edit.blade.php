@extends('admin.admin_master')

@section('title')
    Edit Session
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Session.
                            <a href="{{ route('admin.all.session') }}" class="btn btn-primary" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.update.session') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $session->id }}">
                            <div class="form-group">
                                <label>Academic Session<span class="text-danger">*</span></label>
                                <input type="text" name="session_year" value="{{ $session->session_year }}"  class="form-control" placeholder="2015-16">
                                @error('session_year')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit"  class="btn btn-success" value="Update" style="float: right;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>

@endsection
