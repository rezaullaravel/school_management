@extends('admin.admin_master')

@section('title')
    Edit Student Attendence Report
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Student Attendence Report
                            <a href="{{ url(Session::get('previous_url')) }}" class="btn btn-primary" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.attendence.student.update') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $attendence->id }}" class="form-control">

                            <div class="form-group">
                                <label>Student Name<span class="text-danger">*</span></label>
                                <input type="text" name="" value="{{ $attendence->student->name }}" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <label>Registration<span class="text-danger">*</span></label>
                                <input type="text" name="" value="{{ $attendence->student->registration }}" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <label>Class<span class="text-danger">*</span></label>
                                <input type="text" name="" value="{{ $attendence->student->clas->class_name }}" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <label>Date<span class="text-danger">*</span></label>
                                <input type="text" name="" value="{{ $attendence->date }}" class="form-control" disabled>
                            </div>

                            <div class="form-group">
                                <label>Attendence Type<span class="text-danger">*</span></label>
                                <select  name="attendence_type"  class="form-control">
                                    <option value="1" {{ $attendence->attendence_type==1 ? 'selected':'' }}>Present</option>
                                    <option value="2" {{ $attendence->attendence_type==2 ? 'selected':'' }}>Absent</option>
                                    <option value="3" {{ $attendence->attendence_type==3 ? 'selected':'' }}>Late</option>
                                </select>
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
