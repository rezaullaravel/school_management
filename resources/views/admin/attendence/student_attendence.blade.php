@extends('admin.admin_master')

@section('title')
    Student Attendence
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Attendence.</h4>
                    </div>


                        <div class="card-body">
                          <form action="{{ route('admin.student.attendence') }}" method="GET">

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

                            <strong style="float: right;">{{ $date }}</strong><span style="float: right;">Date:</span>
                        </div>
                        <div class="card-body">
                           <table class="table table-bordered">
                             <thead>
                                <th>Sl</th>
                                <th>Student Name</th>
                                <th>Student Reg.</th>
                                <th>Attendence Type</th>
                             </thead>

                             <tbody>
                                @foreach ($students as $key => $row)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->registration }}</td>
                                        <td style="display: none;">
                                            <input type="hidden" id="class_id"
                                            value={{ $row->clas_id }}
                                            >
                                        </td>

                                        <td style="display: none;">
                                            <input type="hidden" id="date"
                                            value={{ $date }},
                                            >
                                        </td>
                                     @php
                                         $attendence = App\Models\StudentAttendence::where('clas_id',$row->clas_id)->where('student_id',$row->id)->where('date',$date)->first();


                                     @endphp

                                        <td>
                                            <input type="radio" id="{{ $row->id }}" value="1"  name="attendence_type{{ $row->id }}" class="attendence"

                                                 <?php
                                                 if($attendence){
                                                    if($attendence->attendence_type==1){
                                                        echo 'checked';
                                                    } else{
                                                        echo '';
                                                    }
                                                 }
                                                 ?> >Present
                                            <input type="radio" id="{{ $row->id }}" value="2"  name="attendence_type{{ $row->id }}" class="attendence"
                                            @if ($attendence)
                                                {{ $attendence->attendence_type==2 ? 'checked':'' }}
                                            @endif
                                            >Absent
                                            <input type="radio" id="{{ $row->id }}" value="3"  name="attendence_type{{ $row->id }}" class="attendence"
                                            @if ($attendence)
                                                {{ $attendence->attendence_type==3 ? 'checked':'' }}
                                            @endif
                                            >Late
                                        </td>
                                    </tr>
                                @endforeach
                             </tbody>
                           </table>
                        </div>
                    </div>
                </div>
            </div>{{-- row --}}
          @endif

    </div>
 </section>



 <script type="text/javascript">


    $(document).ready(function(){

        $(document).on('change','.attendence',function(e){
            e.preventDefault();
            var attendence_type = $(this).val();
            var class_id = $('#class_id').val();
            var student_id = $(this).attr('id');
            var date = $('#date').val();
            //alert(attendence_type);


            $.ajax({
                type:"POST",
                url:"{{ route('admin.attendence.student.insert') }}",

                dataType:"json",
                data:{
                    "_token":"{{ csrf_token() }}",
                    class_id:class_id,
                    student_id:student_id,
                    attendence_type:attendence_type,
                    date:date,
                },

                success:function(result){
                  $('.alert').show();
                  $('.alert').html(result.sms);
                 },
            });
        })



});
 </script>
@endsection
