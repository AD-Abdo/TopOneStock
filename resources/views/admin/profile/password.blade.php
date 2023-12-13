@push('css')
    <style>
        input{
            background-color:#2A3038 !important
        }    
    </style>
@endpush

@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - تغيير كلمة المرور ';
@endphp 

@section('content')
    <div class="content-wrapper ">
            <div class="page-header">
              <h3 class="page-title">تغيير كلمة المرور </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}" class="btn btn-success pt-2 pl-3 pb-2"> <i class="mdi mdi-arrow-left  d-md-block"></i> </a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                    
                    
                    <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('admin.profile.password.update') }}">
                      @csrf
                      @method('put')

                        
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">كلمة المرور</label>
                        <div class="col-sm-4">
                          <input type="password" name="password" class="form-control cairo" id="password" placeholder=" كلمة المرور">
                            
                          
                        </div>
                        <label for="confirmPassword" class="col-sm-2 col-form-label">تاكيد كلمة المرور</label>
                        <div class="col-sm-4">
                          <input type="password" name="password_confirmation" id="confirmPassword" class="form-control cairo" id="confirmPassword" placeholder=" تاكيد كلمة المرور" >
                        </div>
                        
                      </div>
                      @if($errors->any())
                        <div class=" row">
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10  text-center" >
                                  @if($errors->has('password'))
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('password')}}</p>
                                  @endif
                                </div>
                            
                                
                                
                            
                        </div>
                      @endif
                      
                      <div class=" row  w-100 mt-4">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">

                                <input type="submit" class="text-center btn btn-primary w-100 cairo" value="تعديل">
                            </div>
                            <div class="col-md-4">
                            </div>

                        </div>
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
@endsection

@push('js')
<script>
    document.getElementById("email").disabled = true;
    
</script>
@endpush



