@extends('admin.admin_master')

@section('title')
    Result Final
@endsection



@section('content')
 <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                @if (session('sms'))
                    <div class="alert alert-danger">
                        <h4 class="text-center">{{ Session::get('sms') }}</h4>
                    </div>
                @endif
                <div class="card" id="content">
                   <div class="card-header">
                        <h4>Student Result.

                        </h4>

                        <div class="row mt-3">
                            <div class="col-sm-6">
                            <span>Student Name:</span> <strong>{{ $student->name }}</strong>
                            </div>

                            <div class="col-sm-6">
                            <span>Roll:</span> <strong>{{ $student->roll }}</strong>
                            </div>

                        </div>{{-- row --}}

                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <span>Registration:</span> <strong>{{ $student->registration }}</strong>
                             </div>

                             <div class="col-sm-6">
                                <span>Class:</span> <strong>{{ $student->clas->class_name }}</strong>
                             </div>
                        </div>{{-- row --}}

                        <div class="row mt-3">

                            <div class="col-sm-6">
                                <span>Session:</span> <strong>{{ $student->session->session_year }}</strong>
                             </div>

                            <div class="col-sm-6">
                                <span>Examination:</span> <strong>{{ $exam->exam_name }}</strong>
                             </div>
                        </div>{{-- row --}}
                    </div>

                    @if (count($marks)>0)
                    <div class="card-body">
                        <table class="table table-bordered">
                          <thead>
                             <tr>
                                 <th>Sl</th>
                                 <th>Subject</th>
                                 <th>Mark</th>
                                 <th>Grade Point</th>
                                 <th>Grade</th>

                             </tr>
                          </thead>

                          <tbody>
                            @php
                                $totalGradePoint = 0;
                                $totalSubjects = count($marks);
                            @endphp
                             @foreach ($marks as $key=>$mark)
                                 <tr>
                                     <td>{{ $key+1 }}</td>
                                     <td>{{ $mark->subject->subject }}</td>
                                     <td>{{ $mark->mark }}</td>
                                     <td>{{ $mark->grade_point }}</td>
                                     <td>{{ $mark->grade_name }}</td>

                                 </tr>
                            @php
                                if ($mark->mark <= 100 && $mark->mark >= 80) {
                                $gradePoint = 5.00;
                            } elseif ($mark->mark <= 79 && $mark->mark >= 70) {
                                $gradePoint = 4.00;
                            } elseif ($mark->mark <= 69 && $mark->mark >= 60) {
                                $gradePoint = 3.50;
                            } elseif ($mark->mark <= 59 && $mark->mark >= 50) {
                                $gradePoint = 3.00;
                            } elseif ($mark->mark <= 49 && $mark->mark >= 40) {
                                $gradePoint = 2.50;
                            } elseif ($mark->mark <= 39 && $mark->mark >= 33) {
                                $gradePoint = 2.00;
                            } else {
                                $gradePoint = 0;
                            }

                            // Check if the grade point is 0 for any subject
                            if ($gradePoint == 0) {
                                $totalGradePoint = 0;
                                break; // No need to continue, as the result is already 0
                            }

                            $totalGradePoint += $gradePoint;

                            @endphp
                             @endforeach

                             @php
                                 // Calculate the result
                                    if ($totalGradePoint > 0) {
                                        $result = $totalGradePoint / $totalSubjects;
                                    } else {
                                        $result = 0;
                                    }
                             @endphp

                             <?php
                             //calculate the grade name
                             if($result ==5.00){
                                $grade_name = 'A+';
                             } elseif($result<5.00 && $result>=4.00){
                                $grade_name = 'A';
                             } elseif($result>=3.50 && $result<4.00){
                                $grade_name = 'A-';
                             } elseif($result>=3.00 && $result<3.50){
                                $grade_name = 'B';
                             } elseif($result<3.00 && $result>2.50){
                                $grade_name = 'C';
                             } elseif($result<=2.50 && $result>=2.00){
                                $grade_name = 'D';
                             } else{
                                $grade_name = 'F';
                             }
                             ?>

                             <tr>
                                <td colspan="3" class="text-center">Result</td>
                                <th>GPA={{ number_format($result,2) }}</th>
                                <th>Grade={{ $grade_name }}</th>
                             </tr>
                          </tbody>
                        </table>
                    </div>

                    @else
                        <div class="card-body">
                            <h4 class="text-danger text-center">No Result Found....Please try again.</h4>
                        </div>
                    @endif
                 </div>
            </div>
        </div>{{-- main row --}}

        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-1">
                <button class="btn btn-success" id="submit" style="float: right;">Download Result</button>

                <button onclick="window.print()" class="btn btn-info mr-3" style="float: right;">Print this page</button>
            </div>
        </div>{{-- row --}}
    </div>
 </section>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>


<script>
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};
$('#submit').click(function () {
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 190,
            'elementHandlers': specialElementHandlers
    });
    doc.save('result.pdf');
});
</script>
@endsection
