@extends('admin.admin_master')

@section('title')
    Add Class
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Class
                            <a href="{{ route('admin.all.class') }}" class="btn btn-primary" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.store.class') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Class Name<span class="text-danger">*</span></label>
                                <input type="text" name="class_name" class="form-control" placeholder="Enter Class Name....">
                                @error('class_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Submit" style="float: right;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection
