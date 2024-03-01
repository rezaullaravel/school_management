@extends('admin.admin_master')

@section('title')
    Edit Exam
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Exam
                            <a href="{{ route('admin.all.exam') }}" class="btn btn-primary" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.update.exam') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Exam Name<span class="text-danger">*</span></label>
                                <input type="text" name="exam_name" value="{{ $exam->exam_name }}" class="form-control" placeholder="Enter Examination Name....">
                                <input type="hidden" name="id" value="{{ $exam->id }}" class="form-control" placeholder="Enter Examination Name....">
                                @error('exam_name')
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
