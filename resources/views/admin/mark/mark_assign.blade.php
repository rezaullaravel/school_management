@extends('admin.admin_master')

@section('title')
    Mark Assign
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-header">
                        <h4>Mark Assign.</h4>
                    </div>


                        <div class="card-body">
                          <form action="{{ route('admin.mark.assign') }}" method="GET">

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Class</label>
                                        <select name="clas_id"   class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ $class->id == Request::get('clas_id') ? 'selected':'' }}>{{ $class->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">Subject</label>
                                        <select name="subject_id"   class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                          <option value="1" {{ Request::get('subject_id') ==1 ? 'selected':'' }}>Bangla</option>
                                          <option value="2" {{ Request::get('subject_id') ==2 ? 'selected':'' }}>English</option>
                                          <option value="3" {{ Request::get('subject_id') ==3 ? 'selected':'' }}>Math</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="submit" value="submit" class="btn btn-success btn-block" style="margin-top:7px;">
                                    </div>
                                </div>
                            </div>{{-- row --}}
                          </form>
                        </div>
                </div>
            </div>
        </div>{{-- row --}}



          @if (!empty($class_id && $subject_id))
          <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.mark.insert') }}" method="POST">
                            @csrf
                            <table class="table table-bordered">
                                <thead>
                                    <th>Sl</th>
                                    <th>Student Name</th>
                                    <th>Student Reg.</th>
                                    <th>Mark</th>
                                </thead>
                                <tbody>
                                    <input type="hidden" name="clas_id" value="{{ $class_id }}">
                                   <input type="hidden" name="subject_id" value="{{ $subject_id }}">
                                    @foreach($students as $index => $student)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->registration }}</td>
                                            @php
                                                $mark = App\Models\Mark::where('subject_id',$subject_id)->where('clas_id', $class_id)->where('student_id', $student->id)->first();
                                            @endphp
                                            <td>
                                                <input type="text" name="mark[]" class="form-control" required placeholder="Enter mark"
                                               value="{{ !empty($mark) ? $mark->mark:'' }}"
                                                >

                                                <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>

                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" value="Assign Mark" class="btn btn-success" style="float: right;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>{{-- row --}}
          @endif



    </div>
 </section>




@endsection
