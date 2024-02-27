@extends('admin.admin_master')

@section('title')
    All Student
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Student.
                            <a href="{{ route('admin.add.student') }}" class="btn btn-success btn-sm" style="float: right;"><i class="las la-plus-square"></i>Add New Student</a>
                        </h4>
                    </div>


                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered  table-responsive">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Student Name</th>
                                        <th>Roll</th>
                                        <th>Registration</th>
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
                                 @foreach ($students as $key=>$row)
                                     <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->roll }}</td>
                                        <td>{{ $row->registration }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->clas->class_name }}</td>
                                        <td>{{ $row->section->section_name }}</td>
                                        <td>{{ $row->session->session_year }}</td>
                                        <td>
                                            <img src="{{ asset($row->image) }}" alt="" width="80">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.edit.student',$row->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="las la-pen"></i></a>
                                            <a href="{{ route('admin.delete.student',$row->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="Delete"><i class="las la-trash"></i></a>
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
