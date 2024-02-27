@extends('admin.admin_master')

@section('title')
    Add Designation
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Designation.
                            <a href="{{ route('admin.all.designation') }}" class="btn btn-primary" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.store.designation') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Designation<span class="text-danger">*</span></label>
                                <input type="text" name="designation"  class="form-control" placeholder="Principal">
                                @error('designation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit"  class="btn btn-success" value="Submit" style="float: right;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>

@endsection
