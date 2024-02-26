@extends('admin.admin_master')

@section('title')
    Edit Class
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Class
                            <a href="{{ route('admin.all.class') }}" class="btn btn-success" style="float: right;" title="Add New Class">Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.update.class') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $class->id }}">
                            <div class="form-group">
                                <label>Class Name<span class="text-danger">*</span></label>
                                <input type="text" name="class_name" class="form-control" value="{{ $class->class_name }}">
                                @error('class_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Update" style="float: right;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection
