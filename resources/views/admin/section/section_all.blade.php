@extends('admin.admin_master')

@section('title')
    All Section
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>All Section.
                            <a href="{{ route('admin.add.section') }}" class="btn btn-success" style="float: right;" title="Add New Section"><i class="las la-plus-square"></i></a>
                        </h4>
                    </div>

                    @if (count($sections)>0)
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>Sl</th>
                                        <th>Class</th>
                                        <th>Section</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sections as $key=>$row )
                                    <tr class="text-center">
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $row->clas->class_name }}</td>
                                        <td>{{ $row->section_name }}</td>
                                        <td>
                                            <a href="{{ route('admin.edit.section',$row->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="las la-pen"></i></a>
                                            <a href="{{ route('admin.delete.section',$row->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="Delete"><i class="las la-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                           <div class="mt-3">
                            {{ $sections->links() }}
                           </div>
                        </div>
                    @else
                        <div class="card-body">
                            <h4 class="text-danger text-center">The table is empty....</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection
