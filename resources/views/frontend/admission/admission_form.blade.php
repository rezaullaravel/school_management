@extends('frontend.frontend_master')

@section('title')
    Student Admission
@endsection


@section('content')
<div class="main-body">
	<div class="container">
       <div class="row">
         <div class="col-sm-12">
            <div class="card">
                @if (session('sms'))
                    <div class="alert alert-success">
                        <h4 class="text-center">{{ Session::get('sms') }}</h4>
                    </div>
                @endif
                <div class="card-header">
                    <h4 class="text-center"><strong>Student Admission Form</strong></h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.admission.info') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Class<span class="text-danger">*</span> </label>
                                    <select name="clas_id" id="" class="form-control">
                                        <option value="" selected disabled>Select A Class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
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

                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Session<span class="text-danger">*</span></label>
                                    <select name="session_id" id="" class="form-control">
                                        <option value="" selected disabled>Select Session</option>
                                        @foreach ($sessions as $session)
                                            <option value="{{ $session->id }}">{{ $session->session_year }}</option>
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
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Father Name <span class="text-danger">*</span></label>
                                    <input type="text" name="father_name" value="{{ old('father_name') }}" class="form-control">
                                    @error('father_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Mother Name <span class="text-danger">*</span></label>
                                    <input type="text" name="mother_name" value="{{ old('mother_name') }}" class="form-control">
                                    @error('mother_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>{{-- row --}}

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label> Phone <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
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
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                                @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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
                                <textarea name="present_address" class="form-control" rows="6">{{ old('present_address') }}</textarea>
                                @error('present_address')
                                        <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Permanent Address <span class="text-danger">*</span></label>
                                    <textarea name="permanent_address" class="form-control" rows="6">{{ old('permanent_address') }}</textarea>
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
                                <input type="submit" value="Submit" class="btn btn-success btn-block">
                            </div>
                        </div>{{-- row --}}
                    </form>
                </div>
            </div>

         </div>
       </div>
    </div>{{-- container --}}
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
{{-- javascript for section auto select end --}}
@endsection
