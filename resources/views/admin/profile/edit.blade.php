@push('css')
    <style>
        input{
            background-color:#2A3038 !important
        }    
    </style>
@endpush

@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - البروفايل ';
@endphp 

@section('content')
    <div class="content-wrapper ">
            <div class="page-header">
              <h3 class="page-title">تعديل بياناتي الشخصية </h3>
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

                    
                    
                    <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('admin.profile.update') }}">
                      @csrf
                      @method('put')

                        
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">الاسم</label>
                        <div class="col-sm-4">
                          <input type="text" name="name" class="form-control cairo" id="name" placeholder=" الاسم" value="{{ Auth::user()->name }}" >
                            
                          
                        </div>
                        <label for="email" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                        <div class="col-sm-4">
                          <input type="email" name="email" id="email" step="any" class="form-control cairo" id="email" placeholder=" البريد الالكتروني" value="{{ Auth::user()->email}}">
                        </div>
                        
                      </div>
                      @if($errors->any())
                        <div class=" row">
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                  @if($errors->has('name'))
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('name')}}</p>
                                  @endif
                                </div>
                            
                                <div class="col-sm-2"></div>
                                  <div class="col-sm-4  text-center" >
                                    @if($errors->has('email') )
                                      <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('email')}}</p>
                                    @endif
                                  </div>
                                
                            
                        </div>
                      @endif
                      @if(Auth::user()->image != null)

                        <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">الصورة</label>
                        <div class="col-sm-4">
                          <input type="file" accept="image/*" name="image"   class="form-control cairo" id="image" placeholder="صورة">
                        </div>
                        <div class="col-sm-6 text-center">
                          <img class="img-lg rounded-circle mb-3" src="/user/{{ Auth::user()->image }}">
                        </div>
                      </div>
                       @if($errors->any())
                        <div class=" row">
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                  @if($errors->has('image') )
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('image')}}</p>
                                  @endif
                                </div>
                                <div class="col-sm-6"></div>
                            
                        </div>
                      @endif
                      
                    @else
                    <div class="form-group row">
                        
                        <label for="image" class="col-sm-2 col-form-label">الصورة</label>
                        <div class="col-sm-10">
                          <input type="file" accept="image/*" name="image"   class="form-control cairo" id="image" placeholder="صورة">
                        </div>
                        
                      </div>
                       @if($errors->any())
                        <div class=" row">
                            
                                
                              
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10  text-center" >
                                  @if($errors->has('image') )
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('image')}}</p>
                                  @endif
                                </div>
                            
                        </div>
                      @endif
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



