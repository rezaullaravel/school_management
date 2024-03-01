<div class="top-header">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-12">
            <div class="link">
                <a href="#">সুবর্ণ জয়ন্তী ও বঙ্গবন্ধু কর্ণার</a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-12">
            <div class="links">
                <ul>
                    <li><a href="#">Online Exam</a></li>
                    <li><a href="{{ route('student.admission') }}">Admission</a></li>
                    <li><a href="{{ route('student.result') }}">Result</a></li>

                    @if (!Session::get('studentId'))
                    <li><a href="{{ route('student.login') }}">Student Login</a></li>
                    @else
                    <li><a href="{{ route('student.dashboard') }}">Student Dashboard</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
