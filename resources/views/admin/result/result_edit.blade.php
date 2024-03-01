@extends('admin.admin_master')

@section('title')
    Edit Result
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Result.
                            <a href="{{ url(Session::get('previousUrl')) }}" class="btn btn-primary" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.update.result') }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $mark->id }}" class="form-control" placeholder="Principal">

                            <div class="form-group">
                                <label>Mark<span class="text-danger">*</span></label>
                                <input type="text" name="mark" value="{{ $mark->mark }}" class="form-control" required>
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
