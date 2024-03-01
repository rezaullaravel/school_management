@extends('admin.admin_master')

@section('title')
    Applicant List
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <h4>Applicant List For Admission.

                        </h4>
                    </div>


                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered  table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Applicant Name</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Session</th>
                                        <th>Photo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ($applicants as $key=>$row)
                                     <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->clas->class_name }}</td>
                                        <td>{{ $row->section->section_name }}</td>
                                        <td>{{ $row->session->session_year }}</td>
                                        <td>
                                            <img src="{{ asset($row->image) }}" alt="" width="80">
                                        </td>
                                        <td>
                                           <a href="{{ route('admin.accept.application',$row->id) }}" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to accept this applicant as our student???');">Accept Application</a>
                                        </td>
                                     </tr>
                                 @endforeach

                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection
