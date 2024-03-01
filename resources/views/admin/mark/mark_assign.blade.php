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
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Class</label>
                                        <select name="clas_id" id="class_id"   class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ $class->id == Request::get('clas_id') ? 'selected':'' }}>{{ $class->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Section</label>
                                        <select name="section_id" id="section_id"  class="form-control">
                                            <option value="" selected disabled>Select</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}" {{ Request::get('section_id')== $section->id ? 'selected':'' }}>
                                                    @if (!empty(Request::get('clas_id')))
                                                        {{ $section->section_name }}
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Subject</label>
                                        <select name="subject_id" id="subject_id" class="form-control" required>
                                            <option value="">Select Subject</option>

                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->id }}" {{ Request::get('subject_id') == $subject->id ? 'selected':'' }}>
                                                        {{ $subject->subject }}
                                                    </option>
                                                @endforeach

                                        </select>
                                    </div>
                                </div>

                                 <div class="col-sm-3">
                                    <div class="form-group">
                                       <label for="">Exam Name</label>
                                       <select name="exam_id" class="form-control" required>
                                           <option value="" selected disabled>Select</option>
                                           @foreach ($exams as $exam)
                                               <option value="{{ $exam->id }}" {{ Request::get('exam_id') == $exam->id ? 'selected':'' }}>{{ $exam->exam_name }}</option>
                                           @endforeach
                                       </select>
                                    </div>
                                  </div>
                            </div>{{-- row --}}

                            <div class="row">

                                <div class="col-sm-3">
                                    <div class="form-group">
                                       <label for="">Session</label>
                                       <select name="session_id"  class="form-control" required>
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($sessions as $session)
                                            <option value="{{ $session->id }}" {{ Request::get('session_id') == $session->id ? 'selected':'' }}> {{ $session->session_year }} </option>
                                        @endforeach
                                    </select>
                                    </div>
                                  </div>

                                <div class="col-sm-3">
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
                            <table  class="table table-bordered">
                                <thead>
                                    <th>Sl</th>
                                    <th>Student Name</th>
                                    <th>Roll</th>
                                    <th>Reg.</th>
                                    <th>Mark</th>
                                </thead>
                                <tbody>
                                    <input type="hidden" name="clas_id" value="{{ $class_id }}">
                                    <input type="hidden" name="section_id" value="{{ $section_id }}">
                                   <input type="hidden" name="subject_id" value="{{ $subject_id }}">
                                   <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                                   <input type="hidden" name="session_id" value="{{ Request::get('session_id') }}">
                                    @foreach($students as $index => $student)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->roll }}</td>
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



{{-- js for section and subject auto select --}}
<script>
    $(document).ready(function() {
        $('select[name="clas_id"]').on('change',function(){
            var class_id=$(this).val();
            if(class_id){
                $.ajax({
                    url:"{{ url('/admin/class/section/ajax') }}/"+class_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        var d=$('select[name="section_id"]').empty();
                        $.each(data,function(key,value){
                            $('select[name="section_id"]').append(
                                '<option value="'+value.id+'">'+
                                value.section_name+'</option>');
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });

        //subject auto select
//         $('select[name="section_id"]').on('change',function() {
//     var class_id = $('#class_id').val();
//     var section_id = $(this).val();
//     if(class_id && section_id) {
//         $.ajax({
//             type: "GET",
//             url: "/admin/getSubjects/"+class_id+"/"+section_id,
//             success: function(res) {

//                 var data = JSON.parse(res);
//                 //console.log(typeof data);

//                 $('#subject_id').empty();
//                 $.each(data, function(index, subject) {
//                     $('#subject_id').append('<option value="' + subject.id + '">' + subject.subject + '</option>');
//                 });

//             },

//         });
//     } else {
//        alert('danger');
//     }
// });//subject auto select end

});

</script>




@endsection
