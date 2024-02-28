@extends('admin.admin_master')

@section('title')
    Student Attendence Report
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Attendence Report.</h4>
                    </div>


                        <div class="card-body">
                          <form action="{{ route('admin.student.attendence.report') }}" method="GET">

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
                                        <label for="">Date</label>
                                        <input type="date" name="date" value="{{ Request::get('date') }}" class="form-control" required>
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



          @if (!empty($class && $date))
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-success" style="display: none;">

                            </div>

                            <span>Class:</span> <strong>{{ $class_name->class_name }}</strong>

                            <strong style="float: right;">{{ date('d-m-Y',strtotime($date)) }}</strong><span style="float: right;">Date:</span>
                        </div>
                        @if (count($attendences)>0)
                        <div class="card-body">
                            <table class="table table-bordered">
                              <thead>
                                 <th>Sl</th>
                                 <th>Student Name</th>
                                 <th>Student Reg.</th>
                                 <th>Attendence Type</th>
                                 <th>Action</th>
                              </thead>

                              <tbody>
                                 @foreach ($attendences as $key=>$row)
                                     <tr>
                                         <td>{{ $key+1 }}</td>
                                         <td>{{ $row->student->name }}</td>
                                         <td>{{ $row->student->registration }}</td>
                                         <td>
                                             @if ($row->attendence_type==1)
                                                 Present
                                                 @elseif ($row->attendence_type==2)
                                                 Absent
                                                 @elseif($row->attendence_type==3)
                                                 Late
                                             @endif
                                         </td>

                                         <td>
                                            <a href="{{ route('admin.attendence.student.edit',$row->id) }}" class="btn btn-info" title="Edit"><i class="las la-pen"></i> </a>
                                         </td>
                                     </tr>
                                 @endforeach
                              </tbody>
                            </table>

                            <div class="mt-3">
                              {{ $attendences->links() }}
                            </div>
                         </div>
                        @else
                           <div class="card-body">
                              <h4 class="text-danger text-center">No attendence report available.....</h4>
                           </div>
                        @endif
                    </div>
                </div>
            </div>{{-- row --}}
          @endif

    </div>
 </section>

@endsection
