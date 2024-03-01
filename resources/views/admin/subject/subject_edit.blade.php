@extends('admin.admin_master')

@section('title')
    Edit Subject
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Subject
                            <a href="{{ route('admin.all.subject') }}" class="btn btn-primary" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.update.subject') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Subject Name<span class="text-danger">*</span></label>
                                <input type="text" name="subject" value="{{ $subject->subject }}" class="form-control">
                                <input type="hidden" name="id" value="{{ $subject->id }}" class="form-control">
                                @error('subject')
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
