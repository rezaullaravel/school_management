@extends('admin.admin_master')

@section('title')
    Edit Section
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Section
                            <a href="{{ route('admin.all.section') }}" class="btn btn-primary" style="float: right;" title="Add New Class"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.update.section') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $section->id }}">
                            <div class="form-group">
                                <label>Select A Class<span class="text-danger">*</span></label>
                                <select name="clas_id" class="form-control">
                                    <option selected disabled>Select</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}" {{ $class->id == $section->clas_id ? 'selected' :'' }}>{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                                @error('clas_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Section Name<span class="text-danger">*</span></label>
                                <input type="text" name="section_name" value="{{ $section->section_name }}" class="form-control">
                                @error('section_name')
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
