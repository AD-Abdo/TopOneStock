

@extends('admin.layouts.main') 
  
@php 
  $title = 'توب وان - لوحة التحكم - تعديل باقة ';
@endphp 

@section('content')
    <div class="content-wrapper ">
            <div class="page-header">
              <h3 class="page-title">جدول الباقات / تعديل باقة : <span style="text-decoration: underline">{{ $row->name }}</span></h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('admin.package.index') }}" class="btn btn-success pt-2 pl-3 pb-2"> <i class="mdi mdi-arrow-left  d-md-block"></i> </a></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                    
                    
                    <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{ route('admin.package.update',$row->id) }}">
                      @csrf
                      @method('put')
                        @include('admin.package.form')

                        @if($row->image != null)

                    <div class="form-group row">
                        
                        <label for="image" class="col-sm-2 col-form-label">الصورة</label>
                        <div class="col-sm-4">
                          <input type="file" accept="image/*" name="image"   class="form-control cairo" id="image" placeholder="صورة">
                        </div>
                        <div class="col-sm-6 text-center">
                          <img class="img-lg rounded-circle mb-3" src="/package/{{ $row->image }}">
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

