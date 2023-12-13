

@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - اضافة مشرف جديد';
@endphp 

@section('content')
    <div class="content-wrapper ">
            <div class="page-header">
              <h3 class="page-title">جدول المشرفين / اضافة مشرف جديد</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}" class="btn btn-success pt-2 pl-3 pb-2"> <i class="mdi mdi-arrow-left  d-md-block"></i> </a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    
                    <form class="forms-sample" action="{{route('admin.user.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        @include('admin.user.form')
                        <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">كلمة المرور</label>
                        <div class="col-sm-4">
                          <input type="password" name="password" class="form-control cairo" id="password" placeholder="كلمة مرور المستخدم"  >
                            
                          
                        </div>
                        <label for="password_confirmation" class="col-sm-2 col-form-label">تاكيد كلمة المرور</label>
                        <div class="col-sm-4">
                          <input type="password" name="password_confirmation" id="password_confirmation" class="form-control cairo"placeholder="تاكيد كلمة مرور المسخدم">
                        </div>
                        
                      </div>
                      @if($errors->any())
                        <div class=" row">
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4  text-center" >
                                  @if($errors->has('password'))
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('password')}}</p>
                                  @endif
                                </div>
                            
                                <div class="col-sm-2"></div>
                                  <div class="col-sm-4  text-center" >
                                    @if($errors->has('confirmPassword') )
                                      <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('confirmPassword')}}</p>
                                    @endif
                                  </div>
                                
                            
                        </div>
                      @endif
                        <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">الرتبة</label>
                        <div class="col-sm-10">
                                <select class="form-control cairo" name="role">
                                    <option selected disabled>اختر الرتبة</option>
                                    @if(isset($row))
                                      @if($row->role == 1)
                                        <option value="2">مشرف</option>
                                        <option value="1" selected>مدير</option>
                                      @elseif($row->role==2)
                                        <option value="2" selected>مشرف</option>
                                        <option value="1" >مدير</option>
                                        @else
                                        <option value="2">مشرف</option>
                                        <option value="1" >مدير</option>
                                      @endif
                                    @else
                                       <option value="2">مشرف</option>
                                      <option value="1" >مدير</option>
                                    @endif
                                </select>
                                
                            
                          
                        </div>
                        
                        
                      </div>
                      @if($errors->any())
                        <div class=" row">
                            
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10  text-center" >
                                  @if($errors->has('role'))
                                    <p class="pt-2 pb-2  bg-danger" style="border-radius:50px !important">{{$errors->first('role')}}</p>
                                  @endif
                                </div>
                            
                                
                            
                        </div>
                      @endif
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
                      
                        <div class=" row  w-100 mt-4">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">

                                <input type="submit" class="text-center btn btn-primary w-100 cairo" value="اضافة">
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
