@extends('admin.admin_master')

@section('title')
    Edit Student
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Student.
                            <a href="{{ route('admin.all.student') }}" class="btn btn-primary" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.update.student') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $student->id }}">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Class<span class="text-danger">*</span> </label>
                                        <select name="clas_id" id="" class="form-control">
                                            <option value="" selected disabled>Select A Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ $class->id==$student->clas_id ? 'selected' :'' }}>{{ $class->class_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('clas_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Section</label>
                                        <select name="section_id" id="" class="form-control">
                                            <option value="" selected disabled>Select</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}" {{ $section->id==$student->section_id ? 'selected':'' }}>{{ $section->section_name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Session<span class="text-danger">*</span></label>
                                        <select name="session_id" id="" class="form-control">
                                            <option value="" selected disabled>Select Session</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->id }}" {{ $session->id==$student->session_id ? 'selected':'' }}>{{ $session->session_year }}</option>
                                            @endforeach
                                        </select>
                                        @error('session_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- row --}}

                            <div class="row">
                                <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Student Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ $student->name }}" class="form-control">
                                    @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Father Name <span class="text-danger">*</span></label>
                                        <input type="text" name="father_name" value="{{ $student->father_name }}" class="form-control">
                                        @error('father_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Mother Name <span class="text-danger">*</span></label>
                                        <input type="text" name="mother_name" value="{{ $student->mother_name }}" class="form-control">
                                        @error('mother_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- row --}}

                            <div class="row">
                                <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Roll <span class="text-danger">*</span></label>
                                    <input type="number" name="roll" value="{{ $student->roll }}" class="form-control">
                                    @error('roll')
                                            <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label> Registration <span class="text-danger">*</span></label>
                                        <input type="number" name="registration" value="{{ $student->registration }}" class="form-control">
                                        @error('registration')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label> Phone <span class="text-danger">*</span></label>
                                        <input type="text" name="phone" value="{{ $student->phone }}" class="form-control">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- row --}}

                            <div class="row">
                                <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ $student->email }}" class="form-control">
                                    @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label> Password <span class="text-danger">*</span></label>
                                        <input type="text" name="password"  class="form-control">
                                       <p class="text-danger">If you want to change password, enter new password.</p>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label> Image </label>
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                            </div>{{-- row --}}

                            <div class="row">
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Present Address <span class="text-danger">*</span></label>
                                    <textarea name="present_address" class="form-control" rows="6">{{ $student->present_address }}</textarea>
                                    @error('present_address')
                                            <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label> Permanent Address <span class="text-danger">*</span></label>
                                        <textarea name="permanent_address" class="form-control" rows="6">{{ $student->permanent_address }}</textarea>
                                        @error('permanent_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- row --}}

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label> Birth Certificate (Image Copy)</label>
                                        <input type="file" name="birth_certificate" class="form-control">
                                    </div>
                                </div>
                            </div>{{-- row --}}

                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" value="Update" class="btn btn-success btn-block">
                                </div>
                            </div>{{-- row --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>

 {{-- javascript for section auto select --}}
<script type="text/javascript">
    $(document).ready(function(){
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
    });
</script>
{{-- javascript for sub category auto select end --}}

@endsection
